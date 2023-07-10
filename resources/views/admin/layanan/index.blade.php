@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Layanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Layanan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
      {{-- menampilkan alert berhasil --}}
      
      @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-check"></i> Success!
          </h5>
          {{ session('success') }}
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Layanan</h3>
          <div class="float-right">
            <a href="{{ url('admin/layanan/create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah
            </a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Layanan</th>
                <th>Keterangan</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($layanans as $layanan)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $layanan->layanan }}</td>
                  <td class="text-wrap w-50">{{ $layanan->keterangan }}</td>
                  <td class="text-center">
                    <a href="{{ url('admin/layanan/' . $layanan->id) }}" class="btn btn-info">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ url('admin/layanan/' . $layanan->id . '/edit') }}" class="btn btn-warning">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <button type="submit" class="btn btn-danger" data-toggle="modal"
                      data-target="#modal-hapus-{{ $layanan->id }}">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
                <div class="modal fade" id="modal-hapus-{{ $layanan->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Layanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Yakin hapus layanan <strong>{{ $layanan->layanan }}</strong>?</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <form action="{{ url('admin/layanan/' . $layanan->id) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
  <!-- /.card -->
@endsection
