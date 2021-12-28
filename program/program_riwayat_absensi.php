<?php 
	//=================================================
	$_global_page_program = 3; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//================================================================================
	//================================================================================
	//================================================================================
	$_ra_outlet 					= array(100);
	$_ra_karyawan 				= array(300);
	$_ra_counter_outlet 	= 1;
	$_ra_counter_karyawan = 1;
	$_ra_outlet[0]				= "ALL";
	$_ra_query_outlet   	= "SELECT building.user_id,building.name FROM building WHERE building.user_id = '$_global_user_id' ";
	$_ra_result_outlet  	= $__konek_absensi->query($_ra_query_outlet); 
	while ($_ra_data_outlet = mysqli_fetch_array($_ra_result_outlet)){
		$_ra_outlet[$_ra_counter_outlet]	= $_ra_data_outlet['name'];
		$_ra_counter_outlet++;
	}
	//================================================================================
	//================================================================================
	//================================================================================
	$_ra_karyawan[0]	  	= "ALL";
	$_ra_query_karyawan  	= "SELECT employees.user_id,employees.employees_name FROM employees WHERE employees.user_id='$_global_user_id' ";
	$_ra_result_karyawan	= $__konek_absensi->query($_ra_query_karyawan); 
	while ($_ra_data_karyawan = mysqli_fetch_array($_ra_result_karyawan)){
		$_ra_karyawan[$_ra_counter_karyawan]	= $_ra_data_karyawan['employees_name'];
		$_ra_counter_karyawan++;
	}
	//================================================================================
	//================================================================================
	//================================================================================
	$_ra_tanggal_ori				= date_create($tanggal_update_today);
	$_ra_bulan							= date_format($_ra_tanggal_ori,"Y-m");
	$_ra_tanggal_start_default = $_ra_bulan."-01";
	$_ra_tanggal_end_default	 = $tanggal_update_today;
	
	$_ses_ra_tanggal_start  = $_SESSION["_ra_tgl_start"];
	$_ses_ra_tanggal_end	  = $_SESSION["_ra_tgl_end"];
	$_ses_ra_outlet 				= $_SESSION["_ra_outlet"];
	$_ses_ra_karyawan	 			= $_SESSION["_ra_karyawan"];
	if(empty($_ses_ra_tanggal_start))	{$_ses_ra_tanggal_start = $_ra_tanggal_start_default;}
	if(empty($_ses_ra_tanggal_end))		{$_ses_ra_tanggal_end = $_ra_tanggal_end_default;}
	if(empty($_ses_ra_outlet))				{$_ses_ra_outlet = "ALL";}
	if(empty($_ses_ra_karyawan))			{$_ses_ra_karyawan = "ALL";}
	//================================================================================
 	$__ra_value_date_1 = date_format(date_create($_ses_ra_tanggal_start),"d F Y");
 	$__ra_value_date_2 = date_format(date_create($_ses_ra_tanggal_end),"d F Y");
 	$_kondisi = 0;
	//================================================================================
 	if($_ses_ra_outlet == "ALL" && $_ses_ra_karyawan == "ALL"){
		$__ra_query_karyawan = "SELECT * FROM presence,employees,building WHERE presence.presence_date BETWEEN '$_ses_ra_tanggal_start' AND '$_ses_ra_tanggal_end' AND presence.user_id = '$_global_user_id' AND presence.employees_id = employees.id AND presence.building_id = building.building_id ORDER BY presence.presence_date DESC"; 		
		$_kondisi = 1;
 	}
 	if($_ses_ra_outlet == "ALL" && $_ses_ra_karyawan != "ALL"){
		$__ra_query_karyawan = "SELECT * FROM presence,employees,building WHERE presence.presence_date BETWEEN '$_ses_ra_tanggal_start' AND '$_ses_ra_tanggal_end' AND presence.user_id = '$_global_user_id' AND presence.employees_id = employees.id AND presence.building_id = building.building_id AND employees.employees_name = '$_ses_ra_karyawan'  ";
		$_kondisi = 2; 		
 	}
 	if($_ses_ra_outlet != "ALL" && $_ses_ra_karyawan == "ALL"){
		$__ra_query_karyawan = "SELECT * FROM presence,employees,building WHERE presence.presence_date BETWEEN '$_ses_ra_tanggal_start' AND '$_ses_ra_tanggal_end' AND presence.user_id = '$_global_user_id' AND presence.employees_id = employees.id AND presence.building_id = building.building_id AND building.name = '$_ses_ra_outlet'  ORDER BY presence.presence_date DESC "; 
		$_kondisi = 3;		
 	}
 	if($_ses_ra_outlet != "ALL" && $_ses_ra_karyawan != "ALL"){
		$__ra_query_karyawan = "SELECT * FROM presence,employees,building WHERE presence.presence_date BETWEEN '$_ses_ra_tanggal_start' AND '$_ses_ra_tanggal_end' AND presence.user_id = '$_global_user_id' AND presence.employees_id = employees.id AND presence.building_id = building.building_id AND building.name = '$_ses_ra_outlet' AND employees.employees_name = '$_ses_ra_karyawan'  ORDER BY presence.presence_date DESC ";		
		$_kondisi = 4;
 	}
	//================================================================================
	//================================================================================
	//================================================================================
 	$__ra_presence_id				= array(3000);
 	$__ra_nama_karyawan			= array(3000);
 	$__ra_nama_outlet				= array(3000);
 	$__ra_tanggal 					= array(3000);
 	$__ra_tanggal_2  				= array(3000);
 	$__ra_check_in					= array(3000);
 	$__ra_check_out					= array(3000);
 	$__ra_kwh								= array(3000);
 	$__ra_picture_in				= array(3000);
 	$__ra_picture_out				= array(3000);
 	$__ra_information				= array(3000);
 	$__ra_omset							= array(3000);
 	$__ra_tambal_motor			= array(3000);
 	$__ra_tambal_mobil			= array(3000);
 	$__ra_error_motor				= array(3000);
 	$__ra_error_mobil				= array(3000);
 	$__ra_promo_motor				= array(3000);
 	$__ra_promo_mobil				= array(3000);
 	$__ra_counter						= 0;
	$konter = 0;
	$__ra_result_karyawan	= $__konek_absensi->query($__ra_query_karyawan); 
	while ($__ra_data_karyawan = mysqli_fetch_array($__ra_result_karyawan)){
		$__ra_presence_id[$__ra_counter]		= $__ra_data_karyawan['presence_id'];
		$__ra_nama_karyawan[$__ra_counter]	= $__ra_data_karyawan['employees_name'];
		$__ra_nama_outlet[$__ra_counter]		= $__ra_data_karyawan['name'];
		$__ra_tanggal[$__ra_counter]				= date_format(date_create($__ra_data_karyawan['presence_date']),"d-m-Y");
		$__ra_tanggal_2[$__ra_counter]			= date_format(date_create($__ra_data_karyawan['presence_date']),"d F Y");

        $__ra_kwh[$__ra_counter]                   = $__ra_data_karyawan['total_plastic_big'];
        $__ra_picture_in[$__ra_counter]            = $__ra_data_karyawan['picture_in'];
        $__ra_picture_out[$__ra_counter]           = $__ra_data_karyawan['picture_out'];
        $__ra_information[$__ra_counter]           = $__ra_data_karyawan['information'];
        $__ra_omset[$__ra_counter]                 = $__ra_data_karyawan['final_glass'];
        $__ra_tambal_motor[$__ra_counter]          = $__ra_data_karyawan['total_small_glass'];
        $__ra_tambal_mobil[$__ra_counter]          = $__ra_data_karyawan['total_big_glass'];
        $__ra_error_motor[$__ra_counter]           = $__ra_data_karyawan['total_sticker'];
        $__ra_error_mobil[$__ra_counter]           = $__ra_data_karyawan['total_straw_small'];
        $__ra_promo_motor[$__ra_counter]           = $__ra_data_karyawan['total_straw_big'];
        $__ra_promo_mobil[$__ra_counter]           = $__ra_data_karyawan['total_plastic_small'];

		$__ra_check_in[$__ra_counter]				= $__ra_data_karyawan['time_in'];
		$__ra_check_out[$__ra_counter]			= $__ra_data_karyawan['time_out'];
		$__ra_counter++;
	}
?>