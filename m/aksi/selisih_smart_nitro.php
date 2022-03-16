<?php
    if(isset($_POST['btn_filter_selisih_ssn'])){ 
      if(isset($_POST['nama_tahun_input'])){
        $_SESSION["_ssn_tahun_bulan"] = $_POST['nama_tahun_input'];
      }
      if(isset($_POST['nama_outlet_input'])){
        $_SESSION["_ssn_outlet"] = $_POST['nama_outlet_input'];
      }

?>
      <script type="text/javascript">
        window.location.href="./selisih_smart_nitro.php";
      </script>
<?php
    }
?>