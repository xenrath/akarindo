@extends('back.layout.main')

@section('title', 'User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Data Master /</span>
    User
  </h4>
  @if (session('status'))
  <div class="alert alert-primary alert-dismissible" user="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <div class="card-header d-flex align-items-start justify-content-between">
      <h5>Data User</h5>
      <a href="{{ url('user/create') }}" class="btn btn-sm rounded-pill btn-primary">
        <i class="tf-icons bx bx-plus"></i>
        <span class="d-none d-md-inline">Tambah User</span>
      </a>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th>Nama User</th>
              <th>Role</th>
              <th class="text-center">Opsi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($users as $key => $user)
            <tr>
              <td class="text-center">{{ $users->firstItem() + $key }}</td>
              <td>{{ $user->nama }}</td>
              <td>{{ ucfirst($user->role) }}</td>
              <td class="text-center">
                <a href="{{ url('user/' . $user->id) }}" class="btn rounded-pill btn-info btn-sm text-white">
                  <i class="tf-icons bx bx-show"></i>
                  <span class="d-none d-md-inline">Detail</span>
                </a>
                <a href="{{ url('user/' . $user->id . '/edit') }}"
                  class="btn rounded-pill btn-secondary btn-sm text-white">
                  <i class="tf-icons bx bxs-edit"></i>
                  <span class="d-none d-md-inline">Edit</span>
                </a>
                <a href="" class="btn rounded-pill btn-danger btn-sm text-white" data-bs-toggle="modal"
                  data-bs-target="#modalDelete{{ $user->id }}">
                  <i class="tf-icons bx bx-trash-alt"></i>
                  <span class="d-none d-md-inline">Hapus</span>
                </a>
                <div class="modal fade" id="modalDelete{{ $user->id }}" aria-labelledby="modalToggleLabel" tabindex="-1"
                  style="display: none" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">Yakin hapus User <strong>{{ $user->nama }}</strong>?</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Batal
                        </button>
                        <button type="button" class="btn btn-primary"
                          onclick="event.preventDefault(); document.getElementById('delete{{ $user->id }}').submit();">
                          Ya
                        </button>
                        <form action="{{ url('user/' . $user->id) }}" method="POST" id="delete{{ $user->id }}">
                          @csrf
                          @method('delete')
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- / Card Body -->
    <div class="card-footer">
      <div class="pagination float-end">
        {{ $users->appends(Request::all())->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
<!-- Modal Logout -->
@endsection