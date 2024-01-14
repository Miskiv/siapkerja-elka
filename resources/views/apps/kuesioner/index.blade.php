@extends('layouts.app')
@section('title', $title)
@section('content')
    @if ($data['exist'] == false)
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kuesioner</h1>

        <div class="row justify-content-lg-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('isi-kuesioner.store') }}">
                    @csrf
                    {{-- @php
                        $questionNumbers = range(1, 5); // Array berisi nomor soal dari 1 hingga 5
                        shuffle($questionNumbers); // Mengacak urutan nomor soal
                    @endphp --}}
                    {{-- @foreach($questionNumbers as $key => $questionNumber) --}}
                    @foreach ($data['pertanyaan'] as $key => $pertanyaan)
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCard{{ $key }}" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard">
                            <h6 class="m-0 font-weight-bold text-primary">Fase {{ $key }}</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCard{{ $key }}">
                            <div class="card-body">
                                @foreach ($pertanyaan as $idx)
                                    <p><b>{{ $idx->soal }}</b></p>
                                    
                                    <div class="form-check form-radio-outline form-radio-success mb-2">
                                        <input type="radio" name="jawaban[{{ $key }}][{{ $idx->id }}]" class="form-check-input" value="1" required>
                                        <label class="form-check-label">Setuju</label>
                                    </div>

                                    <div class="form-check form-radio-outline form-radio-success mb-2">
                                        <input type="radio" name="jawaban[{{ $key }}][{{ $idx->id }}]" class="form-check-input" value="0" required>
                                        <label class="form-check-label">Tidak Setuju</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        {{-- <div class="card mb-2">
                            <div class="card-body">
                                <h4>Kuesioner Fase {{ $key }}</h4>
                                
                                @foreach ($pertanyaan as $idx)
                                    <p><b>{{ $idx->soal }}</b></p>
                                    
                                    <div class="form-check form-radio-outline form-radio-success mb-2">
                                        <input type="radio" name="jawaban[{{ $key }}][{{ $idx->id }}]" class="form-check-input" value="1" required>
                                        <label class="form-check-label">Setuju</label>
                                    </div>

                                    <div class="form-check form-radio-outline form-radio-success mb-2">
                                        <input type="radio" name="jawaban[{{ $key }}][{{ $idx->id }}]" class="form-check-input" value="0" required>
                                        <label class="form-check-label">Tidak Setuju</label>
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}
                    @endforeach

                
                    {{-- @endforeach --}}
                    <div class="card mb-2">
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-primary float-md-first"><i class="ri ri-arrow-go-back-line align-bottom"></i> Kembali</a>
                            <button  type="submit" class="btn btn-primary float-md-end"><i class="ri ri-book-read-line align-bottom"></i> Submit Jawaban</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    @else
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kuesioner</h1>

        <div class="row justify-content-lg-center mt-5">
            <div class="col-md-8">
                <h3>Kuesioner telah dikerjakan silahkan lihat hasilnya <a href="{{ url('hasil-analisis') }}">disini !!</a></h3>
            </div>
        </div> 
    @endif
@stop
