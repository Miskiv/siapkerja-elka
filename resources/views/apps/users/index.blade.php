@extends('layouts.app')
@section('title', 'Master User')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Master User</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Master User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="customerList">
                            <div class="table-responsive mt-3 mb-1">
                                <table id="datatable-v" class="table table-nowrap">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Nama Level</th>
                                        <th scope="col">Entitas</th>
                                        <th scope="col">Direktorat</th>
                                        <th scope="col">Divisi</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $i => $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->jabatan }}</td>
                                            <td>{{ $row->nama_level_jabatan }}</td>
                                            <td>{{ $row->nama_entitas }}</td>
                                            <td>{{ $row->nama_direktorat }}</td>
                                            <td>{{ $row->nama_divisi }}</td>
                                            <td>{{ $row->nama_unit }}</td>
                                            <td>{{ !empty($row->roles->first()->name) ? $row->roles->first()->name : '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Data tidak ada</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
@stop
@push('js')
    <script>
        $(document).ready(function () {
            $('#datatable-v').DataTable();
        });
    </script>
@endpush
