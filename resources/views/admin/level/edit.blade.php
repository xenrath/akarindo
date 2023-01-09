@extends('layouts.app')

@section('title', 'Ubah Level')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('admin/level') }}">Level</a> /
    </span> Ubah Level
  </h4>
  @if (session('error'))
  <div class="alert alert-danger alert-dismissible" user="alert">
    <h5 class="text-danger">Error!</h5>
    <p>
      @foreach (session('error') as $error)
      -&nbsp; {{ $error }} <br>
      @endforeach
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Ubah Data</h5>
    </div>
    <hr class="my-1" />
    <form action="{{ url('admin/level/' . $level->id) }}" method="POST" autocomplete="off">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="nama">Level</label>
              <input type="text" class="form-control" name="nama" id="nama"
                value="{{ old('nama', $level->nama) }}" placeholder="masukan nama level" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="pengerjaan">Pengerjaan / Hari</label>
              <input type="number" class="form-control" name="pengerjaan"
                id="pengerjaan" placeholder="masukan lama pengerjaan" value="{{ old('pengerjaan', $level->pengerjaan) }}" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label class="form-label" for="perbaikan">Perbaikan / Hari</label>
              <input type="number" class="form-control" name="perbaikan"
                id="perbaikan" placeholder="masukan lama perbaikan" value="{{ old('perbaikan', $level->perbaikan) }}"
               />
            </div>
          </div>
        </div>
      </div>
      <hr class="my-1" />
      <div class="card-footer float-end">
        <button type="reset" class="btn btn-secondary me-1">
          <span class="d-none d-md-inline">Reset</span>
        </button>
        <button type="submit" class="btn btn-primary">
          <span class="d-none d-md-inline">Simpan</span>
        </button>
      </div>
    </form>
  </div>
</div>
@endsection