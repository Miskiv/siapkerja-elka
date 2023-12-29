<?php

namespace App\Http\Controllers;

use Alert;
use App\Exports\DokumenExport;
use App\Http\Controllers\API\UuidController;
use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DokumenController extends Controller
{
    public function __construct()
    {
        $this->uuid = new UuidController;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = Dokumen::where('user_id', Auth::user()->id)->where('tahun', date('Y'))->first();
        if (! empty($dokumen)) {
            return redirect('dokumen/approval');
        }

        return view('apps.dokumen.index');
    }

    /**
     * Display a flip book read.
     *
     * @return \Illuminate\Http\Response
     */
    public function flip_book()
    {
        $dokumen = Dokumen::where('user_id', Auth::user()->id)->where('tahun', date('Y'))->first();

        return view('apps.dokumen.flip-book', compact('dokumen'));
    }

    /**
     * Display a flip pakta read.
     *
     * @return \Illuminate\Http\Response
     */
    public function flip_pakta()
    {
        $dokumen = Dokumen::where('user_id', Auth::user()->id)->where('tahun', date('Y'))->first();

        return view('apps.dokumen.flip-pakta', compact('dokumen'));
    }

    /**
     * Display a flip summary read.
     *
     * @return \Illuminate\Http\Response
     */
    public function flip_summary()
    {
        return view('apps.dokumen.flip-summary');
    }

    /**
     * Display a flip quiz read.
     *
     * @return \Illuminate\Http\Response
     */
    public function flip_quiz()
    {
        return view('apps.dokumen.flip-quiz');
    }

    /**
     * Display a flip quiz read.
     *
     * @return \Illuminate\Http\Response
     */
    public function approval()
    {
        $checking_approval = $this->checking_approval();
        $checking_final_score = $this->checking_final_score();

        return view('apps.dokumen.approval', compact('checking_approval', 'checking_final_score'));
    }

    /**
     * Display a flip quiz read.
     *
     * @return \Illuminate\Http\Response
     */
    public function form_approval($param)
    {
        $checking_approval = $this->checking_approval();
        if ($param == 'COC') {
            return view('apps.dokumen.form-approval-coc', compact('param', 'checking_approval'));
        } elseif ($param == 'PAKTA') {

            if ($checking_approval['flag_enable'] == false) {
                Alert::error('Gagal', 'Anda tidak memiliki akses untuk Approval PAKTA');

                return back();
            }

            return view('apps.dokumen.form-approval-pakta', compact('param', 'checking_approval'));
        }

    }

    /**
     * Display a flip quiz read.
     *
     * @return \Illuminate\Http\Response
     */
    public function checking_approval()
    {
        $data['dokumen'] = Dokumen::where('user_id', Auth::user()->id)->where('tahun', date('Y'))->first();
        if (! empty($data['dokumen'])) {
            $data['approved_coc'] = $data['dokumen']->approval_coc;
            $data['approved_pakta'] = $data['dokumen']->approval_pakta;
        } else {
            $data['approved_coc'] = null;
            $data['approved_pakta'] = null;
        }

        //1,DIREKSI
        //2,GM
        //3,MANAGER
        //4,ASMAN
        //5,SUPERVISOR
        //6,PELAKSANA
        //7,NON-GOL
        //8,TENAGA ALIH DAYA

        $data['flag_enable'] = Auth::user()->level_jabatan <= 3 || Auth::user()->level_jabatan == 7 ? true : false;

        return $data;
    }

    /**
     * Checking nilai.
     *
     * @return \Illuminate\Http\Response
     */
    public function checking_final_score()
    {
        $dokumen = Dokumen::where('user_id', Auth::user()->id)->where('tahun', date('Y'))->whereNotNull('final_score')->first();

        if (!empty($dokumen)) {
            $final_score_flag= true;
        } else {
            $final_score_flag = false;
        }

        return $final_score_flag;
    }

    /**
     * Process approve documents.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve($param, Dokumen $model)
    {
        $dokumen = $model->where('user_id', Auth::user()->id)->where('tahun', date('Y'))->first();
        if (empty($dokumen)) {
            $dokumen = $model;
            $dokumen->tahun = date('Y');
            $dokumen->user_id = Auth::user()->id;
            $dokumen->uuid = $this->uuid->hash();
        }

        $url = request()->getHost().'/qrcode/'.$dokumen->uuid;

        if ($param == 'COC') {
            $dokumen->approval_coc = 1;
            $dokumen->approval_coc_date = date('Y-m-d H:i:s');
            $dokumen->approval_coc_qrcode = QrCode::size(100)->generate($url);
            $dokumen->final_score = session('finalScore');

            $dokumen->save();

            Alert::success('Berhasil', 'Dokumen '.$param.' berhasil di Approve');
            activity()->log('Melakukan Approve Dokumen '.$param.' dengan nilai '.session('finalScore'));

            return back();

        } elseif ($param == 'PAKTA') {
            $dokumen->approval_pakta = 1;
            $dokumen->approval_pakta_date = date('Y-m-d H:i:s');
            $dokumen->approval_pakta_qrcode = QrCode::size(100)->generate($url);
            $dokumen->final_score = session('finalScore');

            $dokumen->save();

            Alert::success('Berhasil', 'Dokumen '.$param.' berhasil di Approve');
            activity()->log('Melakukan Approve Dokumen '.$param.' dengan nilai '.session('finalScore'));

            return back();
        }

    }

    /**
     * History of approve documents.
     *
     * @return \Illuminate\Http\Response
     */
    public function riwayat()
    {
        $riwayat = $this->data();

        return view('apps.dokumen.riwayat', compact('riwayat'));
    }

    /**
     * Data object riwayat.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $riwayat = User::select('users.name as nama',
            'users.kode_sap',
            'users.kode_npp',
            'users.photo_profile',
            'users.level_jabatan',
            'users.jabatan',
            'users.nama_level_jabatan',
            'users.kode_entitas',
            'users.nama_entitas',
            'users.nama_direktorat',
            'users.nama_divisi',
            'users.nama_unit',
            'users.nama_sub_unit',
            'users.nama_bagian',
            'users.nama_sub_bagian',
            'dokumen.id as dokumen_id',
            'dokumen.uuid',
            'dokumen.tahun',
            'dokumen.approval_coc',
            'dokumen.approval_coc_date',
            'dokumen.approval_pakta',
            'dokumen.approval_pakta_date',
            'dokumen.final_score',
            'dokumen.created_at')
            ->leftJoin('dokumen', 'users.id', '=', 'dokumen.user_id')
            ->orderBy('dokumen.updated_at', 'DESC');
        if (Auth::user()->roles->first()->name == 'Admin') {
            $riwayat = $riwayat->get();
        } else {
            $riwayat = $riwayat->where('users.id', Auth::user()->id)->get();
        }

        return $riwayat;
    }

    /**
     * History of delete documents.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokumen = Dokumen::find($id);
        $dokumen->delete();
        Alert::success('Berhasil', 'Dokumen berhasil dihapus');
        activity()->log('Melakukan Delete Dokumen');

        return back();
    }

    /**
     * Export history.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        $riwayat = $this->data();

        return Excel::download(new DokumenExport($riwayat), 'List Riwayat Persetujuan.xlsx');
    }

    /**
     * Qrcode View.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function qrcode($qrcode)
    {
        $dokumen = Dokumen::where('uuid', $qrcode)->first();
        if(empty($dokumen)){
            abort(404);
        }

        return view('apps.dokumen.qrcode', compact('dokumen'));
    }
}
