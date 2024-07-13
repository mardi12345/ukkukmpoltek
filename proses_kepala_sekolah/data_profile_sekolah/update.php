<?php

include('../../include/koneksi.php');
if (isset($_POST['update'])) {

    $nama_sekolah = $_POST['nama_sekolah'];
    $deskripsi = $_POST['deskripsi'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $no_hp = $_POST['no_hp'];
    $facebook = $_POST['facebook'];
    $email = $_POST['email'];
    $instagram = $_POST['instagram'];
    $alamat = $_POST['alamat'];
    $id_users = $_SESSION['id_users'];;
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
            move_uploaded_file($file_tmp, '../../assets/img/profile_sekolah/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                
            // jalankan query UPDATE berdasarkan ID yang produknya kita edit
            $query  = "UPDATE `tbl_profile` SET `nama_sekolah`='$nama_sekolah',`deskripsi`='$deskripsi',`visi`='$visi',`misi`='$misi',`no_hp`='$no_hp',`facebook`='$facebook',`email`='$email',`instagram`='$instagram',`id_users`='$id_users',`gambar_sekolah`='$nama_gambar_baru',`alamat`='$alamat' WHERE id_profile_sekolah = 1";
            $result = mysqli_query($conn, $query);
            // periska query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($conn).
                        " - ".mysqli_error($conn));
            } else {
                $_SESSION['message'] = 'Update Data Successfully';
                $_SESSION['message_type'] = 'success';
                header('Location: '.$base_url.'kepala_sekolah/data_profile_sekolah.php');
              
            }
            } else {     
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                $_SESSION['message'] = 'Ekstensi gambar yang boleh hanya jpg, jpeg atau png';
                $_SESSION['message_type'] = 'danger';
                header('Location: '.$base_url.'kepala_sekolah/data_profile_sekolah.php');
            }
    } else {
        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query  = "UPDATE `tbl_profile` SET `nama_sekolah`='$nama_sekolah',`deskripsi`='$deskripsi',`visi`='$visi',`misi`='$misi',`no_hp`='$no_hp',`facebook`='$facebook',`email`='$email',`instagram`='$instagram',`id_users`='$id_users',`alamat`='$alamat' WHERE id_profile_sekolah = 1";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                                " - ".mysqli_error($conn));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            $_SESSION['message'] = 'Update Data  Successfully';
            $_SESSION['message_type'] = 'success';
            header('Location: '.$base_url.'kepala_sekolah/data_profile_sekolah.php');
        }
    }
}