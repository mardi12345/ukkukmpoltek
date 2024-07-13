
  <!-- Vendor JS Files -->
  <script src="<?= $base_url?>assets_wali/vendor/jquery/jquery.min.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/php-email-form/validate.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/appear/jquery.appear.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/knob/jquery.knob.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/parallax/parallax.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/wow/wow.min.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= $base_url?>assets_wali/vendor/venobox/venobox.min.js"></script>
  <script src="<?= $base_url?>assets/js/plugin/datatables/datatables.min.js"></script>

  
  <script src="<?= $base_url ?>assets/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/datatables.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/dataTables.buttons.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/jszip.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/pdfmake.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/vfs_fonts.js"></script>
  <script src="<?= $base_url ?>assets/datatables/buttons.html5.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= $base_url ?>assets_wali/js/main.js"></script>

  <script>
    $(document).ready(function() {
      $('.table').DataTable({
        dom: 'lBfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
      });
    });
  </script>