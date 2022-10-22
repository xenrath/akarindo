@extends('back.layout.main')

@section('title', 'Tambah Layanan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('layanan') }}">Layanan</a> /
    </span> Tambah Layanan
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ url('layanan') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="layanan">Layanan</label>
              <input type="text" class="form-control" name="layanan" id="layanan" placeholder="Masukan layanan"
                required />
            </div>
            <div class="form-group">
              <label for="level_id">Level</label>
              <select class="form-control @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                <option value="">- Pilih -</option>
                @foreach ($levels as $k)
                <option value="{{ $k->id }}" {{ old('level_id')==$k->id ? 'selected' : null }}>{{ $k->level }}</option>
                @endforeach
              </select>
              @error('level_id')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="deskripsi">Keterangan</label>
              <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
            </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">Gambar</label>
              <input class="form-control" type="file" name="gambar" id="gambar">
            </div>

            <div class="modal-footer">
              <a type="button" class="btn btn-secondary" href="{{ url('layanan') }}">Tutup</a>
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