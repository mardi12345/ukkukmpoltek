<?php 
 
include('../include/koneksi.php');
 
error_reporting(0);
 
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM tbl_pengepul WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);


    $sql_nasabah = "SELECT * FROM tbl_nasabah WHERE username = '$username' AND password = '$password'";
    $result_nasabah = mysqli_query($conn, $sql_nasabah);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['hak_akses'] = 'pengepul';
        $_SESSION['id_users'] = $row['id_pengepul'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_users'] = $row['nama_pengepul'];
        $_SESSION['gambar'] = $row['gambar'];
        header('Location: '.$base_url.'pengepul/dashboard.php');
    }else if($result_nasabah->num_rows > 0){
        $row = mysqli_fetch_assoc($result_nasabah);
        $_SESSION['hak_akses'] = 'nasabah';
        $_SESSION['id_users'] = $row['id_nasabah'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_users'] = $row['nama_nasabah'];
        $_SESSION['gambar'] = $row['gambar'];
        header('Location: '.$base_url.'nasabah/dashboard.php');
    } else {
        $_SESSION['message'] = 'login Gagal !!';
        $_SESSION['message_type'] = 'danger';
        header('Location: '.$base_url.'');
    }
}else{
    $_SESSION['message'] = 'login Gagal !!';
    $_SESSION['message_type'] = 'danger';
    header('Location: '.$base_url.'');
}
 
?>