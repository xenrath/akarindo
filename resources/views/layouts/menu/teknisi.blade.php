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
['status', 'menunggu']
])->get();
$proseses = \App\Models\Tiket::where([
['teknisi_id', auth()->user()->id],
['status', 'proses']
])->get();
$selesais = \App\Models\Tiket::where([
['teknisi_id', auth()->user()->id],
['status', 'selesai']
])->get();
@endphp
<li class="nav-header">Tiket</li>
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
    class="nav-link {{ request()->is('teknisi/tiket/proses') ? 'active' : '' }}">
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