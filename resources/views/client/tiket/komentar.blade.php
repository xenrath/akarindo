@extends('layouts.app')

@section('title', 'Pengaduan Obrolan')

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
          <li class="breadcrumb-item active">Pengaduan Obrolan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card collapsed-card">
      <div class="card-header">
        <h3 class="card-title">Detail Pengaduan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          @if ($tiket->gambar)
          <div class="col-md-4 mb-3">
            <img src="{{ asset('storage/uploads/' . $tiket->gambar) }}" alt="{{ $tiket->kode }}"
              class="w-100 rounded border shadow">
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
            <p class="text-wrap">
              <strong>Tanggal Pengerjaan</strong>
              <br>
              {{ date('d M Y', strtotime($tiket->tanggal_pengerjaan)) }}
            </p>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5>
        <i class="icon fas fa-ban"></i> Error!
      </h5>
      <ul>
        @foreach (session('error') as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Komentar</h3>
        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
          data-target="#modal-komentar">
          <i class="fas fa-plus"></i> &nbsp; Komentar
        </button>
      </div>
      <div class="card-body">
        @foreach ($komentars as $key => $komentar)
        <p>
          <strong>{{ $komentar->pengirim->nama }}</strong>
          <small class="text-muted float-right">{{ date('d M Y', strtotime($komentar->created_at)) }}</small>
          <br>
          {{ $komentar->komentar }}
          @if ($komentar->gambar)
        <div class="row">
          <div class="col-md-4">
            <img src="{{ asset('storage/uploads/' . $komentar->gambar) }}" class="w-100 rounded border">
          </div>
        </div>
        @endif
        </p>
        @if (count($komentars) - 1 != $key)
        <hr>
        @endif
        @endforeach
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-komentar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Buat Komentar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('client/tiket/buat_komentar') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <input type="hidden" class="form-control" name="tiket_id" value="{{ $tiket->id }}">
          <div class="form-group mb-3">
            <label class="form-label" for="komentar">Komentar</label>
            <textarea class="form-control" id="komentar" name="komentar"
              style="height: 160px;">{{ old('komentar') }}</textarea>
          </div>
          <div class="form-group">
            <label class="form-label" for="gambar">Gambar <small>(opsional)</small></label>
            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-konfirmasi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Pengaduan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin selesaikan pengaduan?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <a href="{{ url('client/tiket/konfirmasi_selesai/' . $tiket->id) }}" class="btn btn-primary">Selesaikan</a>
      </div>
    </div>
  </div>
</div>
<!-- /.card -->
@endsection