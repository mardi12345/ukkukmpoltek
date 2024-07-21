
<?php 
include('../include/koneksi.php');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if ($_SESSION['id_wali_murid'] == NULL) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="<?= $base_url ?>assets/img/logo.png" type="image/x-icon">
    <title>UKK UKM Poltek GT</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= $base_url ?>assets/img/logosl.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Daftar Akun Mahasiswa</h4></div>

              <div class="card-body">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
                <form method="POST" action = "<?= $base_url ?>proses_walimurid/pendaftaran/insert.php" enctype='multipart/form-data'>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Nomor Induk Mahasiswa</label>
                      <input id="frist_name" type="text" class="form-control" name="nik" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Nama</label>
                      <input id="last_name" type="text" class="form-control" name="nama">
                    </div>
                  </div>
                  <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class = "form-control" required>
                            <option value="">--Pilih jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <select name="agama" id="" class = "form-control" required>
                            <option value="">--Pilih Agama--</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Foto Kartu Mahasiswa/Penneng</label>
                        <input type="file" name="gambar" id="" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" id="" class="form-control" required>
                    </div>
    

                  <div class="form-divider">
                    Setting Akun
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name = "username" class = "form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name = "password" class = "form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="">No Telp</label>
                            <input type="text" name = "no_telp" class = "form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name = "email" class = "form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                       
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                            <label class="custom-control-label" for="agree">Saya menyetujui semua syarat dan ketentuan</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" name = "insert" class="btn btn-primary btn-lg btn-block">
                            Daftar Akun
                          </button>
                        </div>
                    </div>

                </form>
              </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; Ukk ukm Poltek Gt
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

 <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= $base_url ?>assets/modules/moment.min.js"></script>
    <script src="<?= $base_url ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= $base_url ?>assets/js/scripts.js"></script>
    <script src="<?= $base_url ?>assets/js/custom.js"></script>
</body>
</html>

<?php }else{
  
include('../template_walimurid/header.php');
include('../template_walimurid/navbar.php'); 
$id_wali_murid = $_SESSION['id_wali_murid'];

error_reporting(0);
  ?>
  <div class="blog-page area-padding">
    <div class="container  mt-5">

        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
    
                    <hr>
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
                    <table id="table" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead >
                            <tr >
                                <th width = "5%">No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>TTL</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Foto</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            <?php    
                                    $query = "SELECT * FROM tbl_murid tm inner join tbl_wali_murid twk on tm.id_murid = twk.id_murid where twk.id_wali_murid = $id_wali_murid";
                                    $result_tasks = mysqli_query($conn, $query);    
                                    $no = 1;
                                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['nik']?></td>
                                    <td><?= $row['nama']?></td>
                                    <td><?= $row['jenis_kelamin']?></td>
                                    <td><?= $row['tempat_lahir']?>, <?= $row['tanggal_lahir']?></td>
                                    <td><?= $row['alamat']?></td>
                                    <td><?= $row['agama']?></td>
                                    <td width = "10%" class ="text-center"><img src="<?= $base_url ?>assets/img/murid/<?= $row['gambar']?>" alt="" width ="90%"></td>
                                    <td><?= $row['status_murid']?></td>
                                </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } 

?>


