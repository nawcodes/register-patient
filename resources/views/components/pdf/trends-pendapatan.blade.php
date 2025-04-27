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
        <h2>Laporan Pendapatan</h2>
        <p>Periode: {{ $filtering_date ? $filtering_date : 'Semua Data' }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Pendapatan (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_pendapatan = 0;
            @endphp
            @forelse ($pendapatans as $tanggal => $pendapatan)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($tanggal)->format('d M Y') }}</td>
                    <td>Rp. {{ number_format($pendapatan, 0, ',', '.') }}</td>
                </tr>
                {{-- total pendapatan --}}
                @php
                    $total_pendapatan += $pendapatan;
                @endphp
            @empty
                <tr>
                    <td colspan="2">Tidak ada data</td>
                </tr>
            @endforelse
            <tr>
                <td colspan="1">Total Pendapatan</td>
                <td>Rp. {{ number_format($total_pendapatan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</div>