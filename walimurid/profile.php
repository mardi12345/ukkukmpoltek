<?php 
include('../include/koneksi.php');

if ($_SESSION['id_wali_murid'] == NULL) {
  header('Location: '.$base_url.'walimurid/login.php');
}
include('../template_walimurid/header.php');
include('../template_walimurid/navbar.php');

error_reporting(0);
 
$id_wali_murid = $_SESSION['id_wali_murid'];
?>

<div class="blog-page area-padding">
    <div class="container  mt-5">
        <div class="card">
            <div class="card-header">
                <center><h4>Data Laporan</h4></center>
            </div>
            <div class="card-body">
                <form action="<?= $base_url ?>proses_walimurid/profile/update.php" method="post">
                <div class="col-md-12">
    
                <?php 

                    $query = "SELECT * FROM tbl_wali_murid where id_wali_murid = $id_wali_murid";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    $row =  mysqli_fetch_assoc($result_tasks) ?>
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
                       <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input type="hidden" name = "id_wali_murid" value = "<?= $row['id_wali_murid']?>">
                                <input type="text" name ="nama_ayah" class = "form-control" value = "<?= $row['nama_ayah']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" name = "nama_ibu" class = "form-control" value = "<?= $row['nama_ibu']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Ayah</label>
                                <input type="text" name = "pekerjaan_ayah" class = "form-control" value = "<?= $row['pekerjaan_ayah']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Ibu</label>
                                <input type="text" name = "pekerjaan_ibu" class = "form-control" value = "<?= $row['pekerjaan_ibu']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name = "alamat" class = "form-control" value = "<?= $row['alamat']?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                           
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" name = "no_telp" class = "form-control" value = "<?= $row['no_telp']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name = "email" class = "form-control" value = "<?= $row['email']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name = "username" class = "form-control" value = "<?= $row['username']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name = "password" class = "form-control" required>
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
</div>
<?php
include('../template_walimurid/script.php');
include('../template_walimurid/footer.php');
?>