<?php

include('../../include/koneksi.php');

if (isset($_POST['update'])) {
  
    $id_murid = $_POST['id_murid'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query_jumlah = "SELECT * FROM tbl_wali_murid WHERE id_murid = $id_murid";
    $result_jumlah = mysqli_query($conn, $query_jumlah);
    $jumlah = mysqli_num_rows($result_jumlah);

    if($jumlah > 0){
        $query = "UPDATE `tbl_wali_murid` SET `nama_ayah`='$nama_ayah',`nama_ibu`='$nama_ibu',`pekerjaan_ayah`='$pekerjaan_ayah',`pekerjaan_ibu`='$pekerjaan_ibu',`alamat`='$alamat',`no_telp`='$no_telp',`email`='$email',`username`='$username',`password`='$password' WHERE id_murid = $id_murid";
        $result = mysqli_query($conn, $query);

        if(!$result) {
            die("Query Failed.");
        }
    
        $_SESSION['message'] = 'Update Data Successfully';
        $_SESSION['message_type'] = 'success';
        header('Location: '.$base_url.'admin/data_murid.php');
    
    }else{
        $query = "INSERT INTO `tbl_wali_murid`(`nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `no_telp`, `email`, `username`, `password`, `id_murid`) VALUES ('$nama_ayah','$nama_ibu','$pekerjaan_ayah','$pekerjaan_ibu','$alamat','$no_telp','$email','$username','$password','$id_murid')";
        $result = mysqli_query($conn, $query);

    

        if(!$result) {
            die("Query Failed.");
        }
    
        $_SESSION['message'] = 'Update Data Successfully';
        $_SESSION['message_type'] = 'success';
        header('Location: '.$base_url.'admin/data_murid.php');
    
    }
   
   
}

?>