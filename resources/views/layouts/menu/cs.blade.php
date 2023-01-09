<!-- Dashboard -->
<li class="menu-item {{ request()->is('cs') ? 'active' : '' }}">
  <a href="{{ url('dashboard') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>
    <div data-i18n="Analytics">Dashboard</div>
  </a>
</li>
<li class="menu-header small text-uppercase">
  <span class="menu-header-text">Menu Tiket</span>
</li>
<li class="menu-item {{ request()->is('cs/tiket/menunggu') ? 'active' : '' }}">
  <a href="{{ url('cs/tiket/menunggu') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Menunggu</div>
  </a>
</li>
<li class="menu-item {{ request()->is('cs/tiket/proses') ? 'active' : '' }}">
  <a href="{{ url('cs/tiket/proses') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Proses</div>
  </a>
</li>
<li class="menu-item {{ request()->is('cs/tiket/selesai') ? 'active' : '' }}">
  <a href="{{ url('cs/tiket/selesai') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Selesai</div>
  </a>
</li>