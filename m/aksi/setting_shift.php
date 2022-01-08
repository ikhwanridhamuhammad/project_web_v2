<?php
    if(isset($_POST['btn_save_data'])){

      if(isset($_POST['ss_shift_input'])){
        $___post_ss_shift_input       = $_POST['ss_shift_input'];
      }
      if(isset($_POST['time_in_input'])){
        $___post_time_in_input       = $_POST['time_in_input'];
      }
      if(isset($_POST['time_out_input'])){
        $___post_time_out_input       = $_POST['time_out_input'];
      }


      $__ss_query_update = "UPDATE shift SET 
                            shift_name          = '$___post_ss_shift_input',
                            time_in             = '$___post_time_in_input',
                            time_out            = '$___post_time_out_input'
                            WHERE shift_id   = '$_ss_shift_id' ";
      $__ss_result_update   = $__konek_absensi->query($__ss_query_update); 

      ?>
      <script type="text/javascript">
        window.location.href="./setting_shift.php";
      </script>
    <?php


    }

    if(isset($_POST['btn_save_data_add'])){

      if(isset($_POST['ss_shift_input_add'])){
        $___post_ss_shift_input       = $_POST['ss_shift_input_add'];
      }
      if(isset($_POST['time_in_input_add'])){
        $___post_time_in_input       = $_POST['time_in_input_add'];
      }
      if(isset($_POST['time_out_input_add'])){
        $___post_time_out_input       = $_POST['time_out_input_add'];
      }


      $__ss_query_update = "INSERT INTO shift 
                            (user_id,building_id,shift_name,time_in,time_out)
                            values('$_global_user_id','$_ss_building_id','$___post_ss_shift_input','$___post_time_in_input','$___post_time_out_input') "; 

      $__ss_result_update   = $__konek_absensi->query($__ss_query_update); 

      ?>
      <script type="text/javascript">
        window.location.href="./setting_shift.php";
      </script>
    <?php


    }

//======================================================================

?>