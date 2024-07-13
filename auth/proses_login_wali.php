<?php 
 
include('../include/koneksi.php');
 
error_reporting(0);
 
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM tbl_wali_murid WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_wali_murid'] = $row['id_wali_murid'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_ayah'] = $row['nama_ayah'];
        header('Location: '.$base_url.'');
    } else {
        $_SESSION['message'] = 'login Gagal !!';
        $_SESSION['message_type'] = 'danger';
        header('Location: '.$base_url.'walimurid/login.php');
    }
}else{
    $_SESSION['message'] = 'login Gagal !!';
    $_SESSION['message_type'] = 'danger';
    header('Location: '.$base_url.'walimurid/login.php');
}
 
?>