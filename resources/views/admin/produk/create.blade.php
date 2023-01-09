@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('admin/produk') }}">Produk</a> /
    </span> Tambah Produk
  </h4>
  @if (session('error'))
  <div class="alert alert-danger alert-dismissible" client="alert">
    <h5 class="text-danger">Error!</h5>
    <p>
      @foreach (session('error') as $error)
      -&nbsp; {{ $error }} <br>
      @endforeach
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Tambah Data</h5>
    </div>
    <hr class="my-1" />
    <form action="{{ url('admin/produk') }}" method="post" enctype="multipart/form-data" autocomplete="off">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="nama">Nama Produk</label>
              <input type="text" class="form-control" name="nama" id="nama"
                value="{{ old('nama') }}" placeholder="masukan nama produk" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="client_id">Client</label>
              <select class="form-select" id="client_id" name="client_id">
                <option value="">- Pilih -</option>
                @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ old('client_id')==$client->id ? 'selected' : null }}>{{ $client->nama
                  }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="layanan_id">Layanan</label>
              <select class="form-select" id="layanan_id"
                name="layanan_id">
                <option value="">- Pilih -</option>
                @foreach ($layanans as $layanan)
                <option value="{{ $layanan->id }}" {{ old('layanan_id')==$layanan->id ? 'selected' : null }}>{{
                  $layanan->layanan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="url">URL</label>
              <input type="text" class="form-control" name="url" id="url"
                value="{{ old('url') }}" placeholder="masukan url" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="pedoman" class="form-label">Pedoman</label>
              <input type="file" class="form-control" name="pedoman"
                id="pedoman" accept="application/pdf">
            </div>
          </div>
        </div>
      </div>
      <hr class="my-1" />
      <div class="card-footer float-end">
        <button type="reset" class="btn btn-secondary me-1">
          <span class="d-none d-md-inline">Reset</span>
        </button>
        <button type="submit" class="btn btn-primary">
          <span class="d-none d-md-inline">Simpan</span>
        </button>
      </div>
    </form>
  </div>
</div>
@endsection