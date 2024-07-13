
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
      <h1>Data Laporan Belajar</h1>
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
                <th>Periode</th>
                <th>Nama Kategori</th>
                <th>Nama Wali</th>
                <th class ="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php    
                    $query = "SELECT * FROM tbl_kelas tk INNER JOIN tbl_kategori tkg ON tk.id_kategori = tkg.id_kategori INNER JOIN tbl_periode tp on tp.id_periode = tk.id_periode INNER JOIN tbl_users tu on tu.id_users = tk.id_users  where tu.status = 'aktiv'";
                    $result_tasks = mysqli_query($conn, $query);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['nama_kelas']?></td>
                  <td><?= $row['periode']?></td>
                  <td><?= $row['nama_kategori']?></td>
                  <td><?= $row['nama_users']?></td>
                  <td class ="text-center"> 
                    <a href="<?= $base_url ?>kepala_sekolah/data_detail_laporan_users.php?id=<?= $row['id_kelas'] ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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

<?php include('../template/footer.php'); ?>
