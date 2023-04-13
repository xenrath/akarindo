<li class="nav-header">Dashboard</li>
<li class="nav-item">
  <a href="{{ url('cs') }}" class="nav-link {{ request()->is('cs') ? 'active' : '' }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      Dashboard
      {{-- <span class="right badge badge-danger">New</span> --}}
    </p>
  </a>
</li>
{{-- <li class="nav-header">Obrolan</li>
<li class="nav-item">
  <a href="{{ url('cs/obrolan') }}" class="nav-link {{ request()->is('cs/obrolan') ? 'active' : '' }}">
    <i class="nav-icon fas fa-comments"></i>
    <p>
      Obrolan
    </p>
  </a>
</li> --}}
@php
$menunggus = \App\Models\Tiket::where('status', 'menunggu')->get();
$proseses = \App\Models\Tiket::where('status', 'proses')->get();
$selesais = \App\Models\Tiket::where('status', 'selesai')->get();
@endphp
<li class="nav-header">Pengaduan</li>
<li class="nav-item">
  <a href="{{ url('cs/tiket/menunggu') }}" class="nav-link {{ request()->is('cs/tiket/menunggu') ? 'active' : '' }}">
    <i class="nav-icon fas fa-ticket-alt"></i>
    <p>
      Menunggu
      @if (count($menunggus) > 0)
      <span class="right badge badge-info">{{ count($menunggus) }}</span>
      @endif
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('cs/tiket/proses') }}" class="nav-link {{ request()->is('cs/tiket/proses') ? 'active' : '' }}">
    <i class="nav-icon fas fa-ticket-alt"></i>
    <p>
      Proses
      @if (count($proseses) > 0)
      <span class="right badge badge-info">{{ count($proseses) }}</span>
      @endif
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('cs/tiket/selesai') }}" class="nav-link {{ request()->is('cs/tiket/selesai') ? 'active' : '' }}">
    <i class="nav-icon fas fa-ticket-alt"></i>
    <p>
      Selesai
      @if (count($selesais) > 0)
      <span class="right badge badge-info">{{ count($selesais) }}</span>
      @endif
    </p>
  </a>
</li>
<li class="nav-header">Profile</li>
<li class="nav-item">
  <a href="{{ url('profile') }}" class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-edit"></i>
    <p>Update Profile</p>
  </a>
</li>