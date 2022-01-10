<?php 
	//=================================================
	$_global_page_program = 1; // 1 dashboard
  include_once './program/global_var.php';
	include_once './program/database.php';
  include_once './program/date_time.php';
	// $date_update_today = date_create("2021-08-15 12:09:00");
	// $date_update_today = date_format($date_update_today,"Y-m-d H:i:s");
	// $date_update 		   = date_create("2021-08-15");
	// $date_update 		   = date_format($date_update,"Y-m-d");
	// $time_update_today = date_create("21:09:00");
	// $total_menit = abs(date_format($time_update_today,"H"))*60 + abs(date_format($time_update_today,"i"));
	$total_menit = $global_total_menit;




	//====================================================================================
	//==================DATABASE BUILDING ABSENSI=========================================
	//====================================================================================
	$___dash_building_id 				= array(100);
	$___dash_code_id 						= array(100);
	$___dash_nama 							= array(100);
	$___dash_hrg_tambah_motor 	= array(100);
	$___dash_hrg_tambah_mobil 	= array(100);
	$___dash_hrg_isi_baru_motor = array(100);
	$___dash_hrg_isi_baru_mobil = array(100);
	$___dash_hrg_tambal_motor 	= array(100);
	$___dash_hrg_tambal_mobil 	= array(100);
	$___dash_grafik_nama				= "";
	$___dash_counter_data				= 0;
	$___dash_db_data_today = mysqli_query($__konek_absensi,"select * from building where building.user_id = '$_global_user_id' order by building_id");
	while ($___dash_data = mysqli_fetch_array($___dash_db_data_today)){
			$___dash_building_id[$___dash_counter_data] 					= $___dash_data['building_id'];
			$___dash_code_id[$___dash_counter_data] 							= $___dash_data['code_id'];
			$___dash_nama[$___dash_counter_data] 									= $___dash_data['name'];
			$___dash_hrg_tambah_motor[$___dash_counter_data] 			= $___dash_data['hrg_tambah_motor'];
			$___dash_hrg_tambah_mobil[$___dash_counter_data] 			= $___dash_data['hrg_tambah_mobil'];
			$___dash_hrg_isi_baru_motor[$___dash_counter_data] 		= $___dash_data['hrg_isi_baru_motor'];
			$___dash_hrg_isi_baru_mobil[$___dash_counter_data] 		= $___dash_data['hrg_isi_baru_mobil'];
			$___dash_hrg_tambal_motor[$___dash_counter_data] 			= $___dash_data['hrg_tambal_motor'];
			$___dash_hrg_tambal_mobil[$___dash_counter_data] 			= $___dash_data['hrg_tambal_mobil'];
			// $___dash_grafik_nama 																 .= $___dash_data["name"].",";
			$___dash_grafik_nama       													 .= "'".$___dash_data["name"]."',";
			$___dash_counter_data++;
	}
	$___dash_grafik_nama = substr($___dash_grafik_nama, 0 , -1);




	//====================================================================================
	//==================DATABASE MIROVTEC NITRO REAL UPDATE===============================
	//====================================================================================
	$____dash_device_id 					= array(100);
	$____dash_ban_tambah_motor 		= array(100);
	$____dash_ban_tambah_mobil 		= array(100);
	$____dash_ban_isi_baru_motor 	= array(100);
	$____dash_ban_isi_baru_mobil 	= array(100);
	$____dash_waktu 							= array(100);
	$____total_omset_outlet				= array(100);
	$____total_ban_outlet					= array(100);
	$____status_outlet						= array(100);
	$____total_max_omset					= 0;
	$____dash_grafik_omset				= "";
	$____dash_counter_data				= 0;
	$____dash_counter_status			= 0;
	$____dash_db_data_nitro = mysqli_query($__konek_nitro,"select * from $__db_nama_data order by no");
	while ($____dash_data = mysqli_fetch_array($____dash_db_data_nitro)){
		$____dash_device_id[$____dash_counter_data] 					= $____dash_data['device_id'];
		$____dash_ban_tambah_motor[$____dash_counter_data] 		= $____dash_data['ban_tambah_motor'];
		$____dash_ban_tambah_mobil[$____dash_counter_data] 		= $____dash_data['ban_tambah_mobil'];
		$____dash_ban_isi_baru_motor[$____dash_counter_data] 	= $____dash_data['ban_isi_baru_motor'];
		$____dash_ban_isi_baru_mobil[$____dash_counter_data] 	= $____dash_data['ban_isi_baru_mobil'];
		$____total_omset_outlet[$____dash_counter_data] 			= $____dash_data['ban_tambah_motor'] * $___dash_hrg_tambah_motor[$____dash_counter_data] + $____dash_data['ban_tambah_mobil'] * $___dash_hrg_tambah_mobil[$____dash_counter_data] + $____dash_data['ban_isi_baru_motor'] * $___dash_hrg_isi_baru_motor[$____dash_counter_data] + $____dash_data['ban_isi_baru_mobil'] * $___dash_hrg_isi_baru_mobil[$____dash_counter_data] ;
		if($____total_omset_outlet[$____dash_counter_data] > $____total_max_omset){$____total_max_omset = $____total_omset_outlet[$____dash_counter_data];}
		$____total_ban_outlet[$____dash_counter_data] 				= $____dash_data['ban_tambah_motor'] + $____dash_data['ban_tambah_mobil'] + $____dash_data['ban_isi_baru_motor'] + $____dash_data['ban_isi_baru_mobil'] ;
		$____dash_total_waktu = abs(substr($____dash_data['waktu'],0,2))*60 + abs(substr($____dash_data['waktu'],3,5));
		if(abs($____dash_total_waktu - $total_menit) < $_global_selisih_menit_online){$____status_outlet[$____dash_counter_data] = 1;$____dash_counter_status++;}
    else{$____status_outlet[$____dash_counter_data] = 0;}  
    $____dash_waktu[$____dash_counter_data] 							= abs($____dash_total_waktu - $total_menit);
    $____dash_grafik_omset 															 .= $____total_omset_outlet[$____dash_counter_data].",";
		$____dash_counter_data++;
	}
	$____dash_grafik_omset = substr($____dash_grafik_omset, 0 , -1);





	//====================================================================================
	//=====================CEK JUMLAH KARYAWAN TODAY======================================
	//====================================================================================
	$_____dash_counter_data 	 = 0;
	$_____dash_db_data_absensi = mysqli_query($__konek_absensi,"select * from presence where presence_date = '$global_date' and presence.user_id = '$_global_user_id' order by presence_id");
	while ($_____dash_data = mysqli_fetch_array($_____dash_db_data_absensi)){$_____dash_counter_data++;}





	//====================================================================================
	




	
	//====================================================================================
	//====================================================================================

?>