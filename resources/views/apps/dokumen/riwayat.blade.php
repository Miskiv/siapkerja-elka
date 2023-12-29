@extends('layouts.app')
@section('title', 'Riwayat')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Riwayat</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Menu</li>
                            <li class="breadcrumb-item active"><a href="{{ url('dokumen/riwayat') }}">Riwayat</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="history">
                            <div class="table-responsive mt-3 mb-1">
                                <table id="datatable-v2" class="table align-middle able-bordered mb-0 table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NPP</th>
                                            <th>Jabatan</th>
                                            <th>Entitas</th>
                                            <th>Direktorat</th>
                                            <th>Divisi</th>
                                            <th>Unit</th>
                                            <th>Tahun</th>
                                            <th>Nilai</th>
                                            <th>Approve COC</th>
                                            <th>Approve PAKTA</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($riwayat as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <a href="{{ $row->uuid ? url('qrcode', $row->uuid) : '#' }}"
                                                                {!! $row->uuid ? 'target="_blank"' : '' !!}>
                                                                @if(!empty($row->photo_profile) && file_exists(public_path($row->photo_profile)))
                                                                    <img src="{{ $row->photo_profile }}" alt="Photo Profile" class="avatar-xs rounded-circle">
                                                                @else
                                                                    <img src="{{ asset('assets/images/users/icon-user.png') }}" class="avatar-xs rounded-circle">
                                                                @endif

                                                            </a>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <a href="{{ $row->uuid ? url('qrcode', $row->uuid) : '#' }}"
                                                                class="text-reset"
                                                                {!! $row->uuid ? 'target="_blank"' : '' !!}>{{ $row->nama }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span
                                                        title="{{ $row->nama_direktorat }},{{ $row->nama_divisi }},{{ $row->nama_unit }}">
                                                        <i
                                                            class="ri ri-information-line align-bottom me-1"></i>{{ $row->kode_npp }}</span>
                                                </td>
                                                <td>{{ $row->jabatan }}</td>
                                                <td>{{ $row->nama_entitas }}</td>
                                                <td>{{ $row->nama_direktorat }}</td>
                                                <td>{{ $row->nama_divisi }}</td>
                                                <td>{{ $row->nama_unit }}</td>
                                                <td>{{ $row->tahun ?? 'N/A' }}</td>
                                                <td>{{ $row->final_score ?? 'N/A' }}</td>
                                                <td width="130px">
                                                    {!! $row->approval_coc == 1
                                                        ? '<span class="badge badge-outline-success" title="Disetujui pada: ' . $row->approval_coc_date . '">Sudah</span>'
                                                        : '<span class="badge badge-outline-warning">Belum</span>' !!}
                                                </td>
                                                <td width="130px">
                                                    @if ($row->level_jabatan <= 3 || Auth::user()->level_jabatan == 7)
                                                        {!! $row->approval_pakta == 1
                                                            ? '<span class="badge badge-outline-success" title="Disetujui pada: ' . $row->approval_pakta_date . '">Sudah</span>'
                                                            : '<span class="badge badge-outline-warning">Belum</span>' !!}
                                                    @else
                                                        {!! '<span class="badge badge-outline-warning">Tidak Perlu</span>' !!}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($row->dokumen_id)
                                                        <form action="{{ url('dokumen/delete', $row->dokumen_id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                                    class="ri ri-delete-bin-2-line align-bottom"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    {{-- @include('apps.projects.components.modal-filter') --}}
@stop

@push('js')
    <script>
        $(document).ready(function() {
            $('#datatable-v2').DataTable({
                dom: 'Bfrtip',
                buttons: {
                    buttons: [{
                        text: '<i class="ri-file-excel-2-fill align-bottom me-1"></i> Export Excel <small></small>',
                        className: 'btn btn-success',
                        action: function(e, node, config) {
                            window.location.href = '{{ url('dokumen/export') }}';
                        }
                    }, ]
                },
            });

        });
    </script>
@endpush
