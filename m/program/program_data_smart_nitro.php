<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 6; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	$tanggal_limit_max = $global_date_format_f;
	//===================================================================
	//===================================================================
	//===================================================================
	$_dsn_tanggal_ori				= date_create($tanggal_update_today);
	$_dsn_tanggal_default 	= date_format($_dsn_tanggal_ori,"Y-m-d");
	$_ses_dsn_tanggal 			= $_SESSION["_dsn_tgl"];
	$_ses_dsn_outlet 				= $_SESSION["_dsn_outlet"];
	$_ses_dsn_shift		 			= $_SESSION["_dsn_shift"];
	//===================================================================
	if(empty($_ses_dsn_tanggal)){$_ses_dsn_tanggal = $_dsn_tanggal_default;}
 	$_dsn_value_date			  = date_format(date_create($_ses_dsn_tanggal),"d F Y");
	//===================================================================
	//===================================================================
	//===================================================================
	$_dsn_outlet 					= array(100);
	$_dsn_counter_outlet 	= 0;
	$_dsn_query_outlet   	= "SELECT building.user_id,building.name FROM building WHERE building.user_id = '$_global_user_id' ";
	$_dsn_result_outlet  	= $__konek_absensi->query($_dsn_query_outlet); 
	while ($_dsn_data_outlet = mysqli_fetch_array($_dsn_result_outlet)){
		$_dsn_outlet[$_dsn_counter_outlet]	= $_dsn_data_outlet['name'];
		$_dsn_counter_outlet++;
	}
	//===================================================================
	if(empty($_ses_dsn_outlet))				{$_ses_dsn_outlet = $_dsn_outlet[0];}
	if(empty($_ses_dsn_shift))				{$_ses_dsn_shift = "ALL";}
	//===================================================================
	//===================================================================
	//===================================================================
	$_dsn_shift 					= array(10);
	$_dsn_shift_time_in		= array(10);
	$_dsn_shift_time_out 	= array(10);
	$_dsn_tgl_start				= "";
	$_dsn_tgl_end					= "";
	$_dsn_pilihan_shift		= 0;
	$_dsn_counter_shift 	= 1;
	$_dsn_code_id					= "";
	$_dsn_shift[0]				= "ALL";
	$_dsn_shift_time_in[0]= "05:00:00";
	$_dsn_shift_time_out[0]= "23:00:00";
	$_dsn_query_shift   	= "SELECT * FROM building,shift WHERE building.name = '$_ses_dsn_outlet' AND building.building_id = shift.building_id ";
	$_dsn_result_shift  	= $__konek_absensi->query($_dsn_query_shift); 
	while ($_dsn_data_shift = mysqli_fetch_array($_dsn_result_shift)){
		if($_dsn_data_shift['shift_name'] == $_ses_dsn_shift && $_ses_dsn_shift != "ALL"){
			$_dsn_pilihan_shift = $_dsn_counter_shift;}
		$_dsn_shift[$_dsn_counter_shift]					= $_dsn_data_shift['shift_name'];
		$_dsn_shift_time_in[$_dsn_counter_shift]	= $_dsn_data_shift['time_in'];
		$_dsn_shift_time_out[$_dsn_counter_shift]	= $_dsn_data_shift['time_out'];
		$_dsn_code_id = "data_".$_dsn_data_shift['code_id'];
		$_dsn_counter_shift++;
	}
	//===================================================================
	if($_ses_dsn_shift == "ALL"){
		$_dsn_tgl_start = $_ses_dsn_tanggal." "."00:01:01";
		$_dsn_tgl_end		= $_ses_dsn_tanggal." "."23:59:00";
	}
	if($_ses_dsn_shift != "ALL"){
		$_dsn_tanggal_jam_jadi = $_ses_dsn_tanggal." " .$_dsn_shift_time_in[$_dsn_pilihan_shift];
	  $_dsn_tgl_start	= date("Y-m-d H:i:s",strtotime(date($_dsn_tanggal_jam_jadi)." 0 minutes"));
		$_dsn_tgl_end		= $_ses_dsn_tanggal." " .$_dsn_shift_time_out[$_dsn_pilihan_shift];
	}
	//===================================================================
	//===================================================================
	//===================================================================
	$__dsn_query_data_sn   	= "SELECT * FROM $_dsn_code_id WHERE date BETWEEN '$_dsn_tgl_start' AND '$_dsn_tgl_end' ORDER BY date";
	$__dsn_result_data_sn  	= $__konek_base_new->query($__dsn_query_data_sn); 
  //===============================================================================
  //===============================================================================
  $_db_id___grafik_data_abc_1 = "";
  $_db_id___grafik_data_abc_2 = "";
  $_db_id___grafik_data_abc_3 = "";
  $_db_id___grafik_data_abc_4 = "";
  $_db_id___grafik_nama = "";
  //===============================================================================
  //===============================================================================
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
  //===============================================================================
  //===============================================================================
  while ($data = mysqli_fetch_array($__dsn_result_data_sn)){
      $result_n1 = $data['tambah_motor'];$result_n2 = $data['tambah_mobil'];
      $result_n3 = $data['isi_baru_motor'];$result_n4 = $data['isi_baru_mobil'];
      $result_n5 = $data['date'];
      //=======================================================================
      $_h___date[$_h___counter] = substr($result_n5,11,5);
      $_h___tambah_motor[$_h___counter] = $result_n1;
      $_h___tambah_mobil[$_h___counter] = $result_n2;
      $_h___isi_baru_motor[$_h___counter] = $result_n3;
      $_h___isi_baru_mobil[$_h___counter] = $result_n4;
      //=======================================================================
      //=======================================================================
      $_db_id___grafik_nama       .= "'".substr($result_n5, 11 , -3)."',";
      $_db_id___grafik_data_abc_1 .= $result_n1.",";
      $_db_id___grafik_data_abc_2 .= $result_n2.",";
      $_db_id___grafik_data_abc_3 .= $result_n3.",";
      $_db_id___grafik_data_abc_4 .= $result_n4.",";
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
      $_h___counter++;
  }
  $_home_tot_n1 = ($_home_tot_n1 + $_home_n1_b) - $_home_n1_awal;
  $_home_tot_n2 = ($_home_tot_n2 + $_home_n2_b) - $_home_n2_awal;
  $_home_tot_n3 = ($_home_tot_n3 + $_home_n3_b) - $_home_n3_awal;
  $_home_tot_n4 = ($_home_tot_n4 + $_home_n4_b) - $_home_n4_awal;
  $_db_id___grafik_data_abc_1 = substr($_db_id___grafik_data_abc_1, 0 , -1);
  $_db_id___grafik_data_abc_2 = substr($_db_id___grafik_data_abc_2, 0 , -1);
  $_db_id___grafik_data_abc_3 = substr($_db_id___grafik_data_abc_3, 0 , -1);
  $_db_id___grafik_data_abc_4 = substr($_db_id___grafik_data_abc_4, 0 , -1);
  $_db_id___grafik_nama       = substr($_db_id___grafik_nama, 0 , -1);
?>