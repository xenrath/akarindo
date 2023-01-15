@extends('layouts.app')

@section('title', 'Ubah User')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/user') }}">User</a></li>
          <li class="breadcrumb-item active">Ubah</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5>
        <i class="icon fas fa-ban"></i> Error!
      </h5>
      @foreach (session('error') as $error)
      - {{ $error }} <br>
      @endforeach
    </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ubah User</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ url('admin/user/' . $user->id) }}" method="post" enctype="multipart/form-data"
        autocomplete="off">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama User</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama user"
                  value="{{ old('nama', $user->nama) }}">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email"
                  value="{{ old('email', $user->email) }}">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="role">Role</label>
                <select class="custom-select form-control" id="role" name="role">
                  <option value="">- Pilih Role -</option>
                  <option value="admin" {{ old('role', $user->role)=='admin' ? 'selected' : '' }}>Admin</option>
                  <option value="cs" {{ old('role', $user->role)=='cs' ? 'selected' : '' }}>CS</option>
                  <option value="teknisi" {{ old('role', $user->role)=='teknisi' ? 'selected' : '' }}>Teknisi</option>
                  <option value="client" {{ old('role', $user->role)=='client' ? 'selected' : '' }}>Client</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="telp">No. Telepon</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">+62</span>
                  </div>
                  <input type="text" id="telp" name="telp" class="form-control" placeholder="Masukan nomor telepon"
                    value="{{ old('telp', $user->telp) }}">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="foto">Foto</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                  <label class="custom-file-label" for="foto">Pilih Foto</label>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                  placeholder="Masukan alamat">{{ old('alamat', $user->alamat) }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection