@extends('layouts.app')
@section('title', 'Pertanyaan')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Pertanyaan</h1>
    <p class="mb-4">Tabel ini berisi tentang pertanyaan untuk ditampilkan di dalam kuesioner mahasiswa.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#addModal">Tambah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table id="datatable-v1" class="table table-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Kriteria</th>
                            <th>Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['pertanyaan']->where('soal', '!=', null) as $row)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $row->soal }}</td>
                                <td>{{ $row->Kriteria->kriteria_name }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="dropdown mb-4">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu animated--fade-in"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('pertanyaan.edit', $row->id) }}"><span class="fas fa-eye"> Edit</span></a>
                                            <form method="POST" action="{{ route('pertanyaan.destroy', $row->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="dropdown-item"><span class="fas fa-trash"> Delete</span></button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('apps.pertanyaan.components.modal-add')
@stop
@push('js')
    <script>
        $(document).ready(function () {
            $('#datatable-v1').DataTable({
                order: [
                    [0, 'asc']
                ],
                responsive: true,
            });
            $('#tipe_kriteria').change(function() {
                let kriteriaId = $(this).val();
                if (kriteriaId) {
                    $.ajax({
                        url: '/getPerbandinganKriteria/' + kriteriaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            let dataCount = Object.keys(data).length;
                            if(dataCount !== 0){
                                $('#show_all_done').addClass('d-none');
                                $('#show_perbandingan').removeClass('d-none');
                                $('#perbandingan_kriteria').empty();
                                $('#perbandingan_kriteria').append('<option disabled selected>Pilih Perbandingan Kriteria</option>');
                                perbandinganData = {}; // Clear previous data
                                $.each(data, function(key, value) {
                                    perbandinganData[value.id] = value.perbandingan_name;
                                    $('#perbandingan_kriteria').append('<option value="' + value.id + '">' + value.perbandingan_name + '</option>');
                                });
                            }else{
                                $('#show_all_done').removeClass('d-none');
                            }
                        }
                    });
                } else {
                    $('#show_perbandingan').addClass('d-none');
                    $('#perbandingan_kriteria').empty();
                    $('#perbandingan_kriteria').append('<option disabled selected>Pilih Perbandingan Kriteria</option>');
                }
            });

            $('#perbandingan_kriteria').change(function() {
                let perbandinganId = $(this).val();
                if (perbandinganId) {
                    $('#show_pertanyaan').removeClass('d-none');
                    $('#soal').val(perbandinganData[perbandinganId]); // Set textarea value from the stored data
                } else {
                    $('#show_pertanyaan').addClass('d-none');
                    $('#soal').val('');
                }
            });
        });

    </script>
@endpush
