
<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
$id_users = $_SESSION['id_users'];
?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Kepala Sekolah</h1>
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

        $query = "SELECT * FROM tbl_users where hak_akses = 'kepala sekolah' and status = 'aktiv'";
        $result_tasks = mysqli_query($conn, $query);    
        $no = 1;
        $row =  mysqli_fetch_assoc($result_tasks) ?>
    <div class="section-body">
      <div class="card table-responsive">
        <div class="card-body ">
            <form action="<?= $base_url ?>proses_kepala_sekolah/data_kepala_sekolah/update.php" method = "POST"  enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                            <label for="">Nama Kepala Sekolah</label>
                            <input type="hidden" name = "id_users" value = "<?= $row['id_users']?>">
                            <input type="text" name ="nama_users" class = "form-control" value = "<?= $row['nama_users']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name = "alamat_users" class = "form-control" value = "<?= $row['alamat_users']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name = "email_users" class = "form-control" value = "<?= $row['email_users']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="text" name = "no_telp_users" class = "form-control" value = "<?= $row['no_telp_users']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name = "username" class = "form-control" value = "<?= $row['username']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name = "password" class = "form-control" value = "" required>
                        </div>
                        <div class="text-right">
                            <button type = "submit" name ="update" class = "btn btn-primary">Update Data</button>
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
