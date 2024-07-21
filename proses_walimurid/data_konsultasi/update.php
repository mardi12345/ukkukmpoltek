<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {

    // Ambil dan sanitasi data dari POST
    $id_konsultasi = mysqli_real_escape_string($conn, $_POST['id_konsultasi']);
    $tanggal_konsultasi = mysqli_real_escape_string($conn, $_POST['tanggal_konsultasi']);
    $jam_konsultasi = mysqli_real_escape_string($conn, $_POST['jam_konsultasi']);
    $konsultasi = mysqli_real_escape_string($conn, $_POST['konsultasi']);
    $alasan_memilih = mysqli_real_escape_string($conn, $_POST['alasan_memilih']);
    $status_konsultasi = mysqli_real_escape_string($conn, $_POST['status_konsultasi']);

    // Menggunakan id_wali_murid dari session
    $id_wali_murid = $_SESSION['id_wali_murid'];

    // Ambil id_users menggunakan query yang sama seperti di insert.php
    $query_select = "SELECT tk.id_users 
                     FROM tbl_detail_kelas tdk 
                     INNER JOIN tbl_kelas tk ON tk.id_kelas = tdk.id_kelas 
                     INNER JOIN tbl_murid tm ON tm.id_murid = tdk.id_murid 
                     INNER JOIN tbl_wali_murid twm ON twm.id_murid = tm.id_murid 
                     WHERE twm.id_wali_murid = $id_wali_murid";
    $result_tasks = mysqli_query($conn, $query_select);
    if (!$result_tasks) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result_tasks);
    $id_users = isset($row['id_users']) ? $row['id_users'] : '';

    // Periksa apakah id_users kosong
    if (empty($id_users)) {
        die("Error: id_users tidak ditemukan.");
    }

    // Ambil data wali murid
    $query_wali_murid = "SELECT * FROM tbl_wali_murid WHERE id_wali_murid = $id_wali_murid";
    $result_tasks_wali = mysqli_query($conn, $query_wali_murid);
    if (!$result_tasks_wali) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $data_wali = mysqli_fetch_assoc($result_tasks_wali);
    $token = 'wrj7ZeU5@Ih9vNoC1jf8';
    $target = $data_wali['no_telp'];

    // Kirim notifikasi
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => $target,
            'message' => 'Konsultasi telah dibalas mohon cek website',
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    // Update data konsultasi
    $query = "UPDATE `tbl_konsultasi` SET 
              `tanggal_konsultasi` = '$tanggal_konsultasi', 
              `jam_konsultasi` = '$jam_konsultasi', 
              `konsultasi` = '$konsultasi', 
              `alasan_memilih` = '$alasan_memilih', 
              `status_konsultasi` = '$status_konsultasi' 
              WHERE id_konsultasi = $id_konsultasi";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'walimurid/konsultasi.php');
}

?>
