<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  $periode = $_POST['periode'];
  $query = "INSERT INTO `tbl_periode`(`periode`) VALUES ('$periode')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'admin/data_periode.php');


}

?>
