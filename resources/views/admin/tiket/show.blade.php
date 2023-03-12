@extends('layouts.app')

@section('title', 'Lihat Pengaduan')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pengaduan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/tiket') }}">Pengaduan</a></li>
          <li class="breadcrumb-item active">Lihat</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Lihat Pengaduan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <table class="table">
              <tr>
                <th>Client</th>
                <td>:</td>
                <td>{{ $tiket->client->nama }}</td>
              </tr>
              <tr>
                <th>Produk</th>
                <td>:</td>
                <td>{{ $tiket->produk->nama }}</td>
              </tr>
              <tr>
                <th>Pengaduan</th>
                <td>:</td>
                <td>{{ $tiket->pengaduan }}</td>
              </tr>
              @if ($tiket->status == 'selesai')
              <tr>
                <th>Waktu</th>
                <td>:</td>
                <td>{{ date('d M Y', strtotime($tiket->tanggal_awal)) }} - {{ date('d M Y',
                  strtotime($tiket->tanggal_akhir)) }}</td>
              </tr>
              @endif
              @if ($tiket->jawaban)
              <tr>
                <th>Jawaban</th>
                <td>:</td>
                <td>{{ $tiket->jawaban }}</td>
              </tr>
              @endif
              @if ($tiket->teknisi_id)
              <tr>
                <th>Teknisi</th>
                <td>:</td>
                <td>{{ $tiket->teknisi->nama }}</td>
              </tr>
              <tr>
                <th>Tanggal Pengerjaan</th>
                <td>:</td>
                <td>{{ date('d M Y', strtotime($tiket->tanggal_pengerjaan)) }}</td>
              </tr>
              @if ($tiket->status == 'selesai')
              <tr>
                <th>Lama Pengerjaan</th>
                <td>:</td>
                <td>
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
                </td>
              </tr>
              @endif
              @endif
            </table>
          </div>
          @if ($tiket->gambar)
          <div class="col">
            <img src="{{ asset('storage/uploads/' . $tiket->gambar) }}" alt="{{ $tiket->nama }}" class="w-100 rounded">
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection