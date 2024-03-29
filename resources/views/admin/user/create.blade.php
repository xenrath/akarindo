@extends('layouts.app')

@section('title', 'Tambah User')

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
          <li class="breadcrumb-item active">Tambah</li>
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
        <h3 class="card-title">Tambah User</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ url('admin/user') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="nama">Nama User</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama user"
              value="{{ old('nama') }}">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email"
              value="{{ old('email') }}">
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select class="custom-select form-control" id="role" name="role">
              <option value="">- Pilih Role -</option>
              <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
              <option value="cs" {{ old('role')=='cs' ? 'selected' : '' }}>CS</option>
              <option value="teknisi" {{ old('role')=='teknisi' ? 'selected' : '' }}>Teknisi</option>
              <option value="client" {{ old('role')=='client' ? 'selected' : '' }}>Client</option>
            </select>
          </div>
          <div id="layout_layanan" style="display: none">
            <div class="form-group">
              <label for="layanan_id">Kategori</label>
              <select class="custom-select form-control" id="layanan_id" name="layanan_id">
                <option value="">- Pilih Kategori -</option>
                @foreach ($layanans as $layanan)
                <option value="{{ $layanan->id }}" {{ old('layanan_id')==$layanan->id ? 'selected' : '' }}>{{
                  $layanan->layanan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="telp">No. Telepon</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">+62</span>
              </div>
              <input type="text" id="telp" name="telp" class="form-control" placeholder="Masukan nomor telepon"
                value="{{ old('telp') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
              <label class="custom-file-label" for="foto">Pilih Foto</label>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"
              placeholder="Masukan alamat">{{ old('alamat') }}</textarea>
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
<script>
  var role = document.getElementById('role');
  var layout_layanan = document.getElementById('layout_layanan');
  var layanan_id = document.getElementById('layanan_id');

  if (role.value == 'teknisi') {
    layout_layanan.style.display = "inline";
  } else {
    layout_layanan.style.display = "none";
    layanan_id.value = "";
  }

  role.addEventListener('change', function () {
    if (role.value == 'teknisi') {
      layout_layanan.style.display = "inline";
    } else {
      layout_layanan.style.display = "none";
      layanan_id.value = "";
    }
  });
</script>
@endsection