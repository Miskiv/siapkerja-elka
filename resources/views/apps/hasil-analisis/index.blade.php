@extends('layouts.app')
@section('title', $title)
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hasil Analisis Sistem</h1>
    <p class="mb-4">Halaman ini berisi tentang analisis sistem terhadap hasil kuesioner yang telah dijawab oleh mahasiswa.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Analisis</h6>
        </div>
        <div class="card-body">
            @if ($data['hasil'] == null)
                <h1 class="text-center"><a href="{{ url('/isi-kuesioner') }}">Silahkan Lakukan Tes Terlebih Dahulu!</a></h1>
            @else
                <h1 class="text-center">Selamat anda {{ $data['hasil']->kesimpulan }} !!!</h1>
            @endif
            {{-- <div class="table-responsive">
                    <table id="datatable-v" class="table table-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['pertanyaan'] as $row)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $row->soal }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td><button class="btn btn-info btn-sm">Aksi</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
    @include('apps.hasil-analisis.components.modal-add')
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
