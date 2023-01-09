@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <a href="{{ url('admin/produk') }}">Produk</a> /</span> Detail Produk</h4>
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
              <p>{{ $produk->client->nama }}</p>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Produk</label>
            <div class="col-sm-10">
              <p>{{ $produk->nama }}</p>
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
              @if ($produk->url)
              <p>
                <a href="{{ $produk->url }}" target="_blank">{{ $produk->url }}</a>
              </p>
              @else
              <p>-</p>
              @endif
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Pedoman</label>
            <div class="col-sm-10">
              @if ($produk->pedoman)
              <p>
                <a href="{{ asset('storage/uploads/' . $produk->pedoman) }}" class="btn btn-sm btn-outline-primary" target="_blank">Lihat</a>
              </p>
              @else
              <p>-</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection