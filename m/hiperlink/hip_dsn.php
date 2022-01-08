<?php 
	session_start();
	$_ses_dsn_outlet = "";
  if (empty($_GET)) {
    $_ses_dsn_outlet = "";
  }
  else{$_ses_dsn_outlet = $_GET['outlet'];$_ses_dsn_shift = "ALL";}
  $_SESSION["_dsn_outlet"] = $_ses_dsn_outlet; 
  $_SESSION["_dsn_shift"]  = $_ses_dsn_shift; 

  ?>
        <script type="text/javascript">
        window.location.href="../data_smart_nitro.php";
      </script>
<?php
?>