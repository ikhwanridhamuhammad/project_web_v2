<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 8; // 1 dashboard
  include_once '../admin/program/global_var.php';
  include_once '../admin/program/database.php';
  include_once '../admin/program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_page_program_shift = 1;
	$_ses_ss_outlet =  $_SESSION["_ss_outlet"];
	$_ses_ss_shift  =  $_SESSION["_ss_shift"];
	//===================================================================
	//===================================================================
	//===================================================================
	$_ss_jam 								= array(60);
	$_ss_jam_counter 				= 0;
	$_ss_outlet 						= "";
	$_ss_shift 							= "";
	$_ss_shift_id						= "";
	$_ss_time_in 						= "";
	$_ss_time_out						= "";
	$_ss_query_outlet   	= "SELECT * FROM building,shift WHERE building.name = '$_ses_ss_outlet' AND building.building_id = shift.building_id AND shift.shift_name = '$_ses_ss_shift' ";
	$_ss_result_outlet  	= $__konek_absensi->query($_ss_query_outlet); 
	while ($_ss_data_outlet = mysqli_fetch_array($_ss_result_outlet)){
		$_ss_outlet						= $_ss_data_outlet['name'];
		$_ss_shift 						= $_ss_data_outlet['shift_name'];
		$_ss_shift_id					= $_ss_data_outlet['shift_id'];
		$_ss_time_in					= $_ss_data_outlet['time_in'];
		$_ss_time_out 				= $_ss_data_outlet['time_out'];
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