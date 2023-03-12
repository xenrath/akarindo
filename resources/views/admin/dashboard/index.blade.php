@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-4">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ count($menunggus) }}&nbsp;data</h3>
            <p>Pengaduan Menunggu</p>
          </div>
          <div class="icon">
            <i class="fas fa-ticket-alt"></i>
          </div>
          <a href="{{ url('admin/tiket/menunggu') }}" class="small-box-footer">Lihat <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ count($proseses) }}&nbsp;data</h3>
            <p>Pengaduan Proses</p>
          </div>
          <div class="icon">
            <i class="fas fa-ticket-alt"></i>
          </div>
          <a href="{{ url('admin/tiket/proses') }}" class="small-box-footer">Lihat <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ count($selesais) }}&nbsp;data</h3>
            <p>Pengaduan Selesai</p>
          </div>
          <div class="icon">
            <i class="fas fa-ticket-alt"></i>
          </div>
          <a href="{{ url('admin/tiket/selesai') }}" class="small-box-footer">Lihat <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Grafik Pengaduan
          </div>
          <div class="card-body">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {{ Js::from($labels) }},
      datasets: [{
        label: 'Banyak Pengaduan',
        barPercentage: 0,
        barThickness: 50,
        data: {{ Js::from($data) }},
        borderWidth: 1
      }]
    },
    options: {
      y: {
        beginAtZero: true,
        ticks: {
          precision: 0
        }
      },
    }
  });
</script>
@endsection