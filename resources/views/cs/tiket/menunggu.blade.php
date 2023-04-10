@extends('layouts.app')

@section('title', 'Pengaduan Menunggu')

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
          <li class="breadcrumb-item active">Pengaduan Menunggu</li>
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
        <h3 class="card-title">Data Pengaduan Menunggu</h3>
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
              <td class="text-wrap  w-50">{{ $tiket->pengaduan }}</td>
              <td class="text-center" style="width: 90px">
                @if ($tiket->teknisi_id)
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                  data-target="#modal-lihat-{{ $tiket->id }}">
                  Lihat
                </button>
                @else
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                  data-target="#modal-konfirmasi-{{ $tiket->id }}">
                  Proses
                </button>
                @endif
              </td>
            </tr>
            <div class="modal fade" id="modal-konfirmasi-{{ $tiket->id }}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Pengaduan</h4>
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
                          <strong>Tanggal Dibuat</strong>
                          <br>
                          {{ date('d M Y', strtotime($tiket->tanggal_awal)) }}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal"
                      data-target="#modal-jawab">Jawab
                      Pengaduan</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                      data-target="#modal-alihkan-{{ $tiket->id }}">Alihkan
                      ke Teknisi</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modal-jawab">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Jawab Pengaduan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ url('cs/tiket/konfirmasi_jawab/' . $tiket->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <textarea class="form-control" id="jawaban" name="jawaban" rows="3"
                          placeholder="Masukan jawaban"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal"
                        data-target="#modal-konfirmasi-{{ $tiket->id }}">Kembali</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modal-alihkan-{{ $tiket->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Alihkan Pengaduan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ url('cs/tiket/konfirmasi_alihkan/' . $tiket->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      @php
                      $teknisis = \App\Models\User::where('layanan_id',
                      $tiket->produk->sublayanan->layanan_id)->withCount('tiket_teknisis')->orderBy('tiket_teknisis_count')->get();
                      @endphp
                      <div class="form-group">
                        <label for="teknisi_id">Teknisi</label>
                        <select class="form-control select2bs4" id="teknisi_id" name="teknisi_id">
                          <option value="">- Pilih Teknisi -</option>
                          @foreach ($teknisis as $teknisi)
                          <option value="{{ $teknisi->id }}" {{ old('teknisi_id')==$teknisi->id ? 'selected' : '' }}>{{
                            $teknisi->nama }} ({{ $teknisi->tiket_teknisis_count }})</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal"
                        data-target="#modal-konfirmasi-{{ $tiket->id }}">Kembali</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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
                          <strong>Tanggal Dibuat</strong>
                          <br>
                          {{ date('d M Y', strtotime($tiket->tanggal_awal)) }}
                        </p>
                      </div>
                    </div>
                    @if ($tiket->teknisi_id)
                    <hr>
                    <p class="text-wrap">
                      Pengaduan <strong>{{ $tiket->produk->nama }}</strong> sudah dialihkan ke Teknisi. Harap menunggu
                      konfirmasi pengerjaan dari Teknisi.
                    </p>
                    <p class="text-wrap">
                      <strong>Teknisi</strong>
                      <br>
                      {{ $tiket->teknisi->nama }}
                    </p>
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