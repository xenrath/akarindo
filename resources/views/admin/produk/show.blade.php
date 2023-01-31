@extends('layouts.app')

@section('title', 'Lihat Produk')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Produk</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/produk') }}">Produk</a></li>
          <li class="breadcrumb-item active">Lihat</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Lihat Produk</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table">
          <tr>
            <th>Nama Produk</th>
            <td>:</td>
            <td>{{ $produk->nama }}</td>
          </tr>
          <tr>
            <th>Client</th>
            <td>:</td>
            <td>{{ $produk->client->nama }}</td>
          </tr>
          <tr>
            <th>Layanan</th>
            <td>:</td>
            <td>{{ $produk->sublayanan->layanan->layanan }}</td>
          </tr>
          <tr>
            <th>URL</th>
            <td>:</td>
            <td>
              @if ($produk->url)
              <a href="{{ $produk->url }}">{{ $produk->url }}</a>
              @endif
            </td>
          </tr>
          <tr>
            <th>Pedoman</th>
            <td>:</td>
            <td>
              @if ($produk->pedoman)
              <a href="{{ asset('storage/uploads/' . $produk->pedoman) }}" target="_blank"
                class="btn btn-outline-primary btn-sm">
                Unduh
              </a>
              @endif
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection