@extends('layouts.app')

@section('title', 'Tiket Menunggu')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4 d-flex align-items-start justify-content-between">
    Tiket Menunggu
    <a href="{{ url('tiket/create') }}" class="btn btn-sm rounded-pill btn-primary">
      <span class="tf-icons bx bx-plus"></span>&nbsp; Buat Pengaduan
    </a>
  </h4>
  <div class="nav-align-top mb-4">
    <ul class="nav nav-pills nav-fill mb-3" role="tablist">
      <li class="nav-item">
        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#menunggu"
          aria-controls="navs-justified-home" aria-selected="true">Menunggu
          {{-- <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">3</span> --}}
        </button>
      </li>
      <li class="nav-item">
        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#diproses"
          aria-controls="navs-justified-profile" aria-selected="false">Diproses
        </button>
      </li>
      <li class="nav-item">
        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#selesai"
          aria-controls="navs-justified-messages" aria-selected="false">Selesai
        </button>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade show active" id="menunggu" role="tabpanel">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Kode</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($menunggu as $m)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $m->kode }}</td>
                <td>{{ $m->produk->nama }}</td>
                <td>{{ $m->pengaduan }}</td>
                <td>{{ $m->tanggal_awal }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="diproses" role="tabpanel">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Kode</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($diproses as $d)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $d->kode }}</td>
                <td>{{ $d->produk->nama }}</td>
                <td>{{ $d->pengaduan }}</td>
                <td>{{ $d->tanggal_awal }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="selesai" role="tabpanel">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Kode</th>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Selesai</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($selesai as $s)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $s->kode }}</td>
                <td>{{ $s->produk->nama }}</td>
                <td>{{ $s->pengaduan }}</td>
                <td>{{ $s->tanggal_awal }}</td>
                <td>{{ $s->tanggal_akhir }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection