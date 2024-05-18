@extends('layouts.app')
@section('title', $title)
@push('css')
<style>
    .question-block {
        margin-bottom: 15px; /* Adjust the margin as needed */
    }
    .answer-block {
        margin-left: 20px; /* Indent answers slightly */
    }
    .pagination {
        justify-content: center; /* Center align pagination */
    }
    .page-item {
        margin: 0 2px; /* Add some spacing between pagination items */
    }
    .page-item .page-link {
        padding: 5px 10px; /* Adjust padding for smaller buttons */
        font-size: 14px; /* Adjust font size */
    }
</style>
@endpush
@section('content')
<div class="row justify-content-lg-center">
    <div class="col-md-10">
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $data['kriteria']->kriteria_name }}</h6>
            </div>
            <div class="card-body">
                @foreach ($data['pertanyaan'] as $idx)
                <div class="question-block">
                    <p><b>{{ $idx->soal }}</b></p>
                    
                    <div class="answer-block">
                        <div class="form-check form-radio-outline form-radio-success mb-2">
                            <input type="radio" name="jawaban[{{ $idx->id }}]" class="form-check-input" value="1" required>
                            <label class="form-check-label">Setuju</label>
                        </div>

                        <div class="form-check form-radio-outline form-radio-success mb-2">
                            <input type="radio" name="jawaban[{{ $idx->id }}]" class="form-check-input" value="0" required>
                            <label class="form-check-label">Tidak Setuju</label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop
