<li class="nav-header">Dashboard</li>
<li class="nav-item">
  <a href="{{ url('client') }}" class="nav-link {{ request()->is('client') ? 'active' : '' }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-header">Obrolan</li>
<li class="nav-item">
  <a href="{{ url('client/obrolan/create') }}"
    class="nav-link {{ request()->is('client/obrolan/create') ? 'active' : '' }}">
    <i class="nav-icon fas fa-comments"></i>
    <p>
      Obrolan
    </p>
  </a>
</li>
<li class="nav-header">Pengaduan</li>
<li class="nav-item">
  <a href="{{ url('client/tiket/create') }}"
    class="nav-link {{ request()->is('client/tiket/create') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clipboard"></i>
    <p>
      Buat Pengaduan
    </p>
  </a>
</li>
@php
$menunggus = \App\Models\Tiket::where([
['client_id', auth()->user()->id],
['status', 'menunggu'],
['is_read_client', false]
])->get();
$proseses = \App\Models\Tiket::where([
['client_id', auth()->user()->id],
['status', 'proses'],
['is_read_client', false]
])->get();
$selesais = \App\Models\Tiket::where([
['client_id', auth()->user()->id],
['status', 'selesai'],
['is_read_client', false]
])->get();
@endphp
<li class="nav-header">Pengaduan</li>
<li class="nav-item">
  <a href="{{ url('client/tiket/menunggu') }}"
    class="nav-link {{ request()->is('client/tiket/menunggu') ? 'active' : '' }}">
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
  <a href="{{ url('client/tiket/proses') }}"
    class="nav-link {{ request()->is('client/tiket/proses') ? 'active' : '' }}">
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
  <a href="{{ url('client/tiket/selesai') }}"
    class="nav-link {{ request()->is('client/tiket/selesai') ? 'active' : '' }}">
    <i class="nav-icon fas fa-ticket-alt"></i>
    <p>
      Selesai
      @if (count($selesais) > 0)
      <span class="right badge badge-info">{{ count($selesais) }}</span>
      @endif
    </p>
  </a>
</li>
<li class="nav-header">Lainnya</li>
<li class="nav-item">
  <a href="{{ url('client/faq') }}" class="nav-link {{ request()->is('client/faq*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-question-circle"></i>
    <p>
      FAQ
    </p>
  </a>
</li>
<li class="nav-header">Profile</li>
<li class="nav-item">
  <a href="{{ url('profile') }}" class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
    <i class="fas fa-user-edit"></i>
    <p>
      Update Profile
    </p>
  </a>
</li>