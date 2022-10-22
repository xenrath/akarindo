@extends('back.layout.main')

@section('title', 'Detail User')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Notifications -->
        <h5 class="card-header">Detail User</h5>
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
                        <h3>{{ $user->name }}</h3>
                      </th>
                    </thead> --}}
                    <tbody>

                      <tr>
                        <td class="w-25">Nama</td>
                        <td>:</td>
                        <td class="text-break">{{ $user->name}}</td>
                      </tr>
                      <tr>
                        <td class="w-25">Role</td>
                        <td>:</td>
                        <td class="text-break">{{ $user->role['role'] }}</td>
                      </tr>
                      <tr>
                        <td class="w-25">No Telpone</td>
                        <td>:</td>
                        <td class="text-break">{{ $user->phone }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="row">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="card-subtitle">Gambar</h5>
                        {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
                      </div>
                      <img src="{{ asset('storage/uploads/'.$user->gambar) }}" class="img-thumbnail" width="500px">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endsection