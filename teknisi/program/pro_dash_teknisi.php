<?php 
	//=================================================
	$_global_page_program = 1; // 1 dashboard
  include_once './program/global_var.php';
	include_once './program/database.php';
  include_once './program/date_time.php';
	$total_menit = $global_total_menit;

	//====================================================================================
	//==================DATABASE NITRO TEKNISI PARAMETER==================================
	//====================================================================================
	$__dash_device_id 						= array(300);
	$__dash_no_hp			 						= array(300);
	$__dash_gsm 			 						= array(300);
	$__dash_tgl_isi_paket					= array(300);
	$__dash_tgl_isi 							= array(300);
	$__dash_counter       				= 0;
	$__dash_db_data_teknisi = mysqli_query($__konek_nitro_teknisi,"select * from data_paket order by no");
	while ($__dash_data = mysqli_fetch_array($__dash_db_data_teknisi)){
		$__dash_device_id[$__dash_counter]  					= $__dash_data['device_id'];
		$__dash_no_hp[$__dash_counter]   							= $__dash_data['no_hp'];
		$__dash_gsm[$__dash_counter]   								= $__dash_data['jenis_gsm'];
		$__dash_tgl_isi_paket[$__dash_counter]   			= date_create($__dash_data['isi_paket']);
		$__dash_diff = date_diff($__dash_tgl_isi_paket[$__dash_counter],date_create($global_date));
		$__dash_diff_2 = $__dash_diff->format("%a");
		$__dash_tgl_isi[$__dash_counter] = 29 - $__dash_diff_2;
		$__dash_counter++;
	}
	//====================================================================================
	//==================DATABASE MIROVTEC NITRO REAL UPDATE===============================
	//====================================================================================
	$____dash_device_id 					= array(300);
	$____dash_name			 					= array(300);
	$____dash_user_id		 					= array(300);
	$____dash_ban_tambah_motor 		= array(300);
	$____dash_ban_tambah_mobil 		= array(300);
	$____dash_ban_isi_baru_motor 	= array(300);
	$____dash_ban_isi_baru_mobil 	= array(300);
	$____dash_waktu 							= array(300);
	$____dash_waktu_ori						= array(300);
	$____total_omset_outlet				= array(300);
	$____total_ban_outlet					= array(300);
	$____total_ban_motor					= array(300);
	$____total_ban_mobil					= array(300);
	$____status_outlet						= array(300);
	$____tanggal_isi_paket				= array(300);
	$____owner_outlet							= array("ap","ap","ap","nuril","farhan","farhan","dedy","miski","ruly","suli","bella",);
	$____status_off 							= 0;
	$____dash_counter_data				= 0;
	$____dash_counter_status			= 0;
	$____dash_db_data_nitro = mysqli_query($__konek_nitro,"select * from $__db_nama_data order by no");
	while ($____dash_data = mysqli_fetch_array($____dash_db_data_nitro)){
		$____dash_device_id[$____dash_counter_data] 					= $____dash_data['device_id'];
		$____dash_name[$____dash_counter_data] 								= $____dash_data['name'];
		$____dash_user_id[$____dash_counter_data] 						= $____owner_outlet[$____dash_data['user_id']];
		$____dash_ban_tambah_motor[$____dash_counter_data] 		= $____dash_data['ban_tambah_motor'];
		$____dash_ban_tambah_mobil[$____dash_counter_data] 		= $____dash_data['ban_tambah_mobil'];
		$____dash_ban_isi_baru_motor[$____dash_counter_data] 	= $____dash_data['ban_isi_baru_motor'];
		$____dash_ban_isi_baru_mobil[$____dash_counter_data] 	= $____dash_data['ban_isi_baru_mobil'];
		$____dash_waktu_ori[$____dash_counter_data] 					= substr($____dash_data['waktu'],0,5);
		$____total_ban_outlet[$____dash_counter_data] 				= $____dash_data['ban_tambah_motor'] + $____dash_data['ban_tambah_mobil'] + $____dash_data['ban_isi_baru_motor'] + $____dash_data['ban_isi_baru_mobil'] ;
		$____total_ban_motor[$____dash_counter_data] 				= $____dash_data['ban_tambah_motor'] + $____dash_data['ban_isi_baru_motor'] ;
		$____total_ban_mobil[$____dash_counter_data] 				= $____dash_data['ban_tambah_mobil'] + $____dash_data['ban_isi_baru_mobil'] ;
		$____dash_total_waktu = abs(substr($____dash_data['waktu'],0,2))*60 + abs(substr($____dash_data['waktu'],3,5));
		if(abs($____dash_total_waktu - $total_menit) < $_global_selisih_menit_online){$____status_outlet[$____dash_counter_data] = 1;$____dash_counter_status++;}
    else{$____status_outlet[$____dash_counter_data] = 0;$____status_off = 1;}  
    $____dash_waktu[$____dash_counter_data] 							= abs($____dash_total_waktu - $total_menit);
    for($ret = 0;$ret < $__dash_counter; $ret++){
    	if($____dash_device_id[$____dash_counter_data] == $__dash_device_id[$ret]){
    		$____tanggal_isi_paket[$____dash_counter_data] = $__dash_tgl_isi[$ret];
    	}
    }
		$____dash_counter_data++;
	}

	
	//====================================================================================
	//====================================================================================

?>