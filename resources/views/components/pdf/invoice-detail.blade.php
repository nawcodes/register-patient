<div>
    <div>
        <title>Laporan Transaksi Pasien</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .patient-info, .transaction-info {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        .grand-total {
            text-align: right;
            font-weight: bold;
        }
    </style>

    <div class="header">
        <h2>Rumah Sakit Sehat Sentosa</h2>
        <p>Laporan Transaksi Pasien</p>
    </div>



    <div class="patient-info">
        <h4>Informasi Pasien</h4>
        <p><strong>Nama:</strong> {{ $record->pasien->nama }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($record->pasien->tgl_lahir)->format('d-m-Y') }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ ucfirst($record->pasien->jenis_kelamin) }}</p>
        <p><strong>No Kartu Asuransi:</strong> {{ $record->registrasi->nomor_kartu_asuransi }}</p>
        <p><strong>Asuransi:</strong> {{ $record->registrasi->asuransi->nama_asuransi }}</p>
    </div>

    <div class="transaction-info">
        <h4>Informasi Registrasi</h4>
        <p><strong>Tanggal Registrasi:</strong> {{ \Carbon\Carbon::parse($record->registrasi->tgl_registrasi)->format('d-m-Y') }}</p>
        <p><strong>Ruang Pelayanan:</strong> {{ $record->registrasi->ruangPelayanan->nama_ruang_pelayanan }}</p>
    </div>

    <div class="transaction-detail">
        <h4>Detail Tindakan</h4>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tindakan</th>
                    <th>Tarif</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0;
                @endphp
                @foreach ($record->id_tindakan as $index => $item)

                    @php
                        $tindakan = \App\Models\MsTindakan::find($item);
                        $grandTotal += $tindakan->tarif_tindakan;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tindakan->nama_tindakan }}</td>
                        <td>Rp {{ number_format($tindakan->tarif_tindakan, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="grand-total">Grand Total: Rp {{ number_format($grandTotal, 0, ',', '.') }}</p>
    </div>
</div>




