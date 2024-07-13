<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_periode = $_POST['id_periode'];
    $periode = $_POST['periode'];

    $query = "UPDATE `tbl_periode` SET `periode`='$periode' WHERE `id_periode`='$id_periode'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'admin/data_periode.php');

}

?>