<!-- Dashboard -->
<li class="menu-item {{ request()->is('client') ? 'active' : '' }}">
  <a href="{{ url('client') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>
    <div data-i18n="Analytics">Dashboard</div>
  </a>
</li>
<li class="menu-header small text-uppercase">
  <span class="menu-header-text">Menu Pengaduan</span>
</li>
<li class="menu-item {{ request()->is('client/tiket/create') ? 'active' : '' }}">
  <a href="{{ url('client/tiket/create') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Buat Pengaduan</div>
  </a>
</li>
<li class="menu-header small text-uppercase">
  <span class="menu-header-text">Menu Tiket</span>
</li>
<li class="menu-item {{ request()->is('client/tiket/menunggu') ? 'active' : '' }}">
  <a href="{{ url('client/tiket/menunggu') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Menunggu</div>
  </a>
</li>
<li class="menu-item {{ request()->is('client/tiket/proses') ? 'active' : '' }}">
  <a href="{{ url('client/tiket/proses') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Proses</div>
  </a>
</li>
<li class="menu-item {{ request()->is('client/tiket/riwayat') ? 'active' : '' }}">
  <a href="{{ url('client/tiket/riwayat') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Riwayat</div>
  </a>
</li>