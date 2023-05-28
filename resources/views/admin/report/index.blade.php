@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Laporan</li>
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
          <h3 class="card-title">Data Laporan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form method="GET" id="form-action">
            <div class="row">
              <div class="col-md-4 mb-3">
                <select class="custom-select form-control" id="status" name="status">
                  <option value="">- Semua Status -</option>
                  <option value="menunggu" {{ Request::get('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                  <option value="proses" {{ Request::get('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                  <option value="selesai" {{ Request::get('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <label for="status">(Pilih Status)</label>
              </div>
              <div class="col-md-4 mb-3">
                <input class="form-control" id="tanggal_awal" name="tanggal_awal" type="date"
                  value="{{ Request::get('tanggal_awal') }}" max="{{ date('Y-m-d') }}" />
                <label for="tanggal_awal">(Tanggal Awal)</label>
              </div>
              <div class="col-md-4 mb-3">
                <input class="form-control" id="tanggal_akhir" name="tanggal_akhir" type="date"
                  value="{{ Request::get('tanggal_akhir') }}" max="{{ date('Y-m-d') }}" />
                <label for="tanggal_awal">(Tanggal Akhir)</label>
              </div>
            </div>
            <div class="text-right mb-3">
              <button type="button" class="btn btn-outline-primary mr-2" onclick="cari()">
                <i class="fas fa-search"></i> Cari
              </button>
              <button type="button" class="btn btn-primary" onclick="print()" target="_blank">
                <i class="fas fa-print"></i> Cetak
              </button>
            </div>
          </form>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Nama Client</th>
                <th>Produk</th>
                <th>Teknisi</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tikets as $tiket)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $tiket->client->nama }}</td>
                  <td>{{ $tiket->produk->nama }}</td>
                  <td>
                    @if ($tiket->teknisi_id != null)
                      {{ $tiket->teknisi->nama }}
                    @else
                      -
                    @endif
                  </td>
                  <td>{{ $tiket->tanggal_awal }}</td>
                  <td>
                    @if ($tiket->status == 'menunggu')
                      <span class="badge bg-warning">Menunggu</span>
                    @elseif ($tiket->status == 'proses')
                      <span class="badge bg-primary">Proses</span>
                    @else
                      <span class="badge bg-success">Selesai</span>
                    @endif
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-info" data-toggle="modal"
                      data-target="#modal-lihat-{{ $tiket->id }}">
                      <i class="fas fa-eye"></i>
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
                                class="w-100 rounded">
                            </div>
                          @endif
                          <div class="col">
                            <p class="text-wrap">
                              <strong>Client</strong>
                              <br>
                              {{ $tiket->client->nama }}
                            </p>
                            <p class="text-wrap">
                              <strong>Produk</strong>
                              <br>
                              {{ $tiket->produk->nama }}
                            </p>
                            <p class="text-wrap">
                              <strong>Pengaduan</strong>
                              <br>
                              {{ $tiket->pengaduan }}
                            </p>
                            @if ($tiket->status == 'selesai')
                              <p class="text-wrap">
                                <strong>Waktu</strong>
                                <br>
                                {{ $tiket->tanggal_awal }} - {{ $tiket->tanggal_akhir }}
                              </p>
                            @endif
                          </div>
                        </div>
                        <hr>
                        @if ($tiket->jawaban)
                          <p class="text-wrap">
                            <strong>Jawaban</strong>
                            <br>
                            {{ $tiket->jawaban }}
                          </p>
                        @endif
                        @if ($tiket->teknisi_id)
                          <p class="text-wrap">
                            <strong>Teknisi</strong>
                            <br>
                            {{ $tiket->teknisi->nama }}
                          </p>
                          <p class="text-wrap">
                            <strong>Tanggal Pengerjaan</strong>
                            <br>
                            {{ $tiket->tanggal_pengerjaan }}
                          </p>
                          @if ($tiket->status == 'selesai')
                            <p class="text-wrap">
                              <strong>Tanggal Selesai</strong>
                              <br>
                              {{ $tiket->tanggal_selesai }}
                            </p>
                            <p class="text-wrap">
                              <strong>Bukti</strong>
                              <br>
                              <img src="{{ asset('storage/uploads/' . $tiket->bukti) }}" class="rounded w-50">
                            </p>
                          @endif
                        @endif
                      </div>
                      <div class="modal-footer text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
  <script>
    var tanggalAwal = document.getElementById('tanggal_awal');
    var tanggalAkhir = document.getElementById('tanggal_akhir');
    if (tanggalAwal.value == "") {
      tanggalAkhir.readOnly = true;
    }
    tanggalAwal.addEventListener('change', function() {
      if (this.value == "") {
        tanggalAkhir.readOnly = true;
      } else {
        tanggalAkhir.readOnly = false;
      };
      tanggalAkhir.value = "";
      tanggalAkhir.setAttribute('min', this.value);
    });
    var form = document.getElementById('form-action')

    function cari() {
      form.action = "{{ url('admin/report') }}";
      form.submit();
    }

    function print() {
      form.action = "{{ url('admin/report/print') }}";
      form.submit();
    }
  </script>
@endsection
