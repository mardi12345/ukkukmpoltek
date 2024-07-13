
<?php 
include('../include/koneksi.php');

if ($_SESSION['id_users'] == NULL) {
  header('Location: '.$base_url.'');
}
include('../template/header.php');
include('../template/sidebar.php');

error_reporting(0);
 
$id_periode = $_SESSION['id_periode'];
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Quisioner</h1>
    </div>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php unset($_SESSION['message']); unset($_SESSION['message_type']); } ?>
    <div class="section-body">
      <div class="card table-responsive">
        <div class="card-body ">
          
            <table class="table table-hover" id="data_tabel">
            <thead>
              <tr>
                <th>No</th>
                <th>Wali Murid</th>
                <th>Q1</th>
                <th>Q2</th>
                <th>Q3</th>
                <th>Q4</th>
                <th>Q5</th>
              </tr>
            </thead>
            <tbody>
              <?php    
                    $query = "SELECT * FROM tbl_quisioner tq INNER JOIN tbl_wali_murid twm on twm.id_wali_murid = tq.id_wali_murid";
                    $result_tasks = mysqli_query($conn, $query);  
                    $jumlah_data = mysqli_num_rows($result_tasks);  
                    $nomer = 1;
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                  <td><?= $nomer++ ?></td>
                  <td><?= $row['nama_ayah']?></td>
                  <td><?= $row['q1']?></td>
                  <td><?= $row['q2']?></td>
                  <td><?= $row['q3']?></td>
                  <td><?= $row['q4']?></td>
                  <td><?= $row['q5']?></td>
                 
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <?php
            $jumlah5 = 0;
            $jumlah4 = 0;
            $jumlah3 = 0;
            $jumlah2 = 0;
            $jumlah1 = 0;
            
            $query = "SELECT * FROM tbl_quisioner tq INNER JOIN tbl_wali_murid twm on twm.id_wali_murid = tq.id_wali_murid";
            $result_tasks = mysqli_query($conn, $query);    
            $no = 1;
            while($row = mysqli_fetch_assoc($result_tasks)) { 
                if ($row['q1'] == 5) {
                    $jumlah5++;
                }
                if ($row['q2'] == 5) {
                    $jumlah5++;
                }
                if ($row['q3'] == 5) {
                    $jumlah5++;
                }
                if ($row['q4'] == 5) {
                    $jumlah5++;
                }
                if ($row['q5'] == 5) {
                    $jumlah5++;
                }

                if ($row['q1'] == 4) {
                    $jumlah4++;
                }
                if ($row['q2'] == 4) {
                    $jumlah4++;
                }
                if ($row['q3'] == 4) {
                    $jumlah4++;
                }
                if ($row['q4'] == 4) {
                    $jumlah4++;
                }
                if ($row['q5'] == 4) {
                    $jumlah4++;
                }

                if ($row['q1'] == 3) {
                    $jumlah3++;
                }
                if ($row['q2'] == 3) {
                    $jumlah3++;
                }
                if ($row['q3'] == 3) {
                    $jumlah3++;
                }
                if ($row['q4'] == 3) {
                    $jumlah3++;
                }
                if ($row['q5'] == 3) {
                    $jumlah3++;
                }

                if ($row['q1'] == 2) {
                    $jumlah2++;
                }
                if ($row['q2'] == 2) {
                    $jumlah2++;
                }
                if ($row['q3'] == 2) {
                    $jumlah2++;
                }
                if ($row['q4'] == 2) {
                    $jumlah2++;
                }
                if ($row['q5'] == 2) {
                    $jumlah2++;
                }

                if ($row['q1'] == 1) {
                    $jumlah1++;
                }
                if ($row['q2'] == 1) {
                    $jumlah1++;
                }
                if ($row['q3'] == 1) {
                    $jumlah1++;
                }
                if ($row['q4'] == 1) {
                    $jumlah1++;
                }
                if ($row['q5'] == 1) {
                    $jumlah1++;
                }
                
             } ?>

            <h6>Jumlah <?= $jumlah_data ?> sehingga N = <?= $n = $jumlah_data * 5 ?> </h6>
            <table class="table table-hover" id="data_tabel">
            <thead>
                <tr>
                <th>No</th>
                <th>Hasil</th>
                <th>Bobot</th>
                <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?= $jumlah5?> Menjawab Sangat Setuju</td>
                    <td><?= $jumlah5?> x 5</td>
                    <td><?= $hasil5 = $jumlah5 * 5?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><?= $jumlah4?> Menjawab Setuju</td>
                    <td><?= $jumlah4?> x 4</td>
                    <td><?= $hasil4 = $jumlah4 * 4?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><?= $jumlah3?> Menjawab Netral</td>
                    <td><?= $jumlah3?> x 3</td>
                    <td><?= $hasil3 = $jumlah3 * 3?></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><?= $jumlah2?> Menjawab Tidak Setuju</td>
                    <td><?= $jumlah2?> x 2</td>
                    <td><?= $hasil2 = $jumlah2 * 2?></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><?= $jumlah1?> Menjawab Sangat Tidak Setuju</td>
                    <td><?= $jumlah1?> x 1</td>
                    <td><?= $hasil1 = $jumlah1 * 1?></td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan = "3" class="text-center">Total Akhir</td>
                    <td><?= $hasil5 + $hasil4 + $hasil3 + $hasil2 + $hasil1 ?></td>
                </tr>
            </tfoot>
            </table>


            <h5>Hasil Akhir  :  <?= ( $hasil5 + $hasil4 + $hasil3 + $hasil2 + $hasil1 + $n ) * 100/100 ?> %</h5>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include('../template/footer.php'); ?>
