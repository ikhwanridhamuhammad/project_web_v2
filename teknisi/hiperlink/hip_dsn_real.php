<?php 
	session_start();
	$_ses_dsn_outlet = "";
  if (empty($_GET)) {
    $_ses_dsn_outlet = "";
  }
  else{$_ses_dsn_outlet = $_GET['outlet'];}
  $_SESSION["_dsn_outlet"] = $_ses_dsn_outlet; 

  ?>
        <script type="text/javascript">
        window.location.href="../data_sn_real.php";
      </script>
<?php
?>