

<?php 
	//=================================================
	$_global_page_program = 2; // 1 dashboard
  include_once './program/global_var.php';
  include_once './program/database.php';
  include_once './program/date_time.php';
	$tanggal_update_today = $global_date;
	//==================================================================================================================
  //==================================================================================================================
  //==================================================================================================================
  $___deta_outlet = array(100);
  $___deta_omset = array(100);
  $___deta_counter = 0;
	$query_best = "SELECT * FROM $__db_nama_data ORDER BY total_rupiah DESC";
  $result_best = $__konek_nitro->query($query_best); 
  while ($____dash_data_today = mysqli_fetch_array($result_best)){
    $___device_id         = $____dash_data_today['device_id'];
    $query_outlet_best    = "SELECT * FROM building WHERE building.code_id = '$___device_id' AND building.user_id = '$_global_user_id' ";
    $result_outlet_best   = $__konek_absensi->query($query_outlet_best); 
    $row_outlet_best      = $result_outlet_best->fetch_assoc();
    $___deta_outlet[$___deta_counter] = $row_outlet_best['name'];
    $___deta_omset[$___deta_counter]  = $____dash_data_today['total_rupiah'];
    // echo $___deta_omset[$___deta_counter]."====".$___deta_outlet[$___deta_counter]."<br>";
    $___deta_counter++;
  }
  //==================================================================================================================
  //==================================================================================================================
  // Gelas Akhir --> Omset Pendapatan (Rp)
  // Total Gelas Kecil --> Tambal Motor (Ban)
  // Total Gelas Besar --> Tambal Mobil (Ban)
  // Total Sticker --> Error Motor (Ban)
  // Total Sedotan Kecil --> Error Mobil (Ban)
  // Total Sedotan Besar -->  Promo Motor (Ban)
  // Total Plastik Kecil --> Promo Mobil (Ban)
  // Total PLastik Besar --> KWH PLN Terakhir (Kwh)
  // Keterangan --> Keterangan Lain
  //==================================================================================================================
    $_deta_coounter           = 0;              $_deta_kwh                = array(300);
    $_deta_nama_karyawan      = array(300);     $_deta_nama_outlet        = array(300);
    $_deta_shift              = array(300);     $_deta_shift_in           = array(300);
    $_deta_shift_out          = array(300);     $_deta_picture_in         = array(300);
    $_deta_picture_out        = array(300);     $_deta_present_id         = array(300);
    $_deta_information        = array(300);     $_deta_omset              = array(300);
    $_deta_tambal_motor       = array(300);     $_deta_tambal_mobil       = array(300);
    $_deta_error_motor        = array(300);     $_deta_error_mobil        = array(300);
    $_deta_promo_motor        = array(300);     $_deta_promo_mobil        = array(300);
  //==================================================================================================================
  //==================================================================================================================
  //==================================================================================================================
    $____deta_waktu           = array(100);     $____deta_status          = array(100);
    $____deta_outlet          = array(100);     $____deta_karyawan        = array(100);
    $____deta_shift           = array(100);     $____deta_total_motor     = array(100);
    $____deta_total_mobil     = array(100);     $____deta_omset           = array(100);
    $____deta_counter         = 0;
    $nama1="";$nama2="";$nama3="";$nama4="";$nama5="";
    $shift1="";$shift2="";$shift3="";$shift4="";$shift5="";
		$tanggal = $tanggal_update_today;
    $ok = 0;
    $filter = "presence_date='$tanggal' ";
    $query_outlet = "SELECT * FROM building WHERE building.user_id = '$_global_user_id' ";
    $result_outlet = $__konek_absensi->query($query_outlet);
    while ($____dash_data = mysqli_fetch_array($result_outlet)){
      $hsl_code_id = $____dash_data['code_id'];
      $hsl_outlet = $____dash_data['building_id'];
      $____deta_outlet[$____deta_counter] = $____dash_data['name']; 
      // echo "-".$____dash_data['name']."<br>";
      // echo "-->".$____dash_data['building_id']."<br>";
      $query_karyawan = "SELECT * FROM presence,employees,shift WHERE presence.building_id = '$hsl_outlet' AND shift.shift_id = presence.shift_id AND presence.employees_id = employees.id AND presence.user_id = '$_global_user_id' AND $filter ";
      $result_karyawan = $__konek_absensi->query($query_karyawan);  
      $hit_var = 1;
      $str_var = "";
      $str_shft = "";
      while ($____dash_data_ok = mysqli_fetch_array($result_karyawan)){
        $str_var = $str_var."nama".$hit_var."=";
        $str_var = $str_var.$____dash_data_ok['employees_nickname']." - &";
        $str_shft = $str_shft."shift".$hit_var."=";
        $str_shft = $str_shft.$____dash_data_ok['shift_name']." &";
        $hit_var++;
        if($hit_var > 9){$hit_var = 9;}
        //=========================================================================================================
        //=========================================================================================================
        $_deta_nama_karyawan[$_deta_coounter]         = $____dash_data_ok['employees_name'];
        $_deta_kwh[$_deta_coounter]                   = $____dash_data_ok['total_plastic_big'];
        $_deta_nama_outlet[$_deta_coounter]           = $____dash_data['name'];
        $_deta_shift[$_deta_coounter]                 = $____dash_data_ok['shift_name'];
        $_deta_shift_in[$_deta_coounter]              = $____dash_data_ok['time_in'];
        $_deta_shift_out[$_deta_coounter]             = $____dash_data_ok['time_out'];
        $_deta_picture_in[$_deta_coounter]            = $____dash_data_ok['picture_in'];
        $_deta_picture_out[$_deta_coounter]           = $____dash_data_ok['picture_out'];
        $_deta_present_id[$_deta_coounter]            = $____dash_data_ok['present_id'];
        $_deta_information[$_deta_coounter]           = $____dash_data_ok['information'];
        $_deta_omset[$_deta_coounter]                 = $____dash_data_ok['final_glass'];
        $_deta_tambal_motor[$_deta_coounter]          = $____dash_data_ok['total_small_glass'];
        $_deta_tambal_mobil[$_deta_coounter]          = $____dash_data_ok['total_big_glass'];
        $_deta_error_motor[$_deta_coounter]           = $____dash_data_ok['total_sticker'];
        $_deta_error_mobil[$_deta_coounter]           = $____dash_data_ok['total_straw_small'];
        $_deta_promo_motor[$_deta_coounter]           = $____dash_data_ok['total_straw_big'];
        $_deta_promo_mobil[$_deta_coounter]           = $____dash_data_ok['total_plastic_small'];
        $_deta_coounter++;
        //=========================================================================================================
        //=========================================================================================================
        // echo "---------->".$____dash_data_ok['employees_name']."----".$____dash_data_ok['time_in']."----".$____dash_data_ok['shift_name']."<br>";
      }
      $str_var = substr($str_var, 0 , -1);
      $str_shft = substr($str_shft, 0 , -1);
      $____deta_karyawan[$____deta_counter] = $str_var;
      $____deta_shift[$____deta_counter] = $str_shft;
      //====================================CARA PARSING STRING===================================
      // parse_str("name1=Peter&name2=Hifza&name3=Okiek&");
      // echo $name1."<br>";
      // echo $name2."<br>";
      //==========================================================================================
      // echo $str_var."<br>";
      // echo $str_shft."<br>";
      $__db_nama_data_2 = $__db_nama_data.".device_id";
      $query_sn = "SELECT * FROM $__db_nama_data WHERE $__db_nama_data_2 = '$hsl_code_id' ";
      $result_sn = $__konek_nitro->query($query_sn);  
      $row_sn      = $result_sn->fetch_assoc();
      $____deta_total_motor[$____deta_counter] = $row_sn['ban_tambah_motor']+$row_sn['ban_isi_baru_motor'];
      $____deta_total_mobil[$____deta_counter] = $row_sn['ban_tambah_mobil']+$row_sn['ban_isi_baru_mobil'];
      $____deta_omset[$____deta_counter] =  $row_sn['ban_tambah_motor'] * $____dash_data['hrg_tambah_motor'] + 
                                            $row_sn['ban_tambah_mobil'] * $____dash_data['hrg_tambah_mobil'] +
                                            $row_sn['ban_isi_baru_motor'] * $____dash_data['hrg_isi_baru_motor'] +
                                            $row_sn['ban_isi_baru_mobil'] * $____dash_data['hrg_isi_baru_mobil'];
      $____deta_waktu[$____deta_counter] = abs(substr($row_sn['waktu'],0,2))*60 + abs(substr($row_sn['waktu'],3,5));
      if(abs($____deta_waktu[$____deta_counter] - $global_total_menit) < $_global_selisih_menit_online){$____deta_status[$____deta_counter] = 1;}
      else{$____deta_status[$____deta_counter] = 0;}  
      $____deta_waktu[$____deta_counter] = abs($____deta_waktu[$____deta_counter] - $global_total_menit);
      // echo $____deta_omset[$____deta_counter]."============";
      // while ($____dash_data_sn = mysqli_fetch_array($result_sn)){
      //   // echo "----->".$____dash_data_sn['device_id']."--".$____dash_data_sn['ban_tambah_motor']."--".$____dash_data_sn['ban_tambah_mobil']."--"."<br>";
      // }
      // echo "----->".$row_sn['device_id']."--".$row_sn['ban_tambah_motor']."--".$row_sn['ban_tambah_mobil']."--"."<br>";
      $____deta_counter++;
    }
?>