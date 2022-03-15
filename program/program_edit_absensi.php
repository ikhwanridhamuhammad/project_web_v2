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
	// $__ea_no_id = "1";$_SESSION["_ra_edit_absensi"]
  $__ea_no_id = $_SESSION["_ra_edit_absensi"];
  $__ea_no_id_menu = $_SESSION["_ra_edit_absensi_menu"];

  // if (empty($_GET)) {
  //   $__ea_no_id = "1";
  // }
  // else{$__ea_no_id = $_GET['id'];}
  $__ea_query_id = "SELECT * FROM presence,employees,building WHERE presence.presence_id = '$__ea_no_id' AND presence.employees_id = employees.id AND presence.building_id = building.building_id ";
  $__ea_result_id  	= $__konek_absensi->query($__ea_query_id); 
  $__ea_row_id      = $__ea_result_id->fetch_assoc();
  $__ea_nama				= $__ea_row_id['employees_name'];
  $__ea_outlet			= $__ea_row_id['name'];
  $__ea_tanggal 		= date_format(date_create($__ea_row_id['presence_date']),"d F Y");
  $__ea_kwh					= $__ea_row_id['total_plastic_big'];
  $__ea_picture_in	= "../karyawan/absent/".$__ea_row_id['picture_in'];
  $__ea_picture_out = "../karyawan/absent/".$__ea_row_id['picture_out'];
  $__ea_information	= $__ea_row_id['information'];
  $__ea_omset 			= $__ea_row_id['final_glass'];
  $__ea_tambal_motor= $__ea_row_id['total_small_glass'];
  $__ea_tambal_mobil= $__ea_row_id['total_big_glass'];
  $__ea_error_motor = $__ea_row_id['total_sticker'];
  $__ea_error_mobil = $__ea_row_id['total_straw_small'];
  $__ea_promo_motor = $__ea_row_id['total_straw_big'];
  $__ea_promo_mobil = $__ea_row_id['total_plastic_small'];
  $__ea_shift_id    = $__ea_row_id['shift_id'];
  $__ea_building_id = $__ea_row_id['building_id'];
  $__ea_check_in 		= $__ea_row_id['time_in'];
  $__ea_check_out		= $__ea_row_id['time_out'];
	//================================================================================
	//================================================================================
	//================================================================================
  $__ea_shift_group = array(6);
  $__ea_shift_id_group = array(6);
  $__ea_counter_shift = 0;
  $__ea_query_shift = "SELECT * FROM shift WHERE building_id = '$__ea_building_id' ";
  $__ea_result_shift = $__konek_absensi->query($__ea_query_shift); 
  while ($__ea_data_shift = mysqli_fetch_array($__ea_result_shift)){
    $__ea_shift_id_group[$__ea_counter_shift]    = $__ea_data_shift['shift_id']; 
    $__ea_shift_group[$__ea_counter_shift]    = $__ea_data_shift['shift_name'];    
    $__ea_counter_shift++;
  }
	//================================================================================
	//================================================================================
	//================================================================================

?>