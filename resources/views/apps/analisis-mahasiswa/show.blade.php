@extends('layouts.app')
@section('title', $title)
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hasil Analisis Sistem</h1>
    <p class="mb-4">Halaman ini berisi tentang analisis sistem terhadap hasil kuesioner yang telah dijawab oleh mahasiswa.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Analisis {{ $hasil->Kriteria->kriteria_name }}</h6>
        </div>
        <div class="card-body">
            <h6 class="text-center">Kesimpulan : </h6>
            <div class="card bg-success text-white mx-auto" style="width: 50%;" id="responsive-card">
                <div class="card-body text-center p-2">
                    <span class="fs-6">Unggul di <b>{{ $hasil->KriteriaSub->nama }}</b>.</span>
                    <span class="fs-12" style="background-color: orange">Lemah pada {{ $namaKriteriaRendahString }}.</span>
                </div>
            </div>
            <div id="chart">
            </div>
            <div id="legend" class="text-center">
                @foreach ($kriteria_sub as $row)
                <p class="mb-0"><strong>C{{ $loop->iteration }}:</strong> {{ $row->nama }}</p>
                @endforeach
            </div>
        </div>
        @role('Admin')
        <div class="card-body">
            <div class="table-container">
                <div class="table-block" style="margin: 0 auto;">
                    <p>Pairwise Comparisons</p>
                    <table border="1">
                        <thead>
                            <tr>
                                <th class="text-center">Kriteria</th>
                                @foreach ($data['kolomLabels'] as $kolomLabel)
                                    <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['barisLabels'] as $barisLabel)
                                <tr>
                                    <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                    @foreach ($data['pairwise'][$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($kriteria_id == 3)
            <div class="card-body">
                <p class="text-center">Pencarian Eigen Vektor Normalisasi</p>
                <div class="table-container">
                    <div class="table-block">

                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-1'][$barisLabel] as $nilai)
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
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-2'][$barisLabel] as $nilai)
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
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-3'][$barisLabel] as $nilai)
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
            <div class="card-body">
                <div class="table-container">

                    <div class="table-block">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-4'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center">Baris ke 4</p>
                    </div>
                    <div class="table-block" style="margin: 0 auto;">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                    <th class="text-center">Total</th>
                                    <th class="text-center">EVN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['evn'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                        @foreach ($data['evnTotal'][$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>EVN : Eigen Vektor Normalisasi</p>
                    </div>
                </div>
            </div>
            <div class="card-body mb-5">
                <div class="table-container">

                    <div class="table-block" style="margin: 0 auto;">
                    <p>Rasio Konsistensi</p>

                        <table border="1">
                            <thead>
                                <tr>
                                    @foreach ($data['kolomRasio'] as $row)
                                        <th class="text-center">{{ $row }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        @foreach ($data['barisRasio'] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @elseif ($kriteria_id == 2)
            <div class="card-body">
                <p class="text-center">Pencarian Eigen Vektor Normalisasi</p>
                <div class="table-container">
                    <div class="table-block">

                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-1'][$barisLabel] as $nilai)
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
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-2'][$barisLabel] as $nilai)
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
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-3'][$barisLabel] as $nilai)
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
            <div class="card-body">
                <div class="table-container">

                    <div class="table-block">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-4'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center">Baris ke 4</p>
                    </div>
                    <div class="table-block">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-5'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center">Baris ke 5</p>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <div class="table-block">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                    <th class="text-center">Total</th>
                                    <th class="text-center">EVN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['evn'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                        @foreach ($data['evnTotal'][$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>EVN : Eigen Vektor Normalisasi</p>
                    </div>
                </div>
            </div>
            <div class="card-body mb-5">
                <div class="table-container">


                    <div class="table-block">
                    <p>Rasio Konsistensi</p>

                        <table border="1">
                            <thead>
                                <tr>
                                    @foreach ($data['kolomRasio'] as $row)
                                        <th class="text-center">{{ $row }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        @foreach ($data['barisRasio'] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <p class="text-center">Pencarian Eigen Vektor Normalisasi</p>
                <div class="table-container">
                    <div class="table-block">

                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-1'][$barisLabel] as $nilai)
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
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-2'][$barisLabel] as $nilai)
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
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-3'][$barisLabel] as $nilai)
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
            <div class="card-body">
                <div class="table-container">

                    <div class="table-block">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-4'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center">Baris ke 4</p>
                    </div>
                    <div class="table-block">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-5'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center">Baris ke 5</p>
                    </div>
                    <div class="table-block">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['baris-6'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center">Baris ke 6</p>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <div class="table-block">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    @foreach ($data['kolomLabels'] as $kolomLabel)
                                        <th style="width: 20%" class="text-center">{{ $kolomLabel }}</th>
                                    @endforeach
                                    <th class="text-center">Total</th>
                                    <th class="text-center">EVN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['barisLabels'] as $barisLabel)
                                    <tr>
                                        <th style="width: 20%" class="text-center">{{ $barisLabel }}</th>
                                        @foreach ($data['evn'][$barisLabel] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                        @foreach ($data['evnTotal'][$barisLabel] as $nilai)
                                        <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>EVN : Eigen Vektor Normalisasi</p>
                    </div>
                </div>
            </div>
            <div class="card-body mb-5">
                <div class="table-container">


                    <div class="table-block">
                    <p>Rasio Konsistensi</p>

                        <table border="1">
                            <thead>
                                <tr>
                                    @foreach ($data['kolomRasio'] as $row)
                                        <th class="text-center">{{ $row }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        @foreach ($data['barisRasio'] as $nilai)
                                            <td class="text-center">{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        @endrole
    </div>
@stop
@push('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  var totalEvn = {!! $jsonTotalEvn !!};
  var perbandinganCode = {!! $jsonPerbandinganCode !!};
  var options = {
      series: [{
          name: 'Total Evn',
          data: totalEvn
      }],
      chart: {
          type: 'radar',
          height: 400
      },
      colors: ['#1E90FF'],
      dataLabels: {
          enabled: false
      },
      xaxis: {
          categories: perbandinganCode,
      },
      yaxis: {
              stepSize: 0.1
      },
      tooltip: {
          y: {
              formatter: function (val) {
                  return val
              }
          }
      }
  };

  // Inisialisasi dan render diagram
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>
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
