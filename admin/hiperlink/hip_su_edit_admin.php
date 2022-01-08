<?php 
	session_start();
  $__ses_su_act = "";
  if (empty($_GET)) {
  }
  else{
    $__ses_su_act = $_GET['action'];
  }
  $_SESSION["_su_edit_action_admin"] = $__ses_su_act; 
  ?>
        <script type="text/javascript">
        window.location.href="../setting_user_edit_admin.php";
      </script>
<?php
?>