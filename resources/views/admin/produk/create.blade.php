@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Produk</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/produk') }}">Produk</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5>
        <i class="icon fas fa-ban"></i> Error!
      </h5>
      @foreach (session('error') as $error)
      - {{ $error }} <br>
      @endforeach
    </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah Produk</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ url('admin/produk') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="client_id">Client</label>
            <select class="form-control select2bs4" id="client_id" name="client_id">
              <option value="">- Pilih Client -</option>
              @foreach ($clients as $client)
              <option value="{{ $client->id }}" {{ old('client_id')==$client->id ? 'selected' : '' }}>{{ $client->nama
                }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama produk"
              value="{{ old('nama') }}">
          </div>
          <div class="form-group">
            <label for="sublayanan_id">Layanan</label>
            <select class="form-control select2bs4" id="sublayanan_id" name="sublayanan_id">
              <option value="">- Pilih Layanan -</option>
              @foreach ($sublayanans as $sublayanan)
              <option value="{{ $sublayanan->id }}" {{ old('sublayanan_id')==$sublayanan->id ? 'selected' : '' }}>{{
                $sublayanan->nama }} ({{ $sublayanan->layanan->layanan }})</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="Masukan url produk"
              value="{{ old('url') }}">
          </div>
          <div class="form-group">
            <label for="pedoman">Pedoman</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="pedoman" name="pedoman" accept="application/pdf">
              <label class="custom-file-label" for="pedoman">Pilih Pedoman</label>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection