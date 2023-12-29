<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Session;

class SSOController extends Controller
{
    public function loginKifest()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post(env('API_KIFEST').'/api/login', [
            'code' => env('API_CODE'),
            'password' => env('API_KEY'),
        ]);

        return json_decode($response->getBody(), true);
    }

    public function loginSSO(Request $request)
    {
        // Get public key from local storage
        $publicKey = Storage::disk('local')->get(env('SSO_KIFEST'));

        try {
            // Verify and decode token
            $payloads = JWT::decode($request->token, new Key($publicKey, 'RS256'));
        } catch (BeforeValidException|ExpiredException|SignatureInvalidException $e) {
            // Handle exceptions if token is invalid
            return $e->getMessage();
        }

        // Clear session and logout user
        Auth::logout();
        Session::flush();

        try {
            // Send API request to get user by NPP
            $client = new Client(['base_uri' => env('API_URL')]);
            $headers = [
                'X-API-KEY' => env('API_KEY') ?? '',
                'Accept' => 'application/json',
            ];
            $response = $client->request('GET', 'employee?npp='.$payloads->employee_npp, [
                'headers' => $headers,
            ]);
        } catch (RequestException $e) {
            // Handle request exception
            return abort($e->getCode());
        }

        // Get data from response and update session
        $data = json_decode($response->getBody(), true);
        if (isset($data['data']) && isset($data['data']['employee'])) {
            $pegawai = $data['data']['employee'];
            session()->put([
                'users' => $pegawai,
                'photo_profile' => $pegawai['photo_profile'],
                'token' => $auth['token'] ?? '',
            ]);

            $this->checkingUser($data['data']);
        } else {
            return redirect('/login');
        }

        activity()->log('Login Melalui SSO Kifest');

        return redirect('/home');
    }

    private function checkingUser($data)
    {
        $user = User::where('kode_npp', $data['employee']['kode_npp'])->first();
        $obj = [
            'name' => $data['employee']['nama_pegawai'],
            'email' => $data['employee']['email'],
            'kode_sap' => $data['employee']['kode_id'],
            'kode_npp' => $data['employee']['kode_npp'],
            'no_telp' => $data['employee']['telepon_pegawai'],
            'photo_profile' => $data['employee']['photo_profile'] ? 'https://api.hcis.kimiafarma.co.id'.$data['employee']['photo_profile'] : null,
            'level_jabatan' => $data['position']['level_jabatan'],
            'jabatan' => $data['position']['nama_jabatan'],
            'nama_level_jabatan' => $data['position']['nama_level_jabatan'],
            'kode_group_entitas' => $data['position']['kode_group_entitas'],
            'kode_entitas' => $data['position']['kode_entitas'],
            'nama_entitas' => $data['area']['nama_area'],
            'nama_direktorat' => $data['position']['nama_direktorat'],
            'nama_divisi' => $data['position']['nama_divisi'],
            'nama_unit' => $data['position']['nama_unit'],
            'nama_sub_unit' => $data['position']['nama_sub_unit'],
            'nama_bagian' => $data['position']['nama_bagian'],
            'nama_sub_bagian' => $data['position']['nama_sub_bagian'],
        ];

        if (! empty($user)) {
            User::where('kode_npp', $data['employee']['kode_npp'])->update($obj);
            Auth::login($user);
        } else {
            $user = User::create($obj);
            $user->assignRole('User');
            $user = User::where('kode_npp', $data['employee']['kode_npp'])->first();
            Auth::login($user);
        }
    }
}
