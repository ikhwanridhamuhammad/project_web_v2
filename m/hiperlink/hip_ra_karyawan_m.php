<?php 
	session_start();
	$__ea_nama = "";
  if (empty($_GET)) {
    $__ea_nama = "";
  }
  else{$__ea_nama = $_GET['nama'];}
  $_SESSION["_ra_karyawan"] = $__ea_nama; ?>

        <script type="text/javascript">
        window.location.href="../riwayat_absensi.php";
      </script>
<?php
?>