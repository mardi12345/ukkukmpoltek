
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
      <h1>Data Alur</h1>
    </div>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata">
      Tambah Data
    </button>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
    <div class="section-body">
      <div class="card table-responsive">
        <div class="card-body ">
            <table class="table table-hover" >
                <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th class ="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM tbl_alur";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['judul']?></td>
                        <td><?= $row['deskripsi']?></td>
                        <td width = "10%" class ="text-center"><img src="<?= $base_url ?>assets/img/alur/<?= $row['gambar_alur']?>" alt="" width ="90%"></td>
                
                        <td class ="text-center" width = "20%"> 
                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#updatedata<?= $row['id_alur'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="<?= $base_url?>proses_admin/data_alur/delete.php?id=<?= $row['id_alur'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </section>
</div>

                
<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_admin/data_alur/insert.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
          <div class="form-group">
            <label for="">judul</label>
            <input type="text" name="judul" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="" cols="30" rows="10" class = "form-control" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" id="" class="form-control" required>
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

<?php
$query = "SELECT * FROM tbl_alur";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" id="updatedata<?= $row['id_alur']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_admin/data_alur/update.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
            <input type="hidden" name="id_alur" id="" class="form-control" value = "<?= $row['id_alur'] ?>">
            <div class="form-group">
                <label for="">judul</label>
                <input type="text" name="judul" id="" class="form-control" required value = "<?= $row['judul']?>">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class = "form-control" required value = "<?= $row['deskripsi']?>"><?= $row['deskripsi'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="">Gambar</label>
              <input type="file" name="gambar" id="" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name = "update" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
  </div>
</div>
<?php } ?>

<?php include('../template/footer.php'); ?>
