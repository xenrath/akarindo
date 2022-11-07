@extends('back.layout.main')

@section('title', 'Detail Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <a href="{{ url('produk') }}">Produk</a> /</span> Detail Produk</h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Detail Data</h5>
        </div>
        <hr class="my-1" />
        <div class="card-body">
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Nama Client</label>
            <div class="col-sm-10">
              <p>{{ $produk->user->name }}</p>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Produk</label>
            <div class="col-sm-10">
              <p>{{ $produk->produk }}</p>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Layanan</label>
            <div class="col-sm-10">
              <p>{{ $produk->layanan->layanan }}</p>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
              <p>{{ $produk->url }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection