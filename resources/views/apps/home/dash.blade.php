@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    @foreach ($prodi as $row)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-{{ $row->color }} shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-{{ $row->color }} text-uppercase mb-1">
                                {{ $row->prodi }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $row->user_count }} orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Content Row -->

<div class="row">

    <!-- Pie Chart -->
    @foreach ($kriteriaIds as $namaKriteria => $value)
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $namaKriteria }}</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-0 pb-2">
                    <canvas id="chart{{ $value }}"></canvas>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop
@push('js')
    <script>
        var pie1 = document.getElementById("chart1");
        var pie2 = document.getElementById("chart2");
        var pie3 = document.getElementById("chart3");

        var labels1 = {!! json_encode($chart['Labels1']) !!};
        var data1 = {!! json_encode($chart['Data1']) !!}
        var labels2 = {!! json_encode($chart['Labels2']) !!};
        var data2 = {!! json_encode($chart['Data2']) !!}
        var labels3 = {!! json_encode($chart['Labels3']) !!};
        var data3 = {!! json_encode($chart['Data3']) !!}

        var chart1 = new Chart(pie1, {
            type: 'doughnut',
            data: {
                labels: labels1,
                datasets: [{
                    data: data1,
                    backgroundColor: ['#6256CA', '#86D293', '#C1E2A4'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true, // Set to true to show the legend
                    position: 'top', // Position of the legend (top, left, bottom, right)
                    align: 'start', // Alignment of the legend items (start, center, end)
                    labels: {
                        boxWidth: 20, // Width of the colored box for each legend item
                        padding: 15, // Padding between legend items
                        fontColor: '#858796', // Color of the legend text
                    },
                },
                cutoutPercentage: 80,
            },
        });
        var chart2 = new Chart(pie2, {
            type: 'doughnut',
            data: {
                labels: labels2,
                datasets: [{
                    data: data2,
                    backgroundColor: ['#640D5F', '#D91656', '#EE66A6'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true, // Set to true to show the legend
                    position: 'top', // Position of the legend (top, left, bottom, right)
                    align: 'start', // Alignment of the legend items (start, center, end)
                    labels: {
                        boxWidth: 20, // Width of the colored box for each legend item
                        padding: 15, // Padding between legend items
                        fontColor: '#858796', // Color of the legend text
                    },
                },
                cutoutPercentage: 80,
            },
        });
        var chart3 = new Chart(pie3, {
            type: 'doughnut',
            data: {
                labels: labels3,
                datasets: [{
                    data: data3,
                    backgroundColor: ['#4379F2', '#FFEB00', '#6EC207'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true, // Set to true to show the legend
                    position: 'top', // Position of the legend (top, left, bottom, right)
                    align: 'start', // Alignment of the legend items (start, center, end)
                    labels: {
                        boxWidth: 20, // Width of the colored box for each legend item
                        padding: 15, // Padding between legend items
                        fontColor: '#858796', // Color of the legend text
                    },
                },
                cutoutPercentage: 80,
            },
        });

    </script>
@endpush
