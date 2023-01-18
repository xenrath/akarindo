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
  <p style="font-weight: bold; align-content: center">Laporan Pengaduan</p>
  <table style="width: 100%;" cellpadding="10" cellspacing="0">
    <tr>
      <td class="td">Client</td>
      <td class="td">Pengaduan</td>
      <td class="td">Waktu Pengaduan</td>
      <td class="td">Penyelesaian</td>
    </tr>
    @foreach ($tikets as $tiket)
    <tr>
      <td class="td" style="width: 180px">
        {{ $tiket->client->nama }}
        <br>
        ({{ $tiket->produk->nama }})
      </td>
      <td class="td">{{ $tiket->pengaduan }}</td>
      <td class="td">
        Tanggal Dibuat :
        <br>
        {{ date('d M Y', strtotime($tiket->tanggal_awal)) }}
        <br>
        @if ($tiket->tanggal_pengerjaan)
        Tanggal Pengerjaan :
        <br>
        {{ date('d M Y', strtotime($tiket->tanggal_pengerjaan)) }}
        <br>
        @endif
        Tanggal Selesai :
        <br>
        {{ date('d M Y', strtotime($tiket->tanggal_akhir)) }}
      </td>
      <td class="td">
        @if ($tiket->teknisi_id)
        Teknisi :
        <br>
        {{ $tiket->teknisi->nama }}
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
    </tr>
    @endforeach
  </table>
</body>
</html>