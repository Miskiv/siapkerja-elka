@extends('layouts.app')
@section('title', 'Dokumen')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><a href="{{ url('dokumen') }}" class="text-muted"></a> Dokumen</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen') }}">Dokumen</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xxl-8 col-lg-8 align-self-center">
                <div class="card">
                    <img src="{{ asset('assets/images/cover-pedoman-coc.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pedoman Standar Perilaku (Code of Conduct)</h5>
                        <p class="card-text">Dokumen lengkap mengenai Pedoman Standar Perilaku PT. Kimia Farma Tbk.
                            Silahkan baca dan pahami secara seksama terkait Pedoman Standar Perilaku yang berlaku.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('dokumen/read-flip-quiz') }}"
                           class="btn btn-primary float-md-first me-2" hidden><i
                                class="ri ri-book-read-line align-bottom"></i> Quiz</a>
                        <a href="{{ url('dokumen/read-flip-summary') }}"
                           class="btn btn-primary float-md-first" hidden><i
                                class="ri ri-book-read-line align-bottom"></i> Baca Summary</a>
                        <a href="{{ url('dokumen/read-flip-book') }}"
                           class="btn btn-primary float-md-end"><i
                                class="ri ri-book-read-line align-bottom"></i> Baca Pedoman Lengkap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@push('js')
    <script type="text/javascript">

    </script>
@endpush
