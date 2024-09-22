<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kriteria</th>
        <th>NIM</th>
        <th>Kesimpulan</th>
        <th>Tanggal Tes</th>
    </tr>
    </thead>
    <tbody>
    @foreach($hasil as $row)
        @php
            $kriteriaRendah = App\Models\KriteriaSub::where('kriteria_id', $row->kriteria_id)->whereNot('id', $row->kriteria_unggul)->get();
            $namaKriteriaRendah = $kriteriaRendah->pluck('nama')->toArray();
            $namaKriteriaRendahString = implode(', ', $namaKriteriaRendah);
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->User->name }}</td>
            <td>{{ $row->Kriteria->kriteria_name }}</td>
            <td>{{ $row->nim }}</td>
            <td>Unggul di {{ $row->KriteriaSub->nama }}. Lemah di {{ $namaKriteriaRendahString }}</td>
            <td>{{ $row->created_at->format('d-m-Y H:i') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
