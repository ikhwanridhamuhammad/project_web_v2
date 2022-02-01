<?php 
	//===================================================================
	//===================================================================
	$_global_page_program = 2; // 1 dashboard
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
	//===================================================================
	if(empty($_ses_dsn_tanggal)){$_ses_dsn_tanggal = $_dsn_tanggal_default;}
 	$_dsn_value_date			  = date_format(date_create($_ses_dsn_tanggal),"d F Y");
	//===================================================================
	//===================================================================
	//===================================================================
	$_dsn_outlet 					= array(300);
  $_dsn_device_id       = array(300);
	$_dsn_code_id					= "";
	$_dsn_counter_outlet 	= 0;
	$_dsn_query_outlet   	= "SELECT * FROM building ";
	$_dsn_result_outlet  	= $__konek_absensi->query($_dsn_query_outlet); 
	while ($_dsn_data_outlet = mysqli_fetch_array($_dsn_result_outlet)){
    $_dsn_outlet[$_dsn_counter_outlet]  = $_dsn_data_outlet['name'];
    $_dsn_device_id[$_dsn_counter_outlet]  = $_dsn_data_outlet['code_id'];
		$_dsn_counter_outlet++;
	}
	//===================================================================
	if(empty($_ses_dsn_outlet))				{$_ses_dsn_outlet = $_dsn_outlet[0];}
  //===================================================================
  //===================================================================
  //===================================================================
  //===================================================================
  $________dsn_hasl_code = "";
  for( $por = 0; $por < $_dsn_counter_outlet; $por++ ){
    if($_ses_dsn_outlet == $_dsn_outlet[$por]){
      $________dsn_hasl_code = $_dsn_device_id[$por];
    }
  }
  //===================================================================
  //===================================================================
  //===================================================================
  $___dsn_channel   = "";
  $___dsn_api       = "";
  $___dsn_aktif     = "";
  $___dsn_q_data_master = "SELECT * FROM master_id_device WHERE device_id = '$________dsn_hasl_code' ";
  $___dsn_result_data_master = $__konek_base_new->query($___dsn_q_data_master); 
  while ($___dsn_data_master = mysqli_fetch_array($___dsn_result_data_master)){
    $___dsn_channel = $___dsn_data_master['channel'];
    $___dsn_api   = $___dsn_data_master['api'];
    if($___dsn_data_master['aktif'] == 1){$___dsn_aktif = "AKTIF";}
    if($___dsn_data_master['aktif'] == 0){$___dsn_aktif = "NONAKTIF";}
  }
  //===================================================================
  //===================================================================
  //===================================================================
  $___dsn_no_hp     = "-";
  $___dsn_gsm       = "-";
  $___dsn_isi_paket = "-";
  $___dsn_tgl       = "-";
  //===================================================================
  //===================================================================
  //===================================================================
	$_dsn_tgl_start				= "";
	$_dsn_tgl_end					= "";
	$_dsn_counter_shift 	= 1;
	$_dsn_code_id					= "";
	$_dsn_query_shift   	= "SELECT * FROM building WHERE name = '$_ses_dsn_outlet' ";
	$_dsn_result_shift  	= $__konek_absensi->query($_dsn_query_shift); 
	while ($_dsn_data_shift = mysqli_fetch_array($_dsn_result_shift)){
		$_dsn_code_id = "data_".$_dsn_data_shift['code_id'];
		$_dsn_counter_shift++;
	}
	//===================================================================
	$_dsn_tgl_start = $_ses_dsn_tanggal." "."00:01:01";
	$_dsn_tgl_end		= $_ses_dsn_tanggal." "."23:59:00";
  //===================================================================
  //===================================================================
  //===================================================================
  $__start_date = date("Y-m-d").'%20'."00:00:01";
  $__end_date   = date("Y-m-d").'%20'."23:59:59";
  $__home_url_1        = 'https://api.thingspeak.com/channels/';
  $__home_url_2        = '/feeds.json?api_key=';
  $__home_url_3        = '&timezone=Asia%2FBangkok&start=';
  $__home_url_4        = '&end=';
  $___home_url_outlet = $__home_url_1 . $___dsn_channel . $__home_url_2 . $___dsn_api . $__home_url_3 . $__start_date . $__home_url_4 . $__end_date ; 
  $_home_json       = file_get_contents($___home_url_outlet);
  $_home_json_parse = json_decode($_home_json,true);
  $_home_array      = $_home_json_parse['feeds'];
	//===================================================================
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
  foreach ($_home_array as $_home_val){
      $result_n1 =  $_home_val['field1'];
      $result_n2 =  $_home_val['field2'];
      $result_n3 =  $_home_val['field3'];
      $result_n4 =  $_home_val['field4'];
      $result_n5 =  $_home_val['created_at'];
      //=======================================================================
      $_h___date[$_h___counter] = substr($result_n5,11,5);
      $_h___tambah_motor[$_h___counter] = $result_n1;
      $_h___tambah_mobil[$_h___counter] = $result_n2;
      $_h___isi_baru_motor[$_h___counter] = $result_n3;
      $_h___isi_baru_mobil[$_h___counter] = $result_n4;
      //=======================================================================
      //=======================================================================
      $_db_id___grafik_nama       .= "'".substr($result_n5, 11 , 5)."',";
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