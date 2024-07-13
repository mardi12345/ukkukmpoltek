<?php 
include('../include/koneksi.php');

include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
session_start();
$id_users = $_SESSION['id_users'];
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Profile</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php if($_SESSION['hak_akses'] == 'nasabah'){ ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message']?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
                        <form action="<?= $base_url?>proses_pengepul/nasabah/update_nasabah.php" method="post" enctype='multipart/form-data'>
                            <?php 
                                $sql = "SELECT * FROM tbl_nasabah tn where id_nasabah = $id_users";
                                $result_sql = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_array($result_sql);
                            ?>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <h3>Profile</h3>
                                    <img src="<?= $base_url?>proses_pengepul/nasabah/gambar/<?= $result['gambar']?>" class = "img-circle" alt="" width = "350px">
                                    <input type="file" name = "gambar" class = "form-control mt-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="hidden" name = "id_nasabah" value = "<?= $result['id_nasabah']?>">
                                        <div class="label">Nama Nasabah</div>
                                        <input type="text" value = "<?= $result['nama_nasabah']?>" class = "form-control" name = "nama_nasabah" required>   
                                    </div>    
                                    <div class="form-group">
                                        <div class="label">No Hp Nasabah</div>
                                        <input type="text" value = "<?= $result['no_hp_nasabah']?>" class = "form-control" name = "no_hp_nasabah" required>   
                                    </div>     
                                    <div class="form-group">
                                        <div class="label">Jenis Payment</div>
                                        <input type="text" value = "<?= $result['jenis_payment']?>" class = "form-control" name = "jenis_payment" required>   
                                    </div>
                                    <div class="form-group">
                                        <div class="label">No Payment</div>
                                        <input type="text" value = "<?= $result['no_payment']?>" class = "form-control" name = "no_payment" required>   
                                    </div>
                                    <div class="form-group">
                                        <div class="label">Alamat Nasabah</div>
                                        <textarea name="alamat_nasabah" class = "form-control" id="" cols="30" rows="5"><?= $result['alamat_nasabah']?></textarea>
                                    </div>  
                                    <div class="form-group">
                                        <div class="label">Username</div>
                                        <input type="text" value = "<?= $result['username']?>" class = "form-control" name = "username" required>   
                                    </div>
                                    <div class="form-group">
                                        <div class="label">Password</div>
                                        <input type="password" class = "form-control" name = "password" required>   
                                    </div>     
                                    <div class="text-right">
                                        <input type="submit" value = "update profile" class = "btn btn-primary" value = "Update" name = "update_nasabah">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
             <div class="col-md-12">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>   
             <div class="card">
                 <div class="card-body">
                     <form action="<?= $base_url?>proses_pengepul/pengepul/update_pengepul.php" method="post" enctype='multipart/form-data'>
                         <?php 
                             $sql = "SELECT * FROM tbl_pengepul where id_pengepul = $id_users";
                             $result_sql = mysqli_query($conn, $sql);
                             $result = mysqli_fetch_array($result_sql);
                         ?>
                         <div class="row">
                             <div class="col-md-4 text-center">
                                 <h3>Profile</h3>
                                 <img src="<?= $base_url?>proses_pengepul/pengepul/gambar/<?= $result['gambar']?>" class = "img-circle" alt=""  width = "350px">
                                 <input type="file" name = "gambar" class = "form-control mt-2">
                             </div>
                             <div class="col-md-8">
                                 <div class="form-group">
                                    <input type="hidden" name = "id_pengepul" value = "<?= $result['id_pengepul']?>">
                                    <div class="label">Nama Pengepul</div>
                                    <input type="text" value = "<?= $result['nama_pengepul']?>" class = "form-control" name = "nama_pengepul" required>   
                                 </div>    
                                 <div class="form-group">
                                     <div class="label">No Hp Pengepul</div>
                                     <input type="text" value = "<?= $result['no_hp_pengepul']?>" class = "form-control" name = "no_hp_pengepul" required>   
                                 </div>     
                                 <div class="form-group">
                                     <div class="label">Alamat Pengepul</div>
                                     <textarea name="alamat_pengepul" class = "form-control" id="" cols="30" rows="5" required><?= $result['alamat_pengepul']?></textarea>
                                 </div>  
                                 <div class="form-group">
                                     <div class="label">Username</div>
                                     <input type="text" value = "<?= $result['username']?>" class = "form-control" name = "username" required>   
                                 </div> 
                                 <div class="form-group">
                                     <div class="label">Password</div>
                                     <input type="password" class = "form-control" name = "password" required>   
                                 </div> 
                                 <div class="text-right">
                                    <input type="submit" value = "update profile" class = "btn btn-primary" value = "Update" name = "update_pengepul">
                                </div>     
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
      <?php   } ?>
       
        
    </div>
</div>

<?php include('../template/footer.php'); ?>