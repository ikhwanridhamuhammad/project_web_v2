<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 7; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_ses_so_outlet =  $_SESSION["_so_outlet"];
	//===================================================================
	$_so_outlet 						= "";
	$_so_code_id 						= "";
	$_so_alamat 						= "";
	$_so_hrg_tambal_motor		= "";
	$_so_hrg_tambah_motor		= "";
	$_so_hrg_isi_baru_motor	= "";
	$_so_hrg_tambal_mobil		= "";
	$_so_hrg_tambah_mobil		= "";
	$_so_hrg_isi_baru_mobil	= "";
	$_so_query_outlet   	= "SELECT * FROM building WHERE building.user_id = '$_global_user_id' AND building.name = '$_ses_so_outlet' ";
	$_so_result_outlet  	= $__konek_absensi->query($_so_query_outlet); 
	while ($_so_data_outlet = mysqli_fetch_array($_so_result_outlet)){
		$_so_outlet						= $_so_data_outlet['name'];
		$_so_code_id						= $_so_data_outlet['code_id'];
		$_so_alamat						= $_so_data_outlet['address'];
		$_so_hrg_tambal_motor		= $_so_data_outlet['hrg_tambal_motor'];
		$_so_hrg_tambah_motor	= $_so_data_outlet['hrg_tambah_motor'];
		$_so_hrg_isi_baru_motor	= $_so_data_outlet['hrg_isi_baru_motor'];
		$_so_hrg_tambal_mobil		= $_so_data_outlet['hrg_tambal_mobil'];
		$_so_hrg_tambah_mobil		= $_so_data_outlet['hrg_tambah_mobil'];
		$_so_hrg_isi_baru_mobil	= $_so_data_outlet['hrg_isi_baru_mobil'];
	}
	//===================================================================
	//===================================================================
	//===================================================================




?>