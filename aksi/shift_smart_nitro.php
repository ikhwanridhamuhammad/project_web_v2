<?php
//======================================================================
//======================================================================
    if(isset($_POST['btn_filter_shsn'])){ 
      if(isset($_POST['nama_outlet_input'])){
        $_SESSION["_shift_sn_outlet"] = $_POST['nama_outlet_input'];
      }
      if(isset($_POST['date_1'])){
        $_KONVERT_DATE_1  = date_format(date_create($_POST['date_1']),"Y-m-d");
        $_SESSION["_shift_sn_tgl"] = $_KONVERT_DATE_1;
      }

      ?>
      <script type="text/javascript">
        window.location.href="./shift_smart_nitro.php";
      </script>
    <?php
    }
?>