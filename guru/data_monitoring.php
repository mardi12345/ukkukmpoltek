
<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
$id_users = $_SESSION['id_users'];

$query_kelas = "SELECT * FROM tbl_kelas where id_users = $id_users";
$result_kelas = mysqli_query($conn, $query_kelas);    
$row_kelas =  mysqli_fetch_assoc($result_kelas);

$id_kelas = $row_kelas['id_kelas'];
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Detail Monitoring</h1>
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
        <div class="card-header">
            <h4>Data Monitoring</h4>
        </div>
        <div class="card-body ">
          
            <table class="table table-hover" id="data_tabel">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Murid</th>
                <th>Perkembangan</th>
                <th>Tanggal</th>
                <th>Nama Guru</th>
                <th class ="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php    
                    $query = "SELECT * FROM tbl_monitoring tmt INNER JOIN tbl_murid tm ON tm.id_murid = tmt.id_murid INNER JOIN tbl_users tu on tu.id_users = tmt.id_users where tmt.id_users = $id_users";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['nama']?></td>
                  <td><?= $row['perkembangan']?></td>
                  <td><?= $row['date_monitoring']?></td>
                  <td><?= $row['nama_users']?></td>
                  <td class ="text-center"> 
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatedata<?= $row['id_monitoring'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= $base_url ?>proses_guru/data_monitoring/delete.php?id=<?= $row['id_monitoring'] ?>&id_kelas=<?= $row['id_kelas'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
      <form action="<?= $base_url ?>proses_guru/data_monitoring/insert.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name = "id_kelas" value = "<?= $id_kelas?>">
            <label for="">Nama Murid</label>
            <select name="id_murid" class = "form-control select2" required id="">
                <option value="">--Pilih Murid-- </option>
                <?php    
                    $query = "SELECT * FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <option value="<?= $row['id_murid']?>"><?= $row['nama']?></option>
                    <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Perkembangan</label>
            <input type="text" name="perkembangan" id="" class="form-control" required>
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
$query = "SELECT * FROM tbl_monitoring tmt INNER JOIN tbl_murid tm ON tm.id_murid = tmt.id_murid INNER JOIN tbl_users tu on tu.id_users = tmt.id_users";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" id="updatedata<?= $row['id_monitoring']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_guru/data_monitoring/update.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
            <input type="hidden" name="id_monitoring" id="" class="form-control" value = "<?= $row['id_monitoring'] ?>">
            <input type="hidden" name = "id_kelas" value = "<?= $id_kelas?>">
            <div class="form-group">
                <label for="">Nama Murid</label>
                <select name="id_murid" class = "form-control" required id="">
                    <?php    
                        $query_murid = "SELECT * FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid where tu.status = 'aktiv' and tdk.id_kelas = $id_kelas";
                        $result_murid = mysqli_query($conn, $query_murid);    
                        $no = 1;
                        while($wali = mysqli_fetch_assoc($result_murid)) { ?>
                            <option value="<?= $wali['id_murid']?>" <?= $row['id_murid'] == $wali['id_murid'] ? 'selected' : '' ?>><?= $wali['nama']?></option>
                        <?php } ?>
                </select>
                
            </div>
            <div class="form-group">
            <label for="">Perkembangan</label>
            <input type="text" name="perkembangan" id="" class="form-control" required value = "<?= $row['perkembangan'] ?>">
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
