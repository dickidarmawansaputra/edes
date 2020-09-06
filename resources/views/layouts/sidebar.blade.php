<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ ucfirst(Auth::user()->name) }}</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-rocket"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Master Data
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('pj') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Penanggung Jawab</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('penduduk') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Penduduk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('surat') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('datasurat') }}" class="nav-link">
            <i class="nav-icon fas fa-file-signature"></i>
            <p>
              Surat
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Laporan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('miskin') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keterangan Miskin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('belumnikah') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Belum Pernah Menikah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('izinkeramaian') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Izin Keramaian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kematian') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keterangan Kematian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kelahiran') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keterangan Kelahiran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('domisili') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keterangan Domisili</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('usaha') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keterangan Usaha</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('untuknikah') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keterangan Untuk Nikah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pengantar') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengantar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('persetujuan') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Persetujuan Mempelai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('izinortu') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Izin Orang Tua</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('skck') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>SKCK</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('pengguna') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('pengaturan') }}" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Pengaturan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Sign Out
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
  </div>
</aside>