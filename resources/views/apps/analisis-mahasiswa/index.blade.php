@extends('layouts.app')
@section('title', $title)
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Analisis Mahasiswa</h1>
    <p class="mb-4">Halaman ini berisi tentang analisis mahasiswa menggunakan perbandingan ahp.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Luther Y Worabay</h6>
        </div>
        <div class="card-body">
            <div class="table-container">
                <div class="table-block" style="margin: 0 auto;">
                    <p>Pairwise Comparisons</p>
                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Kriteria</th>
                                @foreach ($kolomLabels as $kolomLabel)
                                    <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barisLabels as $barisLabel)
                                <tr>
                                    <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                    @foreach ($matriksData[$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <p class="text-center">Pencarian Eigen Vektor Normalisasi</p>
            <div class="table-container">
                <div class="table-block">
                    
                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Kriteria</th>
                                @foreach ($kolomLabels as $kolomLabel)
                                    <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barisLabels as $barisLabel)
                                <tr>
                                    <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                    @foreach ($matriksData[$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-center">Baris ke 1</p>
                </div>
        
                <div class="table-block">
                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Kriteria</th>
                                @foreach ($kolomLabels as $kolomLabel)
                                    <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barisLabels as $barisLabel)
                                <tr>
                                    <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                    @foreach ($matriksData[$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-center">Baris ke 2</p>
                </div>
        
                <div class="table-block">
                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Kriteria</th>
                                @foreach ($kolomLabels as $kolomLabel)
                                    <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barisLabels as $barisLabel)
                                <tr>
                                    <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                    @foreach ($matriksData[$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-center">Baris ke 3</p>
                </div>
            </div>
        </div>

        <div class="card-body mb-5">
            <div class="table-container">
                <div class="table-block" style="margin: 0 auto;">
                    <p>EVN : Eigen Vektor Normalisasi</p>
                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Kriteria</th>
                                @foreach ($kolomLabels as $kolomLabel)
                                    <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barisLabels as $barisLabel)
                                <tr>
                                    <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                    @foreach ($matriksData[$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
                <div class="table-block" style="margin: 0 auto;">
                <p>Rasio Konsistensi</p>

                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Kriteria</th>
                                @foreach ($kolomLabels as $kolomLabel)
                                    <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barisLabels as $barisLabel)
                                <tr>
                                    <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                    @foreach ($matriksData[$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
    </div>
    @include('apps.analisis-mahasiswa.components.modal-add')
@stop
@push('css')
    <style>
        .table-container {
            display: flex;
            justify-content: space-between; /* Jarak antar tabel */
        }

        .table-block {
            width: 30%; /* Atur lebar masing-masing blok sesuai kebutuhan */
        }
    </style>
@endpush
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
        });
    </script>
@endpush
