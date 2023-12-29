@extends('layouts.app')
@section('title', 'Halaman Persetujuan')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><a href="{{ url('dokumen') }}" class="text-muted"></a> Halaman Persetujuan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen') }}">Halaman Persetujuan</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-lg-center">
            <div class="{{ $checking_approval['flag_enable'] ? 'col-md-4' : 'col-md-6' }}">
                <div class="card">
                    <img src="{{ asset('assets/images/cover-pedoman-coc.jpg') }}" class="card-img-top" height="{{ $checking_approval['flag_enable'] ? '470px' : '' }}">
                    <div class="card-body">
                        <h5 class="card-title">Pedoman Standar Perilaku</h5>
                        <p class="card-text">Anda telah memilih untuk menyetujui dokumen Pedoman Standar
                            Perilaku. Dokumen ini berisi beberapa poin penting yang harus diikuti oleh seluruh karyawan
                            dan pihak terkait dalam menjalankan tugas dan tanggung jawab mereka.</p>
                        <a href="{{ url('dokumen/read-flip-book') }}" class="btn btn-outline-primary float-first"><i class="ri ri-book-read-line align-bottom"></i> Baca</a>
                        @if($checking_final_score == false)
                            <a href="{{ url('dokumen/read-flip-quiz') }}" class="btn btn-outline-warning float-first"><i class="ri ri-file-list-2-fill align-bottom"></i> Quiz</a>
                        @endif
                        @if(empty($checking_approval['approved_coc']))
                            <a href="{{ url('dokumen/form-approval/COC') }}" class="btn btn-primary float-end"><i class="ri ri-file-line align-bottom"></i> Form Approval</a>
                        @else
                            <a href="{{ url('dokumen/form-approval/COC') }}" class="btn btn-success float-end" disabled title="Telah Disetujui {{ $checking_approval['dokumen']->approval_coc_date }}"><i class="ri ri-check-double-line align-bottom"></i>Telah Disetuji</a>
                        @endif
                    </div>
                    @if($checking_approval['approved_coc'])
                    <div class="card-footer text-muted">
                        <div class="d-flex mt-4">
                            <div class="flex-shrink-0">
                                <span class="avatar-xs">{!! $checking_approval['dokumen']->approval_coc_qrcode ?? '' !!}</span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-13 mb-0">{{ $checking_approval['dokumen']->user->name }}</h5>
                                <h5 class="fs-13 text-muted mb-1"><i class="ri ri-check-double-line text-muted align-bottom me-1"></i>{{ date('d-m-Y', strtotime($checking_approval['dokumen']->approval_coc_date)) }} - {{ date('H:i', strtotime($checking_approval['dokumen']->approval_coc_date)) }} WIB</h5>
                                <p class="text-muted text-justify">Dokumen COC ini sudah anda setujui sesuai dengan informasi pada <a href="{{ url('qrcode', $checking_approval['dokumen']->uuid) }}">QR code</a> ini.</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @if($checking_approval['flag_enable'])
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('assets/images/cover-pakta.jpg') }}" class="card-img-top" height="470px">
                        <div class="card-body">
                            <h5 class="card-title">Pakta Integritas</h5>
                            <p class="card-text">Anda juga telah memilih untuk menyetujui dokumen Pakta Integritas. Dokumen
                                ini berisi komitmen dari PT. Kimia Farma Tbk. untuk menjalankan bisnis secara etis dan
                                profesional, serta mematuhi semua peraturan dan hukum.</p>
                            <a href="{{ url('dokumen/read-flip-pakta') }}" class="btn btn-outline-primary float-first"><i class="ri ri-book-read-line align-bottom"></i> Baca</a>
                            @if(empty($checking_approval['approved_pakta']))
                                <a href="{{ url('dokumen/form-approval/PAKTA') }}" class="btn btn-primary float-end"><i class="ri ri-file-2-line align-bottom"></i> Form Approval</a>
                            @else
                                <a href="{{ url('dokumen/form-approval/PAKTA') }}" class="btn btn-success float-end" disabled title="Telah Disetujui {{ $checking_approval['dokumen']->approval_pakta_date }}"><i class="ri ri-check-double-line align-bottom"></i>Telah Disetuji</a>
                            @endif
                        </div>
                        @if($checking_approval['approved_pakta'])
                            <div class="card-footer text-muted">
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0">
                                        <span class="avatar-xs">{!! $checking_approval['dokumen']->approval_pakta_qrcode ?? '' !!}</span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fs-13 mb-0">{{ $checking_approval['dokumen']->user->name }}</h5>
                                        <h5 class="fs-13 text-muted mb-1"><i class="ri ri-check-double-line text-muted align-bottom me-1"></i>{{ date('d-m-Y', strtotime($checking_approval['dokumen']->approval_pakta_date)) }} - {{ date('H:i', strtotime($checking_approval['dokumen']->approval_pakta_date)) }} WIB</h5>
                                        <p class="text-muted text-justify">Dokumen Pakta ini sudah anda setujui sesuai dengan informasi pada <a href="{{ url('qrcode', $checking_approval['dokumen']->uuid) }}">QR code</a> ini.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
@push('js')
@endpush
