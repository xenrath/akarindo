@extends('layouts.app')

@section('title', 'Ubah Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('admin/produk') }}">Produk</a> /
    </span> Ubah Produk
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Ubah Data</h5>
        </div>
        <hr class="my-1" />
        <form action="{{ url('admin/produk/' . $produk->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="nama">Nama Produk</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama', $produk->nama) }}" />
                  @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="client_id">Client</label>
                  <select class="form-select @error('client_id') is-invalid @enderror" id="client_id" name="client_id">
                    <option value="">- Pilih -</option>
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id', $produk->client_id)==$client->id ? 'selected' : null
                      }}>{{ $client->nama
                      }}</option>
                    @endforeach
                  </select>
                  @error('user_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="layanan_id">Layanan</label>
                  <select class="form-select @error('layanan_id') is-invalid @enderror" id="layanan_id"
                    name="layanan_id">
                    <option value="">- Pilih -</option>
                    @foreach ($layanans as $layanan)
                    <option value="{{ $layanan->id }}" {{ old('layanan_id', $produk->layanan_id)==$layanan->id ?
                      'selected' : null }}>{{
                      $layanan->layanan }}</option>
                    @endforeach
                  </select>
                  @error('layanan_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="url">URL</label>
                  <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url"
                    value="{{ old('url', $produk->url) }}" />
                  @error('url')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="pedoman" class="form-label">Pedoman</label>
                  <input type="file" class="form-control @error('pedoman') is-invalid @enderror" name="pedoman"
                    id="pedoman" accept="application/pdf">
                  <div class="form-text">Kosongkan saja jika tidak diubah</div>
                  @error('pedoman')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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
  </div>
</div>
@endsection