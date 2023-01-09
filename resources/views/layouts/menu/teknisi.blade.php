<!-- Dashboard -->
<li class="menu-item {{ request()->is('teknisi') ? 'active' : '' }}">
  <a href="{{ url('dashboard') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>
    <div data-i18n="Analytics">Dashboard</div>
  </a>
</li>
<li class="menu-header small text-uppercase">
  <span class="menu-header-text">Menu Tiket</span>
</li>
<li class="menu-item {{ request()->is('teknisi/tiket/menunggu') ? 'active' : '' }}">
  <a href="{{ url('teknisi/tiket/menunggu') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Menunggu</div>
  </a>
</li>
<li class="menu-item {{ request()->is('teknisi/tiket/proses') ? 'active' : '' }}">
  <a href="{{ url('teknisi/tiket/proses') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Proses</div>
  </a>
</li>
<li class="menu-item {{ request()->is('teknisi/tiket/selesai') ? 'active' : '' }}">
  <a href="{{ url('teknisi/tiket/selesai') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Riwayat</div>
  </a>
</li>