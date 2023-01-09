@extends('layouts.app')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Pengaduan</h4>
  <!-- Basic Layout -->
  @if (session('success'))
  <div class="alert alert-primary alert-dismissible" user="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session('error'))
  <div class="alert alert-danger alert-dismissible" user="alert">
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
      <h5 class="mb-0">Buat Pengaduan</h5>
    </div>
    <hr class="my-1">
    <form action="{{ url('client/tiket') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="produk_id">Produk *</label>
          <select class="select2 form-select @error('produk') is-invalid @enderror" id="produk_id" name="produk_id">
            <option value="">- Pilih -</option>
            @foreach ($produks as $produk)
            <option value="{{ $produk->id }}" {{ old('produk_id')==$produk->id ? 'selected' : null }}>{{
              $produk->nama }}</option>
            @endforeach
          </select>
          @error('produk_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="pengaduan">Pengaduan *</label>
          <textarea class="form-control" id="pengaduan" name="pengaduan">{{ old('pengaduan') }}</textarea>
        </div>
        <div class="mb-3">
          <label class="form-label" for="gambar">Gambar <small>(opsional)</small></label>
          <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
        </div>
      </div>
      <hr class="my-1">
      <div class="card-footer float-end">
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
    </form>
  </div>
</div>
@endsection