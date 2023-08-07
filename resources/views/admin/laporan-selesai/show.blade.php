@extends('layouts.app')

@section('title', 'Lihat Laporan Selesai')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Selesai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/laporan-selesai') }}">Laporan Selesai</a></li>
            <li class="breadcrumb-item active">Lihat</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="card collapsed-card">
        <div class="card-header">
          <h3 class="card-title">Detail Teknisi</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8">
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>Kode</strong>
                </div>
                <div class="col-lg-8">
                  {{ $teknisi->kode }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>Nama Teknisi</strong>
                </div>
                <div class="col-lg-8">
                  {{ $teknisi->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>No. Telepon</strong>
                </div>
                <div class="col-lg-8">
                  +62{{ $teknisi->telp }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>Alamat</strong>
                </div>
                <div class="col-lg-8">
                  {{ $teknisi->alamat }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>Keahlian</strong>
                </div>
                <div class="col-lg-8">
                  {{ $teknisi->layanan->layanan }}
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              @if ($teknisi->foto)
                <img src="{{ asset('storage/uploads/' . $teknisi->foto) }}" alt="{{ $teknisi->nama }}"
                  class="w-100 rounded">
              @else
                <img src="{{ asset('storage/uploads/image-placeholder.jpg') }}" alt="{{ $teknisi->nama }}"
                  class="w-100 rounded">
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pengaduan Selesai</h3>
        </div>
        <div class="card-body">
          @forelse ($tikets as $key => $tiket)
            <div class="row">
              @if ($tiket->gambar)
                <div class="col">
                  <img src="{{ asset('storage/uploads/' . $tiket->gambar) }}" alt="{{ $tiket->kode }}"
                    class="w-100 rounded">
                </div>
              @endif
              <div class="col">
                <p class="text-wrap">
                  <strong>Client</strong>
                  <br>
                  {{ $tiket->client->nama }}
                </p>
                <p class="text-wrap">
                  <strong>Produk</strong>
                  <br>
                  {{ $tiket->produk->nama }}
                </p>
                <p class="text-wrap">
                  <strong>Pengaduan</strong>
                  <br>
                  {{ $tiket->pengaduan }}
                </p>
                <p class="text-wrap">
                  <strong>Tanggal Aduan</strong>
                  <br>
                  {{ $tiket->tanggal_awal }}
                </p>
              </div>
            </div>
            @if ($key + 1 != count($tikets))
              <hr>
            @endif
          @empty
            <p class="p-5 text-center">- Pengaduan Tidak Ditemukan -</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>
@endsection
