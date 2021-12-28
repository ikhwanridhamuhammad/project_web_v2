<?php 
	//============================================
	$__username = "mirovtec_ikhwan";
	$__password = "ikhwan12345hifza"; 
	$__server   = "203.161.184.104";
	//============================================
	$__db_absensi = "mirovtec_absen";
	$__db_base_new = "mirovtec_base_new"; 
	$__db_nitro_nama = "mirovtec_nitro_" . $_global_db_nama;
	//============================================
	$__konek_absensi  = mysqli_connect($__server,$__username,$__password,$__db_absensi); 
	$__konek_base_new = mysqli_connect($__server,$__username,$__password,$__db_base_new); 
	$__konek_nitro  = mysqli_connect($__server,$__username,$__password,$__db_nitro_nama); 
	//============================================
?>