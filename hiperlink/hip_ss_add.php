<?php 
	session_start();
	$__ses_ss_outlet = "";
  if (empty($_GET)) {
    $__ses_ss_outlet = "";
  }
  else{
    $__ses_ss_outlet = $_GET['outlet'];
  }
  $_SESSION["_ss_outlet"] = $__ses_ss_outlet; ?>
        <script type="text/javascript">
        window.location.href="../setting_shift_tambah.php";
      </script>
<?php
?>