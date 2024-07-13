<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {

  $id_kategori = $_POST['id_kategori'];
  $nama_kelas = $_POST['nama_kelas'];
  $id_users = $_POST['id_users'];
  $id_periode = $_POST['id_periode'];

  $query = "INSERT INTO `tbl_kelas`(`id_kategori`, `nama_kelas`, `id_users`, `id_periode`) VALUES ('$id_kategori','$nama_kelas','$id_users', '$id_periode')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'admin/data_kelas.php');


}

?>
