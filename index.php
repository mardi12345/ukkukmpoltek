<?php
include('include/koneksi.php');

include('template_walimurid/header.php');
include('template_walimurid/navbar.php');

error_reporting(0);
?>


<?php
$query = "SELECT * FROM tbl_profile";
$profile = mysqli_query($conn, $query);
$data_profile = mysqli_fetch_assoc($profile);

$id_wali_murid = $_SESSION['id_wali_murid'];


?>

 <!-- ======= Slider Section ======= -->
 <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="<?= $base_url?>assets_wali/img/slider/poltek.jpg" alt="" title="#slider-direction-1" />
        <img src="<?= $base_url?>assets_wali/img/slider/foto pataka.jpeg" alt="" title="#slider-direction-2" />
        <img src="<?= $base_url?>assets_wali/img/slider/gambar.jpg" alt="" title="#slider-direction-3" />
        <img src="<?= $base_url?>assets_wali/img/slider/gambar.jpg" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInDown animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">PUSAT UKK UKM POLTEK - GT </h2>
                  <br><center><p> KELOMPOK 4 - ELEKTRONIKA B</p></center>

                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h1 class="title2">Selamat Datang di WEB PUSAT UKK & UKM POLTEK-GT </h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <?php if( $id_wali_murid  == ''){?>

                  <?php }else{ ?>
                    <a class="ready-btn right-btn page-scroll" data-toggle="modal" data-target="#myModal" href="#services">Isi Quisioner</a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h1 class="title1">Silahkan Daftar UKK dan UKM</h1>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".1s">
                  <h2 class="title2">Dengan Cepat dan Mudah</h2>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <?php if( $id_wali_murid  == ''){?>

                  <?php }else{ ?>
                    <a class="ready-btn right-btn page-scroll" data-toggle="modal" data-target="#myModal" href="#services">Isi Quisioner</a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Ikuti Petunjuk Yang Ada </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow animate__fadeIn animate__animated" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Lebih Cepat, Lebih baik dan Bisa Dimonitoring Dari Rumah</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow animate__slideInUp animate__animated" data-wow-duration="2s" data-wow-delay=".2s">
                  <?php if( $id_wali_murid  == ''){?>

                  <?php }else{ ?>
                    <a class="ready-btn right-btn page-scroll" data-toggle="modal" data-target="#myModal" href="#services">Isi Quisioner</a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Slider -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Tentang Kami</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="<?= $base_url ?>assets/img/profile_sekolah/<?= $data_profile['gambar_sekolah']?>" alt="" style = "width : 500px">
                </a> <br>
                <a href="#">
                  <img src="<?= $base_url ?>assets/img/profile_sekolah/<?= $data_profile['gambar_sekolah']?>" alt="" style = "width : 500px">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">Profile</h4>
                </a>
                <p>
                    <?= $data_profile['deskripsi']?>
                </p>
                <h4 class="sec-head">Visi</h4>
                <p>
                  <?=$data_profile['visi']?>
                </p>
                <h4 class="sec-head">Misi</h4>
                <p>
                  <?=$data_profile['misi']?>
                </p>
                <ul>

                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Alur Proses Monitoring</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <?php
                $query = "SELECT * FROM tbl_alur";
                $result = mysqli_query($conn, $query);
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 ">
                    <center>
                        <div class="about-move">
                            <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                <img src="<?= $base_url ?>assets/img/alur/<?= $row['gambar_alur']?>" alt="" style = "height: 113px; width: 142px;">
                                </a>
                                <h4><?= $row['judul']?></h4>
                                <p>
                                <?= $row['deskripsi']?>
                                </p>
                            </div>
                            </div>
                            <!-- end about-details -->
                        </div>
                    </center>
                </div>
          <?php } ?>
        </div>
      </div>
    </div><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Galeri</h2>
            </div>
          </div>
        </div>

        <div class="row awesome-project-content">
          <!-- single-awesome-project start -->
          <?php
            $query = "SELECT * FROM tbl_galeri";
            $galeri = mysqli_query($conn, $query);
            $no = 1;


            while($row = mysqli_fetch_assoc($galeri)) { ?>

                <div class="col-md-4 col-sm-4 col-xs-12 design development">
                    <div class="single-awesome-project">
                        <div class="awesome-img">
                        <a href="#"><img src="<?= $base_url ?>assets/img/galeri/<?= $row['galeri_gambar']?>" alt="" style ="width:500px; height :300px;"/></a>
                        <div class="add-actions text-center">
                            <div class="project-dec">
                            <a class="venobox" data-gall="myGallery" href="<?= $base_url ?>assets/img/galeri/<?= $row['galeri_gambar']?>">
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
          <?php } ?>
          <!-- single-awesome-project end -->
        </div>
      </div>
    </div><!-- End Portfolio Section -->

    <!-- ======= Blog Section ======= -->
    <div id="blog" class="blog-area">
      <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Informasi berita</h2>
              </div>
            </div>
          </div>
          <div class="row">
          <?php
            $query = "SELECT * FROM tbl_informasi";
            $berita = mysqli_query($conn, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($berita)) { ?>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-blog">
                  <div class="single-blog-img">
                    <a href="">
                      <img src="<?= $base_url ?>assets/img/informasi/<?= $row['gambar_informasi']?>" alt="" style = "width: 360px; height:300px;">
                    </a>
                  </div>
                  <div class="blog-meta">
                    <span class="date-type">
                      <i class="fa fa-calendar"></i><?= $row['tgl_informasi']?>
                    </span>
                  </div>
                  <div class="blog-text">
                    <h4>
                      <a href=""><?= $value->judul?></a>
                    </h4>
                    <p class = "text-justify">
                    <?= (str_word_count($row['deskripsi']) > 10 ? substr($row['deskripsi'],0,240)." ...." : $row['deskripsi'])?>
                    </p>
                  </div>
                  <span>
                    <a href="<?= $base_url ?>walimurid/detail_informasi.php?id=<?= $row['id_informasi']?>" class="ready-btn">Read more</a>
                  </span>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div><!-- End Blog Section -->

    <!-- ======= Suscribe Section ======= -->
    <!-- <div class="suscribe-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
            <div class="suscribe-text text-center">
              <h3>Welcome to our eBusiness company</h3>
              <a class="sus-btn" href="#">Get A quate</a>
            </div>
          </div>
        </div>
      </div>
    </div>End Suscribe Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Kontak kami</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="fa fa-mobile"></i>
                  <p>
                    No telepon
                    <br>
                    <span><?= $data_profile['no_hp'] ?></span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="fa fa-envelope-o"></i>
                  <p>
                    Email: <?= $data_profile['email']?><br>
                    <span>Facebook: <?= $data_profile['facebook']?></span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="fa fa-map-marker"></i>
                  <p>
                    Alamat<br>
                    <span><?= $data_profile['alamat']?></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- Start Google Map -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <!-- Start Map
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126793.21272542517!2d110.78074555689334!3d-6.734689099032863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70da49ade9b15b%3A0xec9dd8b53ffdb5b3!2sSLB%20Negeri%20Cendono%20Kudus!5e0!3m2!1sen!2sid!4v1696773166016!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <!-- End Map -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <h4>Information</h4>
                <p>
                Aplikasi SLB Negeri Cendono Kudus
                </p>
                <div class="single-well">
                  <p><span>Alamat</span> Jl. Madu No 01 RT 05 RW 01 , Cendono, Kec. Dawe, Kab. Kudus Prov. Jawa Tengah</p>
                  <p><span>Jam Kerja:</span> 07.00 - 15.00</p>
                </div>
              </div>
            </div>
          </div>
            <!-- End Google Map -->



  </main><!-- End #main -->

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Isi Quisioner</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="<?= $base_url ?>proses_walimurid/quisioner/insert.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
        <div class="form-group">
            <label for="">Apakah sistem monitoring sangat berguna untuk memantau perkembangan belajar ABK?</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q1" value = "5">Sangat Setuju
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q1" value = "4">Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q1" value = "3">Netral
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q1" value = "2">Tidak Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q1" value = "1">Sangat Tidak Setuju
              </label>
            </div>
            <br>
            <label for="">Apakah sistem ini membantu memberikan informasi mengenai SLB N Cendono?</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q2" value = "5">Sangat Setuju
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q2" value = "4">Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q2" value = "3">Netral
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q2" value = "2">Tidak Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q2" value = "1">Sangat Tidak Setuju
              </label>
            </div>
            <br>
            <label for="">Bagaimana dengan desain dari sistemnya apakah mudah dipahami?</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q3" value = "5">Sangat Setuju
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q3" value = "4">Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q3" value = "3">Netral
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q3" value = "2">Tidak Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q3" value = "1">Sangat Tidak Setuju
              </label>
            </div>
            <br>
            <label for="">Seberapa setuju mengenai pentingnya konsultasi pada sistem?</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q4" value = "5">Sangat Setuju
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q4" value = "4">Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q4" value = "3">Netral
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q4" value = "2">Tidak Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q4" value = "1">Sangat Tidak Setuju
              </label>
            </div>
            <br>
            <label for="">Bagaimana penerapan sistem ini pada SLB apakah sangat membantu?</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q5" value = "5">Sangat Setuju
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q5" value = "4">Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q5" value = "3">Netral
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q5" value = "2">Tidak Setuju
              </label>
            </div>
            <div class="form-check disabled">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="q5" value = "1">Sangat Tidak Setuju
              </label>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" name = "insert" class="btn btn-primary">Save</button>
        </div>
      </form>

      </div>
    </div>
  </div>
  <?php include('template_walimurid/script.php'); ?>
  <?php include('template_walimurid/footer.php'); ?>


