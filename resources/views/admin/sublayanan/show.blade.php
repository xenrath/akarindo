@extends('layouts.app')

@section('title', 'Lihat Layanan')

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
          <li class="breadcrumb-item active">Lihat</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Lihat Layanan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8">
            <table class="table">
              <tr>
                <th>Layanan</th>
                <td>:</td>
                <td>{{ $layanan->layanan }}</td>
              </tr>
              <tr>
                <th>Keterangan</th>
                <td>:</td>
                <td>{{ $layanan->keterangan }}</td>
              </tr>
              <tr>
                <th>Level</th>
                <td>:</td>
                <td>{{ ucfirst($layanan->level->nama) }}</td>
              </tr>
            </table>
          </div>
          <div class="col-lg-4">
            @if ($layanan->gambar)
            <img src="{{ asset('storage/uploads/' . $layanan->gambar) }}" alt="{{ $layanan->nama }}"
              class="w-100 rounded bg-dark">
            @else
            <img src="{{ asset('storage/uploads/image-placeholder.jpg') }}" alt="{{ $layanan->nama }}"
              class="w-100 rounded">
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection