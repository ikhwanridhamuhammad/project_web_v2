<?php
    if(isset($_POST['btn_save_data_add_new'])){

      if(isset($_POST['su_user_nik_add'])){
        $___post_su_nik_input       = strtoupper($_POST['su_user_nik_add']);
      }
      if(isset($_POST['su_user_email_add'])){
        $___post_su_email_input      = $_POST['su_user_email_add'];
      }
      if(isset($_POST['su_user_nama_add'])){
        $___post_su_nama_input       = ucwords(strtolower($_POST['su_user_nama_add']));
      }
      if(isset($_POST['su_user_nickname_add'])){
        $___post_su_nickname_input   = ucwords(strtolower($_POST['su_user_nickname_add']));
      }
      if(isset($_POST['date_ttl_1'])){
        $_KONVERT_DATE_1  = date_format(date_create($_POST['date_ttl_1']),"d-m-Y");
        $___post_su_birthday_input  = $_KONVERT_DATE_1;
      }
      if(isset($_POST['su_user_telp_add'])){
        $___post_su_telp_input   = $_POST['su_user_telp_add'];
      }
      if(isset($_POST['su_user_alamat_add'])){
        $___post_su_alamat_input   = $_POST['su_user_alamat_add'];
      }
      $_SESSION["_su_add_nik"] = $___post_su_nik_input;
      $_SESSION["_su_add_email"] = $___post_su_email_input;
      $_SESSION["_su_add_nama"] = $___post_su_nama_input;
      $_SESSION["_su_add_nickname"] = $___post_su_nickname_input;
      $_SESSION["_su_add_telp"] = $___post_su_telp_input;
      $_SESSION["_su_add_alamat"] = $___post_su_alamat_input;
      //===============================================================================
      //===============================================================================
      //===============================================================================
      $____password = "acd2bcf0a751e78ba7a1904d55cb26b00b7b5c21ea1c7a91b373c2cf44ae0b29";
      $____photo    = "2021-10-261a9d0a42736063ec60e8833614f44a6d.jpg";
      $____create_login    = "2021-11-07 07:21:38";
      $____create_cookies  = "df8bcc50f015de8677e4025ecb1a369a";
      //===============================================================================
      //===============================================================================
      $__hasil_email_sama = 0;
      for($ret_counter = 0;$ret_counter < $_su_counter;$ret_counter++){
        if($_su_email[$ret_counter] == $___post_su_email_input){
          $__hasil_email_sama = 1; 
        }
      }
      if(filter_var($___post_su_email_input, FILTER_VALIDATE_EMAIL)) {}
      else {$__hasil_email_sama = 2;}
      //===============================================================================
      if($__hasil_email_sama == 0){ // tidak ada yang sama
        $____create_cookies = md5($___post_su_email_input);
        $____su_query_insert = "INSERT INTO employees 
                            ( user_id,employees_code,employees_email,employees_password,employees_name,employees_nickname,
                              birthday,phone,address,photo,created_login,created_cookies)
                            values
                            ( '$_global_user_id','$___post_su_nik_input','$___post_su_email_input','$____password',
                              '$___post_su_nama_input','$___post_su_nickname_input','$___post_su_birthday_input',
                              '$___post_su_telp_input','$___post_su_alamat_input','$____photo',
                              '$____create_login','$____create_cookies' ) ";  
        $____su_result_insert   = $__konek_absensi->query($____su_query_insert); 

        ?>
        <script type="text/javascript">
          window.location.href="./setting_user.php";
        </script>




<?php
      }
      if($__hasil_email_sama == 1){
      ?>
        <script type="text/javascript">
          window.location.href="./hiperlink/hip_su_add.php?action=error";
        </script>        



<?php
      }
      if($__hasil_email_sama == 2){
      ?>
        <script type="text/javascript">
          window.location.href="./hiperlink/hip_su_add.php?action=error2";
        </script> 



<?php
      }



    }


    if(isset($_POST['btn_save_data_edit'])){

      if(isset($_POST['su_user_nik_edit'])){
        $___post_su_nik_input       = strtoupper($_POST['su_user_nik_edit']);
      }
      if(isset($_POST['su_user_email_edit'])){
        $___post_su_email_input      = $_POST['su_user_email_edit'];
      }
      if(isset($_POST['su_user_nama_edit'])){
        $___post_su_nama_input       = ucwords(strtolower($_POST['su_user_nama_edit']));
      }
      if(isset($_POST['su_user_nickname_edit'])){
        $___post_su_nickname_input   = ucwords(strtolower($_POST['su_user_nickname_edit']));
      }
      if(isset($_POST['date_ttl_3'])){
        $_KONVERT_DATE_1  = date_format(date_create($_POST['date_ttl_3']),"d-m-Y");
        $___post_su_birthday_input  = $_KONVERT_DATE_1;
      }
      if(isset($_POST['su_user_telp_edit'])){
        $___post_su_telp_input   = $_POST['su_user_telp_edit'];
      }
      if(isset($_POST['su_user_alamat_edit'])){
        $___post_su_alamat_input   = $_POST['su_user_alamat_edit'];
      }
      $__hasil_email_sama = 0;
      for($ret_counter = 0;$ret_counter < $_su_counter;$ret_counter++){
        if($_su_email[$ret_counter] == $___post_su_email_input){
          $__hasil_email_sama = 1; 
        }
        if($_su_email[$ret_counter] == $_su_email_ori){
          $__hasil_email_sama = 0; 
        }
      }
      if(filter_var($___post_su_email_input, FILTER_VALIDATE_EMAIL)) {}
      else {$__hasil_email_sama = 2;}
      //===============================================================================
      if($__hasil_email_sama == 0){ // tidak ada yang sama

        $____create_cookies = md5($___post_su_email_input);
        $_edit              = "UPDATE employees SET 
                              employees_code        = '$___post_su_nik_input',
                              employees_email       = '$___post_su_email_input',
                              employees_name        = '$___post_su_nama_input',
                              employees_nickname    = '$___post_su_nickname_input',
                              birthday              = '$___post_su_birthday_input',
                              phone                 = '$___post_su_telp_input',
                              created_cookies       = '$____create_cookies',
                              address               = '$___post_su_alamat_input'
                              WHERE id   = '$_su_edit_id' ";
        $_result_edit       = $__konek_absensi->query($_edit); 


        ?>
        <script type="text/javascript">
          window.location.href="./setting_user.php";
        </script>




<?php
      }
      if($__hasil_email_sama == 1){
      ?>
        <script type="text/javascript">
          window.location.href="./hiperlink/hip_su_edit.php?id=<?php echo $_su_edit_id; ?>&action=error";        
        </script>        



<?php
      }
      if($__hasil_email_sama == 2){
      ?>
        <script type="text/javascript">
          window.location.href="./hiperlink/hip_su_edit.php?id=<?php echo $_su_edit_id; ?>&action=error2";
        </script> 




<?php
      }


    }

