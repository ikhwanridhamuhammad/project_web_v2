<?php 
	session_start();
	$__ses_su_action = "";
  if (empty($_GET)) {
    $__ses_su_action = "";
  }
  else{
    $__ses_su_action = $_GET['action'];
  }
  $_SESSION["_su_add_action"] = $__ses_su_action; 



  ?>
        <script type="text/javascript">
        window.location.href="../setting_user_tambah.php";
      </script>
<?php
?>