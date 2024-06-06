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
                    @if (!($data['exist']->where('kriteria_id', $row->id)->first()))
                        <button class="btn btn-primary perhatian" data-toggle="modal" data-target="#perhatianModal{{ $row->id }}" data-id="{{ $row->id }}">Mulai Tes →</button>
                    @else
                    {{-- <button class="btn btn-warning perhatian" data-toggle="modal" data-target="#hasilModal{{ $row->id }}" data-id="{{ $row->id }}">Lihat Hasil Tes →</button> --}}
                    <button class="btn btn-warning perhatian" onclick="redirectToHasil({{ $row->id }})">Lihat Hasil Tes →</button>
                    <button class="btn btn-info perhatian" data-toggle="modal" data-target="#perhatianModal{{ $row->id }}" data-id="{{ $row->id }}">Tes Ulang →</button>
                    @endif
                    @include('apps.kuesioner.components.modal-perhatian')
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
@push('js')
<script>
    function redirectToHasil(id) {
        // Gunakan blade untuk mengenerate base URL dari route
        var url = '{{ route("hasil-analisis.show", ":id") }}';
        url = url.replace(':id', id);
        window.location.href = url;
    }
</script>
    
<script>
    $(document).ready(function() {
        $('.perhatian').on('click', function (event) {
            var modalId = $(this).data('id');
        });
    });
</script>
@endpush