
<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
$id_users = $_SESSION['id_users'];

$id_kelas = $_GET['id'];
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Detail Kelas</h1>
    </div>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata">
      Tambah Data
    </button>
    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#KenaikanKelas">
      Kenaikan Kelas
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
        <div class="card-header">
            <h4>Data Murid</h4>
        </div>
        <div class="card-body ">
          
            <table class="table table-hover" id="data_tabel">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Murid</th>
                <th>Nama Kelas</th>
                <th>Nama Kategori</th>
                <th class ="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php    
                    $query = "SELECT * FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid where tu.status = 'aktiv' and tdk.id_kelas = $id_kelas";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['nama']?></td>
                  <td><?= $row['nama_kelas']?></td>
                  <td><?= $row['nama_kategori']?></td>
                  <td class ="text-center"> 
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatedata<?= $row['id_detail_kelas'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= $base_url ?>proses_admin/data_detail_kelas/delete.php?id=<?= $row['id_detail_kelas'] ?>&id_kelas=<?= $row['id_kelas'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
      <form action="<?= $base_url ?>proses_admin/data_detail_kelas/insert.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name = "id_kelas" value = "<?= $id_kelas?>">
            <label for="">Nama Murid</label>
            <select name="id_murid" class = "form-control select2" required id="">
                <option value="">--Pilih Murid--</option>
                <?php    
                    $query = "SELECT * FROM tbl_murid where status_murid = 'diterima' and id_murid not in (SELECT id_murid FROM tbl_detail_kelas)";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <option value="<?= $row['id_murid']?>"><?= $row['nama']?></option>
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

<!-- Modal -->
<div class="modal fade" id="KenaikanKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kenaikan Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_admin/data_detail_kelas/kenaikan_kelas.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Kelas</label>
            <select name="id_kelas" class = "form-control select2" required id="">
                <option value="">--Pilih Kelas--</option>
                <?php    
                    $query_kelas = "SELECT * FROM tbl_kelas tk INNER JOIN tbl_periode tp ON tp.id_periode = tk.id_periode";
                    $result_kelas = mysqli_query($conn, $query_kelas);    
                    $no = 1;
                    while($row_kelas = mysqli_fetch_assoc($result_kelas)) { ?>
                        <option value="<?= $row_kelas['id_kelas']?>"><?= $row_kelas['nama_kelas']?> <?= $row_kelas['periode']?></option>
                    <?php } ?>
            </select>

            <?php    
                $query = "SELECT * FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid where tu.status = 'aktiv' and tdk.id_kelas = $id_kelas";
                $result_tasks = mysqli_query($conn, $query);    
                $no = 1;
                while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                  <input type="hidden" name = "id_murid[]" value = "<?= $row['id_murid']?>">
                  
            <?php } ?>
        
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
$query = "SELECT * FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid where tu.status = 'aktiv' and tdk.id_kelas = $id_kelas";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" id="updatedata<?= $row['id_detail_kelas']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_admin/data_detail_kelas/update.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
            <input type="hidden" name="id_detail_kelas" id="" class="form-control" value = "<?= $row['id_detail_kelas'] ?>">
            <input type="hidden" name = "id_kelas" value = "<?= $id_kelas?>">
            <div class="form-group">
                <label for="">Nama Murid</label>
                <select name="id_murid" class = "form-control" required id="">
                    <?php    
                        $query_murid = "SELECT * FROM tbl_murid where status_murid = 'diterima'";
                        $result_murid = mysqli_query($conn, $query_murid);    
                        $no = 1;
                        while($wali = mysqli_fetch_assoc($result_murid)) { ?>
                            <option value="<?= $wali['id_murid']?>" <?= $row['id_murid'] == $wali['id_murid'] ? 'selected' : '' ?>><?= $wali['nama']?></option>
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
