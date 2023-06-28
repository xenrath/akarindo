@extends('layouts.app')

@section('title', 'Pengaduan Menunggu')

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
            <li class="breadcrumb-item active">Pengaduan Menunggu</li>
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
          <h3 class="card-title">Data Pengaduan Menunggu</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Kode</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>

              {{-- membuat perulangan dari data tiket menunggu --}}

              @foreach ($tikets as $tiket)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $tiket->kode }}</td>
                  <td>{{ $tiket->produk->nama }}</td>
                  <td class="text-wrap w-50">{{ $tiket->pengaduan }}</td>
                  <td style="width: 90px">
                    <button type="button" class="btn btn-info" data-toggle="modal"
                      data-target="#modal-lihat-{{ $tiket->id }}">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#modal-hapus-{{ $tiket->id }}">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
                <div class="modal fade" id="modal-lihat-{{ $tiket->id }}">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Lihat Pengaduan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          @if ($tiket->gambar)
                            <div class="col">
                              <img src="{{ asset('storage/uploads/' . $tiket->gambar) }}" alt="{{ $tiket->kode }}"
                                class="w-100 rounded border">
                            </div>
                          @endif
                          <div class="col">
                            <p class="text-wrap">
                              <strong>Produk</strong>
                              <br>
                              {{ $tiket->produk->nama }}
                            </p>
                            <p class="text-wrap">
                              <strong>Deskripsi</strong>
                              <br>
                              {{ $tiket->pengaduan }}
                            </p>
                            <p class="text-wrap">
                              <strong>Tanggal Dibuat</strong>
                              <br>
                              {{ $tiket->tanggal_awal }}
                            </p>
                          </div>
                        </div>
                        @if ($tiket->teknisi_id)
                          <hr>
                          <p class="text-wrap">
                            <strong>Keterangan</strong>
                            <br>
                            Pengaduan <strong>{{ $tiket->produk->nama }}</strong> sudah dialihkan ke Teknisi. Harap
                            menunggu
                            konfirmasi pengerjaan dari Teknisi.
                          </p>
                          <p class="text-wrap">
                            <strong>Teknisi</strong>
                            <br>
                            {{ $tiket->teknisi->nama }}
                          </p>
                        @endif
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="modal-hapus-{{ $tiket->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Pengaduan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Yakin hapus tiket <strong>{{ $tiket->produk->nama }}</strong>?</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <form action="{{ url('client/tiket/' . $tiket->id) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
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
