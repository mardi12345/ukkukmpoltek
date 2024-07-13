<?php 
include('../include/koneksi.php');

if ($_SESSION['id_wali_murid'] == NULL) {
  header('Location: '.$base_url.'walimurid/login.php');
}
include('../template_walimurid/header.php');
include('../template_walimurid/navbar.php');

error_reporting(0);
 
$id_wali_murid = $_SESSION['id_wali_murid'];
$id_kelas = $_GET['id'];

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="blog-page area-padding">
    <div class="container  mt-5">
        <div class="card">
            <div class="card-header">
                <center><h4>Data Laporan</h4></center>
            </div>
            <div class="card-body">
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
                        <div class="card-header">
                        <h4>Data Siswa</h4>
                      
                        </div>
                        <?php    
                        $query = "SELECT * FROM tbl_murid tm INNER JOIN tbl_detail_kelas tdk on tdk.id_murid = tm.id_murid INNER JOIN tbl_kelas tk on tk.id_kelas =tdk.id_kelas INNER JOIN tbl_users tu on tu.id_users = tdk.id_users INNER JOIN tbl_periode tp on tp.id_periode = tk.id_periode INNER JOIN tbl_wali_murid twm on twm.id_murid = tm.id_murid where tdk.id_kelas = '$id_kelas'";
                        $result_tasks = mysqli_query($conn, $query);    
                        $no = 1;
                        $row = mysqli_fetch_assoc($result_tasks);
                        ?>
                        <div class="collapse show" id="mycard-collapse">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">
                                    <h6>Nama Peserta Didik</h6>
                                </div>
                                <div class="col-md-7">
                                    <h6> : <?= $row['nama']?></h6>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-5">
                                    <h6>NIK</h6>
                                </div>
                                <div class="col-md-7">
                                    <h6> : <?= $row['nik']?></h6>
                                </div>
                                
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Kelas</h6>
                                </div>
                                <div class="col-md-8">
                                    <h6>: <?= $row['nama_kelas']?></h6>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-4">
                                    <h6>Periode</h6>
                                </div>
                                <div class="col-md-8">
                                    <h6>: <?= $row['periode']?></h6>
                                </div>
                            </div>

                            </div>
                        </div>
                        </div>
                        <div class="card-footer">
                        
                        </div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover" id="data_tabel">
                    <thead>
                    <tr>
                        <th rowspan = "2">No</th>
                        <th rowspan = "2">Mata Pelajaran</th>
                        <th colspan = "3" class = "text-center">Pengetahuan</th>
                        <th colspan = "3" class = "text-center">Ketrampilan</th>
                    </tr>
                    <tr>
                        <td>Nilai</td>
                        <td>Predikat</td>
                        <td>Deskripsi</td>
                        <td>Nilai</td>
                        <td>Predikat</td>
                        <td>Deskripsi</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php    
                            $query = "SELECT * FROM tbl_laporan_belajar tlb INNER JOIN tbl_murid tm ON tm.id_murid = tlb.id_murid INNER JOIN tbl_users tu on tu.id_users = tlb.id_users INNER JOIN tbl_kelas tk on tk.id_kelas = tlb.id_kelas INNER JOIN tbl_periode tp on tp.id_periode = tk.id_periode INNER JOIN tbl_mata_pelajaran tmj on tmj.id_mata_pelajaran = tlb.id_mata_pelajaran INNER JOIN tbl_wali_murid twm on twm.id_murid = tm.id_murid where twm.id_wali_murid = '$id_wali_murid' and tk.id_kelas = '$id_kelas'";
                            $result_tasks = mysqli_query($conn, $query);    
                            $no = 1;
                            while($row = mysqli_fetch_assoc($result_tasks)) { ?>

                            <?php 
                           
                                $mata_pelajaran[] = $row['mata_pelajaran'];
                                $nilai_pengetahuan[] = $row['nilai_pengetahuan'];   
                                $nilai_ketrampilan[] = $row['nilai_ketrampilan'];    
                            
                            
                            ?>
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['mata_pelajaran']?></td>
                        <td><?= $row['nilai_pengetahuan']?></td>
                        <td>
                            <?php 
                            if ($row['nilai_pengetahuan'] >= 80) { 
                            echo 'A';
                            }else if($row['nilai_pengetahuan'] >= 60 and $row['nilai_pengetahuan'] < 80){
                            echo 'B';
                            }else{
                            echo 'C';
                            } ?>
                        </td>
                        <td><?= $row['deskripsi_pengetahuan']?></td>
                        <td><?= $row['nilai_ketrampilan']?></td>
                        <td>
                            <?php 
                            if ($row['nilai_ketrampilan'] >= 80) { 
                            echo 'A';
                            }else if($row['nilai_ketrampilan'] >= 60 and $row['nilai_ketrampilan'] < 80){
                            echo 'B';
                            }else{
                            echo 'C';
                            } ?>
                        </td>
                        <td><?= $row['deskripsi_ketrampilan']?></td>
                        
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>

        
        <div class = "row">
            
            <div class="col-md-6">
                <h5>Data Grafik Nilai Pengetahuan</h5>
                <canvas id="myChart"></canvas>

            </div>
            <div class="col-md-6">
                <h5>Data Grafik Nilai Ketrampilan</h5>
                <canvas id="myChart1"></canvas>

            </div>
        </div>
    </div>
</div>

<script>
  const nilai_pengetahuan = document.getElementById('myChart');

  new Chart(nilai_pengetahuan, {
    type: 'bar',
    data: {
      labels: <?= json_encode($mata_pelajaran)?>,
      datasets: [{
        label: '# Nilai Pengetahuan',
        data: <?= json_encode($nilai_pengetahuan)?>,
        borderWidth: 1,
        backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgba(56, 86, 255, 0.87)',
                    'rgb(60, 179, 113)',
                    'rgb(175, 238, 239)',
                    'rgb(138, 43, 226)',
                    'rgb(169, 169, 169)',
                    'rgb(153, 50, 204)',
                    'rgb(233, 150, 122)',
                    'rgb(72, 61, 139)',
                    'rgb(48, 206, 209)',
                    'rgb(60, 179, 113)',
                    'rgb(62, 250, 153)',
                    'rgb(102, 51, 153)',
                    'rgb(135, 206, 235)',
                    'rgb(255, 255, 0)',
                    'rgb(124, 252, 2)',
                    'rgb(72, 61, 139)',
                    'rgb(48, 206, 209)',
                    'rgb(60, 179, 113)',
                    'rgb(62, 250, 153)',
                    'rgb(102, 51, 153)',
                    'rgb(135, 206, 235)',
                    'rgb(60, 179, 113)',
                    'rgb(175, 238, 239)',
                    'rgb(255, 99, 132)',
                    'rgba(56, 86, 255, 0.87)',
                    'rgb(60, 179, 113)',
                    'rgb(175, 238, 239)',
                    'rgb(138, 43, 226)',
                    'rgb(169, 169, 169)',
                    'rgb(153, 50, 204)',
                    'rgb(233, 150, 122)',
                    'rgb(72, 61, 139)',
                    'rgb(48, 206, 209)',
                    'rgb(60, 179, 113)',
                    'rgb(62, 250, 153)',
                    'rgb(102, 51, 153)',
                    'rgb(135, 206, 235)',
                    'rgb(255, 255, 0)',
                    'rgb(124, 252, 2)',
                    'rgb(255, 99, 132)',
                    'rgba(56, 86, 255, 0.87)',
                    'rgb(60, 179, 113)',
                    'rgb(175, 238, 239)',
                    'rgb(138, 43, 226)',
                    'rgb(169, 169, 169)',
                    'rgb(153, 50, 204)',
                    ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const nilai_ketrampilan = document.getElementById('myChart1');

  new Chart(nilai_ketrampilan, {
    type: 'bar',
    data: {
      labels: <?= json_encode($mata_pelajaran)?>,
      datasets: [{
        label: '# Nilai Ketrampilan',
        data: <?= json_encode($nilai_ketrampilan)?>,
        borderWidth: 1,
        backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgba(56, 86, 255, 0.87)',
                    'rgb(60, 179, 113)',
                    'rgb(175, 238, 239)',
                    'rgb(138, 43, 226)',
                    'rgb(169, 169, 169)',
                    'rgb(153, 50, 204)',
                    'rgb(233, 150, 122)',
                    'rgb(72, 61, 139)',
                    'rgb(48, 206, 209)',
                    'rgb(60, 179, 113)',
                    'rgb(62, 250, 153)',
                    'rgb(102, 51, 153)',
                    'rgb(135, 206, 235)',
                    'rgb(255, 255, 0)',
                    'rgb(124, 252, 2)',
                    'rgb(72, 61, 139)',
                    'rgb(48, 206, 209)',
                    'rgb(60, 179, 113)',
                    'rgb(62, 250, 153)',
                    'rgb(102, 51, 153)',
                    'rgb(135, 206, 235)',
                    'rgb(60, 179, 113)',
                    'rgb(175, 238, 239)',
                    'rgb(255, 99, 132)',
                    'rgba(56, 86, 255, 0.87)',
                    'rgb(60, 179, 113)',
                    'rgb(175, 238, 239)',
                    'rgb(138, 43, 226)',
                    'rgb(169, 169, 169)',
                    'rgb(153, 50, 204)',
                    'rgb(233, 150, 122)',
                    'rgb(72, 61, 139)',
                    'rgb(48, 206, 209)',
                    'rgb(60, 179, 113)',
                    'rgb(62, 250, 153)',
                    'rgb(102, 51, 153)',
                    'rgb(135, 206, 235)',
                    'rgb(255, 255, 0)',
                    'rgb(124, 252, 2)',
                    'rgb(255, 99, 132)',
                    'rgba(56, 86, 255, 0.87)',
                    'rgb(60, 179, 113)',
                    'rgb(175, 238, 239)',
                    'rgb(138, 43, 226)',
                    'rgb(169, 169, 169)',
                    'rgb(153, 50, 204)',
                    ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<?php
include('../template_walimurid/script.php');
include('../template_walimurid/footer.php');
?>