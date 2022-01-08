<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 4; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_po_outlet 					= array(100);
	$_po_counter_outlet 	= 1;
	$_po_outlet[0]				= "ALL";
	$_po_query_outlet   	= "SELECT building.user_id,building.name FROM building WHERE building.user_id = '$_global_user_id' ";
	$_po_result_outlet  	= $__konek_absensi->query($_po_query_outlet); 
	while ($_po_data_outlet = mysqli_fetch_array($_po_result_outlet)){
		$_po_outlet[$_po_counter_outlet]	= $_po_data_outlet['name'];
		$_po_counter_outlet++;
	}
	//===================================================================
	//===================================================================
	//===================================================================
	$_po_tahun_bulan					= array(20);
	$_po_counter_tahun_bulan	= 0;
	for($_po_free_counter = 0;$_po_free_counter < 13;$_po_free_counter++){
		$_tulisan_kurangan = " -".$_po_free_counter." months";
		$_po_tahun_bulan[$_po_counter_tahun_bulan] = date("Y F",strtotime(date("Y F").$_tulisan_kurangan));
		$_po_counter_tahun_bulan++;
	}
	//===================================================================
	//===================================================================
	//===================================================================
	$_po_tanggal_ori				= date_create($tanggal_update_today);
	$_po_tahun_bulan_default= date_format($_po_tanggal_ori,"Y F");
	$_ses_po_tahun_bulan	  = $_SESSION["_po_tahun_bulan"];
	$_ses_po_outlet 				= $_SESSION["_po_outlet"];
	$_ses_po_karyawan	 			= $_SESSION["_po_karyawan"];
	if(empty($_ses_po_tahun_bulan))		{$_ses_po_tahun_bulan = $_po_tahun_bulan_default;}
	if(empty($_ses_po_outlet))				{$_ses_po_outlet = "ALL";}
	//===================================================================
	$__po_tahun 				= substr($_ses_po_tahun_bulan,0,4);
	$__po_bulan 				= substr($_ses_po_tahun_bulan,5,3);
	$__tanggal_jadi 		= $__po_tahun."-".$__po_bulan."-01";
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
	//==========TOTAL VARIABLE PEMASUKAN OUTLET==========================
	//===================================================================
	// $_ses_po_outlet = "BALUNG BENDO";
	//===================================================================
  $___po_outlet				= array(100);
  $___po_omset 				= array(100);
  $___po_omset_total	= 0;
  $___po_counter 			= 0;
  $___OMSET_ 					= 0;
	//===================================================================
	//=================================================================== 
	$____po_hari						= array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	$____po_hari_nomor			= 0;		
	$____po_tanggal 				= array(1500);
	$____po_TANGGAL_GR   		= array(1500);
	$____po_omset 					= array(1500);
	$____po_OMSET_TAMBAL_GR	= array(1500);
	$____po_OMSET_GR				= array(1500);
	$____po_omset_total_outlet = 0;
	$____po_karyawan 				= array(1500);
	$____po_shift 					= array(1500);
	$____po_check_in				= array(1500);
	$____po_check_out				= array(1500);
	$____po_check_in_p				= array(1500);
	$____po_check_out_p				= array(1500);
	$____po_check_telat				= array(1500);
	$____po_kwh							= array(1500);
	$____po_tambal_motor		= array(1500);
	$____po_tambal_mobil		= array(1500);
	$____po_omset_tambal		= array(1500);
	$____po_promo_motor			= array(1500);
	$____po_promo_mobil			= array(1500);
	$____po_error_motor			= array(1500);
	$____po_error_mobil			= array(1500);
	$____po_information			= array(1500);
	$____po_picture_in			= array(1500);
	$____po_picture_out			= array(1500);
	$____po_counter 				= 0;
	$____po_omset_tertinggi = 0;
	//===================================================================
	$____po_grafik_data_1   = "";
	$____po_grafik_datt_1   = "";
	$____po_grafik_nama_1   = "";
	$____po_grafik_data_2   = "";
	$____po_grafik_nama_2   = "";
	//=================================================================== 
	//=================================================================== 
	if($_ses_po_outlet != "ALL"){
		//=================================================================== 
		//=================================================================== 
		//=================================================================== 
		for($COUNT_DATE = 1;$COUNT_DATE <= $__jumlah_tanggal;$COUNT_DATE++){
			$____po_OMSET_GR[$COUNT_DATE] = 0;
			$____po_OMSET_TAMBAL_GR[$COUNT_DATE] = 0;
			$____po_TANGGAL_GR[$COUNT_DATE] = date_create($__tanggal_start);
			$____po_TANGGAL_GR[$COUNT_DATE] = date_format($____po_TANGGAL_GR[$COUNT_DATE],"M y");
			$____po_TANGGAL_GR[$COUNT_DATE] = $COUNT_DATE." ".$____po_TANGGAL_GR[$COUNT_DATE];
			$____po_tanggal_titip						= date_create($____po_TANGGAL_GR[$COUNT_DATE]);
			$____po_hari_nomor						  = date_format($____po_tanggal_titip,"w");
		}
		$____query_outlet = "SELECT *, presence.time_in AS time_in_p , presence.time_out AS time_out_p FROM building,employees,presence,shift WHERE presence.presence_date BETWEEN '$__tanggal_start' AND '$__tanggal_end' AND employees.id = presence.employees_id AND presence.building_id = building.building_id AND building.name = '$_ses_po_outlet' AND presence.shift_id = shift.shift_id ";
	  $____result_outlet = $__konek_absensi->query($____query_outlet);
	  while ($____po_data_outlet = mysqli_fetch_array($____result_outlet)){
	  	//------------------------------------------------
	  	$CONV_DATE = date_create($____po_data_outlet['presence_date']);
	  	$CONV_DATE = date_format($CONV_DATE,"j");
	  	for($COUNT_DATE = 1;$COUNT_DATE <= $__jumlah_tanggal;$COUNT_DATE++){
	  		if($CONV_DATE == $COUNT_DATE){
	  			$____po_OMSET_GR[$COUNT_DATE] = $____po_OMSET_GR[$COUNT_DATE] + $____po_data_outlet['final_glass'];
	  			$____po_OMSET_TAMBAL_GR[$COUNT_DATE] = $____po_OMSET_TAMBAL_GR[$COUNT_DATE] + 
	  							(		($____po_data_outlet['hrg_tambal_motor'] * $____po_data_outlet['total_small_glass']) +
	  									($____po_data_outlet['hrg_tambal_mobil'] * $____po_data_outlet['total_big_glass']) ) ;

	  		}
	  	}
	  	//------------------------------------------------
	  	$____po_tanggal[$____po_counter] 		= date_create($____po_data_outlet['presence_date']);
	  	$____po_tanggal[$____po_counter] 		= date_format($____po_tanggal[$____po_counter],"d M Y");
	  	$____po_omset[$____po_counter] 		  = $____po_data_outlet['final_glass'];
	  	$____po_karyawan[$____po_counter] 	= $____po_data_outlet['employees_name'];
	  	$____po_shift[$____po_counter] 			= $____po_data_outlet['shift_name'];

        $____po_kwh[$____po_counter]                   = $____po_data_outlet['total_plastic_big'];
        $____po_picture_in[$____po_counter]            = "../karyawan/absent/".$____po_data_outlet['picture_in'];
        $____po_picture_out[$____po_counter]           = "../karyawan/absent/".$____po_data_outlet['picture_out'];
        $____po_information[$____po_counter]           = $____po_data_outlet['information'];
        $____po_tambal_motor[$____po_counter]          = $____po_data_outlet['total_small_glass'];
        $____po_tambal_mobil[$____po_counter]          = $____po_data_outlet['total_big_glass'];
        $____po_error_motor[$____po_counter]           = $____po_data_outlet['total_sticker'];
        $____po_error_mobil[$____po_counter]           = $____po_data_outlet['total_straw_small'];
        $____po_promo_motor[$____po_counter]           = $____po_data_outlet['total_straw_big'];
        $____po_promo_mobil[$____po_counter]           = $____po_data_outlet['total_plastic_small'];
				$____po_check_in[$____po_counter]							 = $____po_data_outlet['time_in'];
				$____po_check_out[$____po_counter]						 = $____po_data_outlet['time_out'];
				$____po_check_in_p[$____po_counter]							 = $____po_data_outlet['time_in_p'];
				$____po_check_out_p[$____po_counter]						 = $____po_data_outlet['time_out_p'];
				$____po_check_telat[$____po_counter] = 0;
				if($____po_check_in_p[$____po_counter] > $____po_check_in[$____po_counter]){$____po_check_telat[$____po_counter] = 1;}
				$____po_omset_tambal[$____po_counter] = 
	  							(		($____po_data_outlet['hrg_tambal_motor'] * $____po_data_outlet['total_small_glass']) +
	  									($____po_data_outlet['hrg_tambal_mobil'] * $____po_data_outlet['total_big_glass']) ) ;
	  	$____po_counter++;
	  }
	  for($COUNT_DATE = 1;$COUNT_DATE <= $__jumlah_tanggal;$COUNT_DATE++){
	  	$____po_grafik_nama_1	.= "'".$____po_TANGGAL_GR[$COUNT_DATE]."',";
	  	$____po_grafik_data_1 .= $____po_OMSET_GR[$COUNT_DATE].",";
	  	$____po_grafik_datt_1 .= $____po_OMSET_TAMBAL_GR[$COUNT_DATE].",";
	  	$____po_omset_total_outlet = $____po_omset_total_outlet + $____po_OMSET_GR[$COUNT_DATE];
	  	if($____po_OMSET_GR[$COUNT_DATE] > $____po_omset_tertinggi){
	  		$____po_omset_tertinggi = $____po_OMSET_GR[$COUNT_DATE];
	  	}
	  } 
	  $____po_grafik_nama_1 = substr($____po_grafik_nama_1, 0 , -1);
	  $____po_grafik_data_1 = substr($____po_grafik_data_1, 0 , -1);
	  $____po_grafik_datt_1 = substr($____po_grafik_datt_1, 0 , -1);
		//===================================================================
		//===================================================================  
		//===================================================================
	}
	//===================================================================  
	//===================================================================
	//=================================================================== 
	if($_ses_po_outlet == "ALL"){
		//===================================================================  
		//===================================================================
		//===================================================================  
		$___query_outlet = "SELECT * FROM building WHERE building.user_id = '$_global_user_id' ";
	  $___result_outlet = $__konek_absensi->query($___query_outlet);
	  while ($___po_data = mysqli_fetch_array($___result_outlet)){
	  	$___po_hsl_code_id = $___po_data['code_id'];
	    $___po_hsl_outlet = $___po_data['building_id'];
	    $___po_outlet[$___po_counter] = $___po_data['name']; 
	    $___OMSET_ = 0;
	    $___query_omset = "SELECT * FROM presence WHERE presence.presence_date BETWEEN '$__tanggal_start' AND '$__tanggal_end' AND presence.building_id = '$___po_hsl_outlet' AND presence.user_id = '$_global_user_id' ";
	   	$___result_omset = $__konek_absensi->query($___query_omset); 
	   	while ($___po_data_omset = mysqli_fetch_array($___result_omset)){
	   		$___OMSET_  = $___OMSET_ + $___po_data_omset['final_glass'];
	   		$___po_omset[$___po_counter] = $___OMSET_; 
	   	}
	   	$___po_omset_total = $___po_omset_total + $___po_omset[$___po_counter];
	  	$____po_grafik_nama_2	.= "'".$___po_outlet[$___po_counter]."',";
	  	$____po_grafik_data_2 .= $___po_omset[$___po_counter].",";
	    $___po_counter++;
	  }
		//===================================================================
	  $____po_grafik_nama_2 = substr($____po_grafik_nama_2, 0 , -1);
	  $____po_grafik_data_2 = substr($____po_grafik_data_2, 0 , -1);
		//=================================================================== 
		//===================================================================
	}


	
?>