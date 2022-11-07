@extends('back.layout.main')

@section('title', 'Tambah Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('produk') }}">Produk</a> /
    </span> Tambah Produk
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data</h5>
        </div>
        <hr class="my-1" />
        <form action="{{ url('produk') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="nama">Nama Produk *</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') }}" placeholder="Masukan nama produk" autocomplete="off" autofocus />
                  @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="user_id">User *</label>
                  <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                    <option value="">- Pilih -</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id')==$user->id ? 'selected' : null }}>{{ $user->nama
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
                  <label class="form-label" for="layanan_id">Layanan *</label>
                  <select class="form-select @error('layanan_id') is-invalid @enderror" id="layanan_id"
                    name="layanan_id">
                    <option value="">- Pilih -</option>
                    @foreach ($layanans as $layanan)
                    <option value="{{ $layanan->id }}" {{ old('layanan_id')==$layanan->id ? 'selected' : null }}>{{
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
                    value="{{ old('url') }}" placeholder="Masukan url" autocomplete="off" />
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
                  <input type="file" class="form-control @error('pedoman') is-invalid @enderror" name="pedoman" id="pedoman"
                    accept="application/pdf">
                  @error('pedoman')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <hr class="my-1" />
          <div class="card-footer float-end">
            <button type="submit" class="btn btn-primary me-1">
              <i class="tf-icons bx bx-save"></i>
              <span class="d-none d-md-inline">&nbsp;Simpan</span>
            </button>
            <button type="reset" class="btn btn-secondary">
              <i class="tf-icons bx bx-reset"></i>
              <span class="d-none d-md-inline">&nbsp;Reset</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection