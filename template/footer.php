
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2024 <div class="bullet"></div> UKK & UKM POLTEK GT | Repost by <a title='' target='_blank'></a>

            </div>
            <div class="footer-right">
                1.0.0
            </div>
        </footer>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/datatables.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/dataTables.buttons.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/jszip.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/pdfmake.min.js"></script>
  <script src="<?= $base_url ?>assets/datatables/vfs_fonts.js"></script>
  <script src="<?= $base_url ?>assets/datatables/buttons.html5.min.js"></script>
  <script src="<?= $base_url ?>assets/js/stisla.js"></script>
  <script src="<?php echo $base_url ?>assets/summernote/summernote-bs4.js"></script>
<!-- Template JS File -->
  <script src="<?= $base_url ?>assets/js/scripts.js"></script>
  <script src="<?= $base_url ?>assets/js/custom.js"></script>

  <!-- Page Script -->
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

<script>
  $(document).ready(function(){
      $('.summernote').summernote({
          height: "200px",
          toolbar:[
              ['basic', ['style', 'fontname','fontsize']],
              ['style', ['bold','italic','underline','clear']],
              ['font', ['strikethough', 'superscript','subscript']],
              ['color', ['forecolor', 'backcolor']],
              ['block', ['ul', 'ol', 'paragraph']],
              ['fontsize', ['fontsize']],
              ['height', ['height', 'codeview', 'fullscreen', 'undo', 'redo']],
          ],
      });
      $('#summernote1').summernote({
          height: "150px",
      });
  });
</script>



  </body>
</html>