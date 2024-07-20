<?php 
error_reporting(0);
 
session_start();
$id_wali_murid = $_SESSION['id_wali_murid'];
$nama_ayah = $_SESSION['nama_ayah'];
?>

<header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="<?= $base_url ?>"><span>UKK </span>UKM</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
      <ul>
  
          <li><a href="<?= $base_url ?>walimurid/pendaftaran.php">Pendaftaran</a></li>
          <li><a href="<?= $base_url ?>#portfolio">Gallery</a></li>
          <li><a href="<?= $base_url ?>#blog">Berita</a></li>
          <li><a href="<?= $base_url ?>#contact">Contact</a></li>
          <li><a href="<?= $base_url?>walimurid/konsultasi.php">Keanggotaan</a></li>
          <?php if( $id_wali_murid  == ''){?>
            <li><a href="<?= $base_url?>walimurid/login.php">Login</a></li>
          <?php }else{ ?>
            <li class="drop-down"><a href="#"> Profil Saya </a>
              <ul>
                <li><a href="<?= $base_url ?>walimurid/profile.php">Profile</a></li>
                <li><a href="<?= $base_url?>auth/logout.php">Logout</a></li>
              </ul>
            </li>
          <?php }?>
        

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->