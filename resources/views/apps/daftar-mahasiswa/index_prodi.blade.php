@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    {{-- <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a> --}}
</div>
<div class="row">
    @foreach ($data['prodi'] as $row)
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $row->prodi }}</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('assets/bootstrap/img/undraw_posting_photo.svg') }}" alt="...">
                    </div>
                    <div class="description">
                        <p>{{Str::limit($row->description, 100)}}</p>
                    </div>
                    <a rel="nofollow" href="{{ route('users.show', Crypt::encryptString($row->id)) }}">Lihat Mahasiswa →</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
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
