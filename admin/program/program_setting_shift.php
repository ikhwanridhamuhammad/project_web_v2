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
	$_page_program_shift = 0;
	$_ss_outlet 						= array(100);
	$_ss_code_id 						= array(100);
	$_ss_shift 							= array(300);
	$_ss_shift_id						= array(300);
	$_ss_time_in 						= array(300);
	$_ss_time_out						= array(300);

	$_ss_counter_shift			= 0;
	$_ss_query_shift   	= "SELECT * FROM building,shift WHERE building.building_id = shift.building_id AND building.user_id = '$_global_user_id' ";
	$_ss_result_outlet  	= $__konek_absensi->query($_ss_query_shift); 
	while ($_ss_data_outlet = mysqli_fetch_array($_ss_result_outlet)){
		$_ss_outlet[$_ss_counter_shift]							= $_ss_data_outlet['name'];
		$_ss_code_id[$_ss_counter_shift]						= $_ss_data_outlet['code_id'];
		$_ss_shift_id[$_ss_counter_shift]						= $_ss_data_outlet['shift_id'];
		$_ss_shift[$_ss_counter_shift]							= $_ss_data_outlet['shift_name'];
		$_ss_time_in[$_ss_counter_shift]						= $_ss_data_outlet['time_in'];
		$_ss_time_out[$_ss_counter_shift]						= $_ss_data_outlet['time_out'];
		$_ss_counter_shift++;
	}



?>