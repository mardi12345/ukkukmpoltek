<?php 
include('../include/koneksi.php');

// if ($_SESSION['id_wali_murid'] == NULL) {
//   header('Location: '.$base_url.'walimurid/login.php');
// }
include('../template_walimurid/header.php');
include('../template_walimurid/navbar.php');

error_reporting(0);
 
$id_wali_murid = $_SESSION['id_wali_murid'];

?>
<style>
    .container-blog {
        width: 80%;
        margin: auto;
    }
    @media(max-width: 768px) {
        .container-blog {
        width: 80%;
        }
    }
</style>

<?php 
$id_informasi = $_GET['id'];
$query = "SELECT * FROM tbl_informasi where id_informasi = $id_informasi";
$result_tasks = mysqli_query($conn, $query);    
$no = 1;
$row =  mysqli_fetch_assoc($result_tasks) ?>
<div class="blog-page area-padding">
    <div class="container  mt-5">
        <div id="contact" class="contact-area">
            <div class="contact-inner area-padding">
            <img src="<?= $base_url.'assets/img/informasi/'.$row['gambar_informasi']?>" class="w-100">
            <h3 class="mt-4"><?= $row['judul']?></h3>  
            <small><?= $row['tgl_informasi']?></small>
            <p class = "text-justify"><?= $row['deskripsi']?></p>
            </div>
        </div>
    </div>
</div>

<?php
include('../template_walimurid/script.php');
include('../template_walimurid/footer.php');
?>
