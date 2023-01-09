@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('admin/user') }}">User</a> /
    </span> Tambah User
  </h4>
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
      <h5 class="mb-0">Tambah Data</h5>
    </div>
    <hr class="my-1" />
    <form action="{{ url('admin/user') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="nama">Nama User</label>
              <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}"
                placeholder="masukan nama user" autocomplete="off" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}"
                placeholder="masukan email" autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="role">Role</label>
              <select class="form-select" id="role" name="role">
                <option value="">- Pilih -</option>
                <option value="admin" {{ old('role')=='admin' ? 'selected' : null }}>Admin</option>
                <option value="cs" {{ old('role')=='cs' ? 'selected' : null }}>CS</option>
                <option value="teknisi" {{ old('role')=='teknisi' ? 'selected' : null }}>Teknisi</option>
                <option value="client" {{ old('role')=='client' ? 'selected' : null }}>Client</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="telp">Nomor Telepon</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">+62</span>
                <input type="text" class="form-control" placeholder="masukan nomor telepon" id="telp" name="telp"
                  value="{{ old('telp') }}" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3"
                placeholder="masukan alamat">{{ old('alamat') }}</textarea>
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
@endsection