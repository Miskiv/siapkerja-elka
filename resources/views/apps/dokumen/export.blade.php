<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kode SAP</th>
        <th>Kode NPP</th>
        <th>Jabatan</th>
        <th>Level Jabatan</th>
        <th>Nama Level Jabatan</th>
        <th>Kode Entitas</th>
        <th>Nama Entitas</th>
        <th>Nama Direktorat</th>
        <th>Nama Divisi</th>
        <th>Nama Unit</th>
        <th>Nama Sub Unit</th>
        <th>Nama Bagian</th>
        <th>Nama Sub Bagian</th>
        <th>Tahun Dokumen</th>
        <th>Approval CoC</th>
        <th>Tanggal Approve CoC</th>
        <th>Approval Pakta</th>
        <th>Tanggal Approve Pakta</th>
        <th>Nilai</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($riwayat as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->kode_sap }}</td>
            <td>{{ $row->kode_npp }}</td>
            <td>{{ $row->jabatan }}</td>
            <td>{{ $row->level_jabatan }}</td>
            <td>{{ $row->nama_level_jabatan }}</td>
            <td>{{ $row->kode_entitas }}</td>
            <td>{{ $row->nama_entitas }}</td>
            <td>{{ $row->nama_direktorat }}</td>
            <td>{{ $row->nama_divisi }}</td>
            <td>{{ $row->nama_unit }}</td>
            <td>{{ $row->nama_sub_unit }}</td>
            <td>{{ $row->nama_bagian }}</td>
            <td>{{ $row->nama_sub_bagian }}</td>
            <td>{{ $row->tahun ?? 'N/A' }}</td>
            <td>
                {!!  $row->approval_coc == 1 ? 'Sudah' : 'Belum' !!}
            </td>
            <td>{{ $row->approval_coc_date ?? 'N/A' }}</td>
            <td>
                @if($row->level_jabatan <= 3 || Auth::user()->level_jabatan == 7 )
                    {!!  $row->approval_pakta == 1 ? 'Sudah' : 'Belum' !!}
                @else
                    {!! 'Tidak Perlu' !!}
                @endif
            </td>
            <td>{{ $row->approval_pakta_date ?? 'N/A' }}</td>
            <td>{{ $row->final_score ?? 'N/A' }}</td>
            <td>{{ $row->created_at ?? 'N/A' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
