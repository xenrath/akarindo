<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title')</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('sneat/assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{ asset('sneat/assets/vendor/js/helpers.js') }}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('sneat/assets/js/config.js') }}"></script>

  <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css " />
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="{{ asset('storage/uploads/logo.png') }}" alt="" width="40">
            </span>
            <h4 class="fw-bolder ms-2 my-auto">EHR Tiketing</h4>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          @if (auth()->user()->isAdmin())
          @include('layouts.menu.admin')
          @endif
          @if (auth()->user()->isCS())
          @include('layouts.menu.cs')
          @endif
          @if (auth()->user()->isTeknisi())
          @include('layouts.menu.teknisi')
          @endif
          @if (auth()->user()->isClient())
          @include('layouts.menu.client')
          @endif
        </ul>
      </aside>
      <!-- / Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
              <b>Selamat Datang di EHR Tiketing 👋</b>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar">
                    @if (auth()->user()->foto)
                    <img src="{{ asset('storage/uploads/' . auth()->user()->foto) }}" alt
                      class="w-px-40 h-px-40 rounded-circle" />
                    @else
                    <img src="{{ asset('storage/uploads/image-placeholder.jpg') }}" alt
                      class="w-px-40 h-px-40 rounded-circle" />
                    @endif
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar">
                            @if (auth()->user()->foto)
                            <img src="{{ asset('storage/uploads/' . auth()->user()->foto) }}" alt
                              class="w-px-40 h-px-40 rounded-circle" />
                            @else
                            <img src="{{ asset('storage/uploads/image-placeholder.jpg') }}" alt
                              class="w-px-40 h-px-40 rounded-circle" />
                            @endif
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">{{ auth()->user()->nama }}</span>
                          <small class="text-muted">{{ ucfirst(auth()->user()->role) }}</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ url('profile') }}">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">Profil Saya</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalLogout">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">

          <!-- Content -->
          @yield('content')
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                Copyright © 2021. All right reserved.
                <a href="https://pse.kominfo.go.id/tdpse-detail/3010" target="_blank" class="footer-link fw-bolder">EHR System Terdaftar Di Kominfo.</a> No. 001922.01/DJAI.PSE/01/2022
                <script>
                  document.write(new Date().getFullYear());
                </script>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Modal Logout -->
  <div class="modal fade" id="modalLogout" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalToggleLabel">Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Yakin keluar aplikasi?</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Batal
          </button>
          <button type="button" class="btn btn-primary" onclick="event.preventDefault();
          document.getElementById('logout').submit();">
            Ya
          </button>
          <form action="{{ route('logout') }}" method="POST" id="logout">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('sneat/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('sneat/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

  <script src="{{ asset('sneat/assets/vendor/js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('sneat/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('sneat/assets/js/main.js') }}"></script>

  <!-- Page JS -->
  <script src="{{ asset('sneat/assets/js/dashboards-analytics.js') }}"></script>
  <script src="{{ asset('sneat/assets/js/pages-account-settings-account.js') }}"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script src="assets/vendor/libs/select2/select2.js"></script>
  <script>
    $(".select2").select2();
  </script>
</body>
</html>