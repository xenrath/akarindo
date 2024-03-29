@extends('layouts.app')

@section('title', 'Tiket Menunggu')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Obrolan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Obrolan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (count($obrolans) > 0)
      <div class="row">
        @foreach ($obrolans as $obrolan)
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card d-flex flex-fill" style="height: 300px;">
              <div class="card-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <img src="{{ asset('storage/uploads/' . $obrolan->client->foto) }}" alt="user-avatar"
                      class="img-circle img-fluid">
                  </div>
                  <div class="col-8 py-3">
                    <h2 class="lead">
                      <b>{{ $obrolan->client->nama }}</b>
                    </h2>
                    <p class="text-muted text-sm">{{ $obrolan->client->alamat }}</p>
                  </div>
                </div>
                <hr>
                <p>
                  {{ $obrolan->detail_obrolans->last()->pesan }}
                </p>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="{{ url('cs/obrolan/' . $obrolan->id) }}" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"></i> Lihat Obrolan
                    @php
                      $detail_obrolans = \App\Models\DetailObrolan::where([['obrolan_id', $obrolan->id], ['pengirim_id', '!=', auth()->user()->id], ['is_read', false]])->get();
                    @endphp
                    @if (count($detail_obrolans) > 0)
                      <span class="right badge badge-primary">{{ count($detail_obrolans) }}</span>
                    @endif
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      @else
      <div class="card">
        <div class="card-body">
          <p class="text-center p-0">- Belum ada obrolan yang dibuat -</p>
        </div>
      </div>
      @endif
      <!-- /.container-fluid -->
    </div>
  </section>
  <!-- /.content -->
@endsection
