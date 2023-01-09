@extends('layouts.app')

@section('title', 'Tiket')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Data Master /</span>
    Tiket
  </h4>
  @if (session('status'))
  <div class="alert alert-primary alert-dismissible" complaint="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
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
                <th class="text-center">Opsi</th>
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
                <td class="text-center">
                  <a href="{{ url('complaint/' . $m->id) }}" class="btn rounded-pill btn-secondary btn-sm text-white"
                    data-bs-toggle="modal" data-bs-target="#modalMenunggu{{ $m->id }}">
                    Proses Tiket
                  </a>
                </td>
                <div class="modal fade" id="modalMenunggu{{ $m->id }}" aria-labelledby="modalToggleLabel" tabindex="-1"
                  style="display: none" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <span class="fw-bold">{{ $m->kode }}</span>
                        <br>
                        {{ $m->user->name }} | {{ $m->product_id }}
                      </div>
                      <div class="modal-footer">
                        <a href="{{ url('status-diproses/' . $m->id) }}" class="btn btn-secondary">Proses
                          Tiket</a>
                      </div>
                    </div>
                  </div>
                </div>
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
                <th class="text-center">Opsi</th>
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
                <td class="text-center">
                  <a href="{{ url('complaint/' . $d->id) }}" class="btn rounded-pill btn-primary btn-sm text-white" data-bs-toggle="modal" data-bs-target="#modalDiproses{{ $d->id }}">
                    Selesaikan Tiket
                  </a>
                </td>
                <div class="modal fade" id="modalDiproses{{ $d->id }}" aria-labelledby="modalToggleLabel" tabindex="-1"
                  style="display: none" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <span class="fw-bold">{{ $d->kode }}</span>
                        <br>
                        {{ $d->user->name }} | {{ $d->produk_id }}
                      </div>
                      <div class="modal-footer">
                        <a href="{{ url('status-selesai/' . $d->id) }}" class="btn btn-primary">Selesaikan Tiket</a>
                      </div>
                    </div>
                  </div>
                </div>
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
                <td>{{ $loop->iteration }}</td>
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
  <!--/ Basic Bootstrap Table -->
</div>
@endsection