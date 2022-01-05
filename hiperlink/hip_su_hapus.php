

<?php 
  $_global_page_program = 9; // 1 dashboard
  include_once '../program/global_var.php';
  include_once '../program/database.php';
  include_once '../program/date_time.php';

  $_id = "";
  $_act = "";
  $_hsl_act = "";
  $_id = $_GET['id'];
  $_act = $_GET['act'];
  if($_act == "aktif"){$_hsl_act = 1;}
  if($_act == "nonaktif"){$_hsl_act = 0;}



      $_edit              = "UPDATE employees SET 
                            hapus            = '$_hsl_act'
                            WHERE id   = '$_id' ";
      $_result_edit       = $__konek_absensi->query($_edit); 




  ?>
        <script type="text/javascript">
        window.location.href="../setting_user.php";
      </script>
<?php
?>