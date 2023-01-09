@extends('layouts.app')

@section('title', 'Tiket Menunggu')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Tiket</h4>
  @if (session('success'))
  <div class="alert alert-primary alert-dismissible" complaint="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session('error'))
  <div class="alert alert-danger alert-dismissible" complaint="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Tiket Menunggu</h5>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Kode</th>
              <th>Produk</th>
              <th>Deskripsi</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($tikets as $tiket)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $tiket->kode }}</td>
              <td>{{ $tiket->produk->nama }}</td>
              <td>{{ $tiket->pengaduan }}</td>
              <td>
                <button type="button" class="btn rounded-pill btn-primary btn-sm" data-bs-toggle="modal"
                  data-bs-target="#modalKerjakan{{ $tiket->id }}">
                  <i class="tf-icons bx bx-check"></i>
                </button>
              </td>
            </tr>
            <div class="modal fade" id="modalKerjakan{{ $tiket->id }}" aria-labelledby="modalToggleLabel" tabindex="-1"
              data-bs-backdrop="static" style="display: none" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Konfirmasi Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @if ($tiket->gambar)
                    <img src="{{ asset('storage/uploads/' . $tiket->gambar) }}" alt="{{ $tiket->produk->nama }}"
                      class="w-100 rounded mb-4">
                    @endif
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
                    <p class="text-wrap">
                      <strong>Status</strong>
                      <br>
                      <span class="badge bg-warning">{{ $tiket->status }}</span>
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Tutup
                    </button>
                    <a href="{{ url('teknisi/tiket/kerjakan/' . $tiket->id) }}" class="btn btn-primary">
                      Kerjakan
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer"></div>
  </div>
</div>
@endsection