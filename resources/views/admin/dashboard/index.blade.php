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
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Grafik Pengaduan
          </div>
          <div class="card-body">
            <form action="{{ url('admin') }}" method="get" id="form-submit">
              <input type="hidden" class="form-control" name="filter" id="filter">
            </form>
            <div class="text-right mb-3">
              <div class="btn-group">
                <button type="button" class="btn btn-default">{{ Request::get('filter') == "" ? "1" :
                  Request::get('filter') }} Hari</button>
                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                </button>
                <div class="dropdown-menu" role="menu">
                  <button class="dropdown-item" onclick="get_filter('1')">1 Hari</button>
                  <button class="dropdown-item" onclick="get_filter('7')">7 Hari</button>
                  <button class="dropdown-item" onclick="get_filter('30')">30 Hari</button>
                </div>
              </div>
            </div>
            @if (array_sum($data) > 0)
            <canvas id="myChart"></canvas>
            @else
            <div class="border rounded p-5">
              <p class="text-center">- Tidak ada data -</p>
            </div>
            @endif
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
  var filter = document.getElementById('filter');
  var form_submit = document.getElementById('form-submit');
  
  function get_filter(waktu) {
    filter.value = waktu;
    form_submit.submit();
  }

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