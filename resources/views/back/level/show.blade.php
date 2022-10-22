@extends('back.layout.main')

@section('title', 'Detail Level')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Notifications -->
        <h5 class="card-header">Detail Level</h5>
        <div class="card-body">
          <div class="error"></div>
        </div>
        <div class="table-responsive">
          <section class="content">
            <div class="container-fluid">
              <div class="card">
                <div class="card-body">
                  <table class="table">
                    {{-- <thead>
                      <th colspan="3" class="border-top-0">
                        <h3>{{ $level->level }}</h3>
                      </th>
                    </thead> --}}
                    <tbody>

                      <tr>
                        <td class="w-25">Level</td>
                        <td>:</td>
                        <td class="text-break">{{ $level->level }}</td>
                      </tr>

                      <tr>
                        <td class="w-25">Pengerjaan</td>
                        <td>:</td>
                        <td class="text-break">{{ $level->pengerjaan }}</td>
                      </tr>

                      <tr>
                        <td class="w-25">Perbaikan</td>
                        <td>:</td>
                        <td class="text-break">{{ $level->perbaikan }}</td>
                      </tr>

                    </tbody>
                  </table>
                  <div class="row">
                  </div>
                </div>
              </div>
            </div>
            @endsection