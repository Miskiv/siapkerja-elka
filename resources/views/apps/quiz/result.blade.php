@extends('layouts.app')
@section('title', 'Review Hasil Quiz')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><a href="{{ url('dokumen/read-flip-quiz') }}" class="text-muted"></a>
                        Review Hasil Quiz Anda
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen/read-flip-quiz') }}">Quiz</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-md-8">
                @foreach($correctAnswersData as $question => $correctAnswer)
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-1"><b>Pertanyaan:</b> {{ $questions[$question] }}</p>
                            <p class="mb-0">
                                <b>Jawaban Anda:</b>
                                <span class="badge {{ $userAnswers[$question] == $correctAnswer ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($userAnswers[$question]) }}
                                </span>
                            </p>
                            <p><b>Jawaban Benar:</b> {{ $explanationAnswersData[$question] }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hasil Quiz Anda</h5>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Jumlah Soal</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Jumlah Jawaban Benar</td>
                                <td>{{ $correctAnswers }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Jawaban Salah</td>
                                <td>{{ $wrongAnswers }}</td>
                            </tr>
                            <tr>
                                <td>Nilai Score (Jawaban Benar x 20)</td>
                                <td>{{ $finalScore }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('dokumen/form-approval/COC') }}" class="btn btn-primary float-md-end"><i class="ri ri-book-read-line align-bottom"></i> Lanjut, Persetujuan COC</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
@endpush
