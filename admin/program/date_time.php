<?php 
  //==================================================================================================================
  //==================================================================================================================
  $datetime_ori           = date_create("2021-08-08 19:09:00");
  $global_datetime        = date_format($datetime_ori,"Y-m-d H:i:s");
  $global_date            = date_format($datetime_ori,"Y-m-d");
  $global_total_menit     = abs(date_format($datetime_ori,"H"))*60 + abs(date_format($datetime_ori,"i"));
	//==================================================================================================================
  $datetime_ori_tes       = date_create("2021-11-16 19:09:00");
  $global_date_format_f   = date_format($datetime_ori_tes,"d F Y");
  //==================================================================================================================
  // $__start_date = date("Y-m-d",strtotime(date("Y-m-d H:i:s")." -200 seconds")).'%20'.date("H:i:s",strtotime(date("Y-m-d H:i:s")." -200 seconds"));
          

?>