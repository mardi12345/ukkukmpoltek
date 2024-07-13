<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  $mata_pelajaran = $_POST['mata_pelajaran'];
  $query = "INSERT INTO `tbl_mata_pelajaran`(`mata_pelajaran`) VALUES ('$mata_pelajaran')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'admin/data_mata_pelajaran.php');


}

?>
