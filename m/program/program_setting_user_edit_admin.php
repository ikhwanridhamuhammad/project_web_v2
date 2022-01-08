<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 9; // 1 dashboard
	$_global_script_program = 93; // 
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$salt 			= '$%DSuTyr47542@#&*!=QxR094{a911}+';
	//===================================================================
	//===================================================================
	//===================================================================
	$_su_edit_value_username = "";
	$_su_edit_value_username_ori = "";
	$_su_edit_value_email = "";
	$_su_edit_value_email_ori = "";
	$_su_edit_value_name = "";
	$_su_edit_value_pass = "123456";
		
	$_su_edit_error = 0;	

	$_su_query_karyawan   	= "SELECT * FROM user WHERE user_id = '$_global_user_id'   ";
	$_su_result_karyawan  	= $__konek_absensi->query($_su_query_karyawan); 
	while ($_su_data_karyawan = mysqli_fetch_array($_su_result_karyawan)){
		$_su_edit_value_username					= $_su_data_karyawan['username'];
		$_su_edit_value_username_ori			= $_su_data_karyawan['username'];
		$_su_edit_value_email							= $_su_data_karyawan['email'];
		$_su_edit_value_email_ori					= $_su_data_karyawan['email'];
		$_su_edit_value_name							= $_su_data_karyawan['fullname'];
	}	
	//===================================================================
	//===================================================================
	//===================================================================
	$_su_edit_action		= $_SESSION["_su_edit_action_admin"];
	if($_su_edit_action == "ok"){
			$_su_edit_error = 0;	
	}	
	if($_su_edit_action == "error"){
			$_su_edit_error = 1;	
	}	
	if($_su_edit_action == "error2"){
			$_su_edit_error = 2;	
	}
	if($_su_edit_action == "error3"){
			$_su_edit_error = 3;	
	}
	//===================================================================
	//===================================================================
	//===================================================================
	$_su_email 				= array(1000);
	$_su_username			= array(1000);
	$_su_counter 			= 0;
	$_su_query_karyawan   	= "SELECT * FROM user ";
	$_su_result_karyawan  	= $__konek_absensi->query($_su_query_karyawan); 
	while ($_su_data_karyawan = mysqli_fetch_array($_su_result_karyawan)){
		$_su_email[$_su_counter]					= $_su_data_karyawan['email'];
		$_su_username[$_su_counter]				= $_su_data_karyawan['username'];
		$_su_counter++;
	}
	//===================================================================
	//===================================================================
	//===================================================================

	
?>