@extends('layouts.app')

@section('title', 'Pengaduan')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pengaduan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Pengaduan</li>
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
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Pengaduan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Produk</th>
              <th>Tanggal</th>
              <th>Teknisi</th>
              <th>Status</th>
              <th class="text-center">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tikets as $tiket)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $tiket->produk->nama }}</td>
              <td>{{ date('d M Y', strtotime($tiket->tanggal_awal)) }}</td>
              <td>
                @if ($tiket->teknisi_id != null)
                {{ $tiket->teknisi->nama }}
                @else
                -
                @endif
              </td>
              <td>
                @if ($tiket->pengaduan == 'menunggu')
                <span class="badge bg-warning">Menunggu</span>
                @elseif ($tiket->pengaduan == 'proses')
                <span class="badge bg-primary">Proses</span>
                @else
                <span class="badge bg-success">Selesai</span>
                @endif
              </td>
              <td class="text-center">
                <a href="{{ url('admin/tiket/' . $tiket->id) }}" class="btn btn-info btn-sm">
                  <i class="fas fa-eye"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
<!-- /.card -->
@endsection