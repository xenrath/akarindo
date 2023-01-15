@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Profile</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5>
        <i class="icon fas fa-check"></i> Success!
      </h5>
      {{ session('success') }}
    </div>
    @endif
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
        <h5 class="mb-0">Update Profile</h5>
      </div>
      <form action="{{ url('profile/update') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
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
          <hr>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}">
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
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection