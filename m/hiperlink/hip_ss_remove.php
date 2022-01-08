

<?php 
  $_global_page_program = 8; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';

  $_id_erase = "";
  $_id_erase = $_GET['id'];

  $_erase    = "DELETE FROM shift WHERE shift_id = '$_id_erase' ";
  $_result_erase    = $__konek_absensi->query($_erase); 


  ?>
        <script type="text/javascript">
        window.location.href="../setting_shift.php";
      </script>
<?php
?>