<?php

//======================================================================
//======================================================================
//======================================================================
//======================================================================
    if(isset($_POST['btn_filter_dsn'])){ 
      if(isset($_POST['nama_shift_input'])){
        $_SESSION["_dsn_shift"] = $_POST['nama_shift_input'];
      }
      if(isset($_POST['date_dsn_1'])){
        $_KONVERT_DATE_1  = date_format(date_create($_POST['date_dsn_1']),"Y-m-d");
        $_SESSION["_dsn_tgl"] = $_KONVERT_DATE_1;
      }

      ?>
      <script type="text/javascript">
        window.location.href="./data_smart_nitro.php";
      </script>
    <?php
    }
?>