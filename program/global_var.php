<?php 
	//=================================================
	session_start();
	// $_global_db_nama = "contoh";
	// $_global_user_id = 2;
    $__global_run = 1;
	$_global_db_nama = $_SESSION["global_db_nama"];
	$_global_user_id = $_SESSION["global_user_id"];

	// $_global_db_nama = "nuril";
	// $_global_user_id = 3;
	$_global_selisih_menit_online = 30;
	//=================================================================================
	//=================================================================================
	//=================================================================================
	if($_global_page_program != 3){
		$_SESSION["_ra_tgl_start"] = "";
		$_SESSION["_ra_tgl_end"] = "";
		$_SESSION["_ra_outlet"] = "";
		$_SESSION["_ra_karyawan"] = "";
		$_SESSION["_ra_edit_absensi"] = "";
		$_SESSION["_ra_edit_absensi_menu"] = "";
	}
	//=================================================================================
	//=================================================================================
	//=================================================================================
	if($_global_page_program != 4){
		if($_SESSION["_ra_edit_absensi_menu"] != 3){
			$_SESSION["_po_tahun_bulan"] = "";
			$_SESSION["_po_outlet"] = "";
			$_SESSION["_po_karyawan"] = "";
		}
	}
	//=================================================================================
	//=================================================================================
	//=================================================================================
	if($_global_page_program != 10){
		$_SESSION["_po_sn_tahun_bulan"] = "";
		$_SESSION["_po_sn_outlet"] = "";
		$_SESSION["_po_sn_karyawan"] = "";
	}
	//=================================================================================
	//=================================================================================
	//=================================================================================
	if($_global_page_program != 5){
		$_SESSION["_ssn_tahun_bulan"] = "";
		$_SESSION["_ssn_outlet"] = "";
	}
	//=================================================================================
	//=================================================================================
	//=================================================================================
	if($_global_page_program != 6){
		$_SESSION["_dsn_tgl"] = "";
		$_SESSION["_dsn_outlet"] = "";
		$_SESSION["_dsn_shift"] = "";

	}
	//=================================================================================
	//=================================================================================
	//=================================================================================
	if($_global_page_program != 7){
		$_SESSION["_so_outlet"] = "";

	}
	//=================================================================================
	//=================================================================================
	//=================================================================================
	if($_global_page_program != 9){	
		$_SESSION["_su_add_action"] = "";
		$_SESSION["_su_add_nik"] = "";
		$_SESSION["_su_add_email"] = "";
		$_SESSION["_su_add_nama"] = "";
		$_SESSION["_su_add_nickname"] = "";
		$_SESSION["_su_add_birthday"] = "";
		$_SESSION["_su_add_telp"] = "";
		$_SESSION["_su_add_alamat"] = "";
	}
	//=================================================================================
	//=================================================================================
	//=================================================================================








?>