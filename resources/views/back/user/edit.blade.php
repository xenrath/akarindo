@extends('back.layout.main')

@section('title', 'Ubah User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('user') }}">User</a> /
    </span> Ubah User
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Ubah Data</h5>
        </div>
        <hr class="my-1" />
        <form action="{{ url('user/' . $user->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="nama">Nama User *</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama', $user->nama) }}" autocomplete="off" />
                  @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="email">Email *</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    value="{{ old('email', $user->email) }}" autocomplete="off" />
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="role">Role *</label>
                  <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                    <option value="">- Pilih -</option>
                    <option value="admin" {{ old('role', $user->role)=='admin' ? 'selected' : null }}>Admin</option>
                    <option value="client" {{ old('role', $user->role)=='client' ? 'selected' : null }}>Client</option>
                  </select>
                  @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="telp">Nomor Telepon</label>
                  <input type="tel" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp"
                    value="{{ old('telp', $user->telp) }}" autocomplete="off" />
                  @error('telp')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="foto" class="form-label">Foto</label>
                  <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto"
                    accept="image/*">
                  <div class="form-text">Kosongkan saja jika tidak diubah</div>
                  @error('foto')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-label" for="alamat">Alamat</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                    rows="3" placeholder="Masukan alamat">{{ old('alamat') }}</textarea>
                  @error('alamat')
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