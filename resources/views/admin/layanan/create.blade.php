@extends('layouts.app')

@section('title', 'Tambah Layanan')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Layanan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/layanan') }}">Layanan</a></li>
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
        <h3 class="card-title">Tambah Layanan</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ url('admin/layanan') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="layanan">Layanan</label>
                <input type="text" class="form-control" id="layanan" name="layanan" placeholder="Masukan layanan" value="{{ old('layanan') }}">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="level_id">Level</label>
                <select class="custom-select form-control" id="level_id" name="level_id">
                  <option value="">- Pilih Level -</option>
                  @foreach ($levels as $level)
                  <option value="{{ $level->id }}" {{ old('level_id')==$level->id ? 'selected' : '' }}>{{ ucfirst($level->nama) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                  placeholder="Masukan keterangan">{{ old('keterangan') }}</textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="gambar">Foto</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                  <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                </div>
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