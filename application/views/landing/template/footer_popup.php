
</div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
 
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">Sertifikasi Online</a>.</strong> All rights reserved.

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script type="text/javascript">
	jQuery(document).ready(function() {
        <?php
          $notif = $this->session->flashdata('notif');
          $type = $this->session->flashdata('type');

        ?>
          if("<?php echo $type ; ?>" == "success"){
               swal("SUCCESS", "<?php echo $notif ; ?>", "success");
          }else if("<?php echo $type ; ?>" == "error"){
               swal("GAGAL", "<?php echo $notif ; ?>", "error");
          } else if("<?php echo $type ; ?>" == "warning"){
               swal("", "<?php echo $notif ; ?>", "warning");
          } 
      });
</script>
</body>
</html>
