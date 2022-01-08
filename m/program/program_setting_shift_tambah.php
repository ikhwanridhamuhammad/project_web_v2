<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 8; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_page_program_shift = 2;
	$_ses_ss_outlet =  $_SESSION["_ss_outlet"];
	//===================================================================
	//===================================================================
	//===================================================================
	$_ss_jam 								= array(60);
	$_ss_jam_counter 				= 0;
	$_ss_building_id				= "";
	$_ss_query_outlet   	= "SELECT * FROM building WHERE building.name = '$_ses_ss_outlet' ";
	$_ss_result_outlet  	= $__konek_absensi->query($_ss_query_outlet); 
	while ($_ss_data_outlet = mysqli_fetch_array($_ss_result_outlet)){
		$_ss_building_id						= $_ss_data_outlet['building_id'];
	}
	//===================================================================
	//===================================================================
	//===================================================================
	for($_ss_free_counter = 0;$_ss_free_counter < 37;$_ss_free_counter++){
		$_jam_awal = "05:00:00";
		$_tambah_menit = $_ss_free_counter * 30;
		$_tambah_jam = " +".$_tambah_menit." minutes";
		$_ss_jam[$_ss_jam_counter] = date("H:i:s",strtotime(date($_jam_awal).$_tambah_jam));
		$_ss_jam_counter++;
	}




?>