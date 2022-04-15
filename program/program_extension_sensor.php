<?php 
	//=================================================
	$_global_page_program = 12; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//================================================================================
	//================================================================================
	//================================================================================
	$_ex_sen_tanggal_ori				= date_create($tanggal_update_today);
	$_ex_sen_tanggal_default 		= date_format($_ex_sen_tanggal_ori,"Y-m-d");
	$_ses_ex_sen_tanggal 				= $_SESSION["_ex_sen_tgl"];
	$_ses_ex_sen_outlet 				= $_SESSION["_ex_sen_outlet"];
	//================================================================================
	//================================================================================
	if(empty($_ses_ex_sen_tanggal)){$_ses_ex_sen_tanggal = $_ex_sen_tanggal_default;}
 	$_ex_sen_value_date			  = date_format(date_create($_ses_ex_sen_tanggal),"d F Y");
 	$_ex_sen_tanggal_2	 = date_format(date_create($_ses_ex_sen_tanggal),"Y-m-d");
	//================================================================================
	//================================================================================
	$_ex_sen_outlet							= array(100);
	$_ex_sen_outlet_counter			= 0;
	$_ex_sen_enable_sensor			= 1;
	$_ex_sen_query_outlet   	= "SELECT * FROM building WHERE building.user_id = '$_global_user_id' AND building.enable_sensor = 1 ";
	$_ex_sen_result_outlet  	= $__konek_absensi->query($_ex_sen_query_outlet); 
	while ($_ex_sen_data_outlet = mysqli_fetch_array($_ex_sen_result_outlet)){
		$_ex_sen_outlet[$_ex_sen_outlet_counter]	= $_ex_sen_data_outlet['name'];
		$_ex_sen_outlet_counter++;
	}
	//================================================================================
	//================================================================================
	//================================================================================
	if(empty($_ses_ex_sen_outlet))				{$_ses_ex_sen_outlet = $_ex_sen_outlet[0];}
	//================================================================================
	//================================================================================
	//===================================================================
  $_h___no                  = array(3000);
  $_h___date                = array(3000);
  $_h___sen_door        		= array(3000);
  $_h___counter             = 0;
	//=================================================================== 
	//=================================================================== 
	$__ex_sen_code_id					= array(1000);
	$__ex_sen_counter 				= 0;
	$__ex_sen_time_start			= array(1000);
	$__ex_sen_time_end				= array(1000);
	//=================================================================== 
	//=================================================================== 
  $__ex_sen_query = " SELECT * FROM building WHERE building.user_id = '$_global_user_id' AND building.name = '$_ses_ex_sen_outlet' ";
	$__ex_sen_result = $__konek_absensi->query($__ex_sen_query); 
	while ($__ex_sen_data = mysqli_fetch_array($__ex_sen_result)){
	  $__ex_sen_code_id[$__ex_sen_counter] 	  						= "data_".$__ex_sen_data['code_id'];
	  //=========================================================================
	  //=========================================================================
	  $__ex_sen_time_start[$__ex_sen_counter] = $_ex_sen_tanggal_2." "."01:00:00";
    $__ex_sen_time_end[$__ex_sen_counter] 	= $_ex_sen_tanggal_2." "."23:00:00";
    $_h___counter = 0;
	  //=========================================================================
	  //=========================================================================
		$__ex_sen_query_data_sn   	= "SELECT * FROM $__ex_sen_code_id[$__ex_sen_counter] WHERE date BETWEEN '$__ex_sen_time_start[$__ex_sen_counter]' AND '$__ex_sen_time_end[$__ex_sen_counter]' ORDER BY date";
		$__ex_sen_result_data_sn  	= $__konek_base_new->query($__ex_sen_query_data_sn); 
	  //=========================================================================
	  //=========================================================================
	  $_es_lock_1 = 0;
	  $_es_start_kondisi = array(1000);
	  $_es_end_kondisi   = array(1000);
	  $_es_start_kondisi_2 = array(1000);
	  $_es_end_kondisi_2   = array(1000);
	  $_es_selisih   			= array(1000);
	  $_es_kondisi 				= array(1000);
	  $_es_konter     		= 0;
	  //=========================================================================
	  //=========================================================================
	  while ($data = mysqli_fetch_array($__ex_sen_result_data_sn)){
      $_h___sen_door[$_h___counter] =  $data['sen_door'];
      $_h___date[$_h___counter] = substr($data['date'],11,5);
      //====================================================================
      //====================================================================
      if($_es_lock_1 == 0){
      	$_es_lock_1 = 1;
      	$_es_start_kondisi[$_es_konter] = $_h___date[$_h___counter];
      	$_es_kondisi[$_es_konter] 			= $_h___sen_door[$_h___counter];
      }
      if($_es_lock_1 == 1){
      	if($_h___sen_door[$_h___counter] != $_es_kondisi[$_es_konter]){
      		$_es_end_kondisi[$_es_konter] = $_h___date[$_h___counter-1];
      		$_es_start_kondisi_2[$_es_konter] = abs(substr($_es_start_kondisi[$_es_konter],0,2))*60 + abs(substr($_es_start_kondisi[$_es_konter],3,5));
      		$_es_end_kondisi_2[$_es_konter] 	 = abs(substr($_es_end_kondisi[$_es_konter],0,2))*60 + abs(substr($_es_end_kondisi[$_es_konter],3,5));
    			$_es_selisih[$_es_konter] 	= abs($_es_end_kondisi_2[$_es_konter] - $_es_start_kondisi_2[$_es_konter]);
      		$_es_konter++;
      		$_es_lock_1 = 2;
      	}
      }
      if($_es_lock_1 == 2){
      	$_es_lock_1 = 1;
      	$_es_start_kondisi[$_es_konter] = $_h___date[$_h___counter];
      	$_es_kondisi[$_es_konter] 			= $_h___sen_door[$_h___counter];
      }
      //====================================================================
      //====================================================================
      $_h___counter++;
	  }
	  //=========================================================================
	  //=========================================================================
	  $_es_end_kondisi[$_es_konter] = $_h___date[$_h___counter-1];
	  $_es_start_kondisi_2[$_es_konter] = abs(substr($_es_start_kondisi[$_es_konter],0,2))*60 + abs(substr($_es_start_kondisi[$_es_konter],3,5));
	  $_es_end_kondisi_2[$_es_konter] 	 = abs(substr($_es_end_kondisi[$_es_konter],0,2))*60 + abs(substr($_es_end_kondisi[$_es_konter],3,5));
	  $_es_selisih[$_es_konter] 	= abs($_es_end_kondisi_2[$_es_konter] - $_es_start_kondisi_2[$_es_konter]);
	  //=========================================================================
	  //=========================================================================
	  $__ex_sen_counter++;
	}



?>