
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
      <h1>Data Profile Sekolah</h1>
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

        $query = "SELECT * FROM tbl_profile";
        $result_tasks = mysqli_query($conn, $query);    
        $no = 1;
        $row =  mysqli_fetch_assoc($result_tasks) ?>
    <div class="section-body">
      <div class="card table-responsive">
        <div class="card-body ">
            <form action="<?= $base_url ?>proses_admin/data_profile_sekolah/update.php" method = "POST"  enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center"><h3>Gambar Sekolah</h3></div>
                        <img src="<?= $base_url?>assets/img/profile_sekolah/<?= $row['gambar_sekolah']?>" alt="" width = "100%">
                        <div class="form-group text-center">
                            <label for="">Upload Gambar</label>
                            <input type="file" class = "form-control" name = "gambar">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nama Sekolah</label>
                            <input type="hidden" name = "id_profile_sekolah" value = "1">
                            <input type="text" name ="nama_sekolah" class = "form-control" value = "<?= $row['nama_sekolah']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Visi</label>
                            <textarea name = "visi" class = "form-control summernote" id = "" value = "<?= $row['visi']?>" required><?= $row['visi']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Misi</label>
                            <textarea name = "misi" class = "form-control summernote" id = "" value = "<?= $row['misi']?>" required><?= $row['misi']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name = "email" class = "form-control" value = "<?= $row['email']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="text" name = "no_hp" class = "form-control" value = "<?= $row['no_hp']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input type="text" name = "facebook" class = "form-control" value = "<?= $row['facebook']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Instagram</label>
                            <input type="text" name = "instagram" class = "form-control" value = "<?= $row['instagram']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name = "alamat" class = "form-control" value = "<?= $row['alamat']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" id="" class = "form-control" value = "<?= $row['deskripsi']?>" cols="30" rows="10" required><?= $row['deskripsi']?></textarea>
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
