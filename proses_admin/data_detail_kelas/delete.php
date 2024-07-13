<?php

include('../../include/koneksi.php');

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $id_kelas = $_GET['id_kelas'];

  $query = "DELETE FROM `tbl_detail_kelas` WHERE `id_detail_kelas`='$id'";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Delete Data Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: '.$base_url.'admin/data_detail_kelas.php?id='.$id_kelas);
}

?>
