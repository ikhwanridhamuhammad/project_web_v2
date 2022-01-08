<?php 
	session_start();
	$__ea_outlet = "";
  if (empty($_GET)) {
    $__ea_outlet = "";
  }
  else{$__ea_outlet = $_GET['outlet'];}
  $_SESSION["_ra_outlet"] = $__ea_outlet; ?>

        <script type="text/javascript">
        window.location.href="../riwayat_absensi.php";
      </script>
<?php
?>