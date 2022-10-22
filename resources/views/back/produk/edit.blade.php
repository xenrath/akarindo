@extends('back.layout.main')

@section('title', 'Ubah produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('produk') }}">Produk</a> /
    </span> Ubah Produk
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Ubah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ url('produk/' . $produk->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

             <div class="mb-3">
              <label class="form-label" for="produk">Produk</label>
              <input type="text" class="form-control @error('produk') is-invalid @enderror" name="produk" id="produk"
                placeholder="Masukan produk" value="{{ old('produk', $produk->produk) }}" autofocus />
              @error('produk')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

             <div class="form-group">
            <label for="role_id">User</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
              <option value="">- Pilih -</option>
              @foreach ($users as $k)
                <option value="{{ $k->id }}" {{ old('user_id') == $k->id ? 'selected' : null }}>{{ $k->name}}</option>
              @endforeach
            </select>
            @error('user_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

            </div>
            <div class="form-group">
            <label for="role_id">Layanan</label>
            <select class="form-control @error('layanan_id') is-invalid @enderror" id="layanan_id" name="layanan_id">
              <option value="">- Pilih -</option>
              @foreach ($layanans as $k)
                <option value="{{ $k->id }}" {{ old('layanan_id') == $k->id ? 'selected' : null }}>{{ $k->layanan}}</option>
              @endforeach
            </select>
            @error('layanan_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div>

          <div class="mb-3">
          <label class="form-label" for="url">Url</label>
          <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url"
            placeholder="Masukan url" value="{{ old('url', $produk->url) }}" autofocus />
          @error('url')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror

        <div class="mb-3">
            <label for="formFile" class="form-label">Pedoman</label>
            <input class="form-control" type="file" value="{{ old('pedoman', $produk->pedoman) }}" name="pedoman" id="pedoman">
          </div>

          <div>
            <div class="modal-footer">
              <a type="button" class="btn btn-secondary" href="{{ url('produk') }}">Tutup</a>
            <button type="submit" class="btn btn-primary float-end">
              <span class="tf-icons bx bx-send"></span>&nbsp; Kirim</a>
            </button>
             </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection