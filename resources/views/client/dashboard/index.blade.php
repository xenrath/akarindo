@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
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
</div>
@endsection