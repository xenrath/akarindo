@extends('back.layout.main')

@section('title', 'Ubah Level')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('level') }}">Level</a> /
    </span> Ubah Level
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Ubah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ url('level/' . $level->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
              <label class="form-label" for="level">Level</label>
              <input type="text" class="form-control @error('level') is-invalid @enderror" name="level" id="level"
                placeholder="Masukan Level" value="{{ old('level', $level->level) }}" autofocus />
              @error('level')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              <div class="mb-3">
                <label class="form-label" for="pengerjaan">Pengerjaan</label>
                <input type="text" class="form-control @error('pengerjaan') is-invalid @enderror" name="pengerjaan"
                  id="pengerjaan" placeholder="Masukan pengerjaan" value="{{ old('pengerjaan', $level->pengerjaan) }}"
                  autofocus />
                @error('pengerjaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                  <label class="form-label" for="perbaikan">Perbaikan</label>
                  <input type="text" class="form-control @error('perbaikan') is-invalid @enderror" name="perbaikan"
                    id="perbaikan" placeholder="Masukan perbaikan" value="{{ old('perbaikan', $level->perbaikan) }}"
                    autofocus />
                  @error('perbaikan')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror

                  <div>
                    <div class="modal-footer">
                      <a type="button" class="btn btn-secondary" href="{{ url('level') }}">Tutup</a>
                      <button type="submit" class="btn btn-primary float-end">
                        <span class="tf-icons bx bx-send"></span>&nbsp; Kirim</a>
                      </button>
                    </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection