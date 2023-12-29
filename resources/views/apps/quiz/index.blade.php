@extends('layouts.app')
@section('title', 'Quiz')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><a href="{{ url('dokumen/read-flip-quiz') }}" class="text-muted"></a> Selesaikan
                        Quiz Anda
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen/read-flip-quiz') }}">Quiz</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('quiz.submit') }}">
                    @csrf
                    @php
                        $questionNumbers = range(1, 5); // Array berisi nomor soal dari 1 hingga 5
                        shuffle($questionNumbers); // Mengacak urutan nomor soal
                    @endphp
                    @foreach($questionNumbers as $key => $questionNumber)
                        <div class="card">
                            <div class="card-body">
                                <h4>Soal {{ $key+1 }}</h4>
                                <p><b>{{ App\Enums\QuizEnum::MAP_VALUE['question'.$questionNumber]['question'] }}</b></p>
                                @foreach (App\Enums\QuizEnum::MAP_VALUE['question'.$questionNumber]['options'] as $optionKey => $optionValue)
                                    <div class="form-check form-radio-outline form-radio-success mb-2">
                                        <input type="radio" name="question{{ $questionNumber }}" class="form-check-input" value="{{ $optionKey }}" required>
                                        <label class="form-check-label" for="a1">{{ $optionValue }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Quiz Pedoman Standar Perilaku (Code of Conduct)</h5>
                            <p class="card-text">Diatas adalah sebuah quiz yang terkait dengan Pedoman Standar Perilaku PT.
                                Kimia Farma Tbk. Sebelumnya, terdapat sebuah ringkasan yang berisi beberapa poin penting
                                yang harus diikuti oleh seluruh karyawan dan pihak terkait dalam menjalankan tugas dan
                                tanggung jawab mereka.</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-primary float-md-first"><i class="ri ri-arrow-go-back-line align-bottom"></i> Kembali</a>
                            <button  type="submit" class="btn btn-primary float-md-end"><i class="ri ri-book-read-line align-bottom"></i> Submit Jawaban</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@push('js')
@endpush
