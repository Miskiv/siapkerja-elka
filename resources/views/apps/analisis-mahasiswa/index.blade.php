@extends('layouts.app')
@section('title', $title)
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Analisis Mahasiswa</h1>
    <p class="mb-4">Tabel ini berisi tentang analisis terhadap mahasiswa yang sudah mengisi kuesioner.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Analisis Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table id="datatable-v" class="table table-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kriteria</th>
                            <th>Keunggulan</th>
                            <th>Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['analisis'] as $row)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $row->User->name }}</td>
                                <td>{{ $row->Kriteria->kriteria_name }}</td>
                                <td>{{ $row->kesimpulan }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="dropdown mb-4">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu animated--fade-in"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('analisis-mahasiswa', ['id' => $row->user_id, 'kriteria_id' => $row->kriteria_id]) }}"><span class="fas fa-eye"> Show</span></a>
                                            <form method="POST" action="{{ route('analisis-mahasiswa.destroy', $row->user_id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="dropdown-item"><span class="fas fa-trash"> Delete</span></button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('apps.daftar-mahasiswa.components.modal-add') --}}
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
           // document.querySelector('div.toolbar').innerHTML = '<button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+ Tambah</button>';
        });
    </script>
@endpush
