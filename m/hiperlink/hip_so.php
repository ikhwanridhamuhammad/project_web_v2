<?php 
	session_start();
	$__ses_so_outlet = "";
  if (empty($_GET)) {
    $__ses_so_outlet = "";
  }
  else{$__ses_so_outlet = $_GET['outlet'];}
  $_SESSION["_so_outlet"] = $__ses_so_outlet; ?>
        <script type="text/javascript">
        window.location.href="../setting_outlet_edit.php";
      </script>
<?php
?>