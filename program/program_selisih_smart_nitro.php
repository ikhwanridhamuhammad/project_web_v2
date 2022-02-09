<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 5; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_ssn_outlet 					= array(400);
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
  //===============================================================================
  //===============================================================================
  $_home_n1_b = 0;$_home_n1_a = 0;$_home_n1_n = 0;$_home_n1_awal = 0;$_home_tot_n1 = 0;
  $_home_n2_b = 0;$_home_n2_a = 0;$_home_n2_n = 0;$_home_n2_awal = 0;$_home_tot_n2 = 0;
  $_home_n3_b = 0;$_home_n3_a = 0;$_home_n3_n = 0;$_home_n3_awal = 0;$_home_tot_n3 = 0;
  $_home_n4_b = 0;$_home_n4_a = 0;$_home_n4_n = 0;$_home_n4_awal = 0;$_home_tot_n4 = 0;
  $_home_lock = 0;$_total_rupiah = 0;
	//===================================================================
	//=================================================================== 
	$__ssn_hrg_tambah_motor = array(1000);
	$__ssn_hrg_tambah_mobil = array(1000); 
	$__ssn_hrg_isi_baru_motor = array(1000);
	$__ssn_hrg_isi_baru_mobil = array(1000);
	$__ssn_hrg_tambal_motor = array(1000);
	$__ssn_hrg_tambal_mobil = array(1000);
	$__ssn_karyawan 		= array(1000);
	$__ssn_outlet 			= array(1000);
	$__ssn_code_id			= array(1000);
	$__ssn_omset	 			= array(1000);
	$__ssn_omset_2 			= array(1000);
	$__ssn_omset_detail 			= array(1000);
	$__ssn_omset_detail_2			= array(1000);
	$__ssn_kwh 			    = array(1000);
	$__ssn_keterangan 		= array(1000);
	$__ssn_tanggal 			= array(1000);
	$__ssn_tanggal_2		= array(1000);
	$__ssn_shift	 			= array(1000);
	$__ssn_picture_in	= array(1000);
	$__ssn_picture_out	= array(1000);
	$__ssn_time_in_shift	= array(1000);
	$__ssn_time_out_shift	= array(1000);
	$__ssn_time_in_presence	= array(1000);
	$__ssn_time_out_presence	= array(1000);
	$__ssn_check_telat      = array(1000);
	//===================================================
	$__ssn_tambal_motor = array(1000);
	$__ssn_tambal_mobil = array(1000);
	$__ssn_error_motor = array(1000);
	$__ssn_error_mobil = array(1000);
	$__ssn_error_2_motor = array(1000);
	$__ssn_error_2_mobil = array(1000);
	$__ssn_promo_motor = array(1000);
	$__ssn_promo_mobil = array(1000);
	$__ssn_jumlah_tambal_motor = array(1000);
	$__ssn_jumlah_tambal_mobil = array(1000);

	//===================================================
	$__ssn_tanggal_jam_jadi = "";
	$__ssn_counter 			= 0;
	$__ssn_query_absen = "SELECT *,presence.time_in AS check_in_presence,presence.time_out AS check_out_presence,shift.time_in AS check_in,shift.time_out AS check_out FROM presence,employees,building,shift WHERE presence.presence_date BETWEEN '$__tanggal_start' AND '$__tanggal_end' AND presence.shift_id = shift.shift_id AND presence.building_id = building.building_id AND presence.employees_id = employees.id AND presence.user_id = '$_global_user_id' ";
	$__ssn_result_absen = $__konek_absensi->query($__ssn_query_absen); 
	while ($__ssn_data_absen = mysqli_fetch_array($__ssn_result_absen)){
	  $__ssn_tanggal[$__ssn_counter] 		= date_create($__ssn_data_absen['presence_date']);
	  $__ssn_tanggal[$__ssn_counter] 		= date_format($__ssn_tanggal[$__ssn_counter],"d M Y");
	  $__ssn_tanggal_2[$__ssn_counter] 		= date_create($__ssn_data_absen['presence_date']);
	  $__ssn_tanggal_2[$__ssn_counter] 		= date_format($__ssn_tanggal_2[$__ssn_counter],"Y-m-d");
	  $__ssn_outlet[$__ssn_counter] 	  = $__ssn_data_absen['name'];
	  $__ssn_omset[$__ssn_counter] 		  = $__ssn_data_absen['final_glass'];
	  $__ssn_kwh[$__ssn_counter] 		  = $__ssn_data_absen['total_plastic_big'];
	  $__ssn_keterangan[$__ssn_counter] 		  = $__ssn_data_absen['information'];
	  //==============================================================================
	  $__ssn_tambal_motor[$__ssn_counter] 		  = $__ssn_data_absen['total_small_glass'];  // tambal motor
	  $__ssn_tambal_mobil[$__ssn_counter] 		  = $__ssn_data_absen['total_big_glass'];		 // tambal mobil
	  $__ssn_error_motor[$__ssn_counter] 		  = $__ssn_data_absen['total_sticker']+$__ssn_data_absen['total_straw_big']; //error motor
	  $__ssn_error_mobil[$__ssn_counter] 		  = $__ssn_data_absen['total_straw_small']+$__ssn_data_absen['total_plastic_small']; // error mobil
	  $__ssn_error_2_motor[$__ssn_counter] 		  = $__ssn_data_absen['total_sticker']; //error motor
	  $__ssn_error_2_mobil[$__ssn_counter] 		  = $__ssn_data_absen['total_straw_small']; // error mobil
	  $__ssn_promo_motor[$__ssn_counter] 		  = $__ssn_data_absen['total_straw_big']; //error motor
	  $__ssn_promo_mobil[$__ssn_counter] 		  = $__ssn_data_absen['total_plastic_small']; // error mobil
	  //==============================================================================
	  $__ssn_karyawan[$__ssn_counter] 	= $__ssn_data_absen['employees_name'];
	  $__ssn_shift[$__ssn_counter] 			= $__ssn_data_absen['shift_name'];
	  //==============================================================================
        $__ssn_picture_in[$__ssn_counter]            = "../karyawan/absent/".$__ssn_data_absen['picture_in'];
        $__ssn_picture_out[$__ssn_counter]           = "../karyawan/absent/".$__ssn_data_absen['picture_out'];
	  $__ssn_time_in_shift[$__ssn_counter] 			= $__ssn_data_absen['check_in'];
	  $__ssn_time_out_shift[$__ssn_counter] 			= $__ssn_data_absen['check_out'];
	  $__ssn_time_in_presence[$__ssn_counter] 			= $__ssn_data_absen['check_in_presence'];
	  $__ssn_time_out_presence[$__ssn_counter] 			= $__ssn_data_absen['check_out_presence'];
 	    $__ssn_check_telat[$__ssn_counter] = 0;
		if($__ssn_time_in_presence[$__ssn_counter] > $__ssn_time_in_shift[$__ssn_counter]){$__ssn_check_telat[$__ssn_counter] = 1;}
	  //==============================================================================
	  $__ssn_tanggal_jam_jadi = $__ssn_tanggal_2[$__ssn_counter]." " .$__ssn_time_in_shift[$__ssn_counter];
	  $__ssn_time_in_shift[$__ssn_counter] = date("Y-m-d H:i:s",strtotime(date($__ssn_tanggal_jam_jadi)." +15 minutes"));
    $__ssn_time_out_shift[$__ssn_counter] = $__ssn_tanggal_2[$__ssn_counter]." ".$__ssn_time_out_shift[$__ssn_counter];
	  $__ssn_code_id[$__ssn_counter] 	  = "data_".$__ssn_data_absen['code_id'];
	  //=========================================================================
	  //=========================================================================
	  $__ssn_hrg_tambah_motor[$__ssn_counter] 			= $__ssn_data_absen['hrg_tambah_motor'];
	  $__ssn_hrg_tambah_mobil[$__ssn_counter] 			= $__ssn_data_absen['hrg_tambah_mobil'];
	  $__ssn_hrg_isi_baru_motor[$__ssn_counter] 		= $__ssn_data_absen['hrg_isi_baru_motor'];
	  $__ssn_hrg_isi_baru_mobil[$__ssn_counter] 		= $__ssn_data_absen['hrg_isi_baru_mobil'];
	  $__ssn_hrg_tambal_motor[$__ssn_counter] 			= $__ssn_data_absen['hrg_tambal_motor'];
	  $__ssn_hrg_tambal_mobil[$__ssn_counter] 			= $__ssn_data_absen['hrg_tambal_mobil'];
	  //=========================================================================
	  //=========================================================================
	  //=========================================================================
	  //=========================================================================
	  $_home_n1_b = 0;$_home_n1_a = 0;$_home_n1_n = 0;$_home_n1_awal = 0;$_home_tot_n1 = 0;
	  $_home_n2_b = 0;$_home_n2_a = 0;$_home_n2_n = 0;$_home_n2_awal = 0;$_home_tot_n2 = 0;
	  $_home_n3_b = 0;$_home_n3_a = 0;$_home_n3_n = 0;$_home_n3_awal = 0;$_home_tot_n3 = 0;
	  $_home_n4_b = 0;$_home_n4_a = 0;$_home_n4_n = 0;$_home_n4_awal = 0;$_home_tot_n4 = 0;
	  $_home_lock = 0;$_total_rupiah = 0;$_h___counter = 0;
	  //=========================================================================
	  //=========================================================================
		$__dsn_query_data_sn   	= "SELECT * FROM $__ssn_code_id[$__ssn_counter] WHERE date BETWEEN '$__ssn_time_in_shift[$__ssn_counter]' AND '$__ssn_time_out_shift[$__ssn_counter]' ORDER BY date";
		$__dsn_result_data_sn  	= $__konek_base_new->query($__dsn_query_data_sn); 
	  //=========================================================================
	  //=========================================================================
	  while ($data = mysqli_fetch_array($__dsn_result_data_sn)){
      $result_n1 = $data['tambah_motor'];$result_n2 = $data['tambah_mobil'];
      $result_n3 = $data['isi_baru_motor'];$result_n4 = $data['isi_baru_mobil'];
      //=======================================================================
      //=======================================================================
      $_h___tambah_motor[$_h___counter] = $result_n1;
      $_h___tambah_mobil[$_h___counter] = $result_n2;
      $_h___isi_baru_motor[$_h___counter] = $result_n3;
      $_h___isi_baru_mobil[$_h___counter] = $result_n4;
      //=======================================================================
      //=======================================================================
      $_home_n1_n = $result_n1;$_home_n2_n = $result_n2;
      $_home_n3_n = $result_n3;$_home_n4_n = $result_n4;
      if($_home_n1_n >= $_home_n1_b){$_home_n1_b = $_home_n1_n;}
      if($_home_n1_n <  $_home_n1_b){$_home_tot_n1 = $_home_tot_n1 + $_home_n1_b;$_home_n1_b = $_home_n1_n;}
      if($_home_n2_n >= $_home_n2_b){$_home_n2_b = $_home_n2_n;}
      if($_home_n2_n <  $_home_n2_b){$_home_tot_n2 = $_home_tot_n2 + $_home_n2_b;$_home_n2_b = $_home_n2_n;}
      if($_home_n3_n >= $_home_n3_b){$_home_n3_b = $_home_n3_n;}
      if($_home_n3_n <  $_home_n3_b){$_home_tot_n3 = $_home_tot_n3 + $_home_n3_b;$_home_n3_b = $_home_n3_n;}
      if($_home_n4_n >= $_home_n4_b){$_home_n4_b = $_home_n4_n;}
      if($_home_n4_n <  $_home_n4_b){$_home_tot_n4 = $_home_tot_n4 + $_home_n4_b;$_home_n4_b = $_home_n4_n;}
      //====================================================================
      //====================================================================
      $_h___counter++;
	  }
	  //=========================================================================
	  //=========================================================================
	  // $_home_tot_n1 = (($_home_tot_n1 + $_home_n1_b) - $_home_n1_awal)*$__ssn_hrg_tambah_motor[$__ssn_counter];
	  // $_home_tot_n2 = (($_home_tot_n2 + $_home_n2_b) - $_home_n2_awal)*$__ssn_hrg_tambah_mobil[$__ssn_counter];
	  // $_home_tot_n3 = (($_home_tot_n3 + $_home_n3_b) - $_home_n3_awal)*$__ssn_hrg_isi_baru_motor[$__ssn_counter];
	  // $_home_tot_n4 = (($_home_tot_n4 + $_home_n4_b) - $_home_n4_awal)*$__ssn_hrg_isi_baru_mobil[$__ssn_counter];
	  //======hitung jumlah angin tambalan x2==============
	  $__ssn_jumlah_tambal_motor[$__ssn_counter] = $__ssn_tambal_motor[$__ssn_counter] * 2;
	  $__ssn_jumlah_tambal_mobil[$__ssn_counter] = $__ssn_tambal_mobil[$__ssn_counter] * 2;
	  //======hitung jumlah angin tambalan x2==============
	  //===================================================
	  $_home_tot_n1 = ($_home_tot_n1 + $_home_n1_b) - $_home_n1_awal;
	  $_home_tot_n1 = $_home_tot_n1 - $__ssn_error_motor[$__ssn_counter];
	  $_home_tot_n1 = $_home_tot_n1 - $__ssn_jumlah_tambal_motor[$__ssn_counter];
	  //===================================================
	  $_home_tot_n2 = ($_home_tot_n2 + $_home_n2_b) - $_home_n2_awal;
	  $_home_tot_n2 = $_home_tot_n2 - $__ssn_error_mobil[$__ssn_counter];
	  $_home_tot_n2 = $_home_tot_n2 - $__ssn_jumlah_tambal_mobil[$__ssn_counter];
	  //===================================================
	  $_home_tot_n3 = ($_home_tot_n3 + $_home_n3_b) - $_home_n3_awal;
	  $_home_tot_n4 = ($_home_tot_n4 + $_home_n4_b) - $_home_n4_awal;
	  //===================================================
	  //=====hitung total rupiah angin motor mobil dengan tambal==========
	  $_home_tot_n1 = $_home_tot_n1 * $__ssn_hrg_tambah_motor[$__ssn_counter];
	  $_home_tot_n2 = $_home_tot_n2 * $__ssn_hrg_tambah_mobil[$__ssn_counter];
	  $_home_tot_n3 = $_home_tot_n3 * $__ssn_hrg_isi_baru_motor[$__ssn_counter];
	  $_home_tot_n4 = $_home_tot_n4 * $__ssn_hrg_isi_baru_mobil[$__ssn_counter];
	  $__ssn_jumlah_tambal_motor[$__ssn_counter] = $__ssn_tambal_motor[$__ssn_counter] * $__ssn_hrg_tambal_motor[$__ssn_counter];
	  $__ssn_jumlah_tambal_mobil[$__ssn_counter] = $__ssn_tambal_mobil[$__ssn_counter] * $__ssn_hrg_tambal_mobil[$__ssn_counter];
	  //=====hitung total rupiah angin motor mobil dengan tambal==========
	  //===================================================
	  $__ssn_omset_2[$__ssn_counter] = 	$_home_tot_n1+
	  									$_home_tot_n2+
	  									$_home_tot_n3+
	  									$_home_tot_n4+
	  									$__ssn_jumlah_tambal_motor[$__ssn_counter]+
	  									$__ssn_jumlah_tambal_mobil[$__ssn_counter];
	  //=========================================================================
	  //=========================================================================
	  if(($__ssn_omset[$__ssn_counter] - $__ssn_omset_2[$__ssn_counter]) < -20000){
	  	$__ssn_omset_detail[$__ssn_counter] = 0;
	  }
	  else{$__ssn_omset_detail[$__ssn_counter] = 1;}
	  $__ssn_omset_detail_2[$__ssn_counter] = $__ssn_omset[$__ssn_counter] - $__ssn_omset_2[$__ssn_counter];
	  //=========================================================================
	  //=========================================================================
	  $__ssn_counter++;
	}

	
?>