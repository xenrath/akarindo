@extends('layouts.app')

@section('title', 'Tambah FAQ')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">FAQ</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/faq') }}">FAQ</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5>
        <i class="icon fas fa-ban"></i> Error!
      </h5>
      @foreach (session('error') as $error)
      - {{ $error }} <br>
      @endforeach
    </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah FAQ</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ url('admin/faq') }}" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Masukan pertanyaan" value="{{ old('pertanyaan') }}">
          </div>
          <div class="form-group">
            <label for="jawaban">Jawaban</label>
            <textarea class="form-control" id="jawaban" name="jawaban" rows="3"
              placeholder="Masukan jawaban">{{ old('jawaban') }}</textarea>
          </div>
        </div>
        <div class="card-footer text-right">
          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection