<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
    $id_wali_murid = $_POST['id_wali_murid'];
    $nama_ayah = mysqli_real_escape_string($conn, $_POST['nama_ayah']);
    $nama_ibu = mysqli_real_escape_string($conn, $_POST['nama_ibu']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query untuk mendapatkan id_murid dari tbl_wali_murid
    $query_murid = "SELECT id_murid FROM tbl_wali_murid WHERE id_wali_murid = $id_wali_murid";
    $result_murid = mysqli_query($conn, $query_murid);

    if (!$result_murid) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $row_murid = mysqli_fetch_assoc($result_murid);
    $id_murid = $row_murid['id_murid'];

    // Update query untuk tbl_murid
    $update_murid_query = "UPDATE `tbl_murid`
                           SET `nama`='$nama_ayah', `nik`='$nama_ibu'
                           WHERE `id_murid` = $id_murid";

    $update_murid_result = mysqli_query($conn, $update_murid_query);

    if (!$update_murid_result) {
        die("Update Murid Query Failed: " . mysqli_error($conn));
    }

    // Update query untuk tbl_wali_murid
    $update_wali_query = "UPDATE `tbl_wali_murid`
                          SET `alamat`='$alamat',
                              `no_telp`='$no_telp',
                              `email`='$email',
                              `username`='$username',
                              `password`='$password'
                          WHERE `id_wali_murid` = $id_wali_murid";

    $update_wali_result = mysqli_query($conn, $update_wali_query);

    if (!$update_wali_result) {
        die("Update Wali Query Failed: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'walimurid/profile.php');
}
?>
