
<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
$id_murid = $_SESSION['id_murid'];
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Murid</h1>
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
                <th>Nik</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>TTL</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Status Murid</th>
                <th>Foto</th>
                <th class ="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php    
                    $query = "SELECT * FROM tbl_murid order by id_murid desc";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['nik']?></td>
                  <td><?= $row['nama']?></td>
                  <td><?= $row['jenis_kelamin']?></td>
                  <td><?= $row['tempat_lahir']?>, <?= $row['tanggal_lahir']?></td>
                  <td><?= $row['alamat']?></td>
                  <td><?= $row['agama']?></td>
                  <td><?= $row['status_murid']?></td>
                  <td width = "10%" class ="text-center"><img src="<?= $base_url ?>assets/img/murid/<?= $row['gambar']?>" alt="" width ="90%"></td>
                  <td class ="text-center"> 
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatedata<?= $row['id_murid'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= $base_url ?>proses_admin/data_murid/delete.php?id=<?= $row['id_murid'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    <a href="<?= $base_url ?>admin/data_walimurid.php?id=<?= $row['id_murid'] ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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
      <form action="<?= $base_url ?>proses_admin/data_murid/insert.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
        <div class="form-group">
            <label for="">Nik</label>
            <input type="number" name="nik" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" id="" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="" class = "form-control" required>
                <option value="">--Pilih jenis Kelamin--</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Agama</label>
            <select name="agama" id="" class = "form-control" required>
                <option value="">--Pilih Agama--</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="" class="form-control" required>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" id="" class="form-control" required>
          </div>
         
          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" id="" class="form-control" required>
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
$query = "SELECT * FROM tbl_murid";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" id="updatedata<?= $row['id_murid']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_admin/data_murid/update.php" method="post" enctype='multipart/form-data'>
            <div class="modal-body">
                <input type="hidden" name="id_murid" id="" class="form-control" value = "<?= $row['id_murid'] ?>">
                <div class="form-group">
                <label for="">Nik</label>
                <input type="number" name="nik" id="" class="form-control" required value = "<?= $row['nik']?>">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" id="" class="form-control" required value = "<?= $row['nama']?>">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="" class = "form-control" required>
                    <option value="<?= $row['jenis_kelamin']?>"><?= $row['jenis_kelamin']?></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Agama</label>
                <select name="agama" id="" class = "form-control" required>
                    <option value="<?= $row['agama']?>"><?= $row['agama']?></option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="" class="form-control" required value = "<?= $row['tempat_lahir']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="" class="form-control" required value = "<?= $row['tanggal_lahir']?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" id="" class="form-control" required value = "<?= $row['alamat']?>">
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" id="" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Status Murid</label>
              <select name="status_murid" class = "form-control" required id="">
                <option value="<?= $row['status_murid']?>"><?= $row['status_murid']?></option>
                <option value="diterima">diterima</option>
                <option value="tidak">tidak</option>
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
