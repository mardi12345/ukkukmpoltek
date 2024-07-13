<?php

include('../../include/koneksi.php');
if (isset($_POST['update'])) {

    $id_murid = $_POST['id_murid'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $status_murid = $_POST['status_murid'];

    $agama = $_POST['agama'];
    $nama = $_POST['nama'];

    $gambar = $_FILES['gambar']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($gambar != "") {
        $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
            move_uploaded_file($file_tmp, '../../assets/img/murid/'.$nama_gambar_baru); 
                
            // jalankan query UPDATE berdasarkan ID yang produknya kita edit
            $query  = "UPDATE `tbl_murid` SET `nik`='$nik',`nama`='$nama',`jenis_kelamin`='$jenis_kelamin',`tempat_lahir`='$tempat_lahir',`tanggal_lahir`='$tanggal_lahir',`gambar`='$nama_gambar_baru',`alamat`='$alamat',`agama`='$agama',`status_murid` = '$status_murid' WHERE id_murid = $id_murid";
            $result = mysqli_query($conn, $query);
            // periska query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($conn).
                        " - ".mysqli_error($conn));
            } else {
                $_SESSION['message'] = 'Update Data Successfully';
                $_SESSION['message_type'] = 'success';
                header('Location: '.$base_url.'admin/data_murid.php');
              
            }
            } else {     
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                $_SESSION['message'] = 'Ekstensi gambar yang boleh hanya jpg, jpeg atau png';
                $_SESSION['message_type'] = 'danger';
                header('Location: '.$base_url.'admin/data_murid.php');
            }
    } else {
        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query  = "UPDATE `tbl_murid` SET `nik`='$nik',`nama`='$nama',`jenis_kelamin`='$jenis_kelamin',`tempat_lahir`='$tempat_lahir',`tanggal_lahir`='$tanggal_lahir',`alamat`='$alamat',`agama`='$agama',`status_murid` = '$status_murid' WHERE id_murid = $id_murid";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                                " - ".mysqli_error($conn));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            $_SESSION['message'] = 'Update Data Successfully';
            $_SESSION['message_type'] = 'success';
            header('Location: '.$base_url.'admin/data_murid.php');
        }
    }
}