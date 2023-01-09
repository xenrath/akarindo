<!-- Dashboard -->
<li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
  <a href="{{ url('admin') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>
    <div data-i18n="Analytics">Dashboard</div>
  </a>
</li>
<li class="menu-header small text-uppercase">
  <span class="menu-header-text">Data Tiket</span>
</li>
<li class="menu-item {{ request()->is('admin/tiket*') ? 'active' : '' }}">
  <a href="{{ url('admin/tiket') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Tiket</div>
  </a>
</li>
<li class="menu-header small text-uppercase">
  <span class="menu-header-text">Data Master</span>
</li>
<li class="menu-item {{ request()->is('admin/user*') ? 'active' : '' }}">
  <a href="{{ url('admin/user') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-user"></i>
    <div data-i18n="Basic">User</div>
  </a>
</li>
<li class="menu-item {{ request()->is('admin/level*') ? 'active' : '' }}">
  <a href="{{ url('admin/level') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Level</div>
  </a>
</li>
<li class="menu-item {{ request()->is('admin/layanan*') ? 'active' : '' }}">
  <a href="{{ url('admin/layanan') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Layanan</div>
  </a>
</li>
<li class="menu-item {{ request()->is('admin/produk*') ? 'active' : '' }}">
  <a href="{{ url('admin/produk') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-detail"></i>
    <div data-i18n="Basic">Produk</div>
  </a>
</li>