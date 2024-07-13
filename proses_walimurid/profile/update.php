<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_wali_murid = $_POST['id_wali_murid'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    
    $query = "UPDATE `tbl_wali_murid` SET `nama_ayah`='$nama_ayah',`nama_ibu`='$nama_ibu',`pekerjaan_ayah`='$pekerjaan_ayah',`pekerjaan_ibu`='$pekerjaan_ibu',`alamat`='$alamat',`no_telp`='$no_telp',`email`='$email',`username`='$username',`password`='$password' WHERE id_wali_murid = $id_wali_murid";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'walimurid/profile.php');
    
    
   
   
}

?>