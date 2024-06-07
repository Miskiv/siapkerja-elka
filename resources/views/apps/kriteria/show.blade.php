@extends('layouts.app')
@section('title', 'Master Kriteria')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $data['kriteria']->kriteria_name }}</h1>
    <a href="{{ route('kriteria.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    {{-- <a href="{{ url('comparison', $data['kriteria']->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm ml-2"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Generate</a> --}}
</div>
    <p class="mb-4">{{ $data['kriteria']->description }}.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sub Kriteria {{ $data['kriteria']->kriteria_name }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($data['kriteria_sub'] as $row)
                    <div class="col-4 mx-auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-warning">
                                <th class="text-center">{{ $row->nama }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($row->kriteriaSub2 as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
        
        
    </div>
@stop
@push('js')
    <script>
        $(document).ready(function () {
        });
    </script>
@endpush
