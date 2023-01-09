@extends('layouts.app')

@section('title', 'Detail Layanan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <a href="{{ url('admin/layanan') }}">Layanan</a> /</span> Detail Layanan</h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Detail Layanan</h5>
          <span class="badge bg-label-primary me-1 float-end">{{ $layanan->level->nama }}</span>
        </div>
        <hr class="my-1" />
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 text-center mb-4">
              <img src="{{ asset('storage/uploads/' . $layanan->gambar) }}" alt="" class="rounded" width="200px">
            </div>
            <div class="col-md-9">
              <div class="row mb-2">
                <label class="col-sm-4">Layanan</label>
                <div class="col-sm-8">
                  <p>{{ $layanan->layanan }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <label class="col-sm-4">Keterangan</label>
                <div class="col-sm-8">
                  <p>{{ $layanan->keterangan }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection