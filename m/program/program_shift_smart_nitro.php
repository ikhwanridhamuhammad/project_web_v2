<?php 
	//=================================================
	$_global_page_program = 11; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//================================================================================
	//================================================================================
	//================================================================================
	$_shift_sn_outlet 					= array(40);
	$_shift_sn_counter_outlet 	= 1;
	$_shift_sn_outlet[0]				= "ALL";
	$_shift_sn_query_outlet   	= "SELECT building.user_id,building.name FROM building WHERE building.user_id = '$_global_user_id' ";
	$_shift_sn_result_outlet  	= $__konek_absensi->query($_shift_sn_query_outlet); 
	while ($_shift_sn_data_outlet = mysqli_fetch_array($_shift_sn_result_outlet)){
		$_shift_sn_outlet[$_shift_sn_counter_outlet]	= $_shift_sn_data_outlet['name'];
		$_shift_sn_counter_outlet++;
	}
	//================================================================================
	//================================================================================
	//================================================================================
	$_shift_sn_tanggal_end 				= $tanggal_update_today;
	$_ses_shift_sn_tanggal		    = $_SESSION["_shift_sn_tgl"];
	$_ses_shift_sn_outlet 				= $_SESSION["_shift_sn_outlet"];

	if(empty($_ses_shift_sn_tanggal))				{$_ses_shift_sn_tanggal = $_shift_sn_tanggal_end;}
	if(empty($_ses_shift_sn_outlet))				{$_ses_shift_sn_outlet = "ALL";}
	//================================================================================
	$___bulan = array("kosong","Januari", "Februari", "Maret" , "April", "Mei", "Juni" , "Juli", "Agustus", "September" , "Oktober", "November", "Desember");
	$___hari = array("kosong","Senin", "Selasa", "Rabu" , "Kamis", "Jumat", "Sabtu" , "Minggu");
 	$__shift_sn_value_date = date_format(date_create($_ses_shift_sn_tanggal),"d F Y");
 	$__shift_sn_value_date_bulan = date_format(date_create($_ses_shift_sn_tanggal),"n");
 	$__shift_sn_value_date_hari = date_format(date_create($_ses_shift_sn_tanggal),"N");
 	$__shift_sn_value_date_tanggal = date_format(date_create($_ses_shift_sn_tanggal),"j");
 	$__shift_sn_value_date_tahun = date_format(date_create($_ses_shift_sn_tanggal),"Y");
 	$__shift_sn_value_date_4 = $___hari[$__shift_sn_value_date_hari].", ".$__shift_sn_value_date_tanggal." ".$___bulan[$__shift_sn_value_date_bulan]." ".$__shift_sn_value_date_tahun;

 	$__shift_sn_tanggal_2	 = date_format(date_create($_ses_shift_sn_tanggal),"Y-m-d");
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
	$__ssn_hrg_tambah_motor 	= array(1000);
	$__ssn_hrg_tambah_mobil 	= array(1000); 
	$__ssn_hrg_isi_baru_motor = array(1000);
	$__ssn_hrg_isi_baru_mobil = array(1000);
	$__ssn_hrg_tambal_motor 	= array(1000);
	$__ssn_hrg_tambal_mobil 	= array(1000);
	//===================================================================
	//=================================================================== 
	$__ssn_counter 						= 0;
	$__ssn_tanggal_jam_jadi 	= "";
	//===================================================================
	//=================================================================== 
	$__ssn_shift	 					= array(1000);
	$__ssn_outlet 					= array(1000);
	$__ssn_time_in_shift		= array(1000);
	$__ssn_time_out_shift		= array(1000);
	$__ssn_time_in_shift_2	= array(1000);
	$__ssn_time_out_shift_2= array(1000);
	$__ssn_code_id					= array(1000);
	$__ssn_omset	 					= array(1000);
	//===================================================
	if($_ses_shift_sn_outlet == ALL){
		$__shsn_query = " SELECT * FROM building,shift WHERE building.building_id = shift.building_id AND building.user_id = '$_global_user_id' ";
	}
	if($_ses_shift_sn_outlet != ALL){
		$__shsn_query = " SELECT * FROM building,shift WHERE building.building_id = shift.building_id AND building.user_id = '$_global_user_id' AND building.name = '$_ses_shift_sn_outlet' ";
	}
	$__shsn_result = $__konek_absensi->query($__shsn_query); 
	while ($__shsn_data = mysqli_fetch_array($__shsn_result)){
	  //=========================================================================
	  //=========================================================================
	  $__ssn_hrg_tambah_motor[$__ssn_counter] 			= $__shsn_data['hrg_tambah_motor'];
	  $__ssn_hrg_tambah_mobil[$__ssn_counter] 			= $__shsn_data['hrg_tambah_mobil'];
	  $__ssn_hrg_isi_baru_motor[$__ssn_counter] 		= $__shsn_data['hrg_isi_baru_motor'];
	  $__ssn_hrg_isi_baru_mobil[$__ssn_counter] 		= $__shsn_data['hrg_isi_baru_mobil'];
	  $__ssn_hrg_tambal_motor[$__ssn_counter] 			= $__shsn_data['hrg_tambal_motor'];
	  $__ssn_hrg_tambal_mobil[$__ssn_counter] 			= $__shsn_data['hrg_tambal_mobil'];
	  //=========================================================================
	  //=========================================================================
	  $__ssn_shift[$__ssn_counter] 									= $__shsn_data['shift_name'];
	  $__ssn_outlet[$__ssn_counter] 	  						= $__shsn_data['name'];
	  $__ssn_time_in_shift[$__ssn_counter] 					= $__shsn_data['time_in'];
	  $__ssn_time_out_shift[$__ssn_counter] 				= $__shsn_data['time_out'];
	  $__ssn_time_in_shift_2[$__ssn_counter] 				= substr($__shsn_data['time_in'],0,5);
	  $__ssn_time_out_shift_2[$__ssn_counter] 			= substr($__shsn_data['time_out'],0,5);
	  $__ssn_code_id[$__ssn_counter] 	  						= "data_".$__shsn_data['code_id'];
	  //=========================================================================
	  //=========================================================================
	  $__ssn_tanggal_jam_jadi = $__shift_sn_tanggal_2." " .$__ssn_time_in_shift[$__ssn_counter];
	  $__ssn_time_in_shift[$__ssn_counter] = date("Y-m-d H:i:s",strtotime(date($__ssn_tanggal_jam_jadi)." +5 minutes"));
    $__ssn_time_out_shift[$__ssn_counter] = $__shift_sn_tanggal_2." ".$__ssn_time_out_shift[$__ssn_counter];
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
	  $_home_tot_n1 = ($_home_tot_n1 + $_home_n1_b) - $_home_n1_awal;
	  $_home_tot_n2 = ($_home_tot_n2 + $_home_n2_b) - $_home_n2_awal;
	  $_home_tot_n3 = ($_home_tot_n3 + $_home_n3_b) - $_home_n3_awal;
	  $_home_tot_n4 = ($_home_tot_n4 + $_home_n4_b) - $_home_n4_awal;
	  $_home_tot_n1 = $_home_tot_n1 * $__ssn_hrg_tambah_motor[$__ssn_counter];
	  $_home_tot_n2 = $_home_tot_n2 * $__ssn_hrg_tambah_mobil[$__ssn_counter];
	  $_home_tot_n3 = $_home_tot_n3 * $__ssn_hrg_isi_baru_motor[$__ssn_counter];
	  $_home_tot_n4 = $_home_tot_n4 * $__ssn_hrg_isi_baru_mobil[$__ssn_counter];
	  //=========================================================================
	  //=========================================================================
	  $__ssn_omset[$__ssn_counter] = 	$_home_tot_n1+
	  									$_home_tot_n2+
	  									$_home_tot_n3+
	  									$_home_tot_n4;
	  //=========================================================================
	  //=========================================================================
	  $__ssn_counter++;

	}


?>