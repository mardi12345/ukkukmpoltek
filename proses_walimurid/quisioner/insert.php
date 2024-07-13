<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  $id_wali_murid = $_SESSION['id_wali_murid'];
  $q1 = $_POST['q1'];
  $q2 = $_POST['q2'];
  $q3 = $_POST['q3'];
  $q4 = $_POST['q4'];
  $q5 = $_POST['q5'];


  $query = "INSERT INTO `tbl_quisioner`(`q1`, `q2`, `q3`, `q4`, `q5`, `id_wali_murid`) VALUES ('$q1','$q2','$q3','$q4','$q5','$id_wali_murid')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  
  

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'');


}else{

}

?>
