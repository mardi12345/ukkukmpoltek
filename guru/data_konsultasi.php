
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
      <h1>Data Konsultasi</h1>
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
          
            <table id="table" class="table table-striped table-hover" cellspacing="0" width="100%">
                <thead >
                    <tr >
                        <th width = "5%">No.</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Konsultasi</th>
                        <th>Status Konsultasi</th>
                        <th>Jawaban Konsultasi</th>
                        <th>Wali Kelas</th>
                        <th>Nama Wali</th>
                        <th>Nama Murid</th>
                        <th class="text-center" width = "20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    <?php    
                            $query = "SELECT * FROM tbl_konsultasi tk INNER JOIN tbl_users tu ON tk.id_users = tu.id_users INNER JOIN tbl_wali_murid twm on twm.id_wali_murid = tk.id_wali_murid INNER JOIN tbl_murid tm on tm.id_murid = twm.id_murid where tu.id_users = $id_users";
                            $result_tasks = mysqli_query($conn, $query);    
                            $no = 1;
                            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['tanggal_konsultasi']?></td>
                            <td><?= $row['jam_konsultasi']?></td>
                            <td><?= $row['konsultasi']?></td>
                            <td><?= $row['status_konsultasi']?></td>
                            <td><?= $row['jawaban_konsultasi']?></td>
                            <td><?= $row['nama_users']?></td>
                            <td><?= $row['nama_ayah']?></td>
                            <td><?= $row['nama']?></td>
                            <?php if ( $row['status_konsultasi'] != 'approve') { ?>
                                <td class ="text-center"> 
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatedata<?= $row['id_konsultasi'] ?>">
                                    <i class="fas fa-edit"></i>
                                    </button>
                                    <!-- <a href="<?= $base_url ?>proses_walimurid/data_konsultasi/delete.php?id=<?= $row['id_konsultasi'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                                </td>
                            
                            <?php }else{ ?>
                                <td class ="text-center">-</td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
$query = "SELECT * FROM tbl_konsultasi tk INNER JOIN tbl_users tu ON tk.id_users = tu.id_users INNER JOIN tbl_wali_murid twm on twm.id_wali_murid = tk.id_wali_murid INNER JOIN tbl_murid tm on tm.id_murid = twm.id_murid where tu.id_users = $id_users";
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
      <form action="<?= $base_url ?>proses_guru/data_konsultasi/update.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
          <input type="hidden" name="id_konsultasi" id="" class="form-control" value = "<?= $row['id_konsultasi'] ?>">
            <input type="hidden" name="id_wali_murid" id="" class="form-control" value = "<?= $row['id_wali_murid'] ?>">
            <div class="form-group">
                <label for="">Status Konsultasi</label>
                <select name="status_konsultasi" class = "form-control status_konsultasi" id="" required>
                    <option value="">--Pilih Konsultasi--</option>
                    <option value="approve">approve</option>
                    <option value="ditunda">ditunda</option>
                </select>
            </div>
            <input type="hidden" name = "jawaban_konsultasi">
            <div class="form-group jawaban_konsultasi">
                <label for="">Jawaban Konsultasi</label>
                <textarea name="jawaban_konsultasi" class = "form-control " id="" cols="30" rows="10"></textarea>
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


<script>
  $('.status_konsultasi').on('change', function() {
    var status = this.value;

    if (status == 'ditunda') {
        $('.jawaban_konsultasi').hide();
    }else{
      $('.jawaban_konsultasi').show();
    }
  });
</script>
<?php include('../template/footer.php'); ?>
