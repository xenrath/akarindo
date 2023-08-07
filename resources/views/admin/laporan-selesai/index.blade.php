@extends('layouts.app')

@section('title', 'Laporan Teknisi')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Teknisi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Laporan Teknisi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      {{-- menampilkan alert berhasil --}}

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
          <h3 class="card-title">Data Laporan Teknisi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 20px">No</th>
                <th>Nama Teknisi</th>
                <th>Keahlian</th>
                <th>Pengaduan Menunggu</th>
                <th class="text-center" style="width: 40px">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teknisis as $teknisi)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $teknisi->nama }}</td>
                  <td>{{ $teknisi->layanan->layanan }}</td>
                  @php
                    $tikets = \App\Models\Tiket::where([['teknisi_id', $teknisi->id], ['status', 'selesai']])->get();
                  @endphp
                  <td>
                    {{ count($tikets) }} Data
                  </td>
                  <td class="text-center">
                    <a href="{{ url('admin/laporan-selesai/' . $teknisi->id) }}" class="btn btn-info">
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
