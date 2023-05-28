@extends('layouts.app')

@section('title', 'Pengaduan Obrolan')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengaduan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Pengaduan Obrolan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card collapsed-card">
        <div class="card-header">
          <h3 class="card-title">Detail Pengaduan</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            @if ($tiket->gambar)
              <div class="col-md-4 mb-3">
                <img src="{{ asset('storage/uploads/' . $tiket->gambar) }}" alt="{{ $tiket->kode }}"
                  class="w-100 rounded border shadow">
              </div>
            @endif
            <div class="col">
              <p class="text-wrap">
                <strong>Produk</strong>
                <br>
                {{ $tiket->produk->nama }}
              </p>
              <p class="text-wrap">
                <strong>Deskripsi</strong>
                <br>
                {{ $tiket->pengaduan }}
              </p>
              <p class="text-wrap">
                <strong>Tanggal Dibuat</strong>
                <br>
                {{ $tiket->tanggal_awal }}
              </p>
              <p class="text-wrap">
                <strong>Tanggal Pengerjaan</strong>
                <br>
                {{ $tiket->tanggal_pengerjaan }}
              </p>
              <p class="text-wrap">
                <strong>Teknisi</strong>
                <br>
                {{ $tiket->teknisi->nama }}
              </p>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"></i> Error!
          </h5>
          <ul>
            @foreach (session('error') as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Obrolan</h3>
        </div>
        <div class="card-body">
          <div class="direct-chat-messages p-0" id="scroll-bottom" style="height: 35vh;">
            @if ($obrolan)
              @foreach ($obrolan->detail_obrolans as $detail_obrolan)
                @if ($detail_obrolan->pengirim_id == auth()->user()->id)
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">{{ $detail_obrolan->pengirim->nama }}
                        ({{ ucfirst($detail_obrolan->pengirim->role) }})
                      </span>
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
                      <span class="direct-chat-name float-left">{{ $detail_obrolan->pengirim->nama }}
                        ({{ ucfirst($detail_obrolan->pengirim->role) }})</span>
                    </div>
                    <img class="direct-chat-img" src="{{ asset('storage/uploads/' . $detail_obrolan->pengirim->foto) }}"
                      alt="{{ $detail_obrolan->pengirim->nama }}">
                    <div class="direct-chat-text">
                      {{ $detail_obrolan->pesan }}
                    </div>
                  </div>
                @endif
              @endforeach
            @else
              <h4 class="text-center text-secondary p-5 mt-5">Mulai chat dan tanyakan apapun pada
                <strong>Teknisi</strong> <i class="fas fa-comments"></i>
              </h4>
            @endif
          </div>
        </div>
        <div class="card-footer">
          <form action="{{ url('client/tiket/buat_obrolan') }}" method="post" autocomplete="off">
            @csrf
            <input type="hidden" name="tiket_id" value="{{ $tiket->id }}" class="form-control">
            <div class="input-group">
              <input type="text" name="pesan" placeholder="ketikan pesan ..." class="form-control" required>
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
  </section>
  <div class="modal fade" id="modal-komentar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Buat Komentar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('client/tiket/buat_komentar') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <input type="hidden" class="form-control" name="tiket_id" value="{{ $tiket->id }}">
            <div class="form-group mb-3">
              <label class="form-label" for="komentar">Komentar</label>
              <textarea class="form-control" id="komentar" name="komentar" style="height: 160px;">{{ old('komentar') }}</textarea>
            </div>
            <div class="form-group">
              <label class="form-label" for="gambar">Gambar <small>(opsional)</small></label>
              <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.card -->
  <script>
    var scroll_bottom = document.getElementById('scroll-bottom');
    scroll_bottom.scrollTop = scroll_bottom.scrollHeight;
  </script>
@endsection
