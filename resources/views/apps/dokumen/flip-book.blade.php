@extends('layouts.app')
@section('title', 'Dokumen')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><a href="{{ url('dokumen') }}" class="text-muted"></a> Baca Dokumen</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen') }}">Dokumen</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-md-8">
                <div id="adobe-dc-view" style="width:100%; height:800px"></div>
                <script src="https://documentservices.adobe.com/view-sdk/viewer.js"></script>
                <script type="text/javascript">
                    document.addEventListener("adobe_dc_view_sdk.ready", function () {
                        var adobeDCView = new AdobeDC.View({
                            clientId: " {{ env('ID_PDF_VIEWER') }}",
                            divId: "adobe-dc-view"
                        });
                        adobeDCView.previewFile({
                            content: {location: {url: "/files/pedoman-coc-v1.pdf"}},
                            metaData: {fileName: "Pedoman Standar Prilaku.pdf"}
                        }, {embedMode: "SIZED_CONTAINER"});
                    });
                </script>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Baca Secara Lengkap Pedoman Standar Perilaku (Code of Conduct)</h5>
                        <p class="card-text">Pedoman Standar Perilaku adalah sebuah dokumen penting yang berisi panduan
                            dan prinsip-prinsip etika yang harus diikuti oleh seluruh karyawan dan pihak terkait dalam
                            menjalankan tugas dan tanggung jawab mereka. Dokumen ini bertujuan untuk menciptakan
                            lingkungan kerja yang aman, profesional, dan bertanggung jawab secara sosial.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('dokumen') }}" class="btn btn-primary float-md-first"><i
                                class="ri ri-arrow-go-back-line align-bottom"></i> Kembali</a>
                        <a href="{{ url('dokumen/read-flip-summary') }}" class="btn btn-primary float-md-end"><i
                                class="ri ri-book-read-line align-bottom"></i> Lanjut, Klik Summary</a>
                    </div>
                </div>
                @if($dokumen && $dokumen->approval_coc_qrcode)
                    <div class="card-footer text-muted">
                        <div class="d-flex mt-4">
                            <div class="flex-shrink-0">
                                <span class="avatar-xs">{!! $dokumen->approval_coc_qrcode ?? '' !!}</span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-13 mb-0">{{ $dokumen->user->name }}</h5>
                                <h5 class="fs-13 text-muted mb-1"><i
                                        class="ri ri-check-double-line text-muted align-bottom me-1"></i>{{ date('d-m-Y', strtotime($dokumen->approval_coc_date)) }}
                                    - {{ date('H:i', strtotime($dokumen->approval_coc_date)) }} WIB</h5>
                                <p class="text-muted text-justify">Dokumen COC ini sudah anda setujui sesuai dengan
                                    informasi pada QR code ini. Kode QR ini berfungsi sebagai verifikasi bahwa Anda
                                    telah menyetujui dokumen COC dengan informasi yang sesuai.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
@push('js')
@endpush
