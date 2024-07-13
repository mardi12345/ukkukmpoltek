
<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
$id_users = $_SESSION['id_users'];

$id_murid = $_GET['id'];
$id_kelas = $_GET['id_kelas'];
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Detail Laporan Belajar</h1>
    </div>
    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Siswa</h4>
              <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
              </div>
            </div>
            <?php    
              $query = "SELECT * FROM tbl_murid tm INNER JOIN tbl_detail_kelas tdk on tdk.id_murid = tm.id_murid INNER JOIN tbl_kelas tk on tk.id_kelas =tdk.id_kelas INNER JOIN tbl_users tu on tu.id_users = tdk.id_users INNER JOIN tbl_periode tp on tp.id_periode = tk.id_periode where tm.id_murid = '$id_murid' and tk.id_kelas = '$id_kelas'";
              $result_tasks = mysqli_query($conn, $query);    
              $no = 1;
              $row = mysqli_fetch_assoc($result_tasks);
            ?>
            <div class="collapse show" id="mycard-collapse">
              <div class="card-body">
               <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4">
                      <h6>Nama Peserta Didik</h6>
                    </div>
                    <div class="col-md-8">
                      <h6> : <?= $row['nama']?></h6>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-4">
                      <h6>Nik</h6>
                    </div>
                    <div class="col-md-8">
                      <h6> : <?= $row['nik']?></h6>
                    </div>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4">
                      <h6>Kelas</h6>
                    </div>
                    <div class="col-md-8">
                      <h6>: <?= $row['nama_kelas']?></h6>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-4">
                      <h6>Periode</h6>
                    </div>
                    <div class="col-md-8">
                      <h6>: <?= $row['periode']?></h6>
                    </div>
                  </div>

                </div>
               </div>
              </div>
              <div class="card-footer">
              
              </div>
            </div>
          </div>
         
        </div>
    </div>
    <!-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata">
      Tambah Data
    </button> -->
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
                <th rowspan = "2">No</th>
                <th rowspan = "2">Mata Pelajaran</th>
                <th colspan = "3" class = "text-center">Pengetahuan</th>
                <th colspan = "3" class = "text-center">Ketrampilan</th>
                <!-- <th rowspan = "2" class = "text-center">Action</th> -->
              </tr>
              <tr>
                <td>Nilai</td>
                <td>Predikat</td>
                <td>Deskripsi</td>
                <td>Nilai</td>
                <td>Predikat</td>
                <td>Deskripsi</td>
              </tr>
            </thead>
            <tbody>
            <?php    
                    $query = "SELECT * FROM tbl_laporan_belajar tlb INNER JOIN tbl_murid tm ON tm.id_murid = tlb.id_murid INNER JOIN tbl_users tu on tu.id_users = tlb.id_users INNER JOIN tbl_kelas tk on tk.id_kelas =tlb.id_kelas INNER JOIN tbl_periode tp on tp.id_periode = tk.id_periode INNER JOIN tbl_mata_pelajaran tmj on tmj.id_mata_pelajaran = tlb.id_mata_pelajaran where tm.id_murid = '$id_murid' and tk.id_kelas = $id_kelas";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['mata_pelajaran']?></td>
                  <td><?= $row['nilai_pengetahuan']?></td>
                  <td>
                    <?php 
                    if ($row['nilai_pengetahuan'] >= 80) { 
                      echo 'A';
                    }else if($row['nilai_pengetahuan'] >= 60 and $row['nilai_pengetahuan'] < 80){
                      echo 'B';
                    }else{
                      echo 'C';
                    } ?>
                  </td>
                  <td><?= $row['deskripsi_pengetahuan']?></td>
                  <td><?= $row['nilai_ketrampilan']?></td>
                  <td>
                    <?php 
                    if ($row['nilai_ketrampilan'] >= 80) { 
                      echo 'A';
                    }else if($row['nilai_ketrampilan'] >= 60 and $row['nilai_ketrampilan'] < 80){
                      echo 'B';
                    }else{
                      echo 'C';
                    } ?>
                  </td>
                  <td><?= $row['deskripsi_ketrampilan']?></td>
                 
                
                  <!-- <td class ="text-center"> 
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatedata<?= $row['id_laporan_belajar'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= $base_url ?>proses_admin/laporan_belajar/delete.php?id=<?= $row['id_laporan_belajar'] ?>&id_murid=<?= $row['id_murid'] ?>&id_kelas=<?= $row['id_kelas'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
                </tr> -->
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
      <form action="<?= $base_url ?>proses_admin/laporan_belajar/insert.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name = "id_kelas" value = "<?= $id_kelas?>">
            <label for="">Nama Murid</label>
            <select name="id_murid" class = "form-control select2" required id="">
             
                <?php    
                    $query = "SELECT * FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid where tu.status = 'aktiv' and tm.id_murid = $id_murid";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <option value="<?= $row['id_murid']?>"><?= $row['nama']?></option>
                    <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name = "id_kelas" value = "<?= $id_kelas?>">
            <label for="">Nama Mata Pelajaran</label>
            <select name="id_mata_pelajaran" class = "form-control select2" required id="">
                <option value="">--pilih mata pelajaran --</option>
            <?php    
                    $query = "SELECT * FROM tbl_mata_pelajaran";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <option value="<?= $row['id_mata_pelajaran']?>"><?= $row['mata_pelajaran']?></option>
                    <?php } ?>
            </select>
          </div>

         
          <div class="form-group">
            <label for="">Nilai Pengetahuan</label>
            <input type="number" name="nilai_pengetahuan" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Deskripsi Nilai Pengetahuan</label>
            <textarea name="deskripsi_pengetahuan" class = "form-control" id="" cols="30" rows="10" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Nilai Ketrampilan</label>
            <input type="number" name="nilai_ketrampilan" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Deskripsi Nilai Ketrampilan</label>
            <textarea name="deskripsi_ketrampilan" class = "form-control" id="" cols="30" rows="10" required></textarea>
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
$query = "SELECT * FROM tbl_laporan_belajar tlb INNER JOIN tbl_murid tm ON tm.id_murid = tlb.id_murid INNER JOIN tbl_users tu on tu.id_users = tlb.id_users INNER JOIN tbl_detail_kelas tdk on tdk.id_murid = tm.id_murid INNER JOIN tbl_kelas tk on tk.id_kelas =tdk.id_kelas INNER JOIN tbl_periode tp on tp.id_periode = tk.id_periode INNER JOIN tbl_mata_pelajaran tmj on tmj.id_mata_pelajaran = tlb.id_mata_pelajaran where tm.id_murid = '$id_murid'";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" id="updatedata<?= $row['id_laporan_belajar']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_admin/laporan_belajar/update.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
            <input type="hidden" name="id_laporan_belajar" id="" class="form-control" value = "<?= $row['id_laporan_belajar'] ?>">
            <input type="hidden" name = "id_kelas" value = "<?= $id_kelas?>">
            <div class="form-group">
                <label for="">Nama Murid</label>
                <select name="id_murid" class = "form-control select2" required id="">
             
                  <?php    
                      $query_murid = "SELECT * FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_users tu on tu.id_users = tk.id_users INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid where tu.status = 'aktiv' and tm.id_murid = $id_murid";
                      $result_murid = mysqli_query($conn, $query_murid);    
                      $no = 1;
                      while($murid = mysqli_fetch_assoc($result_murid)) { ?>
                          <option value="<?= $murid['id_murid']?>"><?= $murid['nama']?></option>
                      <?php } ?>
              </select>
                
            </div>
            <div class="form-group">
              <input type="hidden" name = "id_kelas" value = "<?= $id_kelas?>">
              <label for="">Nama Mata Pelajaran</label>
              <select name="id_mata_pelajaran" class = "form-control select2" required id="">
              <?php    
                      $query_mata_pelajaran = "SELECT * FROM tbl_mata_pelajaran";
                      $result_mata_pelajaran = mysqli_query($conn, $query_mata_pelajaran);    
                      $no = 1;
                      while($mata_pelajaran = mysqli_fetch_assoc($result_mata_pelajaran)) { ?>
                          <option value="<?= $mata_pelajaran['id_mata_pelajaran']?>" <?= $row['id_mata_pelajaran'] == $mata_pelajaran['id_mata_pelajaran'] ? 'selected' : '' ?>><?= $mata_pelajaran['mata_pelajaran']?></option>
                      <?php } ?>
              </select>
            </div>

          <div class="form-group">
            <label for="">Nilai Pengetahuan</label>
            <input type="number" name="nilai_pengetahuan" id="" class="form-control" required value = "<?= $row['nilai_pengetahuan']?>">
          </div>
          <div class="form-group">
            <label for="">Deskripsi Nilai Pengetahuan</label>
            <textarea name="deskripsi_pengetahuan" class = "form-control" id="" cols="30" rows="10" required value = "<?= $row['deskripsi_pengetahuan']?>"><?= $row['deskripsi_pengetahuan']?></textarea>
          </div>
          <div class="form-group">
            <label for="">Nilai Ketrampilan</label>
            <input type="number" name="nilai_ketrampilan" id="" class="form-control" required value = "<?= $row['nilai_ketrampilan']?>">
          </div>
          <div class="form-group">
            <label for="">Deskripsi Nilai Ketrampilan</label>
            <textarea name="deskripsi_ketrampilan" class = "form-control" id="" cols="30" rows="10" required value = "<?= $row['deskripsi_ketrampilan']?>"><?= $row['deskripsi_ketrampilan']?></textarea>
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
