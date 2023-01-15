@extends('layouts.app')

@section('title', 'FAQ')

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
          <li class="breadcrumb-item active">FAQ</li>
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
      <div class="col-12" id="accordion">
        @foreach ($faqs as $faq)
        <div class="card card-primary card-outline">
          <a class="d-block w-100" data-toggle="collapse" href="#faq-{{ $faq->id }}">
            <div class="card-header">
              <h4 class="card-title w-100">
                {{ $faq->pertanyaan }}
              </h4>
            </div>
          </a>
          <div id="faq-{{ $faq->id }}" class="collapse" data-parent="#accordion">
            <div class="card-body">
              {{ $faq->jawaban }}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection