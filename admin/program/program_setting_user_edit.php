<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 9; // 1 dashboard
	$_global_script_program = 92; // 
  include_once '../admin/program/global_var.php';
  include_once '../admin/program/database.php';
  include_once '../admin/program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_su_edit_id 				= $_SESSION["_su_edit_id"];
	$_su_edit_value_nik = "";
	$_su_edit_value_email = "";
	$_su_email_ori = "";
	$_su_edit_value_nama = "";
	$_su_edit_value_nickname = "";
	$_su_edit_value_birthday = "";
	$_su_edit_value_telp = "";
	$_su_edit_value_alamat = "";		
	$_su_edit_error = 0;	
	$_su_query_karyawan   	= "SELECT * FROM employees WHERE id = '$_su_edit_id'   ";
	$_su_result_karyawan  	= $__konek_absensi->query($_su_query_karyawan); 
	while ($_su_data_karyawan = mysqli_fetch_array($_su_result_karyawan)){
		$_su_edit_value_nik					= $_su_data_karyawan['employees_code'];
		$_su_edit_value_email				= $_su_data_karyawan['employees_email'];
		$_su_email_ori						= $_su_data_karyawan['employees_email'];
		$_su_edit_value_nama				= $_su_data_karyawan['employees_name'];
		$_su_edit_value_nickname		= $_su_data_karyawan['employees_nickname'];
		$_KONVERT_DATE_1  = date_format(date_create($_su_data_karyawan['birthday']),"j F Y");
    $_su_edit_value_birthday  	= $_KONVERT_DATE_1;
		$_su_edit_value_telp				= $_su_data_karyawan['phone'];
		$_su_edit_value_alamat			= $_su_data_karyawan['address'];
	}	
	//===================================================================
	//===================================================================
	//===================================================================
	$_su_edit_action		= $_SESSION["_su_edit_action"];
	if($_su_edit_action == "error"){
			$_su_edit_error = 1;	
	}	
	if($_su_edit_action == "error2"){
			$_su_edit_error = 2;	
	}
	//===================================================================
	//===================================================================
	//===================================================================
	$_su_email 				= array(1000);
	$_su_counter 			= 0;
	$_su_query_karyawan   	= "SELECT * FROM employees ";
	$_su_result_karyawan  	= $__konek_absensi->query($_su_query_karyawan); 
	while ($_su_data_karyawan = mysqli_fetch_array($_su_result_karyawan)){
		$_su_email[$_su_counter]					= $_su_data_karyawan['employees_email'];
		$_su_counter++;
	}
	//===================================================================
	//===================================================================
	//===================================================================

	
?>