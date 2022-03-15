<?php 
	session_start();
	$__ea_no_id = "1";
  if (empty($_GET)) {
    $__ea_no_id = "1";
  }
  else{$__ea_no_id = $_GET['id'];}
  $_SESSION["_ra_edit_absensi"] = $__ea_no_id;
  $_SESSION["_ra_edit_absensi_menu"] = 3; 


  ?>
        <script type="text/javascript">
        window.location.href="../edit_absensi.php";
      </script>
<?php
?>