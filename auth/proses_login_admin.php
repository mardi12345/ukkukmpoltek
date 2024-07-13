<?php 
 
include('../include/koneksi.php');
 
error_reporting(0);
 
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        if($row['hak_akses'] == 'admin'){
            $_SESSION['hak_akses'] = $row['hak_akses'];
            $_SESSION['id_users'] = $row['id_users'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama_users'] = $row['nama_users'];
            header('Location: '.$base_url.'admin/dashboard.php');

        }else if($row['hak_akses'] == 'guru'){
            $_SESSION['hak_akses'] = $row['hak_akses'];
            $_SESSION['id_users'] = $row['id_users'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama_users'] = $row['nama_users'];
            header('Location: '.$base_url.'guru/dashboard.php');
        }else{
            $_SESSION['hak_akses'] = $row['hak_akses'];
            $_SESSION['id_users'] = $row['id_users'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama_users'] = $row['nama_users'];
            header('Location: '.$base_url.'kepala_sekolah/dashboard.php');
        }
    } else {
        $_SESSION['message'] = 'login Gagal !!';
        $_SESSION['message_type'] = 'danger';
        header('Location: '.$base_url.'admin/login.php');
    }
}else{
    $_SESSION['message'] = 'login Gagal !!';
    $_SESSION['message_type'] = 'danger';
    header('Location: '.$base_url.'');
}
 
?>