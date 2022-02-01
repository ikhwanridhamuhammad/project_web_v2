<?php

//======================================================================
//======================================================================
//======================================================================
//======================================================================
    if(isset($_POST['btn_filter_dsn'])){ 
      if(isset($_POST['date_dsn_1'])){
        $_KONVERT_DATE_1  = date_format(date_create($_POST['date_dsn_1']),"Y-m-d");
        $_SESSION["_dsn_tgl"] = $_KONVERT_DATE_1;
      }

      ?>
      <script type="text/javascript">
        window.location.href="./data_sn.php";
      </script>
    <?php
    }
?>