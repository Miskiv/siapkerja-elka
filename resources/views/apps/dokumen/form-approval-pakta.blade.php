@extends('layouts.app')
@section('title', 'Form Approval '.$param)
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><a href="{{ url('dokumen') }}" class="text-muted"></a> Baca Form Approval {{$param}}
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen') }}">Form Approval {{ $param }}</a></li>
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

                        <p style="text-align:center"><strong><span style="font-size:12pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">PAKTA INTEGRITAS</span></span></span></span></strong></p>

                        <p style="text-align:justify"><br />
                            <span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Sehubungan dengan pelaksanaan </span></span><em><span style="font-family:&quot;Arial-ItalicMT&quot;,serif"><span style="color:black">Good Corporate Governance (GCG) </span></span></em><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">di lingkungan </span></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Kimia Farma Group, saya yang bertanda tangan di bawah :</span></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NPP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>{{ $checking_approval['approved_pakta'] ? $checking_approval['dokumen']->user->kode_npp : Auth::user()->kode_npp }}</strong></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>{{ $checking_approval['approved_pakta'] ? $checking_approval['dokumen']->user->name : Auth::user()->name }}</strong></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>{{ $checking_approval['approved_pakta'] ? $checking_approval['dokumen']->user->jabatan : Auth::user()->jabatan }}</strong></span></span></span></p>


                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Dengan ini menyatakan </span>yang<span style="color:black"> sebenarnya dan penuh rasa tanggung jawab atas hal - hal sebagai berikut :</span></span></span></span></p>

                        <ol>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Saya akan melaksanakan tugas dan kewajiban secara bersih dan profesional sesuai dengan prinsip - prinsip GCG yang meliputi </span></span><em><span style="font-family:&quot;Arial-ItalicMT&quot;,serif"><span style="color:black">Transparency, Accountability, Responsibility, Independency, dan Fairness</span></span></em><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">, serta melaksanakan Pedoman Etika Usaha dan Tata Perilaku (</span></span><em><span style="font-family:&quot;Arial-ItalicMT&quot;,serif"><span style="color:black">Code of Conduct</span></span></em><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">) dengan penuh tanggung jawab.</span></span></span></span></li>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Saya tidak akan melakukan tindakan yang mengandung unsur benturan kepentingan dan tindakan lain yang bertujuan memanfaatkan perusahaan untuk kepentingan pribadi, keluarga, dan/atau golongan tertentu, baik secara langsung maupun tidak langsung. </span></span></span></span></li>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Saya tidak akan melakukan praktik Korupsi, Kolusi dan Nepotisme (KKN) serta tidak akan memberi dan/atau menerima sesuatu/hadiah dalam bentuk apapun berupa suap baik secara langsung maupun tidak langsung yang berhubungan dengan jabatan atau pekerjaan saya.</span></span></span></span></li>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Saya akan memegang teguh dan menjunjung tinggi serta melaksanakan budaya perusahaan &ldquo;</span></span><strong><em><span style="font-family:&quot;Arial-ItalicMT&quot;,serif"><span style="color:black">AKHLAK</span></span></em></strong><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">&rdquo; (</span></span><em><span style="font-family:&quot;Arial-ItalicMT&quot;,serif"><span style="color:black">Amanah, Kompeten, Harmonis, Loyal, Adaptif, </span></span></em><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">dan </span></span><em><span style="font-family:&quot;Arial-ItalicMT&quot;,serif"><span style="color:black">Kolaboratif</span></span></em><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">).</span></span></span></span></li>
                            <li style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Saya akan melaksanakan praktik pengelolaan perusahaan yang tidak bertentangan dengan peraturan perundang-undangan yang berlaku dan senantiasa melakukan perbaikan secara terus menerus (</span></span><em><span style="font-family:&quot;Arial-ItalicMT&quot;,serif"><span style="color:black">Continuous Improvement</span></span></em><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">) dalam rangka menerapkan praktik kerja terbaik (</span></span><em><span style="font-family:&quot;Arial-ItalicMT&quot;,serif"><span style="color:black">Best Practices</span></span></em><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">). </span></span></span></span></li>
                        </ol>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">Apabila saya melanggar Pakta Integritas ini, saya bersedia dikenakan sanksi sesuai </span></span></span></span></p>

                        <p style="text-align:justify"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif"><span style="color:black">peraturan perusahaan dan perundang- undangan yang berlaku.</span></span></span></span></p>

                        <p style="text-align:justify">&nbsp;</p>

                        <p style="text-align:right"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">Jakarta, {{ $checking_approval['approved_pakta'] ?  Carbon\Carbon::parse($checking_approval['dokumen']->approval_pakta_date)->isoFormat('D MMMM Y') : Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</span></span></span></p>

                        @if(empty($checking_approval['approved_pakta']))
                            <p style="text-align:right"><a href="{{ url('dokumen/approve/PAKTA') }}" class="btn btn-primary"><i class="ri-check-fill align-bottom"></i> Klik Setuju</a></p>
                        @else
                            <p style="text-align:right"><span class="avatar-xs">{!! $checking_approval['dokumen']->approval_pakta_qrcode ?? '' !!}</span></p>
                        @endif

                        <p style="text-align:right"><span style="font-size:10.3pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Arial&quot;,sans-serif">(&nbsp;<strong>{{ $checking_approval['approved_pakta'] ? $checking_approval['dokumen']->user->name : ucwords(Auth::user()->name) }}</strong> )</span></span></span></p>

                        <p>&nbsp;</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-primary float-md-first"><i
                                class="ri ri-arrow-go-back-line align-bottom"></i> Kembali</a>
                        @if(!empty($checking_approval['approved_pakta']))
                            <a href="{{ url('dokumen') }}" class="btn btn-primary float-md-end"><i
                                    class="ri ri-book-read-line align-bottom"></i> Lanjut, Selesai</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
@endpush
