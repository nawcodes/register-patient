<style>
      .body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        .table th {
            background-color: #f3f4f6;
        }
        .summary {
            margin-top: 20px;
            font-size: 14px;
        }
        .summary p {
            margin: 5px 0;
        }
</style>

<div class="body">
    <div class="header">
        <h2>Laporan Registrasi Pasien</h2>
        <p>Periode: {{ $filtering_date ? $filtering_date : 'Semua Data' }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah Pasien</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $tanggal => $jumlah)
                <tr>
                    <td>{{ $tanggal }}</td>
                    <td>{{ $jumlah }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>