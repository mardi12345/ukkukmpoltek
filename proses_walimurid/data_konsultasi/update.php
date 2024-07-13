<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_konsultasi = $_POST['id_konsultasi'];
    $status_konsultasi = $_POST['status_konsultasi'];
    $jawaban_konsultasi = $_POST['jawaban_konsultasi'];

    $id_wali_murid = $_POST['id_wali_murid'];
    $query_wali_murid = "SELECT * FROM tbl_wali_murid where id_wali_murid = $id_wali_murid";
    $result_tasks_wali = mysqli_query($conn, $query_wali_murid);    
    $no = 1;
    $data_wali =  mysqli_fetch_assoc($result_tasks_wali);

    $token = 'wrj7ZeU5@Ih9vNoC1jf8';
    $target = $data_wali['no_telp'];

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

    $query = "UPDATE `tbl_konsultasi` SET `status_konsultasi`='$status_konsultasi', `jawaban_konsultasi`='$jawaban_konsultasi' WHERE id_konsultasi = $id_konsultasi";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }


    $_SESSION['message'] = 'Update Data Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: '.$base_url.'walimurid/konsultasi.php');
}

?>