@extends('layouts.app')

@section('title', 'Obrolan')

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
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Obrolan CS</h3>
            </div>
            <div class="card-body text-center">
              <img src="{{ asset('storage/uploads/customer-service.jpg') }}" alt="Customer Service" class="img-fluid w-75">
              <br>
              <a href="{{ url('client/obrolan/create') }}" class="btn btn-primary">Mulai Obrolan</a>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Chatbot</h3>
            </div>
            <div class="card-body text-center">
              <img src="{{ asset('storage/uploads/chatbot.jpg') }}" alt="Chatbot" class="img-fluid w-75">
              <br>
              <a href="{{ url('client/obrolan/chatbot') }}" class="btn btn-secondary">Tanyakan Sesuatu</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
