<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  $id_murid = $_POST['id_murid'];
  $perkembangan = $_POST['perkembangan'];
  $id_users = $_SESSION['id_users'];
  $id_kelas = $_POST['id_kelas'];

  $query_wali_murid = "SELECT * FROM tbl_wali_murid twm INNER JOIN tbl_murid tm on tm.id_murid = twm.id_murid where twm.id_murid = $id_murid";
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
          'message' => 'Monitoring perkembangan siswa telah dikirim mohon cek website',
      ),
      CURLOPT_HTTPHEADER => array(
          "Authorization: $token"
      ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);


  $query = "INSERT INTO `tbl_monitoring`(`id_murid`, `perkembangan`, `id_users`) VALUES ('$id_murid','$perkembangan','$id_users')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: '.$base_url.'guru/data_monitoring.php');


}

?>
