@extends('layouts.app')
@section('title', 'Master Kriteria')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    <a href="{{ route('kriteria.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
</div>
<div class="row">
    @foreach ($data['kriteria'] as $row)
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $row->kriteria_name }}</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('assets/bootstrap/img/undraw_posting_photo.svg') }}" alt="...">
                    </div>
                    <div class="description">
                        <p>{{Str::limit($row->description, 100)}}</p>
                    </div>
                    <a rel="nofollow" href="{{ route('kriteria.show', Crypt::encryptString($row->id)) }}">Sub Kriteria →</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
@push('js')
    <script>
        $(document).ready(function () {
        });
    </script>
@endpush
