@extends('layouts.app')
@section('title', 'Pertanyaan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kuesioner</h1>
    <p class="mb-4">Tabel ini berisi tentang pertanyaan untuk ditampilkan di dalam kuesioner mahasiswa.</p>

    <div class="row justify-content-lg-center">
        <div class="col-md-8">
            <form method="post" action="">
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

    @include('apps.pertanyaan.components.modal-add')
@stop
@push('js')
    <script>
        $(document).ready(function () {
            $('#datatable-v').DataTable({
                order: [
                    [0, 'asc']
                ],
                pageLength: 7,
                dom: '<"toolbar">frtip'
            });
            document.querySelector('div.toolbar').innerHTML = '<button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+ Tambah</button>';
        });
    </script>
@endpush
