<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\MasterDivisi;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Mahasiswa';
        $data['mahasiswa'] = User::role('User')->with('roles')->get();
        $data['prodi'] = Prodi::get();
        $data['role'] = Role::get();
        return view('apps.daftar-mahasiswa.index_prodi', compact('title', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:users,email',
        ]);
        
        $user = User::create([
            'name' => strtoupper($request->name),
            'email' => $request->email,
            'nim' => $request->nim,
            'prodi_id' => $request->prodi,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        activity()->log('Menambahkan User'.$request->name);
        Alert::success('Berhasil', 'Berhasil menambahkan user');

        return back();
    }

    public function show($id)
    {
        $data['mahasiswa'] = User::with('roles')
            ->where('prodi_id', Crypt::decryptString($id))
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Admin');
            })
            ->get();
        $data['prodi'] = Prodi::find(Crypt::decryptString($id));
        $prodi = $data['prodi']->prodi;
        $data['role'] = Role::get();
        $title = 'Daftar Mahasiswa '. $data['prodi']->prodi;
        return view('apps.daftar-mahasiswa.index', compact('data', 'title', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => strtoupper($request->name),
            'email' => $request->email,
            'kode_entitas' => $request->kode_entitas,
            'job_title' => $request->job_title,
            'hak_akses' => $request->hak_akses,
        ]);

        if (! empty($request->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        //switch assign to role
        $role = $user->getRoleNames()[0];
        //remove role
        $user->removeRole($role);
        //asign role
        $user->assignRole($request->role);

        activity()->log('Mengedit User '.$request->name);
        Alert::success('Berhasil', 'Data berhasil diedit');

        return back();
    }

    public function edit_password()
    {
        return view('apps.users.password');
    }

    public function update_password(Request $request)
    {
        if (! (Hash::check($request->get('password_old'), Auth::user()->password))) {
            Alert::error('Gagal', 'Password lama tidak sama');

            return back();
        }

        if (strcmp($request->get('password_old'), $request->get('password_new')) == 0) {
            // Current password and new password same
            Alert::error('Gagal', 'Password baru & lama tidak sama');

            return back();
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_new'));
        $user->save();

        activity()->log('Update Password User');
        Alert::success('Berhasil', 'Password berhasil diubah');

        return back();
    }

    public function update_role(Request $request, $id)
    {
        $user = User::find($id);
        //switch assign to role
        if (empty($user->getRoleNames())) {
            $role = $user->getRoleNames()[0];
            //remove role
            $user->removeRole($role);
        }
        //asign role
        $user->assignRole($request->role);

        Alert::success('Berhasil', 'Data berhasil diedit');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        activity()->log(Auth::User()->name.' Delete User: '.$id.' - '.$user->title);
        $user->delete();

        Alert::success('Berhasil', 'User berhasil didelete');

        return back();
    }
}
