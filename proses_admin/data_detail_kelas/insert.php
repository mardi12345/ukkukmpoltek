<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  $id_kelas = $_POST['id_kelas'];
  $id_murid = $_POST['id_murid'];
  $id_users = $_SESSION['id_users'];
  $query = "INSERT INTO `tbl_detail_kelas`(`id_murid`,`id_kelas`,`id_users`) VALUES ('$id_murid','$id_kelas','$id_users')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'admin/data_detail_kelas.php?id='.$id_kelas);


}

?>
