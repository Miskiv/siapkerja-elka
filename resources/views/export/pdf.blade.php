<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="text-center">Rekap Hasil Tes</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kriteria</th>
                <th>NIM</th>
                <th>Kesimpulan</th>
                <th>Waktu Tes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            @php
                $kriteriaRendah = App\Models\KriteriaSub::where('kriteria_id', $item->kriteria_id)->whereNot('id', $item->kriteria_unggul)->get();
                $namaKriteriaRendah = $kriteriaRendah->pluck('nama')->toArray();
                $namaKriteriaRendahString = implode(', ', $namaKriteriaRendah);
            @endphp
            <tr>
                <td>{{ $item->user->name ?? 'N/A' }}</td>
                <td>{{ $item->kriteria->kriteria_name }}</td>
                <td>{{ $item->nim }}</td>
                <td>Kamu unggul di <b>{{ $item->KriteriaSub->nama }}</b>.</td>
                <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Print by: {{ Auth::user()->name }}</strong>, at {{ now()->format('d-m-Y H:i') }}</p>
</body>
</html>
