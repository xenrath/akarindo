@extends('layouts.app')

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
      <a href="{{ url('admin/level/create') }}" class="btn btn-sm rounded-pill btn-primary">
        <i class="tf-icons bx bx-plus"></i>
      </a>
    </h5>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th>Nama Level</th>
              <th>Pengerjaan</th>
              <th>Perbaikan</th>
              <th class="text-center">Opsi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($levels as $key => $level)
            <tr>
              <td class="text-center">{{ $levels->firstItem() + $key }}</td>
              <td>{{ ucfirst($level->nama) }}</td>
              <td>{{ $level->pengerjaan }} Hari</td>
              <td>{{ $level->perbaikan }} Hari</td>
              <td class="text-center">
                <a href="{{ url('admin/level/' . $level->id . '/edit') }}"
                  class="btn rounded-pill btn-secondary btn-sm text-white">
                  <i class="tf-icons bx bxs-edit"></i>
                </a>
                <a href="" class="btn rounded-pill btn-danger btn-sm text-white" data-bs-toggle="modal"
                  data-bs-target="#modalDelete{{ $level->id }}">
                  <i class="tf-icons bx bx-trash-alt"></i>
                </a>
                <div class="modal fade" id="modalDelete{{ $level->id }}" aria-labelledby="modalToggleLabel"
                  tabindex="-1" style="display: none" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">Yakin hapus level <strong>{{ $level->nama }}</strong>?</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Batal
                        </button>
                        <button type="button" class="btn btn-primary"
                          onclick="event.preventDefault(); document.getElementById('delete{{ $level->id }}').submit();">
                          Ya
                        </button>
                        <form action="{{ url('admin/level/' . $level->id) }}" method="POST" id="delete{{ $level->id }}">
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
    <div class="card-footer">
      <div class="pagination float-end">
        {{ $levels->appends(Request::all())->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
@endsection