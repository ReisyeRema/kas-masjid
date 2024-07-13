<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo d-flex align-items-center">
          {{-- <img src="{{ asset('asset2/masjid.png') }}" alt="navbar brand" class="navbar-brand" height="30"/> --}}
          <h4 class="mb-0 mt-3 mr-5" style="color: white">Sistem Kas Masjid</h4>
      </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">

          <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item {{ request()->routeIs('rekening.index') ? 'active' : '' }}">
            <a href="{{ route('rekening.index') }}">
              <i class="fas icon-arrow-left-circle"></i>
              <p>Rekening</p>
            </a>
          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Kas Masjid</h4>
          </li>
          
          <li class="nav-item {{ request()->routeIs('pemasukanmasjid.index') ? 'active' : '' }}">
            <a href="{{ route('pemasukanmasjid.index') }}">
              <i class="fas icon-plus"></i>
              <p>Pemasukan Kas Masjid</p>
            </a>
          </li>

          <li class="nav-item {{ request()->routeIs('pengeluaranmasjid.index') ? 'active' : '' }}">
            <a href="{{ route('pengeluaranmasjid.index') }}">
              <i class="fas icon-arrow-left-circle"></i>
              <p>Pengeluaran Kas Masjid</p>
            </a>
          </li>
         
          <li class="nav-item {{ request()->routeIs('rekapmasjid.index') ? 'active' : '' }}">
            <a href="{{ route('rekapmasjid.index') }}">
              <i class="fas icon-docs"></i>
              <p>Rekap Kas Masjid</p>
            </a>
          </li>


          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Kas Sosial</h4>
          </li>
          
          <li class="nav-item {{ request()->routeIs('pemasukansosial.index') ? 'active' : '' }}">
            <a href="{{ route('pemasukansosial.index') }}">
              <i class="fas icon-plus"></i>
              <p>Pemasukan Kas Sosial</p>
            </a>
          </li>

          <li class="nav-item {{ request()->routeIs('pengeluaransosial.index') ? 'active' : '' }}">
            <a href="{{ route('pengeluaransosial.index') }}">
              <i class="fas icon-arrow-left-circle"></i>
              <p>Pengeluaran Kas Sosial</p>
            </a>
          </li>
         
          <li class="nav-item {{ request()->routeIs('rekapsosial.index') ? 'active' : '' }}">
            <a href="{{ route('rekapsosial.index') }}">
              <i class="fas icon-docs"></i>
              <p>Rekap Kas Sosial</p>
            </a>
          </li>


          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Laporan Kas</h4>
          </li>
          
          <li class="nav-item {{ request()->routeIs('laporan.kas.masjid') ? 'active' : '' }}">
            <a href="{{ route('laporan.kas.masjid') }}">
              <i class="fas icon-printer"></i>
              <p>Laporan Kas Masjid</p>
            </a>
          </li>

          <li class="nav-item {{ request()->routeIs('laporan.kas.sosial') ? 'active' : '' }}">
            <a href="{{ route('laporan.kas.sosial') }}">
              <i class="fas icon-printer"></i>
              <p>Laporan Kas Sosial</p>
            </a>
          </li>
         

          @if(Auth::user()->role == 'admin')
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Setting</h4>
          </li>
          
          <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
              <i class="fas icon-user-follow"></i>
              <p>Data Pengguna</p>
            </a>
          </li>
          @endif
         
        </ul>
      </div>
    </div>
  </div>