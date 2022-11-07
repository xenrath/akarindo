@extends('back.layout.main')

@section('title', 'Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  @if (auth()->user()->isClient())
  <h4 class="fw-bold py-3 mb-4 d-flex align-items-start justify-content-between">
    Dashboard
    <a href="{{ url('complaint/create') }}" class="btn btn-sm rounded-pill btn-primary">
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
                <td>{{ $m->code }}</td>
                <td>{{ $m->product->name }}</td>
                <td>{{ $m->description }}</td>
                <td>{{ $m->start_date }}</td>
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
                <td>{{ $d->code }}</td>
                <td>{{ $d->product->name }}</td>
                <td>{{ $d->description }}</td>
                <td>{{ $d->start_date }}</td>
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
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($selesai as $s)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $s->code }}</td>
                <td>{{ $s->product->name }}</td>
                <td>{{ $s->description }}</td>
                <td>{{ $s->start_date }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
  @if (auth()->user()->isAdmin())
  <div class="row">
    <div class="col-lg-4 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end">
          <div class="card-body">
            <h5 class="card-title text-primary">Tiket Menunggu</h5>
            <p class="mb-4">
              <span class="fw-bold">{{ count($menunggu) }}</span>&nbsp; data
            </p>            
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end">
          <div class="card-body">
            <h5 class="card-title text-primary">Tiket Diproses</h5>
            <p class="mb-4">
              <span class="fw-bold">{{ count($diproses) }}</span>&nbsp; data
            </p>            
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end">
          <div class="card-body">
            <h5 class="card-title text-primary">Tiket Selesai</h5>
            <p class="mb-4">
              <span class="fw-bold">{{ count($selesai) }}</span>&nbsp; data
            </p>            
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection