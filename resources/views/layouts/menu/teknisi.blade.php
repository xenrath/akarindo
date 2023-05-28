<li class="nav-header">Dashboard</li>
<li class="nav-item">
  <a href="{{ url('teknisi') }}" class="nav-link {{ request()->is('teknisi') ? 'active' : '' }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      Dashboard
      {{-- <span class="right badge badge-danger">New</span> --}}
    </p>
  </a>
</li>
@php
$menunggus = \App\Models\Tiket::where([
['teknisi_id', auth()->user()->id],
['status', 'menunggu'],
['is_read_teknisi', false]
])->get();
$proseses = \App\Models\Tiket::where([
['teknisi_id', auth()->user()->id],
['status', 'proses'],
['is_read_teknisi', false]
])->get();
$selesais = \App\Models\Tiket::where([
['teknisi_id', auth()->user()->id],
['status', 'selesai'],
['is_read_teknisi', false]
])->get();
@endphp
<li class="nav-header">Pengaduan</li>
<li class="nav-item">
  <a href="{{ url('teknisi/tiket/menunggu') }}"
    class="nav-link {{ request()->is('teknisi/tiket/menunggu') ? 'active' : '' }}">
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
  <a href="{{ url('teknisi/tiket/proses') }}"
    class="nav-link {{ request()->is('teknisi/tiket/proses') || request()->is('teknisi/tiket/obrolan*')  ? 'active' : '' }}">
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
  <a href="{{ url('teknisi/tiket/selesai') }}"
    class="nav-link {{ request()->is('teknisi/tiket/selesai') ? 'active' : '' }}">
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