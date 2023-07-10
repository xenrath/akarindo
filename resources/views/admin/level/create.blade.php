@extends('layouts.app')

@section('title', 'Tambah Level')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Level</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/level') }}">Level</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">

    {{-- menampilkan alert gagal --}}

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

    {{-- menampilkan form tambah level --}}

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah Level</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ url('admin/level') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama Level</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama level" value="{{ old('nama') }}">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="lama">Lama Perbaikan / Hari</label>
                <input type="number" class="form-control" id="lama" name="lama" placeholder="Masukan lama perbaikan" value="{{ old('lama') }}">
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