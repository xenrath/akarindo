@extends('layouts.app')

@section('title', 'Pengaduan Selesai')

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
            <li class="breadcrumb-item active">Pengaduan Selesai</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-check"></i> Success!
          </h5>
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"></i> Error!
          </h5>
          {{ session('error') }}
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pengaduan Selesai</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Kode</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tikets as $tiket)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $tiket->kode }}</td>
                  <td>{{ $tiket->produk->nama }}</td>
                  <td class="text-wrap w-50">{{ $tiket->pengaduan }}</td>
                  <td class="text-center">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                      data-target="#modal-lihat-{{ $tiket->id }}">
                      Lihat
                    </button>
                  </td>
                </tr>
                <div class="modal fade" id="modal-lihat-{{ $tiket->id }}">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Lihat Pengaduan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          @if ($tiket->gambar)
                            <div class="col">
                              <img src="{{ asset('storage/uploads/' . $tiket->gambar) }}" alt="{{ $tiket->kode }}"
                                class="w-100 rounded border">
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
                              <strong>Deskripsi</strong>
                              <br>
                              {{ $tiket->pengaduan }}
                            </p>
                            <p class="text-wrap">
                              <strong>Tanggal Awal</strong>
                              <br>
                              {{ $tiket->tanggal_awal }}
                            </p>
                          </div>
                        </div>
                        <hr>
                        @if ($tiket->jawaban)
                          <p class="text-wrap">
                            <strong>Jawaban</strong>
                            <br>
                            {{ $tiket->jawaban }}
                          </p>
                          <p class="text-wrap">
                            <strong>Tanggal Selesai</strong>
                            <br>
                            {{ $tiket->tanggal_akhir }}
                          </p>
                        @endif
                        @if ($tiket->teknisi_id)
                          <p class="text-wrap">
                            <strong>Teknisi</strong>
                            <br>
                            {{ $tiket->teknisi->nama }}
                          </p>
                          <p class="text-wrap">
                            <strong>Tanggal Pengerjaan</strong>
                            <br>
                            {{ $tiket->tanggal_pengerjaan }}
                          </p>
                          <p class="text-wrap">
                            <strong>Tanggal Selesai</strong>
                            <br>
                            {{ $tiket->tanggal_akhir }}
                          </p>
                          <p class="text-wrap">
                            <strong>Bukti</strong>
                            <br>
                          </p>
                          <img src="{{ asset('storage/uploads/' . $tiket->bukti) }}" class="rounded w-50">
                        @endif
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
  <!-- /.card -->
@endsection
