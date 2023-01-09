@extends('back.layout.main')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <a href="{{ url('complaint') }}">Pengaduan</a> /</span> Detail Pengaduan</h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Detail Data</h5>
          @if ($complaint->status == "Menunggu")
          <span class="badge bg-label-warning me-1 float-end">Menunggu</span>
          @elseif($complaint->status == "Diproses")
          <span class="badge bg-label-primary me-1 float-end">Diproses</span>
          @else
          <span class="badge bg-label-success me-1 float-end">Selesai</span>
          @endif
        </div>
        <hr class="my-1" />
        <div class="card-body">
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Nama Client</label>
            <div class="col-sm-10">
              <p>{{ $complaint->user_id }}</p>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Produk</label>
            <div class="col-sm-10">
              <p>{{ $complaint->product_id }}</p>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <p>{{ $complaint->description }}</p>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Tanggal Dibuat</label>
            <div class="col-sm-10">
              <p>{{ $complaint->start_date }}</p>
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Tanggal Dibuat</label>
            <div class="col-sm-10">
              <p>
                @if ($complaint->end_date != null)
                {{ $complaint->end_date }}
                @else
                -
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection