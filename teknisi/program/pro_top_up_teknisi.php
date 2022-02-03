<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 4; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	$_dsn_tanggal_ori				= date_create($tanggal_update_today);
  //===================================================================
  //===================================================================
    $__por_waktu        = array(3000);
    $__por_reff_id      = array(3000);
    $__por_code         = array(3000);
    $__por_no_hp        = array(3000);
    $__por_status       = array(3000);
    $__por_date_insert  = array(3000);
    $__por_date_update  = array(3000);
    $__por_last_balance = array(3000);
    $__por_counter      = 0;
    $__por_db_data  = mysqli_query($__konek_nitro_teknisi,"select * from call_back_portal order by no desc");
    while ($__por_data = mysqli_fetch_array($__por_db_data)){
        $__por_waktu[$__por_counter]        = $__por_data['waktu'];
        $__por_reff_id[$__por_counter]      = $__por_data['reff_id'];
        $__por_code[$__por_counter]         = $__por_data['code'];
        $__por_no_hp[$__por_counter]        = $__por_data['no_hp'];
        if($__por_data['status'] == 4){$__por_status[$__por_counter] = "SUCCESS";}
        if($__por_data['status'] == 2){$__por_status[$__por_counter] = "GAGAL";}
        if($__por_data['status'] == 3){$__por_status[$__por_counter] = "REFUND";}
        
        $__por_date_insert[$__por_counter]  = $__por_data['date_insert'];
        $__por_date_update[$__por_counter]  = $__por_data['date_update'];
        $__por_last_balance[$__por_counter] = $__por_data['last_balance'];
        $__por_counter++;
    }
  //===================================================================
  //===================================================================
  //===================================================================
  //===================================================================
    $__an_nama_outlet  = array(3000);
    $__an_waktu        = array(3000);
    $__an_reff_id      = array(3000);
    $__an_code         = array(3000);
    $__an_no_hp        = array(3000);
    $__an_status       = array(3000);
    $__an_sequence     = array(3000);
    $__an_proses       = array(3000);
    $__an_ulang        = array(3000);
    $__an_counter      = 0;
    $__an_db_data  = mysqli_query($__konek_nitro_teknisi,"select * from antrian_pulsa_paket order by no desc");
    while ($__an_data = mysqli_fetch_array($__an_db_data)){
        $__an_nama_outlet[$__an_counter]        = $__an_data['nama_outlet'];
        $__an_waktu[$__an_counter]              = $__an_data['waktu'];
        $__an_reff_id[$__an_counter]            = $__an_data['reff_id'];
        $__an_code[$__an_counter]               = $__an_data['code'];
        $__an_no_hp[$__an_counter]              = $__an_data['no_hp'];
        if($__an_data['status'] == 4){$__an_status[$__an_counter] = "SUCCESS";}
        if($__an_data['status'] == 2){$__an_status[$__an_counter] = "GAGAL";}
        if($__an_data['status'] == 3){$__an_status[$__an_counter] = "REFUND";}
        if($__an_data['status'] == 1){$__an_status[$__an_counter] = "PROSES";}
        if($__an_data['status'] == 0){$__an_status[$__an_counter] = "ANTRIAN";}
        if($__an_data['proses'] == 0){$__an_proses[$__an_counter] = "PROSES";}
        if($__an_data['proses'] == 1){$__an_proses[$__an_counter] = "PROSES";}
        if($__an_data['proses'] == 2){$__an_proses[$__an_counter] = "SUCCESS";}
        if($__an_data['proses'] == 3){$__an_proses[$__an_counter] = "GAGAL";}
        $__an_sequence[$__an_counter]           = $__an_data['sequence'];
        $__an_ulang[$__an_counter]              = $__an_data['ulang'];
        $__an_counter++;
    }
  //===================================================================
  //===================================================================
  //===================================================================
  //===================================================================
    $_h___nama_outlet         = array(200);
    $_h___waktu               = array(200);
    $_h___reff_id             = array(200);
    $_h___code                = array(200);
    $_h___no_hp               = array(200);
    $_h___status              = array(200);
    $_h___proses              = array(200);
    $_h___counter             = 0;
    $_h___diff = 0;
    $_h___diff_2 = "";
    $_h___tanggal_now_edit = date_create(date('Y-m-d'));
    $_h_start = date("Y-m-d",strtotime(date("Y-m-d")." -3 days"));
    $_h_end = date("Y-m-d");
    //===========================================================
    //===========================================================
    $_h___db_data_paket  = mysqli_query($__konek_nitro_teknisi,"select * from antrian_pulsa_paket Where waktu Between '$_h_start' and '$_h_end' order by waktu");
    while ($_h___data = mysqli_fetch_array($_h___db_data_paket)){
        if($_h___data['status'] == 2 || $_h___data['status'] == 3){
            $_h___nama_outlet[$_h___counter]    = $_h___data['nama_outlet'];
            $_h___waktu[$_h___counter]          = $_h___data['waktu'];
            $_h___reff_id[$_h___counter]        = $_h___data['reff_id'];
            $_h___code[$_h___counter]           = $_h___data['code'];
            $_h___no_hp[$_h___counter]          = $_h___data['no_hp'];
            if($_h___data['status'] == 2){$_h___status[$_h___counter] = "FAILED";}
            if($_h___data['status'] == 3){$_h___status[$_h___counter] = "REFUND";}
            $_h___proses[$_h___counter]         = $_h___data['proses'];
            $_h___counter++;
        }
    }
  //===================================================================
  //===================================================================
  //===================================================================
  //===================================================================


?>