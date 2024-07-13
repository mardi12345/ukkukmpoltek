<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_mata_pelajaran = $_POST['id_mata_pelajaran'];
    $mata_pelajaran = $_POST['mata_pelajaran'];

    $query = "UPDATE `tbl_mata_pelajaran` SET `mata_pelajaran`='$mata_pelajaran' WHERE `id_mata_pelajaran`='$id_mata_pelajaran'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'admin/data_mata_pelajaran.php');

}

?>