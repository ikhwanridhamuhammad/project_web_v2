<?php
    if(isset($_POST['btn_filter_pemasukan_sn'])){ 
      if(isset($_POST['nama_tahun_input_sn'])){
        $_SESSION["_po_sn_tahun_bulan"] = $_POST['nama_tahun_input_sn'];
      }
      if(isset($_POST['nama_outlet_input_sn'])){
        $_SESSION["_po_sn_outlet"] = $_POST['nama_outlet_input_sn'];
      }

      ?>
      <script type="text/javascript">
        window.location.href="./pemasukan_outlet_sn.php";
      </script>
    <?php
    }
?>