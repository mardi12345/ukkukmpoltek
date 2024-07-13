<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_detail_kelas = $_POST['id_detail_kelas'];
    $id_kelas = $_POST['id_kelas'];
    $id_murid = $_POST['id_murid'];
    $query = "UPDATE `tbl_detail_kelas` SET `id_murid`='$id_murid',`id_kelas`='$id_kelas' WHERE `id_detail_kelas` = $id_detail_kelas";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'admin/data_detail_kelas.php?id='.$id_kelas);

}

?>