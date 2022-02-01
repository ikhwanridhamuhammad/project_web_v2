<?php 
	//============================================
	$__username = "mirovtec_ikhwan";
	$__password = "ikhwan12345hifza"; 
	$__server   = "203.161.184.104";
	//============================================
	$__username_2 = "cvsuxyz_ikhwan";
	$__password_2 = "tdqvcht1pyo1"; 
	$__server_2   = "172.104.32.244";
	//============================================
	
	
	
	
	$__db_absensi = "mirovtec_absen";
	$__db_base_new = "mirovtec_base_new"; 
	$__db_nitro_nama = "mirovtec_absen";
	$__db_teknisi = "mirovtec_nitro_teknisi";
	$__db_nama_data = "data_" . $_global_db_nama;
	$__db_nama_data_end = "data_end_" . $_global_db_nama;
	//============================================
	$__konek_absensi  = mysqli_connect($__server,$__username,$__password,$__db_absensi);  
	$__konek_base_new = mysqli_connect($__server,$__username,$__password,$__db_base_new); 
	$__konek_nitro  = mysqli_connect($__server,$__username,$__password,$__db_nitro_nama); 
	$__konek_nitro_teknisi  = mysqli_connect($__server,$__username,$__password,$__db_teknisi); 
	//============================================


	
	// //============================================
	// $__db_absensi = "mirovtec_absen";
	// $__db_base_new = "cvsuxyz_mirovtec_base_new"; 
	// $__db_nitro_nama = "mirovtec_absen";
	// $__db_teknisi = "mirovtec_nitro_teknisi";
	// $__db_nama_data = "data_" . $_global_db_nama;
	// $__db_nama_data_end = "data_end_" . $_global_db_nama;
	// //============================================
	// $__konek_absensi  = mysqli_connect($__server,$__username,$__password,$__db_absensi); 
	// $__konek_base_new = mysqli_connect($__server_2,$__username_2,$__password_2,$__db_base_new); 
	// $__konek_nitro  = mysqli_connect($__server,$__username,$__password,$__db_nitro_nama);
	// $__konek_nitro_teknisi  = mysqli_connect($__server,$__username,$__password,$__db_teknisi); 
	// //============================================



?>