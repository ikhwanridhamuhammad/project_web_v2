<?php 
	session_start();
	$__ses_ss_outlet = "";
  $__ses_ss_shift = "";
  if (empty($_GET)) {
    $__ses_ss_outlet = "";
    $__ses_ss_shift = "";
  }
  else{
    $__ses_ss_outlet = $_GET['outlet'];
    $__ses_ss_shift = $_GET['shift'];
  }
  $_SESSION["_ss_outlet"] = $__ses_ss_outlet;
  $_SESSION["_ss_shift"] = $__ses_ss_shift; ?>
        <script type="text/javascript">
        window.location.href="../setting_shift_edit.php";
      </script>
<?php
?>