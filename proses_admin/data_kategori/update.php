<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = "UPDATE `tbl_kategori` SET `nama_kategori`='$nama_kategori' WHERE `id_kategori`='$id_kategori'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'admin/data_kategori.php');

}

?>