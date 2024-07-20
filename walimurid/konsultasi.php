<?php 
include('../include/koneksi.php');

if ($_SESSION['id_wali_murid'] == NULL) {
  header('Location: '.$base_url.'walimurid/login.php');
}
include('../template_walimurid/header.php');
include('../template_walimurid/navbar.php');

error_reporting(0);

$id_wali_murid = $_SESSION['id_wali_murid'];

// Query untuk mendapatkan organisasi yang sudah dipilih
$query_organisasi_sudah_pilih = "SELECT DISTINCT konsultasi FROM tbl_konsultasi WHERE id_wali_murid = $id_wali_murid";
$result_organisasi_sudah_pilih = mysqli_query($conn, $query_organisasi_sudah_pilih);

$organisasi_sudah_pilih = [];
while ($row = mysqli_fetch_assoc($result_organisasi_sudah_pilih)) {
    $organisasi_sudah_pilih[] = $row['konsultasi'];
}
?>

<div class="blog-page area-padding">
    <div class="container mt-5">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata">
        Tambah Keanggotaan
        </button>
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
    
                    <hr>
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
                    <table id="table" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead >
                            <tr >
                                <th width="5%">No.</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Organisasi Pilihan</th>
                                <th>Alasan Memilih</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            <?php    
                                    $query = "SELECT * FROM tbl_konsultasi tk INNER JOIN tbl_users tu ON tk.id_users = tu.id_users WHERE tk.id_wali_murid = $id_wali_murid";
                                    $result_tasks = mysqli_query($conn, $query);    
                                    $no = 1;
                                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['tanggal_konsultasi']?></td>
                                    <td><?= $row['jam_konsultasi']?></td>
                                    <td><?= $row['konsultasi']?></td>
                                    <td><?= $row['alasan_memilih']?></td>
                                    <?php if ($row['status_konsultasi'] != 'approve') { ?>
                                        <td class="text-center"> 
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatedata<?= $row['id_konsultasi'] ?>">
                                            <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="<?= $base_url ?>proses_walimurid/data_konsultasi/delete.php?id=<?= $row['id_konsultasi'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                    <?php } else { ?>
                                        <td class="text-center"><p class="fas fa-check"></p></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Keanggotaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_walimurid/data_konsultasi/insert.php" method="post" enctype='multipart/form-data'>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal_konsultasi" id="" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Waktu</label>
                    <input type="time" name="jam_konsultasi" id="" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Organisasi Pilihan</label>
            <select name="konsultasi" class="form-control" required>
                <option value="">-- Pilih Organisasi --</option>
                <?php 
                $organisasi_list = [
                    'PATAKA' => 'PATAKA',
                    'DRUMBAND' => 'DRUMBAND',
                    'PADUAN SUARA' => 'PADUAN SUARA',
                    'VOLLY BALL' => 'VOLLY BALL',
                    'BADMINTON' => 'BADMINTON',
                    'FUTSAL' => 'FUTSAL',
                    'BASKET' => 'BASKET',
                    'KOPMA' => 'KOPMA',
                    'ROHIS' => 'ROHIS',
                    'ROHKRIS' => 'ROHKRIS',
                ];
                foreach ($organisasi_list as $value => $text) {
                    if (!in_array($value, $organisasi_sudah_pilih)) {
                        echo "<option value=\"$value\">$text</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Alasan Memilih Organisasi</label>
            <textarea name="alasan_memilih" class="form-control" id="" cols="30" rows="5" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="insert" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
  $query = "SELECT * FROM tbl_konsultasi tk INNER JOIN tbl_users tu ON tk.id_users = tu.id_users WHERE tk.id_wali_murid = $id_wali_murid";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
while($row = mysqli_fetch_assoc($result_tasks)) { ?>
<div class="modal fade" id="updatedata<?= $row['id_konsultasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= $base_url ?>proses_walimurid/data_konsultasi/update.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
            <input type="hidden" name="id_konsultasi" id="" class="form-control" value="<?= $row['id_konsultasi'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal_konsultasi" id="" class="form-control" required value="<?= $row['tanggal_konsultasi']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Waktu</label>
                        <input type="time" name="jam_konsultasi" id="" class="form-control" required value="<?= $row['jam_konsultasi']?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Organisasi Pilihan</label>
                <select name="konsultasi" class="form-control" required>
                    <option value="PATAKA" <?= ($row['konsultasi'] == 'PATAKA') ? 'selected' : '' ?>>PATAKA</option>
                    <option value="Organisasi B" <?= ($row['konsultasi'] == 'Organisasi B') ? 'selected' : '' ?>>DRUMBAND</option>
                    <option value="Organisasi C" <?= ($row['konsultasi'] == 'Organisasi C') ? 'selected' : '' ?>>PADUAN SUARA</option>
                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                </select>
            </div>
            <div class="form-group">
                <label for="">Alasan Memilih Organisasi</label>
                <textarea name="alasan_memilih" class="form-control" id="" cols="30" rows="5" required><?= $row['alasan_memilih']?></textarea>
            </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="update" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
  </div>
</div>
<?php } ?>
<?php
include('../template_walimurid/script.php');
include('../template_walimurid/footer.php');
?>
