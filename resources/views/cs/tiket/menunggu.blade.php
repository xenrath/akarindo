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
                @if ($tiket->teknisi_id)
                <button type="button" class="btn rounded-pill btn-info btn-sm" data-bs-toggle="modal"
                  data-bs-target="#modalLihat{{ $tiket->id }}">
                  <i class="tf-icons bx bx-show"></i>
                </button>
                @else
                <button type="button" class="btn rounded-pill btn-primary btn-sm" data-bs-toggle="modal"
                  data-bs-target="#modalKonfirmasi{{ $tiket->id }}">
                  <i class="tf-icons bx bx-check"></i>
                </button>
                @endif
              </td>
            </tr>
            <div class="modal fade" id="modalKonfirmasi{{ $tiket->id }}" aria-labelledby="modalToggleLabel"
              tabindex="-1" data-bs-backdrop="static" style="display: none" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-bs-target="#modalJawab{{ $tiket->id }}"
                      data-bs-toggle="modal" data-bs-dismiss="modal">
                      Jawab Pengaduan
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-target="#modalAlihkan{{ $tiket->id }}"
                      data-bs-toggle="modal" data-bs-dismiss="modal">
                      Alihkan ke Teknisi
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modalJawab{{ $tiket->id }}" aria-labelledby="modalToggleLabel" tabindex="-1"
              data-bs-backdrop="static" style="display: none" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Jawab Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ url('cs/tiket/jawab/' . $tiket->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="jawaban" class="form-label">Jawaban</label>
                          <textarea name="jawaban" class="form-control" id="jawaban" cols="10" rows="4"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary"
                        data-bs-target="#modalKonfirmasi{{ $tiket->id }}" data-bs-toggle="modal"
                        data-bs-dismiss="modal">
                        Kembali
                      </button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modalAlihkan{{ $tiket->id }}" aria-labelledby="modalToggleLabel" tabindex="-1"
              data-bs-backdrop="static" style="display: none" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Alihkan ke Teknisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ url('cs/tiket/alihkan/' . $tiket->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="teknisi_id" class="form-label">Teknisi</label>
                          <select class="form-select" id="teknisi_id" name="teknisi_id">
                            <option value="">- Pilih -</option>
                            @foreach ($teknisis as $teknisi)
                            <option value="{{ $teknisi->id }}">{{ $teknisi->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary"
                        data-bs-target="#modalKonfirmasi{{ $tiket->id }}" data-bs-toggle="modal"
                        data-bs-dismiss="modal">
                        Kembali
                      </button>
                      <button type="submit" class="btn btn-primary">
                        Kirim
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modalLihat{{ $tiket->id }}" aria-labelledby="modalToggleLabel" tabindex="-1"
              data-bs-backdrop="static" style="display: none" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Lihat Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      @if ($tiket->gambar)
                      <div class="col">
                        <img src="{{ asset('storage/uploads/' . $tiket->gambar) }}" alt="{{ $tiket->produk->nama }}"
                          class="w-100 rounded mb-4">
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
                        <p class="text-wrap">
                          <strong>Status</strong>
                          <br>
                          <span class="badge bg-warning">{{ $tiket->status }}</span>
                        </p>
                      </div>
                    </div>
                    <hr>
                    @if ($tiket->teknisi_id)
                    <div class="row">
                      <div class="col">
                        <p class="text-wrap">
                          <strong>Teknisi</strong>
                          <br>
                          {{ $tiket->teknisi->nama }}
                        </p>
                      </div>
                      @if ($tiket->waktu)
                      <div class="col">
                        <p class="text-wrap">
                          <strong>Teknisi</strong>
                          <br>
                          {{ $tiket->teknisi->nama }}
                        </p>
                      </div>
                      @endif
                    </div>
                    @endif
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Tutup
                    </button>
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