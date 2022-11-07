@extends('back.layout.main')

@section('title', 'Role')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Data Master /</span>
    Role
  </h4>
  @if (session('status'))
  <div class="alert alert-primary alert-dismissible" role="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header d-flex align-items-start justify-content-between">
      Data Role
      <a href="{{ url('role/create') }}" class="btn btn-sm rounded-pill btn-primary">
        <span class="d-none d-sm-block">Tambah User</span>
        <i class="tf-icons bx bx-plus d-block d-sm-none"></i>
      </a>
    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">No.</th>
            <th>Role</th>
            <th class="text-center">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
          <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $role->role }}</td>
            <td class="text-center">
              <form method="post" action="{{ url('role/' . $role->id) }}">
                @csrf
                @method('delete')
                <a href="{{ url('role/' . $role->id . '/edit') }}"
                  class="btn rounded-pill btn-secondary btn-sm text-white">
                  <span class="d-none d-sm-block">Edit</span>
                  <i class="tf-icons bx bxs-edit d-block d-sm-none"></i>
                </a>
                <button type="submit" class="btn rounded-pill btn-danger btn-sm text-white">
                  <span class="d-none d-sm-block">Hapus</span>
                  <i class="tf-icons bx bx-trash-alt d-block d-sm-none"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
@endsection