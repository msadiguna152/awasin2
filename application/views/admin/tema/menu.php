<body class="hold-transition sidebar-mini layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light ignielPelangi">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <marquee><label class="text text-dark">Awasin Elektronik (Aplikasi Pengawasan Internal Elektronik)</label></marquee>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img style="height: 100px;width: 100px;" src="<?= base_url();?>profil/<?= $this->session->userdata('foto_pengguna'); ?>"  class="img m-auto img-thumbnail">
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="" class="dropdown-item dropdown-footer"><b><?= $this->session->userdata('nama_pengguna'); ?></b><span class="float-right text-sm text-success"><i class="fas fa-circle"></i></span></a>
          <div class="dropdown-divider"></div>
          <a href="" class="dropdown-item dropdown-footer"><b><?= $this->session->userdata('level'); ?></b></a>
          <a href="<?= site_url('Login/logout');?>" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')" class="dropdown-item dropdown-footer bg-danger">Keluar</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link ignielPelangi text-center">
      <img src="<?= base_url()?>assets/logo_cikarang.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>AWASIN ELEKTRONIK</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Menu -->

          <li class="nav-item">
            <a href="<?= site_url("admin/Beranda"); ?>" class="nav-link <?= $this->session->userdata('menu') == 'Beranda' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Beranda</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= site_url("admin/Izin"); ?>" class="nav-link <?= $this->session->userdata('menu') == 'Izin' ? 'active' : ''; ?>">
              <i class="nav-icon fa fa-edit"></i>
              <p>Izin</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= site_url("admin/Laporan"); ?>" class="nav-link <?= $this->session->userdata('menu') == 'Laporan' ? 'active' : ''; ?>">
              <i class="nav-icon fa fa-file"></i>
              <p>Laporan</p>
            </a>
          </li>

          <li class="nav-item <?= $this->session->userdata('menu2') == 'kelola data' ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?= $this->session->userdata('menu') == 'kelola data' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Kelola Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?= site_url("admin/Pegawai"); ?>" class="nav-link <?= $this->session->userdata('menu') == 'Pegawai' ? 'active' : ''; ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="<?= site_url("admin/Pemberi_izin"); ?>" class="nav-link <?= $this->session->userdata('menu') == 'Pemberi Izin' ? 'active' : ''; ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Pemberi Izin</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="<?= site_url("admin/Jabatan"); ?>" class="nav-link <?= $this->session->userdata('menu') == 'Jabatan' ? 'active' : ''; ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= site_url("admin/Golongan"); ?>" class="nav-link <?= $this->session->userdata('menu') == 'Golongan' ? 'active' : ''; ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Golongan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= site_url("admin/Pengguna"); ?>" class="nav-link <?= $this->session->userdata('menu') == 'Pengguna' ? 'active' : ''; ?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>