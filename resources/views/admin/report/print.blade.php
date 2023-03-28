<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Laporan</title>
  <style>
    /* * {
      border: 1px solid black;
    } */
    .b {
      border: 1px solid black;
    }

    .table,
    .td {
      border: 1px solid black;
    }

    body {
      margin: 0;
      padding: 0;
    }

    span.h2 {
      font-size: 24px;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <table width="100%">
    <tr>
      <td>
        <img src="{{ asset('storage/uploads/logo.png') }}" alt="EHR Helpdesk" width="100px">
      </td>
      <td style="letter-spacing: 1px">
        <span style="font-weight: bold; font-size: 20px;">EHR HELPDESK</span>
        <br>
        <span>Alamat : Jl. Bukit Limau VIII FE 3 Bhromelia Permata Puri, Bringin, Ngaliyan, Kota Semarang, Jawa Tengah
          50189</span>
        <br>
        <span>Telp. (024)76435498, Email. ehrsistem@gmail.com</span>
      </td>
    </tr>
  </table>
  <hr>
  <br>
  <p style="font-weight: bold; text-align: center">DATA LAPORAN PENGADUAN</p>
  <br>
  <table style="width: 100%;" cellpadding="10" cellspacing="0">
    <tr>
      <td class="td" style="text-align: center">No.</td>
      <td class="td" style="text-align: center">Nama</td>
      <td class="td" style="text-align: center">Waktu Pengaduan</td>
      <td class="td" style="text-align: center">Aktivitas</td>
      <td class="td" style="text-align: center">Status</td>
    </tr>
    @foreach ($tikets as $tiket)
    <tr>
      <td class="td" style="text-align: center; vertical-align: top">{{ $loop->iteration }}.</td>
      <td class="td" style="width: 180px; vertical-align: top">
        {{ $tiket->client->nama }}
        <br>
        ({{ $tiket->produk->nama }})
      </td>
      <td class="td" style="width: 140px; vertical-align: top">
        Dibuat :
        <br>
        {{ date('d M Y', strtotime($tiket->tanggal_awal)) }}
        <br>
        @if ($tiket->tanggal_pengerjaan)
        Pengerjaan :
        <br>
        {{ date('d M Y', strtotime($tiket->tanggal_pengerjaan)) }}
        <br>
        @endif
        @if ($tiket->tanggal_akhir)
        Selesai :
        <br>
        {{ date('d M Y', strtotime($tiket->tanggal_akhir)) }}
        @endif
      </td>
      <td class="td" style="vertical-align: top">
        @if ($tiket->teknisi_id)
        Teknisi :
        <br>
        {{ $tiket->teknisi->nama }}
        <br>
        <br>
        Lama Pengerjaan :
        <br>
        @php
        $tanggal_pengerjaan = strtotime($tiket->tanggal_pengerjaan);
        $tanggal_akhir = strtotime($tiket->tanggal_akhir);
        $selisih = ceil(abs($tanggal_akhir - $tanggal_pengerjaan) / 86400);
        @endphp
        @if ($selisih == 0)
        Dikerjakan dan selesai hari itu juga.
        @else
        {{ $selisih }} Hari
        @endif
        @endif
        @if ($tiket->jawaban)
        CS :
        <br>
        {{ $tiket->jawaban }}
        @endif
      </td>
      <td class="td" style="width: 100px; text-align: center">{{ ucfirst($tiket->status) }}</td>
    </tr>
    @endforeach
  </table>
  <br>
  <br>
  <table style="width: 100%;" cellspacing="0" cellpadding="8">
    <tr>
      <td></td>
      <td></td>
      <td style="width: 240px">
        <p>Semarang, {{ Carbon\Carbon::now()->translatedFormat('d M Y') }}</p>
        <p>CV. Anugrah Karya Indonesia</p>
        <br>
        <br>
        <br>
        <br>
        Radita Citra Oktaviyani
      </td>
    </tr>
  </table>
  <div style="text-align: center; position: fixed; bottom: -20px; left: 0px; right: 0px">
    SUPPORT BY SYSTEM EHR.CO.ID
  </div>
</body>
</html>