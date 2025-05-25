<?php
// footer.php
?>
!-- Main Footer -->
  <footer class="main-footer">
    <strong>&copy; <?php echo date('Y'); ?> IIDI.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>

  <!-- /.wrapper -->
  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/IIDI-web/admin/assets/vendor/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/IIDI-web/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/IIDI-web/admin/assets/js/adminlte.min.js"></script>
  <!-- Any custom JS -->
  <script src="/IIDI-web/admin/assets/js/custom.js"></script>

  <?php
$requestUri = $_SERVER['REQUEST_URI'];
if (strpos($requestUri, 'cms_edit.php') !== false || strpos($requestUri, 'cms_add.php') !== false):
?>
  <!-- TinyMCE Integration -->
  <script src="/IIDI-web/assets/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea#content',
      height: 500,
      menubar: true,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar:
        'undo redo | formatselect | bold italic backcolor | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | removeformat | help'
    });
  </script>
<?php endif; ?>

</body>
</html>
