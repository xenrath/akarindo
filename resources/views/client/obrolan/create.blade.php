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
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline direct-chat direct-chat-primary">
      <div class="card-header">
        <h3 class="card-title">Detail Obrolan</h3>
      </div>
      <div class="card-body">
        <div class="direct-chat-messages px-4 py-3" id="scroll-bottom" style="height: 50vh;">
          @if ($obrolan)
          @foreach ($obrolan->detail_obrolans as $detail_obrolan)
          @if ($detail_obrolan->pengirim_id == auth()->user()->id)
          <div class="direct-chat-msg right">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-right">{{ $detail_obrolan->pengirim->nama }} ({{
                ucfirst($detail_obrolan->pengirim->role) }})</span>
            </div>
            <img class="direct-chat-img" src="{{ asset('storage/uploads/' . $detail_obrolan->pengirim->foto) }}"
              alt="{{ $detail_obrolan->pengirim->nama }}">
            <div class="direct-chat-text">
              {{ $detail_obrolan->pesan }}
            </div>
          </div>
          @else
          <div class="direct-chat-msg">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-left">{{ $detail_obrolan->pengirim->nama }} ({{
                ucfirst($detail_obrolan->pengirim->role) }})</span>
            </div>
            <img class="direct-chat-img" src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}"
              alt="Message User Image">
            <div class="direct-chat-text">
              {{ $detail_obrolan->pesan }}
            </div>
          </div>
          @endif
          @endforeach
          @else
          <h4 class="text-center text-secondary p-5 mt-5">Mulai chat tanyakan apapun pada
            <strong>Customer Service</strong> <i class="fas fa-comments"></i>
          </h4>
          @endif
        </div>
      </div>
      <div class="card-footer">
        <form action="{{ url('client/obrolan') }}" method="post" autocomplete="off">
          @csrf
          <div class="input-group">
            <input type="text" name="pesan" placeholder="ketikan pesan ..." class="form-control">
            <span class="input-group-append">
              <button type="submit" class="btn btn-primary">
                Kirim <i class="fas fa-paper-plane"></i>
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
  var scroll_bottom = document.getElementById('scroll-bottom');
  scroll_bottom.scrollTop = scroll_bottom.scrollHeight;
</script>
@endsection