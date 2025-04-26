
<style>
#tindakan_summary {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tindakan_summary td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tindakan_summary tr:nth-child(even){background-color: #f2f2f2;}

#tindakan_summary tr:hover {background-color: #ddd;}

#tindakan_summary th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

{{-- Informasi pasien --}}


{{-- table non border --}}
<table style="width: 100%; margin-bottom: 20px;">
    <tr>
        <td style="width: 50%;">Nama Pasien</td>
        <td style="width: 50%;">{{ $registrasi->pasien->nama }}</td>
    </tr>
    <tr>
        <td style="width: 50%;">NIK</td>
        <td style="width: 50%;">{{ $registrasi->pasien->nik }}</td>
    </tr>
    <tr>
        <td style="width: 50%;">Tanggal Lahir</td>
        <td style="width: 50%;">{{ $registrasi->pasien->tgl_lahir }}</td>
    </tr>
    <tr>
        <td style="width: 50%;">Jenis Kelamin</td>
        <td style="width: 50%;">{{ $registrasi->pasien->jenis_kelamin }}</td>
    </tr>
    <tr>
        <td style="width: 50%;">Alamat</td>
        <td style="width: 50%;">{{ $registrasi->pasien->alamat }}</td>
    </tr>
    <tr>
        <td style="width: 50%;">No. HP</td>
        <td style="width: 50%;">{{ $registrasi->pasien->no_hp }}</td>
    </tr>
</table>

{{-- Informasi tindakan --}}
@php
    $total = 0;
@endphp
<table id="tindakan_summary">
    <tr>
        <td>Nama Tindakan</td>
        <td>Harga</td>
    </tr>
    @foreach ($data as $tindakan)
        @php
            $total += $tindakan->tarif_tindakan;
        @endphp
        <tr>
            <td>{{ $tindakan->nama_tindakan }}</td>
            <td>Rp. {{ number_format($tindakan->tarif_tindakan, 0, ',', '.') }},-</td>
        </tr>
    @endforeach
    {{-- total --}}
    <tr>
        <td><strong>Total</strong></td>
        <td><strong>Rp. {{ number_format($total, 0, ',', '.') }},-</strong></td>
    </tr>

</table>




