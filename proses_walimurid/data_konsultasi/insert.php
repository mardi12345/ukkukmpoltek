<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi Akun</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Gunakan jQuery penuh -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  
<?php
include('../../include/koneksi.php');
$show_modal = false;

if (isset($_POST['insert'])) {
  $id_wali_murid = $_SESSION['id_wali_murid'];
  $query_select = "SELECT tk.id_users FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid INNER JOIN tbl_wali_murid twm on twm.id_murid = tm.id_murid WHERE twm.id_wali_murid = $id_wali_murid";
  $result_tasks = mysqli_query($conn, $query_select);    
  $row = mysqli_fetch_assoc($result_tasks);

  // Ambil data dari POST
  $tanggal_konsultasi = mysqli_real_escape_string($conn, $_POST['tanggal_konsultasi']);
  $jam_konsultasi = mysqli_real_escape_string($conn, $_POST['jam_konsultasi']);
  $konsultasi = mysqli_real_escape_string($conn, $_POST['konsultasi']);
  $alasan_memilih = mysqli_real_escape_string($conn, $_POST['alasan_memilih']); // Ambil data alasan memilih

  $status_konsultasi = 'diajukan';
  $id_users = isset($row['id_users']) ? $row['id_users'] : '';

  // Periksa apakah id_users kosong
  if (empty($id_users)) {
    $show_modal = true;
  } else {
    // Update query untuk menyertakan alasan_memilih
    $query = "INSERT INTO `tbl_konsultasi`(`tanggal_konsultasi`, `jam_konsultasi`, `konsultasi`, `alasan_memilih`, `status_konsultasi`, `id_users`, `id_wali_murid`) 
              VALUES ('$tanggal_konsultasi','$jam_konsultasi','$konsultasi','$alasan_memilih','$status_konsultasi','$id_users','$id_wali_murid')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
      die("Query Failed: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Insert Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'walimurid/konsultasi.php');
  }
}
?>

<!-- Modal HTML -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verifikasi Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Akun Anda belum terverifikasi ke tingkat tertentu, silahkan hubungi admin.
      </div>
      <div class="modal-footer">
        <button id="closeModal" type="button" class="btn btn-secondary">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    <?php if ($show_modal): ?>
      $('#myModal').modal('show');
    <?php endif; ?>

    // Handler untuk tombol Tutup di modal
    $('#closeModal').on('click', function() {
      window.history.back(); // Arahkan kembali ke halaman sebelumnya
    });
  });
</script>

</body>
</html>
