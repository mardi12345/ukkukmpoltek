<?php

include('../../include/koneksi.php');

if (isset($_POST['insert'])) {
  $id_wali_murid = $_SESSION['id_wali_murid'];
  $query_select = "SELECT tk.id_users FROM tbl_detail_kelas tdk INNER JOIN tbl_kelas tk on tk.id_kelas = tdk.id_kelas INNER JOIN tbl_murid tm on tm.id_murid = tdk.id_murid INNER JOIN tbl_wali_murid twm on twm.id_murid = tm.id_murid WHERE twm.id_wali_murid = $id_wali_murid";
  $result_tasks = mysqli_query($conn, $query_select);    
  $row = mysqli_fetch_assoc($result_tasks);

  // Ambil data dari POST
  $tanggal_konsultasi = mysqli_real_escape_string($conn, $_POST['tanggal_konsultasi']);
  $jam_konsultasi = mysqli_real_escape_string($conn, $_POST['jam_konsultasi']);
  $konsultasi = mysqli_real_escape_string($conn, $_POST['konsultasi']);
  $jawaban_konsultasi = mysqli_real_escape_string($conn, $_POST['jawaban_konsultasi']);
  $alasan_memilih = mysqli_real_escape_string($conn, $_POST['alasan_memilih']); // Ambil data alasan memilih

  $status_konsultasi = 'diajukan';
  $id_users = $row['id_users'];

  // Update query untuk menyertakan alasan_memilih
  $query = "INSERT INTO `tbl_konsultasi`(`tanggal_konsultasi`, `jam_konsultasi`, `konsultasi`, `jawaban_konsultasi`, `alasan_memilih`, `status_konsultasi`, `id_users`, `id_wali_murid`) 
            VALUES ('$tanggal_konsultasi','$jam_konsultasi','$konsultasi','$jawaban_konsultasi','$alasan_memilih','$status_konsultasi','$id_users','$id_wali_murid')";

  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'walimurid/konsultasi.php');
}
?>
