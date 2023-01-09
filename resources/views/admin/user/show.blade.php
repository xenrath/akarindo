@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('admin/user') }}">User</a> /
    </span> Detail User
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Detail User</h5>
          <span class="badge bg-label-primary me-1 float-end">{{ $user->role }}</span>
        </div>
        <hr class="my-1" />
        <div class="card-body">
          <div class="row">
            <div class="col-md-3 text-center mb-4">
              @if ($user->foto)
              <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="{{ $user->nama }}" class="rounded"
                width="200px">
              @else
              <img src="{{ asset('sneat/assets/img/avatars/1.png') }}" alt="{{ $user->nama }}" class="rounded"
                width="200px">
              @endif
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
                  @if ($user->telp)
                  <p>+62{{ $user->telp }}</p>
                  @else
                  <p>-</p>
                  @endif
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4">Alamat</label>
                <div class="col-sm-8">
                  @if ($user->alamat)
                  <p>{{ $user->alamat }}</p>
                  @else
                  -
                  @endif
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