<?php 
	session_start();
	$__ses_po_outlet = "";
  if (empty($_GET)) {
    $__ses_po_outlet = "";
  }
  else{$__ses_po_outlet = $_GET['outlet'];}
  $_SESSION["_po_outlet"] = $__ses_po_outlet; 



  ?>
        <script type="text/javascript">
        window.location.href="../pemasukan_outlet.php";
      </script>
<?php
?>