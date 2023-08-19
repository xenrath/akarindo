@extends('layouts.app')

@section('title', 'Chatbot')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Chatbot</h1>
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
          <h3 class="card-title">Detail Chatbot</h3>
        </div>
        <div class="card-body">
          <div class="direct-chat-messages px-4 py-3" id="scroll-bottom" style="height: 50vh;">
            <div id="chatbot">
              <div class="direct-chat-msg">
                <p>Apa yang ingin anda tanyakan?</p>
                @foreach ($chatbots as $chatbot)
                  <button class="btn btn-outline-primary mb-2"
                    onclick="getSubChatbot({{ $chatbot->id }}, '{{ $chatbot->pertanyaan }}')">{{ $chatbot->pertanyaan }}</button>
                  <br>
                @endforeach
              </div>
            </div>
            <div id="sub-chatbot">
              <div class="text-right">
                <button class="btn btn-primary mb-2" id="sub-chatbot-judul"></button>
              </div>
              <div class="direct-chat-msg">
                <p id="sub-chatbot-text"></p>
                <div id="sub-chatbot-isi"></div>
              </div>
            </div>
            <div id="jawaban">
              <div class="text-right">
                <button class="btn btn-primary mb-2" id="jawaban-judul"></button>
              </div>
              <div class="direct-chat-msg">
                <p class="border rounded p-2" id="jawaban-isi"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <a href="{{ url('client/obrolan/chatbot') }}" class="btn btn-primary">
            Tanyakan Lainnya
          </a>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <script>
    var scroll_bottom = document.getElementById('scroll-bottom');
    scroll_bottom.scrollTop = scroll_bottom.scrollHeight;

    var chatbot = document.getElementById('chatbot');
    var sub_chatbot = document.getElementById('sub-chatbot');
    sub_chatbot.style.display = 'none';
    var sub_chatbot_judul = document.getElementById('sub-chatbot-judul');
    var sub_chatbot_text = document.getElementById('sub-chatbot-text');
    var sub_chatbot_isi = document.getElementById('sub-chatbot-isi');
    var jawaban = document.getElementById('jawaban');
    jawaban.style.display = 'none';
    var jawaban_judul = document.getElementById('jawaban-judul');
    var jawaban_isi = document.getElementById('jawaban-isi');

    function getSubChatbot(id, nama) {
      chatbot.style.display = 'none';
      sub_chatbot.style.display = 'inline';
      sub_chatbot_judul.textContent = nama;
      sub_chatbot_text.innerHTML = 'Apa yang ingin anda ketahui seputar ' + nama + '?';
      $.ajax({
        url: "{{ url('client/obrolan/sub_chatbot') }}" + "/" + id,
        type: "GET",
        dataType: "json",
        success: function(data) {
          $.each(data, function(key, value) {
            $("#sub-chatbot-isi").append('<button class="btn btn-outline-primary mb-2" onclick="getJawaban(' +
              value.id + ')">' + value.pertanyaan + '</button><br>');
          });
        },
      });
    }
    
    function getJawaban(id) {
      sub_chatbot.style.display = 'none';
      $.ajax({
        url: "{{ url('client/obrolan/jawaban') }}" + "/" + id,
        type: "GET",
        dataType: "json",
        success: function(data) {
          jawaban_judul.textContent = data.pertanyaan;
          jawaban_isi.innerHTML = data.jawaban;
          jawaban.style.display = 'inline';
        },
      });
    }
  </script>
@endsection
