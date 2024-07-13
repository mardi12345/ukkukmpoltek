<?php

include('../../include/koneksi.php');

if(isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "DELETE FROM `tbl_konsultasi` WHERE `id_konsultasi`='$id'";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Delete Data Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: '.$base_url.'walimurid/konsultasi.php');
}

?>
