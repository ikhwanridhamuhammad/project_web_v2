

<?php
    if(isset($_POST['btn_filter_dsn'])){
        if(isset($_POST['nama_outlet_input'])){
          $____prog_outlet = $_POST['nama_outlet_input'];
        }  
        if(isset($_POST['date_dsn_1'])){
          $____prog_date_1_1 = $_POST['date_dsn_1'];
          $____prog_date_1_2 = date_create($____prog_date_1_1);
          $____prog_date_1 = date_format($____prog_date_1_2,"Y-m-d");
        }  
        $____status = "OK";
        $____keterangan = "SUCCESS";
        $____mode = "MANUAL";
        
        $saved = $__konek_nitro_teknisi->query("insert into log_paket_data (no_hp,
                                                             tanggal,
                                                             device_id,
                                                             nama_outlet,
                                                             keterangan,
                                                             status,
                                                             mode)
                            values( '$__pd_no_hp[$____prog_outlet]',
                                    '$____prog_date_1', 
                                    '$__pd_device_id[$____prog_outlet]', 
                                    '$__pd_outlet[$____prog_outlet]', 
                                    '$____keterangan', 
                                    '$____status', 
                                    '$____mode')");
                                    
        $saved_2 = $__konek_nitro_teknisi->query("update data_paket set 
                                isi_paket='$____prog_date_1'
                                where nama_outlet='$__pd_outlet[$____prog_outlet]' ");
?>
    <script>
      window.location.href="?";    
    </script>

<?php
  }
?>