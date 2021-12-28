<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 5; // 1 dashboard
  include_once '../admin/program/global_var.php';
  include_once '../admin/program/database.php';
  include_once '../admin/program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_ssn_outlet 					= array(100);
	$_ssn_counter_outlet 	= 1;
	$_ssn_outlet[0]				= "ALL";
	$_ssn_query_outlet   	= "SELECT building.user_id,building.name FROM building WHERE building.user_id = '$_global_user_id' ";
	$_ssn_result_outlet  	= $__konek_absensi->query($_ssn_query_outlet); 
	while ($_ssn_data_outlet = mysqli_fetch_array($_ssn_result_outlet)){
		$_ssn_outlet[$_ssn_counter_outlet]	= $_ssn_data_outlet['name'];
		$_ssn_counter_outlet++;
	}
	//===================================================================
	//===================================================================
	//===================================================================
	$_ssn_tahun_bulan					= array(20);
	$_ssn_counter_tahun_bulan	= 0;
	for($_ssn_free_counter = 0;$_ssn_free_counter < 13;$_ssn_free_counter++){
		$_tulisan_kurangan = " -".$_ssn_free_counter." months";
		$_ssn_tahun_bulan[$_ssn_counter_tahun_bulan] = date("Y F",strtotime(date("Y F").$_tulisan_kurangan));
		$_ssn_counter_tahun_bulan++;
	}
	//===================================================================
	//===================================================================
	//===================================================================
	$_ssn_tanggal_ori				= date_create($tanggal_update_today);
	$_ssn_tahun_bulan_default= date_format($_ssn_tanggal_ori,"Y F");
	$_ses_ssn_tahun_bulan	  = $_SESSION["_ssn_tahun_bulan"];
	$_ses_ssn_outlet 				= $_SESSION["_ssn_outlet"];
	if(empty($_ses_ssn_tahun_bulan))		{$_ses_ssn_tahun_bulan = $_ssn_tahun_bulan_default;}
	if(empty($_ses_ssn_outlet))				{$_ses_ssn_outlet = "ALL";}
	//===================================================================
	$__ssn_tahun 				= substr($_ses_ssn_tahun_bulan,0,4);
	$__ssn_bulan 				= substr($_ses_ssn_tahun_bulan,5,3);
	$__tanggal_jadi 		= $__ssn_tahun."-".$__ssn_bulan."-01";
	$__tanggal_jadi_fix	= date_create($__tanggal_jadi);
  $__tanggal_tahun    = date_format($__tanggal_jadi_fix,"Y");
  $__tanggal_bulan    = date_format($__tanggal_jadi_fix,"n");
  $__tanggal_bulan_2  = date_format($__tanggal_jadi_fix,"m");
  $__jumlah_tanggal   = cal_days_in_month(CAL_GREGORIAN,$__tanggal_bulan,$__tanggal_tahun);
  $__tanggal_start 		= $__tanggal_tahun."-".$__tanggal_bulan_2."-01";
  $__tanggal_end 			= $__tanggal_tahun."-".$__tanggal_bulan_2."-".$__jumlah_tanggal;
	//===================================================================
	//===================================================================
	//===================================================================
  $_h___no                  = array(3000);
  $_h___date                = array(3000);
  $_h___tambah_motor        = array(3000);
  $_h___tambah_mobil        = array(3000);
  $_h___isi_baru_motor      = array(3000);
  $_h___isi_baru_mobil      = array(3000);
  $_h___counter             = 0;
	//===================================================================
	//===================================================================  
	$__ssn_karyawan 		= array(1000);
	$__ssn_outlet 			= array(1000);
	$__ssn_code_id			= array(1000);
	$__ssn_omset	 			= array(1000);
	$__ssn_tanggal 			= array(1000);
	$__ssn_tanggal_2		= array(1000);
	$__ssn_shift	 			= array(1000);
	$__ssn_time_in_shift	= array(1000);
	$__ssn_time_out_shift	= array(1000);
	$__ssn_tanggal_jam_jadi = "";
	$__ssn_counter 			= 0;
	$__ssn_query_absen = "SELECT *,shift.time_in AS check_in,shift.time_out AS check_out FROM presence,employees,building,shift WHERE presence.presence_date BETWEEN '$__tanggal_start' AND '$__tanggal_end' AND presence.shift_id = shift.shift_id AND presence.building_id = building.building_id AND presence.employees_id = employees.id AND presence.user_id = '$_global_user_id' ";
	$__ssn_result_absen = $__konek_absensi->query($__ssn_query_absen); 
	while ($__ssn_data_absen = mysqli_fetch_array($__ssn_result_absen)){
	  $__ssn_tanggal[$__ssn_counter] 		= date_create($__ssn_data_absen['presence_date']);
	  $__ssn_tanggal[$__ssn_counter] 		= date_format($__ssn_tanggal[$__ssn_counter],"d M Y");
	  $__ssn_tanggal_2[$__ssn_counter] 		= date_create($__ssn_data_absen['presence_date']);
	  $__ssn_tanggal_2[$__ssn_counter] 		= date_format($__ssn_tanggal_2[$__ssn_counter],"Y-m-d");
	  $__ssn_outlet[$__ssn_counter] 	  = $__ssn_data_absen['name'];
	  $__ssn_omset[$__ssn_counter] 		  = $__ssn_data_absen['final_glass'];
	  $__ssn_karyawan[$__ssn_counter] 	= $__ssn_data_absen['employees_name'];
	  $__ssn_shift[$__ssn_counter] 			= $__ssn_data_absen['shift_name'];
	  $__ssn_time_in_shift[$__ssn_counter] 			= $__ssn_data_absen['check_in'];
	  $__ssn_time_out_shift[$__ssn_counter] 			= $__ssn_data_absen['check_out'];
	  $__ssn_tanggal_jam_jadi = $__ssn_tanggal_2[$__ssn_counter]." " .$__ssn_time_in_shift[$__ssn_counter];
	  $__ssn_time_in_shift[$__ssn_counter] = date("Y-m-d H:i:s",strtotime(date($__ssn_tanggal_jam_jadi)." +30 minutes"));
    $__ssn_time_out_shift[$__ssn_counter] = $__ssn_tanggal_2[$__ssn_counter]." ".$__ssn_time_out_shift[$__ssn_counter];
	  $__ssn_code_id[$__ssn_counter] 	  = "data_".$__ssn_data_absen['code_id'];

	  $__ssn_counter++;
	}

	
?>