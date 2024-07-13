<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  $nama_kategori = $_POST['nama_kategori'];
  $query = "INSERT INTO `tbl_kategori`(`nama_kategori`) VALUES ('$nama_kategori')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'guru/data_konsultasi.php');


}

?>
