@extends('layouts.app')
@section('title', $title)
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Hasil Analisis Sistem</h1>
    <p class="mb-4">Halaman ini berisi tentang analisis sistem terhadap hasil kuesioner yang telah dijawab oleh mahasiswa.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Analisis</h6>
        </div>
        <div class="card-body">
            {{-- <h6 class="text-center">Hasil Analisis belum ditampilkan.</h6> --}}
            <div id="chart">
            </div>
        </div>
    </div>
@stop
@push('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  // Data untuk diagram
  var options = {
      series: [{
          name: 'Total',
          data: [0.9, 0.2, 0.4, 0.5]
      }],
      chart: {
          type: 'bar',
          height: 350
      },
      plotOptions: {
          bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded',
              distributed: true
          },
      },
      colors: ['#1E90FF', '#FF6347', '#32CD32', '#FFD700'],
      dataLabels: {
          enabled: false
      },
      stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
      },
      xaxis: {
          categories: ['C1', 'C2', 'C3', 'C4'],
      },
      yaxis: {
          title: {
              text: 'Total'
          }
      },
      fill: {
          opacity: 1
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
