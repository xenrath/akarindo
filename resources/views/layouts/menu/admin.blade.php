<li class="nav-header">Dashboard</li>
<li class="nav-item">
  <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      Dashboard
      {{-- <span class="right badge badge-danger">New</span> --}}
    </p>
  </a>
</li>
<li class="nav-header">Layanan</li>
<li class="nav-item {{ request()->is('admin/layanan*') || request()->is('admin/sublayanan*') ? 'menu-open' : '' }}">
  <a href="#"
    class="nav-link {{ request()->is('admin/layanan*') || request()->is('admin/sublayanan*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clone"></i>
    <p>
      Data Layanan
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('admin/layanan') }}" class="nav-link {{ request()->is('admin/layanan*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Layanan</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/sublayanan') }}" class="nav-link {{ request()->is('admin/sublayanan*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Sub Layanan</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-header">Master</li>
<li class="nav-item">
  <a href="{{ url('admin/user') }}" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Data User
      {{-- <span class="right badge badge-danger">New</span> --}}
    </p>
  </a>
</li>
{{-- <li class="nav-item">
  <a href="{{ url('admin/level') }}" class="nav-link {{ request()->is('admin/level*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-sort-amount-down"></i>
    <p>
      Data Level
    </p>
  </a>
</li> --}}
<li class="nav-item">
  <a href="{{ url('admin/produk') }}" class="nav-link {{ request()->is('admin/produk*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-grip-horizontal"></i>
    <p>
      Data Produk
      {{-- <span class="right badge badge-danger">New</span> --}}
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('admin/faq') }}" class="nav-link {{ request()->is('admin/faq*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-question-circle"></i>
    <p>
      Data FAQ
    </p>
  </a>
</li>
<li class="nav-header">Laporan</li>
<li class="nav-item {{ request()->is('admin/laporan-pengaduan*') || request()->is('admin/laporan-selesai*') ? 'menu-open' : '' }}">
  <a href="#"
    class="nav-link {{ request()->is('admin/laporan-pengaduan*') || request()->is('admin/laporan-selesai*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clipboard-list"></i>
    <p>
      Data Laporan
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('admin/laporan-selesai') }}"
        class="nav-link {{ request()->is('admin/laporan-selesai*') ? 'active' : '' }}">
        <i class="nav-icon far fa-circle"></i>
        <p>Laporan Selesai</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/laporan-pengaduan') }}"
        class="nav-link {{ request()->is('admin/laporan-pengaduan*') ? 'active' : '' }}">
        <i class="nav-icon far fa-circle"></i>
        <p>Data Pengaduan</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-header">Profile</li>
<li class="nav-item">
  <a href="{{ url('profile') }}" class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-edit"></i>
    <p>Update Profile</p>
  </a>
</li>
