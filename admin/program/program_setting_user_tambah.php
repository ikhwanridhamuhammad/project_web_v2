<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 9; // 1 dashboard
	$_global_script_program = 91; // 
  include_once '../admin/program/global_var.php';
  include_once '../admin/program/database.php';
  include_once '../admin/program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_su_add_value_nik = "";
	$_su_add_value_email = "";
	$_su_add_value_nama = "";
	$_su_add_value_nickname = "";
	$_su_add_value_birthday = "";
	$_su_add_value_telp = "";
	$_su_add_value_alamat = "";		
	$_su_add_error = 0;		
	//===================================================================
	//===================================================================
	//===================================================================
	$_su_add_action		= $_SESSION["_su_add_action"];
	if($_su_add_action == "add"){
			$_su_add_value_nik = "";
			$_su_add_value_email = "";
			$_su_add_value_nama = "";
			$_su_add_value_nickname = "";
			$_su_add_value_birthday = "";
			$_su_add_value_telp = "";
			$_su_add_value_alamat = "";		
	}
	if($_su_add_action == "error"){
			$_su_add_error = 1;	
		  $_su_add_value_nik		= $_SESSION["_su_add_nik"];
			$_su_add_value_email	= $_SESSION["_su_add_email"];
			$_su_add_value_nama		= $_SESSION["_su_add_nama"];
			$_su_add_value_nickname= $_SESSION["_su_add_nickname"];
			$_su_add_value_birthday= $_SESSION["_su_add_birthday"];
			$_su_add_value_telp		= $_SESSION["_su_add_telp"];
			$_su_add_value_alamat	= $_SESSION["_su_add_alamat"];
	}
	if($_su_add_action == "error2"){
			$_su_add_error = 2;	
		  $_su_add_value_nik		= $_SESSION["_su_add_nik"];
			$_su_add_value_email = "";
			$_su_add_value_nama		= $_SESSION["_su_add_nama"];
			$_su_add_value_nickname= $_SESSION["_su_add_nickname"];
			$_su_add_value_birthday= $_SESSION["_su_add_birthday"];
			$_su_add_value_telp		= $_SESSION["_su_add_telp"];
			$_su_add_value_alamat	= $_SESSION["_su_add_alamat"];
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