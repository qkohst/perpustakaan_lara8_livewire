<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sistem Informasi Perpustakaan</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="AdminLTE-3.0.0/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="AdminLTE-3.0.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.0.0/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jetstream -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  @livewireStyles

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link">SISTEM INFORMASI PERPUSTAKAAN</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Profile Dropdown Menu -->
        <div class="nav-item dropdown">
          <x-jet-dropdown align="right" width="55">
            <x-slot name="trigger">
              <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
              </button>
            </x-slot>
            <x-slot name="content">
              <!-- Account Management -->
              <div class="block px-4 py-2 text-xs text-gray-400">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
              </div>
              <div class="border-t border-gray-100"></div>

              <x-jet-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Profile') }}
              </x-jet-dropdown-link>

              @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
              <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
              </x-jet-dropdown-link>
              @endif

              <div class="border-t border-gray-100"></div>

              <!-- Team Management -->
              @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
              <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Team') }}
              </div>

              <!-- Team Settings -->
              <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                {{ __('Team Settings') }}
              </x-jet-dropdown-link>

              @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
              <x-jet-dropdown-link href="{{ route('teams.create') }}">
                {{ __('Create New Team') }}
              </x-jet-dropdown-link>
              @endcan

              <div class="border-t border-gray-100"></div>

              <!-- Team Switcher -->
              <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Switch Teams') }}
              </div>

              @foreach (Auth::user()->allTeams() as $team)
              <x-jet-switchable-team :team="$team" />
              @endforeach

              <div class="border-t border-gray-100"></div>
              @endif

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                  {{ __('Logout') }}
                </x-jet-dropdown-link>
              </form>
            </x-slot>
          </x-jet-dropdown>
        </div>
        <div></div>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="AdminLTE-3.0.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SI Perpus</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Buku
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="fas fa-layer-group nav-icon"></i>
                    <p>Kategori Buku</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/boxed.html" class="nav-link">
                    <i class="fas fa-book-open nav-icon"></i>
                    <p>Daftar Buku</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Anggota
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book-reader"></i>
                <p>
                  Peminjaman
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bookmark"></i>
                <p>
                  Pengembalian
                </p>
              </a>
            </li>
            <li class="nav-header">PENGATURAN</li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  Instansi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                  Pengguna
                </p>
              </a>
            </li>
            <li class="nav-header">PUSAT UNDUHAN</li>
            <li class="nav-item">
              <a href="https://adminlte.io/docs/3.0" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Cetak Laporan</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="AdminLTE-3.0.0/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="AdminLTE-3.0.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="AdminLTE-3.0.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="AdminLTE-3.0.0/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="AdminLTE-3.0.0/dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="AdminLTE-3.0.0/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="AdminLTE-3.0.0/plugins/raphael/raphael.min.js"></script>
  <script src="AdminLTE-3.0.0/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="AdminLTE-3.0.0/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="AdminLTE-3.0.0/plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="AdminLTE-3.0.0/dist/js/pages/dashboard2.js"></script>

  <!-- Jetstream  -->
  @stack('modals')

  @livewireScripts
</body>

</html>