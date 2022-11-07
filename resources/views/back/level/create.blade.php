@extends('back.layout.main')

@section('title', 'Tambah Level')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('level') }}">Level</a> /
    </span> Tambah Level
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data</h5>
        </div>
        <hr class="my-1" />
        <form action="{{ url('level') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="nama">Level</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') }}" autocomplete="off" placeholder="Masukan level" />
                  @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="pengerjaan">Pengerjaan / Hari</label>
                  <input type="number" class="form-control @error('pengerjaan') is-invalid @enderror" name="pengerjaan"
                    id="pengerjaan" placeholder="Masukan lama pengerjaan" value="{{ old('pengerjaan') }}"
                    autocomplete="off" />
                  @error('pengerjaan')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="perbaikan">Perbaikan / Hari</label>
                  <input type="number" class="form-control @error('perbaikan') is-invalid @enderror" name="perbaikan"
                    id="perbaikan" placeholder="Masukan lama perbaikan" value="{{ old('perbaikan') }}"
                    autocomplete="off" />
                  @error('perbaikan')
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