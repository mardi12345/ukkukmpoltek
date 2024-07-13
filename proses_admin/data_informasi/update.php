<?php

include('../../include/koneksi.php');
if (isset($_POST['update'])) {

    $id_informasi = $_POST['id_informasi'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
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
            move_uploaded_file($file_tmp, '../../assets/img/informasi/'.$nama_gambar_baru); 
                
            // jalankan query UPDATE berdasarkan ID yang produknya kita edit
            $query  = "UPDATE `tbl_informasi` SET `judul`='$judul',`deskripsi`='$deskripsi',`gambar_informasi`='$nama_gambar_baru' WHERE `id_informasi`='$id_informasi'";
            $result = mysqli_query($conn, $query);
            // periska query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($conn).
                        " - ".mysqli_error($conn));
            } else {
                $_SESSION['message'] = 'Update Data Successfully';
                $_SESSION['message_type'] = 'success';
                header('Location: '.$base_url.'admin/data_informasi.php');
              
            }
            } else {     
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                $_SESSION['message'] = 'Ekstensi gambar yang boleh hanya jpg, jpeg atau png';
                $_SESSION['message_type'] = 'danger';
                header('Location: '.$base_url.'admin/data_informasi.php');
            }
    } else {
        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query  = "UPDATE `tbl_informasi` SET `judul`='$judul',`deskripsi`='$deskripsi' WHERE `id_informasi`='$id_informasi'";
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
            header('Location: '.$base_url.'admin/data_informasi.php');
        }
    }
}