@extends('layouts.app')

@section('title', 'Profile Saya')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Profile Saya</h4>
  @if (session('status'))
  <div class="alert alert-primary alert-dismissible" produk="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <form action="{{ url('profile/update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card mb-4">
      <h5 class="card-header">Detail Profile</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          @if (auth()->user()->foto == "")
          <img src="{{ asset('sneat/assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded"
            height="100" width="100" id="uploadedAvatar" />
          @else
          <img src="{{ asset('storage/uploads/' . auth()->user()->foto) }}" alt="user-avatar" class="d-block rounded"
            height="100" width="100" id="uploadedAvatar" />
          @endif
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
              <span class="d-none d-sm-block">Upload foto baru</span>
              <i class="bx bx-upload d-block d-sm-none"></i>
              <input type="file" id="upload" name="foto" class="account-file-input" hidden
                accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Reset</span>
            </button>
            <p class="text-muted mb-0">Masukan gambar dengan format jpg atau png.</p>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="nama" class="form-label">Nama</label>
            <input class="form-control" type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}"
              autofocus required />
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
              required />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label" for="telp">No. Telepon</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text">+62</span>
              <input type="text" id="telp" name="telp" class="form-control" value="{{ old('telp', $user->telp) }}"
                required />
            </div>
            @error('telp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3 col-md-6">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}"
              required />
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Ulangi Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-footer text-end">
        <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <!-- /Account -->
    </div>
  </form>
</div>
@endsection