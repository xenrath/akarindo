@extends('back.layout.main')

@section('title', 'Tambah Tiket')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <a href="{{ url('tiket') }}">Tiket</a> /</span> Tambah Tiket</h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ url('tiket') }}" method="post">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="produk_id">Produk</label>
              <select class="select2 form-select @error('produk') is-invalid @enderror" id="produk_id"
                name="produk_id">
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
              <label class="form-label" for="pengaduan">Pengaduan</label>
              <textarea class="form-control" id="pengaduan" name="pengaduan">{{ old('pengaduan') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-end">
              <span class="tf-icons bx bx-send"></span>&nbsp; Kirim</a>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection