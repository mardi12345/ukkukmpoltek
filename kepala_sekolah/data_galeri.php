
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
      <h1>Data Galeri</h1>
    </div>

    <div class="section-body">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
      <div class="card">
      <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
      <div class="card-body">
      
        <div class="row">
        <?php
            $query = "SELECT * FROM tbl_galeri";
            $result_tasks = mysqli_query($conn, $query);    
            $no = 1;
            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                    
            <div class="col-md-4">
              <div class="card img-fluid" style="width:500px">
                <img class="card-img-top" src="<?= $base_url ?>assets/img/galeri/<?= $row['galeri_gambar'] ?>" alt="Card image" style="width:100%" height ="280px">
                <div class="card-img-overlay">
                  <!-- <h4 class="card-title">John Doe</h4>
                  <p class="card-text">Some example text some example text. Some example text some example text. Some example text some example text. Some example text some example text.</p> -->
                  <button data-toggle="modal" data-target="#edit<?=$row['id_galeri']?>" class = "btn btn-light btn-sm"><i class ="fas fa-edit"></i></button>
                  <a href="<?= $base_url ?>proses_admin/data_galeri/delete.php?id=<?= $row['id_galeri'] ?>" class="btn btn-sm btn-primary"><i class = "fas fa-trash"></i></a>
                </div>
              </div>
            </div>
          <?php }?>
        </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambahkan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= $base_url ?>proses_admin/data_galeri/insert.php" method = "POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class = "form-control" name = "gambar" id="gambar" required>
          </div>
          <!-- <div id="image_demo" class="d-none"></div> -->
          <div class="modal-footer br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name = "insert">Save changes</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>


<?php
$query = "SELECT * FROM tbl_galeri";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" tabindex="-1" role="dialog" id="edit<?=$row['id_galeri'] ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= $base_url ?>proses_admin/data_galeri/update.php" method = "POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="hidden" name = "id_galeri" value = "<?= $row['id_galeri']?>">
            <input type="file" class = "form-control" name = "gambar" id="lihat_gambar">
          </div>
          <!-- <div id="image_demo" class="d-none"></div> -->
          <div class="modal-footer br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name = "update" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<?php }?>


<?php include('../template/footer.php'); ?>
