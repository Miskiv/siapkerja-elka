@extends('layouts.app')
@section('title', 'Pertanyaan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Pertanyaan</h1>
    <p class="mb-4">Edit sesuai pertanyaan untuk ditampilkan di dalam kuesioner mahasiswa.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="text-primary">Form Edit Pertanyaan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pertanyaan.update', $pertanyaan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipe Kriteria</label>
                  <input class="form-control" value="{{ $pertanyaan->Kriteria->kriteria_name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub Kriteria</label>
                    <input class="form-control" value="{{ $pertanyaan->perbandingan_name }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Soal</label>
                    <input class="form-control" name="soal" value="{{ $pertanyaan->soal }}">
                  </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
        </div>
    </div>
@stop
