<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  $id_murid = $_POST['id_murid'];
  $id_kelas = $_POST['id_kelas'];
  $nilai_pengetahuan = $_POST['nilai_pengetahuan'];
  $deskripsi_pengetahuan = $_POST['deskripsi_pengetahuan'];
  $id_users = $_SESSION['id_users'];
  $nilai_ketrampilan = $_POST['nilai_ketrampilan'];
  $deskripsi_ketrampilan = $_POST['deskripsi_ketrampilan'];
  $id_mata_pelajaran = $_POST['id_mata_pelajaran'];

  $query = "INSERT INTO `tbl_laporan_belajar`(`id_murid`, `nilai_pengetahuan`, `id_users`, `id_kelas`, `deskripsi_pengetahuan`, `id_mata_pelajaran`, `nilai_ketrampilan`,`deskripsi_ketrampilan` ) VALUES ('$id_murid','$nilai_pengetahuan','$id_users', '$id_kelas','$deskripsi_pengetahuan', '$id_mata_pelajaran', '$nilai_ketrampilan', '$deskripsi_ketrampilan')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'guru/data_detail_laporan_belajar.php?id='.$id_murid.'&id_kelas='.$id_kelas);


}

?>
