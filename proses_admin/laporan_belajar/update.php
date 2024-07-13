<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_laporan_belajar = $_POST['id_laporan_belajar'];

    $id_murid = $_POST['id_murid'];
    $nilai = $_POST['nilai'];
    $nilai_pengetahuan = $_POST['nilai_pengetahuan'];
    $deskripsi_pengetahuan = $_POST['deskripsi_pengetahuan'];
    $nilai_ketrampilan = $_POST['nilai_ketrampilan'];
    $deskripsi_ketrampilan = $_POST['deskripsi_ketrampilan'];
    $id_mata_pelajaran = $_POST['id_mata_pelajaran'];

    $id_kelas = $_POST['id_kelas'];

    $query = "UPDATE `tbl_laporan_belajar` SET `nilai_pengetahuan`='$nilai_pengetahuan',`deskripsi_pengetahuan`='$deskripsi_pengetahuan',`id_murid`='$id_murid',`id_mata_pelajaran`='$id_mata_pelajaran',`nilai_ketrampilan`='$nilai_ketrampilan',`deskripsi_ketrampilan`='$deskripsi_ketrampilan' WHERE id_laporan_belajar = $id_laporan_belajar";

    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }
    
    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'admin/data_detail_laporan_belajar.php?id='.$id_murid.'&id_kelas=3'.$id_kelas);

}

?>