@extends('layouts.guest')

@section('title', 'Verifikasi QR Code')

@section('content')

    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                 viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center text-white-50 mt-5">
                        <div>
                            <a href="/" class="d-inline-block auth-logo">
                                <img src="{{ asset('assets/images/logo-white.png') }}" alt="" height="70">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Verifikasi QR Code</h5>
                                <p class="text-muted">Data Verifikasi QR Code yang telah malakukan persetujuan terhadap dokumen Pedoman Standar Perilaku & Pakta Integritas.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>NPP</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->user->kode_npp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->user->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Level Jabatan</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->user->level_jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Entitas</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->user->nama_entitas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Direktorat</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->user->nama_direktorat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Divisi</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->user->nama_divisi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Unit</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->user->nama_unit }}</td>
                                    </tr>
                                    <tr>
                                        <td>Approval COC</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->approval_coc == 1 ? 'Sudah' : 'Belum' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Approval COC</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->approval_coc_date ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Approval Pakta</td>
                                        <td>:</td>
                                        <td>@if($dokumen->user->level_jabatan <= 3 || $dokumen->user->level_jabatan == 7 )
                                                {!!  $dokumen->approval_pakta == 1 ? 'Sudah' : 'Belum' !!}
                                            @else
                                                {!! 'Tidak Perlu' !!}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Approval Pakta</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->approval_pakta_date ?? 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nilai</td>
                                        <td>:</td>
                                        <td>{{ $dokumen->final_score ?? 'N/A'}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card body -->
                        <div class="card-footer">
                            <div class="d-flex">
                                <div class="flex-shrink-0 mt-2">
                                    <span class="avatar-xs">{!! $dokumen->approval_coc_qrcode ?? '' !!}</span>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="m-2">Data dari QR code ini adalah data yang benar dan telah melakukan persetujuan pada
                                        dokumen terkait. QR code ini berfungsi sebagai bukti verifikasi bahwa telah
                                        menyetujui dokumen dengan informasi yang tertera pada QR code ini.</p>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ url('/') }}" class="btn btn-primary"><i class="ri ri-home-line align-bottom"></i> Back to Home</a>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

@stop
