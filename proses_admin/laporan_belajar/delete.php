<?php

include('../../include/koneksi.php');

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $id_kelas = $_GET['id_kelas'];
  $id_murid = $_GET['id_murid'];

  $query = "DELETE FROM `tbl_laporan_belajar` WHERE `id_laporan_belajar`='$id'";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Delete Data Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: '.$base_url.'admin/data_detail_laporan_belajar.php?id='.$id_murid.'&id_kelas='.$id_kelas);
}

?>
