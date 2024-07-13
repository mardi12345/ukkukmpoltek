<?php

 
include('../../include/koneksi.php');


if (isset($_POST['insert'])) {
  
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $status_murid = 'menunggu hasil';
    $gambar = $_FILES['gambar']['name'];
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
        move_uploaded_file($file_tmp, '../../assets/img/murid/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
            
        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query = "INSERT INTO `tbl_murid`(`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `gambar`, `alamat`, `agama`, `status_murid`) VALUES ('$nik','$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$nama_gambar_baru','$alamat','$agama', '$status_murid')";
        $result = mysqli_query($conn, $query);
        
        $id_murid = mysqli_insert_id($conn);
        $nama_ayah = $_POST['nama_ayah'];
        $nama_ibu = $_POST['nama_ibu'];
        $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
        $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);


        $query = "INSERT INTO `tbl_wali_murid`(`nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `no_telp`, `email`, `username`, `password`, `id_murid`) VALUES ('$nama_ayah','$nama_ibu','$pekerjaan_ayah','$pekerjaan_ibu','$alamat','$no_telp','$email','$username','$password','$id_murid')";
        $result = mysqli_query($conn, $query);


        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                    " - ".mysqli_error($conn));
        } else {
            $_SESSION['message'] = 'Register Data Successfully';
            $_SESSION['message_type'] = 'success';
            header('Location: '.$base_url.'walimurid/login.php');
        
        }
    } else {     
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        $_SESSION['message'] = 'Ekstensi gambar yang boleh hanya jpg, jpeg atau png';
        $_SESSION['message_type'] = 'danger';
        header('Location: '.$base_url.'walimurid/pendaftaran.php');
    }
}else{

    var_dump('test');
    die();
}

?>
