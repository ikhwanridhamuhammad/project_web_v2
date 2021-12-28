<?php 
	session_start();
  $__ses_su_id = "";
  $__ses_su_act = "";
  if (empty($_GET)) {
    $__ses_su_id = "";
  }
  else{
    $__ses_su_id = $_GET['id'];
    $__ses_su_act = $_GET['action'];
  }
  $_SESSION["_su_edit_id"] = $__ses_su_id; 
  $_SESSION["_su_edit_action"] = $__ses_su_act; 
  ?>
        <script type="text/javascript">
        window.location.href="../setting_user_edit.php";
      </script>
<?php
?>