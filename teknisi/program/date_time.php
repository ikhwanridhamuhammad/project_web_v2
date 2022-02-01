<?php 
  //==================================================================================================================
  //==================================================================================================================
  date_default_timezone_set("Asia/Bangkok");
  date_default_timezone_get();
  $datetime_ori           = date("Y-m-d H:i:s");
  $datetime_ori_tes       = date("Y-m-d H:i:s");
  // $datetime_ori           = date_create("2021-08-08 19:09:00");
  // $datetime_ori_tes       = date_create("2021-11-16 19:09:00");
  // $global_datetime        = date_format($datetime_ori,"Y-m-d H:i:s");
  // $global_date            = date_format($datetime_ori,"Y-m-d");
  // $global_date_format_f   = date_format($datetime_ori_tes,"d F Y");
  $global_datetime        = date("Y-m-d H:i:s");
  $global_date            = date("Y-m-d");
  $global_date_format_f   = date("d F Y");



  $global_total_menit     = abs(date("H"))*60 + abs(date("i"));
	//==================================================================================================================
  //==================================================================================================================
  // $__start_date = date("Y-m-d",strtotime(date("Y-m-d H:i:s")." -200 seconds")).'%20'.date("H:i:s",strtotime(date("Y-m-d H:i:s")." -200 seconds"));
          

?>