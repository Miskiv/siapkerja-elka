@extends('layouts.app')
@section('title', $title)
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Daftar Mahasiswa</h1>
    <p class="mb-4">Tabel ini berisi tentang mahasiswa yang sudah membuat akun di aplikasi ini.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table id="datatable-v" class="table table-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>NIM</th>
                            <th>Dibuat</th>
                            <th>Diperbarui</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['mahasiswa'] as $i => $row)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>{{ $row->updated_at->diffForHumans() }}</td>
                                <td>
                                    <button index="{{$i}}" type="button" class="btn btn-primary btn-sm edit_button">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $row->id }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                    @include('apps.daftar-mahasiswa.components.modal-delete')
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('apps.daftar-mahasiswa.components.modal-add')
    @include('apps.daftar-mahasiswa.components.modal-edit')
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
            
            //form edit
            $('#datatable-v tbody').on('click', '.edit_button', function () {
                let users = {!! json_encode($data['mahasiswa']) !!};
                let index = $(this).attr('index');
                $('#edit_name').val(users[index].name);
                $('#edit_email').val(users[index].email);
                $('#edit_nim').val(users[index].nim);
                $('#editModal').modal('show');
            });
        });
    </script>
@endpush
