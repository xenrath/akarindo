@extends('back.layout.main')

@section('title', 'Tambah Level')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">
      <a href="{{ url('level') }}">Level</a> /
    </span> Tambah Level
  </h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ url('level') }}" method="post">
            @csrf

            <div>
              <label class="form-label" for="level">Level</label>
              <input type="text" class="form-control" name="level" id="level" placeholder="Masukan Level" required />
            </div>

            <div>
              <label class="form-label" for="pengerjaan">Pengerjaan</label>
              <input type="text" class="form-control" name="pengerjaan" id="pengerjaan" placeholder="Masukan Pengerjaan"
                required />
            </div>

            <div>
              <label class="form-label" for="perbaikan">Perbaikan</label>
              <input type="text" class="form-control" name="perbaikan" id="perbaikan" placeholder="Masukan Perbaikan"
                required />
            </div>

            <div class="modal-footer">
              <a type="button" class="btn btn-secondary" href="{{ url('pengerjaan') }}">Tutup</a>
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