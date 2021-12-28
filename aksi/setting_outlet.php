<?php
    if(isset($_POST['btn_save_data'])){

      if(isset($_POST['so_alamat'])){
        $___post_so_alamat       = $_POST['so_alamat'];
      }
      if(isset($_POST['so_tambal_motor'])){
        $___post_so_tambal_motor = intval($_POST['so_tambal_motor']);
      }
      if(isset($_POST['so_tambah_motor'])){
        $___post_so_tambah_motor = intval($_POST['so_tambah_motor']);
      }
      if(isset($_POST['so_isi_baru_motor'])){
        $___post_so_isi_baru_motor = intval($_POST['so_isi_baru_motor']);
      }
      if(isset($_POST['so_tambal_mobil'])){
        $___post_so_tambal_mobil = intval($_POST['so_tambal_mobil']);
      }
      if(isset($_POST['so_tambah_mobil'])){
        $___post_so_tambah_mobil = intval($_POST['so_tambah_mobil']);
      }
      if(isset($_POST['so_isi_baru_mobil'])){
        $___post_so_isi_baru_mobil = intval($_POST['so_isi_baru_mobil']);
      }


      $__so_query_update = "UPDATE building SET 
                            address             = '$___post_so_alamat',
                            hrg_tambal_motor    = '$___post_so_tambal_motor',
                            hrg_tambah_motor    = '$___post_so_tambah_motor',
                            hrg_isi_baru_motor  = '$___post_so_isi_baru_motor',
                            hrg_tambal_mobil    = '$___post_so_tambal_mobil',
                            hrg_tambah_mobil    = '$___post_so_tambah_mobil',
                            hrg_isi_baru_mobil  = '$___post_so_isi_baru_mobil'
                            WHERE name   = '$_so_outlet' ";
      $__so_result_update   = $__konek_absensi->query($__so_query_update); 

      ?>
      <script type="text/javascript">
        window.location.href="./setting_outlet.php";
      </script>
    <?php


    }

//======================================================================

?>