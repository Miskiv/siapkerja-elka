@extends('layouts.app')
@section('title', $title)
@section('content')
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
                    <a rel="nofollow" href="{{ route('isi-kuesioner.show', Crypt::encryptString($row->id)) }}">Mulai Tes →</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
