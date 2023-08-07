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

        {{-- menampilkan detail data tiket --}}

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

      {{-- menampilkan alert gagal --}}

      @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"></i> Error!
          </h5>
          <ul>
            <li>{{ session('error') }}</li>
          </ul>
        </div>
      @endif

      <div class="card card-primary card-outline direct-chat direct-chat-primary">
        <div class="card-header">
          <h3 class="card-title">Detail Obrolan</h3>
        </div>
        <div class="card-body">
          <div class="direct-chat-messages px-4 py-3" id="scroll-bottom" style="height: 35vh;">

            {{-- menampilkan obrolan --}}

            @if ($obrolan)

              {{-- membuat perulangan dari data detail obrolan --}}

              @foreach ($obrolan->detail_obrolans as $detail_obrolan)
                @php
                  $pesan = $detail_obrolan->pesan;
                  $gambar = $detail_obrolan->gambar;
                @endphp
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
                      @if ($gambar)
                        <img src="{{ asset('storage/uploads/' . $gambar) }}" alt="" style="width: 400px"
                          class="rounded my-1">
                      @endif
                      @if ($gambar && $pesan)
                        <br>
                      @endif
                      @if ($pesan)
                        {{ $pesan }}
                      @endif
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
                      @if ($gambar)
                        <img src="{{ asset('storage/uploads/' . $gambar) }}" alt="" style="width: 400px"
                          class="rounded my-1">
                      @endif
                      @if ($gambar && $pesan)
                        <br>
                      @endif
                      @if ($pesan)
                        {{ $pesan }}
                      @endif
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
        <div class="card-footer text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-pesan">
            Buat Pesan
          </button>
          <div class="modal fade" id="modal-pesan">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Buat Pesan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ url('client/tiket/buat_obrolan') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <input type="hidden" name="tiket_id" value="{{ $tiket->id }}" class="form-control">
                    <div class="form-group text-left">
                      <label class="form-label" for="pesan">Pesan</label>
                      <textarea class="form-control" name="pesan" id="pesan"></textarea>
                    </div>
                    <div class="form-group text-left">
                      <label class="form-label" for="gambar">Gambar</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar"
                          accept="image/*">
                        <label class="custom-file-label" for="gambar">Pilih Foto</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                      Kirim <i class="fas fa-paper-plane"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    var scroll_bottom = document.getElementById('scroll-bottom');
    scroll_bottom.scrollTop = scroll_bottom.scrollHeight;
  </script>
@endsection
