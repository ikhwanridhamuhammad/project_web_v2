<?php
    if(isset($_POST['btn_filter_pemasukan'])){ 
      if(isset($_POST['nama_tahun_input'])){
        $_SESSION["_po_tahun_bulan"] = $_POST['nama_tahun_input'];
      }
      if(isset($_POST['nama_outlet_input'])){
        $_SESSION["_po_outlet"] = $_POST['nama_outlet_input'];
      }

      ?>
      <script type="text/javascript">
        window.location.href="./pemasukan_outlet.php";
      </script>
    <?php
    }
?>

