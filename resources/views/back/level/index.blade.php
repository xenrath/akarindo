@extends('back.layout.main')

@section('title', 'Level')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Level</h4>
  @if (session('status'))
  <div class="alert alert-primary alert-dismissible" level="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header d-flex align-items-start justify-content-between">
      Data Level
      <a href="{{ url('level/create') }}" class="btn btn-sm rounded-pill btn-primary">
        <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Level</a>
    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Level</th>
            <th>Pengerjaan</th>
            <th>Perbaikan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($levels as $level)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $level->level}}</td>
            <td>{{ $level->pengerjaan }}</td>
            <td>{{ $level->perbaikan }}</td>
            <td>
              <form method="post" action="{{ route('user.destroy', $level->id) }}"
                onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?')">
                @csrf
                @method('delete')
                <a href="{{ route('level.show', $level->id)}}" class="btn rounded-pill btn-info btn-sm text-white">
                  <span class="tf-icons bx bx-show"></span>&nbsp; Detail
                </a>
                <a href="{{ url('level/' . $level->id . '/edit') }}"
                  class="btn rounded-pill btn-warning btn-sm text-white">
                  <span class="tf-icons bx bxs-edit"></span>&nbsp; Ubah
                </a>
                <button type="submit" class="btn rounded-pill btn-danger btn-sm text-white">
                  <span class="tf-icons bx bx-trash-alt"></span>&nbsp; Hapus
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $levels->appends(Request::all())->links('pagination::bootstrap-4') }}
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
@endsection