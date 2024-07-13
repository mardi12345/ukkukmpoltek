<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_kelas = $_POST['id_kelas'];
    $id_kategori = $_POST['id_kategori'];
    $nama_kelas = $_POST['nama_kelas'];
    $id_users = $_POST['id_users'];
    $id_periode = $_POST['id_periode'];

    $query = "UPDATE `tbl_kelas` SET `id_kategori`='$id_kategori',`nama_kelas`='$nama_kelas',`id_users`='$id_users', `id_periode`='$id_periode' WHERE `id_kelas`='$id_kelas'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'admin/data_kelas.php');

}

?>