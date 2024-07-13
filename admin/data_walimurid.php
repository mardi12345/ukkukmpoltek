
<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
$id_murid = $_GET['id'];
$id_users = $_SESSION['id_users'];
?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Wali Murid</h1>
    </div>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>

    <?php 

        $query = "SELECT * FROM tbl_murid where id_murid = $id_murid";
        $result_tasks = mysqli_query($conn, $query);    
        $no = 1;
        $row =  mysqli_fetch_assoc($result_tasks) ?>


        <?php 

        $query1 = "SELECT * FROM tbl_wali_murid where id_murid = $id_murid";
        $result_wali = mysqli_query($conn, $query1);    
        $no = 1;
        $murid =  mysqli_fetch_assoc($result_wali) ?>
    <div class="section-body">
      <div class="card table-responsive">
        <div class="card-body ">
            <form action="<?= $base_url ?>proses_admin/data_wali_murid/update.php" method = "POST"  enctype='multipart/form-data'>
                <div class="row">
                        <div class="col-md-6">
                            <!-- <h5>Data Murid</h5> -->
                            <img src="<?= $base_url ?>assets/img/murid/<?= $row['gambar']?>" alt="" width ="100%" class = "mb-4 p-5">
                        
                        
                        </div>
                        <div class="col-md-6 pt-5">    
                            <div class="form-group">
                                <label for="">Nik</label>
                                <input type="text" name = "nik" class = "form-control" value = "<?= $row['nik']?>" required readonly>
                            </div>  
                            <div class="form-group">
                                <label for="">Nama Murid</label>
                                <input type="hidden" name = "id_murid" value = "<?= $row['id_murid']?>">
                                <input type="text" name ="nama" class = "form-control" value = "<?= $row['nama']?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name = "jenis_kelamin" class = "form-control" value = "<?= $row['jenis_kelamin']?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="email" name = "email_users" class = "form-control" value = "<?= $row['tempat_lahir']?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <input type="text" name = "agama" class = "form-control" value = "<?= $row['agama']?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name = "jenis_kelamin" class = "form-control" value = "<?= $row['jenis_kelamin']?>" required readonly>
                            </div>
                        </div>
                       <div class="col-md-12 mb-2">
                       <h6>Data Wali Murid</h6>
                       </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input type="hidden" name = "id_murid" value = "<?= $row['id_murid']?>">
                                <input type="text" name ="nama_ayah" class = "form-control" value = "<?= $murid['nama_ayah']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" name = "nama_ibu" class = "form-control" value = "<?= $murid['nama_ibu']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Ayah</label>
                                <input type="text" name = "pekerjaan_ayah" class = "form-control" value = "<?= $murid['pekerjaan_ayah']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Ibu</label>
                                <input type="text" name = "pekerjaan_ibu" class = "form-control" value = "<?= $murid['pekerjaan_ibu']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name = "alamat" class = "form-control" value = "<?= $murid['alamat']?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                           
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" name = "no_telp" class = "form-control" value = "<?= $murid['no_telp']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name = "email" class = "form-control" value = "<?= $murid['email']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name = "username" class = "form-control" value = "<?= $murid['username']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name = "password" class = "form-control" value = "walimurid" required>
                            </div>
                            <div class="text-right mt-5">
                                <button type = "submit" name ="update" class = "btn btn-primary">Update Data</button>
                            </div>
                        </div>
                    </div>   
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>
</div>


<?php include('../template/footer.php'); ?>
