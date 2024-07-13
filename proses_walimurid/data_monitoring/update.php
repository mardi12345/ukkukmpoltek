<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_monitoring = $_POST['id_monitoring'];

    $id_murid = $_POST['id_murid'];
    $perkembangan = $_POST['perkembangan'];
    $id_kelas = $_POST['id_kelas'];

    $query = "UPDATE `tbl_monitoring` SET `id_murid`='$id_murid',`perkembangan`='$perkembangan' WHERE id_monitoring = $id_monitoring";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'guru/data_monitoring.php');

}

?>