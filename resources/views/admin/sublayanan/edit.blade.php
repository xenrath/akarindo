@extends('layouts.app')

@section('title', 'Ubah Sub Layanan')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Sub Layanan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/sublayanan') }}">Sub Layanan</a></li>
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
        <h3 class="card-title">Ubah Sub Layanan</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ url('admin/sublayanan/' . $sublayanan->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="layanan_id">Layanan</label>
                <select class="custom-select form-control" id="layanan_id" name="layanan_id">
                  <option value="">- Pilih Layanan -</option>
                  @foreach ($layanans as $layanan)
                  <option value="{{ $layanan->id }}" {{ old('layanan_id', $sublayanan->layanan_id)==$layanan->id ? 'selected' : '' }}>{{
                    $layanan->layanan }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama Sub Layanan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama"
                  value="{{ old('nama', $sublayanan->nama) }}">
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