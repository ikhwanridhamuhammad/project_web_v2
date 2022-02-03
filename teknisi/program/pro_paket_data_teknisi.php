<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 3; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_dsn_tanggal_ori				= date_create($tanggal_update_today);
	$_dsn_tanggal_default 	= date_format($_dsn_tanggal_ori,"Y-m-d");
	$_ses_dsn_tanggal 			= $_SESSION["_dsn_pd_tgl"];
	$_ses_dsn_outlet 				= $_SESSION["_dsn_pd_outlet"];
	//===================================================================
	if(empty($_ses_dsn_tanggal)){$_ses_dsn_tanggal = $_dsn_tanggal_default;}
 	$_dsn_value_date			  = date_format(date_create($_ses_dsn_tanggal),"d F Y");
  //===================================================================
  //===================================================================
  $__pd_outlet          = array(300);
  $__pd_device_id       = array(300);
  $__pd_no_hp           = array(300);
  $__pd_jenis_gsm       = array(300);
  $__pd_isi_paket       = array(300);
  $__pd_counter_outlet  = 0;
  $__pd_data_teknisi    = "SELECT * FROM data_paket ";
  $__pd_result_teknisi   = $__konek_nitro_teknisi->query($__pd_data_teknisi); 
  while ($_dsn_data_outlet = mysqli_fetch_array($__pd_result_teknisi)){
    if($_dsn_data_outlet['jenis_gsm'] == "tsel" || $_dsn_data_outlet['jenis_gsm'] == "isat"){
      $__pd_outlet[$__pd_counter_outlet]     = $_dsn_data_outlet['nama_outlet'];
      $__pd_device_id[$__pd_counter_outlet]  = $_dsn_data_outlet['device_id'];
      $__pd_no_hp[$__pd_counter_outlet]      = $_dsn_data_outlet['no_hp'];
      $__pd_jenis_gsm[$__pd_counter_outlet]  = $_dsn_data_outlet['jenis_gsm'];
      $__pd_isi_paket[$__pd_counter_outlet]  = $_dsn_data_outlet['isi_paket'];
      $__pd_counter_outlet++;
    }
  }
  //===================================================================
  //===================================================================
  $__pd_2_outlet          = array(300);
  $__pd_2_device_id       = array(300);
  $__pd_2_no_hp           = array(300);
  $__pd_2_jenis_gsm       = array(300);
  $__pd_2_isi_paket       = array(300);
  $__pd_2_calc_paket      = array(300);
  $__pd_2_aktif           = array(300);
  $__pd_diff_1            = "";
  $__pd_diff_2            = "";
  $__pd_2_counter_outlet  = 0;
  $__pd_2_start = date("Y-m-d",strtotime(date("Y-m-d")." -30 days"));
  $__pd_2_end = date("Y-m-d",strtotime(date("Y-m-d")." -27 days"));
  $__pd_2_data_teknisi    = "SELECT * FROM data_paket WHERE isi_paket BETWEEN '$__pd_2_start' and '$__pd_2_end' order by isi_paket";
  $__pd_2_result_teknisi   = $__konek_nitro_teknisi->query($__pd_2_data_teknisi); 
  while ($_dsn_2_data_outlet = mysqli_fetch_array($__pd_2_result_teknisi)){
      $__pd_2_outlet[$__pd_2_counter_outlet]     = $_dsn_2_data_outlet['nama_outlet'];
      $__pd_2_device_id[$__pd_2_counter_outlet]  = $_dsn_2_data_outlet['device_id'];
      $__pd_2_no_hp[$__pd_2_counter_outlet]      = $_dsn_2_data_outlet['no_hp'];
      $__pd_2_jenis_gsm[$__pd_2_counter_outlet]  = $_dsn_2_data_outlet['jenis_gsm'];
      $__pd_2_isi_paket[$__pd_2_counter_outlet]  = $_dsn_2_data_outlet['isi_paket'];
      if($_dsn_2_data_outlet['aktif'] == 1){$__pd_2_aktif[$__pd_2_counter_outlet] = "AKTIF";} 
      if($_dsn_2_data_outlet['aktif'] == 0){$__pd_2_aktif[$__pd_2_counter_outlet] = "NONAKTIF";} 
      $__pd_diff_1=date_diff(date_create($_dsn_2_data_outlet['isi_paket']),date_create(date('Y-m-d')));
      $__pd_diff_2 = $__pd_diff_1->format("%a");
      $__pd_2_calc_paket[$__pd_2_counter_outlet] = 29 - $__pd_diff_2;
      $__pd_2_counter_outlet++;
  }
  //===================================================================
  //===================================================================
  //===================================================================
  //===================================================================
    $_f___no                  = array(3000);
    $_f___no_hp               = array(3000);
    $_f___tanggal             = array(3000);
    $_f___device_id           = array(3000);
    $_f___nama_outlet         = array(3000);
    $_f___keterangan          = array(3000);
    $_f___status              = array(3000);
    $_f___mode                = array(3000);
    $_f___counter             = 0;
    $_f___db_log_paket_data   = mysqli_query($__konek_nitro_teknisi,"select * from log_paket_data order by no desc");
    while ($_f___data = mysqli_fetch_array($_f___db_log_paket_data)){
        $_f___no_hp[$_f___counter]      = $_f___data['no_hp'];
        $_f___tanggal[$_f___counter]    = date_format(date_create($_f___data['tanggal']),"d M Y");
        $_f___device_id[$_f___counter]  = $_f___data['device_id'];
        $_f___nama_outlet[$_f___counter]= $_f___data['nama_outlet'];
        $_f___keterangan[$_f___counter] = $_f___data['keterangan'];
        $_f___status[$_f___counter]     = $_f___data['status'];
        $_f___mode[$_f___counter]       = $_f___data['mode'];
        $_f___counter++;
    }
  //===================================================================
  //===================================================================
  //===================================================================
  //===================================================================




?>