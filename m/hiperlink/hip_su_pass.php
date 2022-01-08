

<?php 
  $_global_page_program = 9; // 1 dashboard
  include_once '../program/global_var.php';
  include_once '../program/database.php';
  include_once '../program/date_time.php';

  $_id = "";
  $_id = $_GET['id'];

  $_su_pass_def     = "acd2bcf0a751e78ba7a1904d55cb26b00b7b5c21ea1c7a91b373c2cf44ae0b29";



      $_edit              = "UPDATE employees SET 
                            employees_password            = '$_su_pass_def'
                            WHERE id   = '$_id' ";
      $_result_edit       = $__konek_absensi->query($_edit); 




  ?>
        <script type="text/javascript">
        window.location.href="../setting_user.php";
      </script>
<?php
?>