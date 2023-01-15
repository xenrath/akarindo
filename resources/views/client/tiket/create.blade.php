@extends('layouts.app')

@section('title', 'Buat Pengaduan')

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
          <li class="breadcrumb-item active">Buat</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

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
      @foreach (session('error') as $error)
      - {{ $error }} <br>
      @endforeach
    </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Buat Pengaduan</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ url('client/tiket') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="produk_id">Produk</label>
            <select class="form-control select2bs4" id="produk_id" name="produk_id" style="width: 100%">
              <option value="">- Pilih Produk -</option>
              @foreach ($produks as $produk)
              <option value="{{ $produk->id }}" {{ old('produk_id')==$produk->id ? 'selected' : '' }}>{{
                $produk->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="pengaduan">Pengaduan</label>
            <textarea class="form-control" id="pengaduan" name="pengaduan" rows="3"
              placeholder="Masukan pengaduan">{{ old('pengaduan') }}</textarea>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
              <label class="custom-file-label" for="gambar">Pilih Gambar</label>
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