?>


<?php 
    if(isset($_POST['btn_save_data_edit_admin'])){
      if(isset($_POST['su_user_username_edit_admin'])){
        $___post_su_username_input       = strtolower($_POST['su_user_username_edit_admin']);
      }
      if(isset($_POST['su_user_email_edit_admin'])){
        $___post_su_email_input      = $_POST['su_user_email_edit_admin'];
      }
      if(isset($_POST['su_user_name_edit_admin'])){
        $___post_su_nama_input       = strtoupper($_POST['su_user_name_edit_admin']);
      }
      if(isset($_POST['su_user_pass_edit_admin'])){
        $___post_su_password_input   = $_POST['su_user_pass_edit_admin'];
      }
      $__hasil_email_sama = 0;
      $__hasil_username_sama = 0;
      for($ret_counter = 0;$ret_counter < $_su_counter;$ret_counter++){
        if($_su_username[$ret_counter] == $___post_su_username_input){
          $__hasil_username_sama = 1; 
        }
        if($___post_su_username_input == $_su_edit_value_username_ori){
          $__hasil_username_sama = 0; 
        }
        if($_su_email[$ret_counter] == $___post_su_email_input){
          $__hasil_email_sama = 1; 
        }
        if($___post_su_email_input == $_su_edit_value_email_ori){
          $__hasil_email_sama = 0; 
        }
      }
      if(filter_var($___post_su_email_input, FILTER_VALIDATE_EMAIL)) {}
      else {$__hasil_email_sama = 2;}
      if($__hasil_email_sama == 0 && $__hasil_username_sama == 0){ // tidak ada yang sama
        $salt       = '$%DSuTyr47542@#&*!=QxR094{a911}+';
        $password  = hash('sha256',$salt.$___post_su_password_input);

        $_edit              = "UPDATE user SET 
                              username        = '$___post_su_username_input',
                              email           = '$___post_su_email_input',
                              password        = '$password',
                              fullname        = '$___post_su_nama_input'
                              WHERE user_id   = '$_global_user_id' ";
        $_result_edit       = $__konek_absensi->query($_edit); 


        ?>
        <script type="text/javascript">
          window.location.href="./setting_user.php";
        </script>
      <?php } ?>

<?php if($__hasil_email_sama == 1){ ?>
        <script type="text/javascript">
          window.location.href="./hiperlink/hip_su_edit_admin.php?action=error";
        </script> 
<?php } ?>
<?php if($__hasil_email_sama == 2){ ?>
        <script type="text/javascript">
          window.location.href="./hiperlink/hip_su_edit_admin.php?action=error2";
        </script> 
<?php } ?>
<?php if($__hasil_username_sama == 1){ ?>
        <script type="text/javascript">
          window.location.href="./hiperlink/hip_su_edit_admin.php?action=error3";
        </script> 
<?php } ?>

<?php

    }

?>



