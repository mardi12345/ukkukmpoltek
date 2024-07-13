
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
      <h1>Data Admin</h1>
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
          
            <table class="table table-hover" id="data_tabel">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>alamat_users</th>
                <th class ="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php    
                    $query = "SELECT * FROM tbl_users where hak_akses = 'admin' and status = 'aktiv'";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['nama_users']?></td>
                  <td><?= $row['username']?></td>
                  <td><?= $row['no_telp_users']?></td>
                  <td><?= $row['email_users']?></td>
                  <td><?= $row['alamat_users']?></td>
                  <td class ="text-center"> 
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatedata<?= $row['id_users'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= $base_url ?>proses_kepala_sekolah/data_admin/delete.php?id=<?= $row['id_users'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
      <form action="<?= $base_url ?>proses_kepala_sekolah/data_admin/insert.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama_users" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email_users" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">No Telepon</label>
            <input type="number" name="no_telp_users" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat_users" id="" class="form-control" required>
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
$query = "SELECT * FROM tbl_users where hak_akses = 'admin' and status = 'aktiv'";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" id="updatedata<?= $row['id_users']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_kepala_sekolah/data_admin/update.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
            <input type="hidden" name="id_users" id="" class="form-control" value = "<?= $row['id_users'] ?>">
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="nama_users" id="" class="form-control" value = "<?= $row['nama_users'] ?>">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="email_users" id="" class="form-control" required value = "<?= $row['email_users'] ?>">
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="username" id="" class="form-control" value = "<?= $row['username'] ?>">
            </div>
            <div class="form-group">
              <label for="">No Telepon</label>
              <input type="text" name="no_telp_users" id="" class="form-control" value = "<?= $row['no_telp_users'] ?>">
            </div>
            <div class="form-group">
              <label for="">Alamat</label>
              <input type="text" name="alamat_users" id="" class="form-control" value = "<?= $row['alamat_users'] ?>">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" id="" class="form-control" required>
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
