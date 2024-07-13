
<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
$id_kelas = $_SESSION['id_kelas'];
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Kelas</h1>
    </div>

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
                <th>Nama Kelas</th>
                <th>Nama Kategori</th>
                <th>Nama Wali</th>
                <th class ="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php    
                    $query = "SELECT * FROM tbl_kelas tk INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users  where tu.status = 'aktiv'";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['nama_kelas']?></td>
                  <td><?= $row['nama_kategori']?></td>
                  <td><?= $row['nama_users']?></td>
                  <td class ="text-center"> 
                    
                    <a href="<?= $base_url ?>kepala_sekolah/data_detail_kelas.php?id=<?= $row['id_kelas'] ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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
      <form action="<?= $base_url ?>proses_admin/data_kelas/insert.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Kelas</label>
            <input type="text" name="nama_kelas" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama Kategori</label>
            <select name="id_kategori" class = "form-control" required id="">
                <option value="">--Pilih Kategori--</option>
                <?php    
                    $query = "SELECT * FROM tbl_kategori";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <option value="<?= $row['id_kategori']?>"><?= $row['nama_kategori']?></option>
                    <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Nama Wali Kelas</label>
            <select name="id_users" class = "form-control" required id="">
                <option value="">--Pilih Wali Kelas--</option>
                <?php    
                    $query = "SELECT * FROM tbl_users where hak_akses = 'guru' and status = 'aktiv'";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <option value="<?= $row['id_users']?>"><?= $row['nama_users']?></option>
                    <?php } ?>
            </select>
            
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
$query = "SELECT * FROM tbl_kelas tk INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users  where tu.status = 'aktiv'";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" id="updatedata<?= $row['id_kelas']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_admin/data_kelas/update.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
            <input type="hidden" name="id_kelas" id="" class="form-control" value = "<?= $row['id_kelas'] ?>">
            <div class="form-group">
                <label for="">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="" class="form-control" value = "<?= $row['nama_kelas'] ?>" required>
            </div>
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <select name="id_kategori" class = "form-control" required id="">
                    <?php    
                        $query_kategori = "SELECT * FROM tbl_kategori";
                        $result_kategori = mysqli_query($conn, $query_kategori);    
                        $no = 1;
                        while($kategori = mysqli_fetch_assoc($result_kategori)) { ?>
                            <option value="<?= $kategori['id_kategori']?>" <?= $row['id_kategori'] == $kategori['id_kategori'] ? 'selected' : '' ?>><?= $kategori['nama_kategori']?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Wali Kelas</label>
                <select name="id_users" class = "form-control" required id="">
                    <?php    
                        $query_wali = "SELECT * FROM tbl_users where hak_akses = 'guru' and status = 'aktiv'";
                        $result_wali = mysqli_query($conn, $query_wali);    
                        $no = 1;
                        while($wali = mysqli_fetch_assoc($result_wali)) { ?>
                            <option value="<?= $wali['id_users']?>" <?= $row['id_users'] == $wali['id_users'] ? 'selected' : '' ?>><?= $wali['nama_users']?></option>
                        <?php } ?>
                </select>
                
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
