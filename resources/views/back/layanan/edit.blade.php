@extends('back.layout.main')

@section('title', 'Ubah Layanan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('layanan') }}">Layanan</a> /
    </span> Ubah Layanan
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Ubah Data</h5>
        </div>
        <hr class="my-1" />
        <form action="{{ url('layanan/' . $layanan->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="layanan">Layanan *</label>
                  <input type="text" class="form-control @error('layanan') is-invalid @enderror" name="layanan"
                    id="layanan" value="{{ old('layanan', $layanan->layanan) }}" autocomplete="off" autofocus/>
                  @error('layanan')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="level_id">Level *</label>
                  <select class="form-select @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                    <option value="">- Pilih -</option>
                    @foreach ($levels as $level)
                    <option value="{{ $level->id }}" {{ old('level_id', $layanan->level_id)==$level->id ? 'selected' :
                      null }}>{{
                      ucfirst($level->nama) }}</option>
                    @endforeach
                  </select>
                  @error('level_id')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="keterangan">Keterangan</label>
                  <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                    name="keterangan" rows="3">{{ old('keterangan', $layanan->keterangan) }}</textarea>
                  @error('keterangan')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                    id="gambar" accept="image/*">
                  <div class="form-text">Kosongkan saja jika tidak diubah</div>
                  @error('gambar')
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