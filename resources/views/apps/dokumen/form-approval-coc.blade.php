@extends('layouts.app')
@section('title', 'Form Approval COC')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><a href="{{ url('dokumen') }}" class="text-muted"></a> Baca Form
                        Approval COC
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen') }}">Form
                                    Approval COC</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p style="text-align:center"><img alt="" src="{{ asset('assets/images/header/bumn.png') }}" style="float:left; height:63px; width:112px" /><img alt="" src="{{ asset('assets/images/header/kf.jpg') }}" style="float:right; height:58px; width:128px" /></p>

                        <p style="text-align:center"><span style="font-size:12pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Arial&quot;,sans-serif">PERNYATAAN KOMITMEN</span></strong></span></span></p>

                        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Arial&quot;,sans-serif">UNTUK MEMATUHI PEDOMAN PERILAKU (<em>CODE OF CONDUCT</em>)</span></strong></span></span></p>

                        <p style="text-align:center"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Yang bertanda tangan di bawah ini:</span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NPP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>{{ $checking_approval['approved_coc'] ? $checking_approval['dokumen']->user->kode_npp : Auth::user()->kode_npp }}</strong></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>{{ $checking_approval['approved_coc'] ? $checking_approval['dokumen']->user->name : Auth::user()->name }}</strong></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>{{ $checking_approval['approved_coc'] ? $checking_approval['dokumen']->user->jabatan : Auth::user()->jabatan }}</strong></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Bersama ini menyatakan dengan jujur, tanpa ada paksaan dari pihak manapun serta dengan rasa penuh tanggung jawab , bahwa :</span></span></span></p>

                        <ol>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Saya telah mengikuti sosialisasi dan internalisasi pedoman perilaku (<em>code of conduct</em>) serta telah menerima buku (<em>code of conduct</em>)/membaca/lihat pedoman perilaku Insan Kimia Farma Grup, pada portal: </span><a href="http://www.kimiafarma.co.id" style="color:#0563c1; text-decoration:underline"><strong><em><span style="font-family:&quot;Arial&quot;,sans-serif">www.kimiafarma.co.id</span></em></strong></a><strong><em> </em></strong><span style="font-family:&quot;Arial&quot;,sans-serif">atau dalam sistem komitmen.</span></span></span></li>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Saya telah memahami isi Buku (<em>code of conduct</em>)&nbsp; Insan Kimia Farma Grup.</span></span></span></li>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Saya bersedia mematuhi apa yang telah menjadi komitmen Insan Kimia Farma Grup, dalam Buku (<em>code of conduct</em>) Kami Insan Kimia Farma Grup dan menerapkannya dalam pelaksanaan tugas sehari-hari.</span></span></span></li>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Saya siap menerima konsekuensi berupa Sanksi dari Perusahaan bila kami terbukti melakukan pelanggaran atas komitmen perilaku yang telah ditetapkan dalam buku (<em>code of conduct</em>) Insan Kimia Farma Grup.</span></span></span></li>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Saya sebagai Insan Kimia Farma Grup, senentiasa memegang komitmen Perusahaan untuk mengembangkan reputasi Perusahaan.</span></span></span></li>
                        </ol>

                        <p style="text-align:right"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Jakarta, {{ $checking_approval['approved_coc'] ?  Carbon\Carbon::parse($checking_approval['dokumen']->approval_coc_date)->isoFormat('D MMMM Y') : Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</span></span></span></p>

                        @if(empty($checking_approval['approved_coc']))
                            <p style="text-align:right"><a href="{{ url('dokumen/approve/COC') }}" class="btn btn-primary"><i class="ri-check-fill align-bottom"></i> Klik Setuju</a></p>
                        @else
                            <p style="text-align:right"><span class="avatar-xs">{!! $checking_approval['dokumen']->approval_coc_qrcode ?? '' !!}</span></p>
                        @endif

                        <p style="text-align:right"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">(&nbsp;<strong>{{ $checking_approval['approved_coc'] ? $checking_approval['dokumen']->user->name : ucwords(Auth::user()->name) }}</strong> )</span></span></span></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-primary float-md-first"><i
                                class="ri ri-arrow-go-back-line align-bottom"></i> Kembali</a>
                        @if ($checking_approval['flag_enable'])
                            @if (!empty($checking_approval['approved_coc']))
                                <a href="{{ url('dokumen/form-approval/PAKTA') }}" class="btn btn-primary float-md-end">
                                    <i class="ri ri-book-read-line align-bottom"></i> Lanjut, Approval Pakta
                                </a>
                            @endif
                        @else
                            @if (!empty($checking_approval['approved_coc']))
                                <a href="{{ url('dokumen') }}" class="btn btn-primary float-md-end">
                                    <i class="ri ri-book-read-line align-bottom"></i> Lanjut, Selesai
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
@endpush
