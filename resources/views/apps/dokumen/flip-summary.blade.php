@extends('layouts.app')
@section('title', 'Summary')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><a href="{{ url('dokumen') }}" class="text-muted"></a> Baca Summary</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen') }}">Summary</a></li>
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
                            content: {location: {url: "/files/pedoman-coc-summary.pdf"}},
                            metaData: {fileName: "Seumary Pedoman COC.pdf"}
                        }, {embedMode: "IN_LINE"});
                    });
                </script>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Summary Pedoman Standar Perilaku (Code of Conduct)</h5>
                        <p class="card-text">Ini adalah ringkasan dari Pedoman Standar Perilaku PT. Kimia Farma Tbk yang
                            berisi beberapa poin penting yang harus diikuti oleh seluruh karyawan dan pihak terkait
                            dalam menjalankan tugas dan tanggung jawab mereka.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('dokumen/read-flip-book') }}" class="btn btn-primary float-md-first"><i
                                class="ri ri-arrow-go-back-line align-bottom"></i> Kembali</a>
                        <a href="{{ url('dokumen/read-flip-quiz') }}" class="btn btn-primary float-md-end"><i
                                class="ri ri-book-read-line align-bottom"></i> Lanjut, Klik Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
@endpush
