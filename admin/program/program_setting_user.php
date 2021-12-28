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
	$_su_id  					= array(1000);
	$_su_nik 					= array(1000);
	$_su_email 				= array(1000);
	$_su_password 		= array(1000);
	$_su_password_color= array(1000);
	$_su_hapus				= array(1000);
	$_su_hapus_color	= array(1000);
	$_su_nama 				= array(1000);
	$_su_nickname 		= array(1000);
	$_su_ttl 					= array(1000);
	$_su_telp 				= array(1000);
	$_su_alamat 			= array(1000);
	$_su_foto 				= array(1000);
	$_su_pass_def 		= "acd2bcf0a751e78ba7a1904d55cb26b00b7b5c21ea1c7a91b373c2cf44ae0b29";
	$_su_counter 			= 0;
	$_su_query_karyawan   	= "SELECT * FROM employees WHERE user_id = '$_global_user_id' ";
	$_su_result_karyawan  	= $__konek_absensi->query($_su_query_karyawan); 
	while ($_su_data_karyawan = mysqli_fetch_array($_su_result_karyawan)){
		$_su_id[$_su_counter]							= $_su_data_karyawan['id'];
		$_su_nik[$_su_counter]						= $_su_data_karyawan['employees_code'];
		$_su_email[$_su_counter]					= $_su_data_karyawan['employees_email'];

		if($_su_data_karyawan['hapus'] == 0){
			$_su_hapus[$_su_counter] = "Aktif";
			$_su_hapus_color[$_su_counter] = "success";
		}
		if($_su_data_karyawan['hapus'] != 0){
			$_su_hapus[$_su_counter] = "Nonaktif";
			$_su_hapus_color[$_su_counter] = "danger";
		}
		if($_su_data_karyawan['employees_password'] == $_su_pass_def){
			$_su_password[$_su_counter] = "Default";
			$_su_password_color[$_su_counter] = "info";
		}
		if($_su_data_karyawan['employees_password'] != $_su_pass_def){
			$_su_password[$_su_counter] = "Different";
			$_su_password_color[$_su_counter] = "danger";
		}
		$_su_nama[$_su_counter]						= $_su_data_karyawan['employees_name'];
		$_su_nickname[$_su_counter]				= $_su_data_karyawan['employees_nickname'];
		$_KONVERT_DATE_1  = date_format(date_create($_su_data_karyawan['birthday']),"j F Y");
		$_su_ttl[$_su_counter]						= $_KONVERT_DATE_1;
		$_su_telp[$_su_counter]						= $_su_data_karyawan['phone'];
		$_su_alamat[$_su_counter]					= $_su_data_karyawan['address'];
		$_su_foto[$_su_counter]						= $_su_data_karyawan['photo'];
		$_su_counter++;

	}



?>