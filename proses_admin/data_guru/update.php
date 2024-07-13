<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_users = $_POST['id_users'];
    $nama_users = $_POST['nama_users'];
    $alamat_users = $_POST['alamat_users'];
    $email_users = $_POST['email_users'];
    $no_telp_users = $_POST['no_telp_users'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "UPDATE `tbl_users` SET `nama_users`='$nama_users',`alamat_users`='$alamat_users',`email_users`='$email_users',`no_telp_users`='$no_telp_users',`username`='$username',`password`='$password' WHERE  `id_users`='$id_users'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'admin/data_guru.php');

}

?>