<?php
    if(isset($_POST['btn_save_data'])){
      if(isset($_POST['ea_tambal_motor'])){
        $___post_ea_tambal_motor = intval($_POST['ea_tambal_motor']);
      }
      if(isset($_POST['ea_tambal_mobil'])){
        $___post_ea_tambal_mobil = intval($_POST['ea_tambal_mobil']);
      }
      if(isset($_POST['ea_promo_mobil'])){
        $___post_ea_promo_mobil = intval($_POST['ea_promo_mobil']);
      }
      if(isset($_POST['ea_promo_motor'])){
        $___post_ea_promo_motor = intval($_POST['ea_promo_motor']);
      }
      if(isset($_POST['ea_error_motor'])){
        $___post_ea_error_motor = intval($_POST['ea_error_motor']);
      }
      if(isset($_POST['ea_error_mobil'])){
        $___post_ea_error_mobil = intval($_POST['ea_error_mobil']);
      }
      if(isset($_POST['ea_kwh'])){
        $___post_ea_kwh = intval($_POST['ea_kwh']);
      }
      if(isset($_POST['ea_omset'])){
        $___post_ea_omset = intval($_POST['ea_omset']);
      }
      if(isset($_POST['ea_keterangan'])){
        $___post_ea_keterangan = $_POST['ea_keterangan'];
      }
      $__ea_query_update = "UPDATE presence SET 
                            information         = '$___post_ea_keterangan',
                            final_glass         = '$___post_ea_omset',
                            total_small_glass   = '$___post_ea_tambal_motor',
                            total_big_glass     = '$___post_ea_tambal_mobil',
                            total_sticker       = '$___post_ea_error_motor',
                            total_straw_small   = '$___post_ea_error_mobil',
                            total_straw_big     = '$___post_ea_promo_motor',
                            total_plastic_small = '$___post_ea_promo_mobil',
                            total_plastic_big   = '$___post_ea_kwh'
                            WHERE presence_id   = '$__ea_no_id' ";
      $__ea_result_update   = $__konek_absensi->query($__ea_query_update); 

      ?>
      <script type="text/javascript">
        window.location.href="./riwayat_absensi.php";
      </script>
    <?php


    }

//======================================================================
//======================================================================
//======================================================================
//======================================================================
    if(isset($_POST['btn_filter'])){ 
      if(isset($_POST['nama_karyawan_input'])){
        $_SESSION["_ra_karyawan"] = $_POST['nama_karyawan_input'];
      }
      if(isset($_POST['nama_outlet_input'])){
        $_SESSION["_ra_outlet"] = $_POST['nama_outlet_input'];
      }
      if(isset($_POST['date_1'])){
        $_KONVERT_DATE_1  = date_format(date_create($_POST['date_1']),"Y-m-d");
        $_SESSION["_ra_tgl_start"] = $_KONVERT_DATE_1;
      }
      if(isset($_POST['date_2'])){
        $_KONVERT_DATE_2  = date_format(date_create($_POST['date_2']),"Y-m-d");
        $_SESSION["_ra_tgl_end"] = $_KONVERT_DATE_2;
      }

      ?>
      <script type="text/javascript">
        window.location.href="./riwayat_absensi.php";
      </script>
    <?php
    }
?>