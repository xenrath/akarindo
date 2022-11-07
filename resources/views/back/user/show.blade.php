@extends('back.layout.main')

@section('title', 'Detail User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <a href="{{ url('user') }}">User</a> /</span> Detail User</h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Detail User</h5>
          <span class="badge bg-label-primary me-1 float-end">Client</span>
        </div>
        <hr class="my-1" />
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 text-center mb-4">
              <img src="{{ asset('sneat/assets/img/avatars/1.png') }}" alt="" class="rounded" width="200px">
            </div>
            <div class="col-md-9">
              <div class="row mb-2">
                <label class="col-sm-4">Kode</label>
                <div class="col-sm-8">
                  <p>{{ $user->kode }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <label class="col-sm-4">Nama User</label>
                <div class="col-sm-8">
                  <p>{{ $user->nama }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <label class="col-sm-4">Email</label>
                <div class="col-sm-8">
                  <p>{{ $user->email }}</p>
                </div>
              </div>
              <div class="row mb-2">
                <label class="col-sm-4">No. Telepon</label>
                <div class="col-sm-8">
                  <p>+62{{ $user->telp }}</p>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4">Alamat</label>
                <div class="col-sm-8">
                  <p>{{ $user->alamat }}</p>
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