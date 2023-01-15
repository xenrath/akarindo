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
<body onload="window.print();">
  <p style="text-align: right;">{{ Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
  <p style="font-weight: bold; align-content: center">Laporan Pengaduan</p>
  <table style="width: 100%;" cellpadding="10" cellspacing="0">
    <tr>
      <td class="td">No.</td>
      <td class="td">Nama Client</td>
      <td class="td">Produk</td>
      <td class="td">Pengaduan</td>
      <td class="td">Tanggal Pengaduan</td>
      <td class="td">Tanggal Dikerjakan</td>
      <td class="td">Tanggal Selesai</td>
      <td class="td">Teknisi</td>
      <td class="td">Jawaban</td>
    </tr>
    @foreach ($tikets as $tiket)
    <tr>
      <td class="td">{{ $loop->iteration }}</td>
      <td class="td">{{ $tiket->client->nama }}</td>
      <td class="td">{{ $tiket->produk->nama }}</td>
      <td class="td">{{ $tiket->pengaduan }}</td>
      <td class="td">{{ $tiket->tanggal_awal }}</td>
      <td class="td">{{ $tiket->tanggal_pengerjaan }}</td>
      <td class="td">{{ $tiket->tanggal_akhir }}</td>
      <td class="td">{{ $tiket->teknisi->nama }}</td>
      <td class="td">{{ $tiket->jawaban }}</td>
    </tr>
    @endforeach
  </table>
</body>
</html>