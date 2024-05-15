@extends('layouts.app')
@section('title', 'Pertanyaan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Pertanyaan</h1>
    <p class="mb-4">Tabel ini berisi tentang pertanyaan untuk ditampilkan di dalam kuesioner mahasiswa.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            @foreach ($data['kriteria'] as $row)
                @if ($data['pertanyaan']->where('kriteria_id', $row->id)->count() == null)
                    <button class="btn btn-sm btn-info">{{ $row->kriteria_name }}</button>
                @endif
            @endforeach
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table id="datatable-v1" class="table table-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Kriteria</th>
                            <th>Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['pertanyaan'] as $row)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $row->soal }}</td>
                                <td>{{ $row->kriteria_id }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td><button class="btn btn-info btn-sm">Aksi</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('apps.pertanyaan.components.modal-add')
@stop
@push('js')
    <script>
        $(document).ready(function () {
            $('#datatable-v1').DataTable({
                order: [
                    [0, 'asc']
                ],
                responsive: true,
            });
        });

    </script>
@endpush
