<?php 
error_reporting(0);
 
session_start();

include("../include/koneksi.php"); 

?>


<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <!-- menu drop down sebelah kanan untuk lougout -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
   
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['nama_users'];?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
             
              <div class="dropdown-divider"></div>
              <a href="<?= $base_url?>auth/logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- custom menu dalam dashboard -->
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="<?= $base_url ?>assets/img/logosl.png" width = "80px" alt="" class = "mt-3">
            <br>
            <a href="" class = "">Pusat UKK UKM Poltek GT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard.php">UKK UKM</a>
          </div>
          <!-- Sidebar Untuk Admin -->
            <?php if($_SESSION['hak_akses'] == 'admin'){?>
              <ul class="sidebar-menu mt-3">
                <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href="<?= $base_url ?>admin/dashboard.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                <li class="menu-header">Data Master</li>
                <li class="nav-item dropdown ">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Data Profile</span></a>
                  <ul class="dropdown-menu">
  
                    <li><a class="nav-link" href="<?= $base_url?>admin/data_profile_sekolah.php">Data Profile Sekolah</a></li>
                    <li><a class="nav-link" href="<?= $base_url?>admin/data_galeri.php">Data Galeri</a></li>
                    <li><a class="nav-link" href="<?= $base_url?>admin/data_alur.php">Data Alur</a></li>
                    <li><a class="nav-link" href="<?= $base_url?>admin/data_informasi.php">Data Informasi</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Data Users</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= $base_url ?>admin/data_admin.php">Data Admin</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>admin/data_kepala_sekolah.php">Data Kepala Sekolah</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>admin/data_murid.php">Data Murid</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>admin/data_guru.php">Data Guru</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Data Master</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= $base_url ?>admin/data_periode.php">Data Periode</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>admin/data_kelas.php">Data Kelas</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>admin/data_mata_pelajaran.php">Data Mata Pelajaran</a></li>
                 
                  </ul>
                </li>

                <li class="menu-header">Data Transaksi</li>
                <li ><a class="nav-link" href="<?= $base_url?>admin/data_konsultasi.php"><i class="fas fa-calendar-check"></i> <span>Data Pendaftar</span></a></li>
                <li ><a class="nav-link" href="<?= $base_url?>admin/data_monitoring.php"><i class="fas fa-calendar-check"></i> <span>Data Monitoring</span></a></li>
                <li ><a class="nav-link" href="<?= $base_url?>admin/data_quisioner.php"><i class="fas fa-calendar-check"></i> <span>Data Quisioner</span></a></li>
                <li class="menu-header">Data Laporan</li>
                <li ><a class="nav-link" href="<?= $base_url?>admin/laporan_belajar.php"><i class="fas fa-calendar-check"></i> <span>Data Laporan Belajar</span></a></li>
              </ul>

            <?php }else if($_SESSION['hak_akses'] == 'guru'){ ?>
              <ul class="sidebar-menu mt-3">
                <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href="<?= $base_url ?>guru/dashboard.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Data Master</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= $base_url ?>guru/data_kelas.php">Data Kelas</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>guru/data_kategori.php">Data Kategori</a></li>
                 
                  </ul>
                </li>

                <li class="menu-header">Data Transaksi</li>
                <li ><a class="nav-link" href="<?= $base_url?>guru/data_konsultasi.php"><i class="fas fa-calendar-check"></i> <span>Data Pendaftar</span></a></li>
                <li ><a class="nav-link" href="<?= $base_url?>guru/data_monitoring.php"><i class="fas fa-calendar-check"></i> <span>Data Monitoring</span></a></li>
                <li class="menu-header">Data Laporan</li>
                <li ><a class="nav-link" href="<?= $base_url?>guru/laporan_belajar.php"><i class="fas fa-calendar-check"></i> <span>Data Laporan Belajar</span></a></li>
              </ul>
            <?php }else{ ?>
              <ul class="sidebar-menu mt-3">
                <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href="<?= $base_url ?>admin/dashboard.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                <li class="menu-header">Data Master</li>
                <li class="nav-item dropdown ">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Data Profile</span></a>
                  <ul class="dropdown-menu">
  
                    <li><a class="nav-link" href="<?= $base_url?>kepala_sekolah/data_profile_sekolah.php">Data Profile Sekolah</a></li>
                    <li><a class="nav-link" href="<?= $base_url?>kepala_sekolah/data_galeri.php">Data Galeri</a></li>
                    <li><a class="nav-link" href="<?= $base_url?>kepala_sekolah/data_alur.php">Data Alur</a></li>
                    <li><a class="nav-link" href="<?= $base_url?>kepala_sekolah/data_informasi.php">Data Informasi</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Data Users</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= $base_url ?>kepala_sekolah/data_admin.php">Data Admin</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>kepala_sekolah/data_kepala_sekolah.php">Data Kepala Sekolah</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>kepala_sekolah/data_murid.php">Data Murid</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>kepala_sekolah/data_guru.php">Data Guru</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Data Master</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= $base_url ?>kepala_sekolah/data_kelas.php">Data Kelas</a></li>
                    <li><a class="nav-link" href="<?= $base_url ?>kepala_sekolah/data_kategori.php">Data Kategori</a></li>
                 
                  </ul>
                </li>

                <li class="menu-header">Data Transaksi</li>
                <li ><a class="nav-link" href="<?= $base_url?>kepala_sekolah/data_konsultasi.php"><i class="fas fa-calendar-check"></i> <span>Data Pendaftar</span></a></li>
                <li ><a class="nav-link" href="<?= $base_url?>kepala_sekolah/data_monitoring.php"><i class="fas fa-calendar-check"></i> <span>Data Monitoring</span></a></li>
                <li class="menu-header">Data Laporan</li>
                <li ><a class="nav-link" href="<?= $base_url?>kepala_sekolah/laporan_belajar.php"><i class="fas fa-calendar-check"></i> <span>Data Laporan Belajar</span></a></li>
              </ul>
            <?php } ?>
        </aside>
      </div>
