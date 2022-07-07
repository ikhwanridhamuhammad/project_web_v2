// <?php
//   ini_set('max_execution_time', 0);
//   date_default_timezone_set("Asia/Bangkok");
//   date_default_timezone_get();
//   $_user_id = 10;
//   $_user_nama = "semua";
//   $____table_nama = "data_".$_user_nama;
  
  
  
//   $_______nama_db = "cvsuxyz_mirovtec_base_new";
//   $_______nama_server = "localhost";
//   $_______nama_username = "cvsuxyz_ikhwan";
//   $_______nama_password = "tdqvcht1pyo1";
//   $koneksi = mysqli_connect($_______nama_server,$_______nama_username,$_______nama_password,$_______nama_db);
  
//   $_____nama_db = "mirovtec_absen";
//   $_____nama_server = "203.161.184.104";
//   $_____nama_username = "mirovtec_ikhwan";
//   $_____nama_password = "ikhwan12345hifza";
//   $koneksi_utama = mysqli_connect($_____nama_server,$_____nama_username,$_____nama_password,$_____nama_db);   

// ?>
// <?php
//   	date_default_timezone_set("Asia/Bangkok");
//     date_default_timezone_get();
//     $date_tanggal 	= date('Y-m-d');
//     $date_start_jam = "00:00:01";
//     $date_end_jam   = date('H:i:s');
//     $date_start = $date_tanggal." ".$date_start_jam;
//     $date_end   = $date_tanggal." ".$date_end_jam;
//     $_menit_all = abs(date('H'))*60 + abs(date('i'));
//     //=======================================================================================================
//     $_a___for_waktu             = "";
//     $_hasil_for_waktu           = "";
//     $_db_nama                   = array(400);
//     $_db_nama_outlet            = array(400);
//     $_db_user_id                = array(400);
//     $_db_device_id              = array(400);
//     $_db_id_outlet              = array(400);
//     $_db_harga_motor_tambah     = array(400);
//     $_db_harga_motor_isi_baru   = array(400);
//     $_db_harga_mobil_tambah     = array(400);
//     $_db_harga_mobil_isi_baru   = array(400);
// 	$_db_konter = 0;
// 	$_db_master  = mysqli_query($koneksi_utama,"select * from building ");
// 	while ($_data_outlet = mysqli_fetch_array($_db_master)){
// 		$_db_nama[$_db_konter] = "data_".$_data_outlet['code_id'];
//         $_db_nama_outlet[$_db_konter] = $_data_outlet['name'];
//         $_db_user_id[$_db_konter]     = $_data_outlet['user_id'];
//         // echo $_data_outlet['name'];
//         $_db_device_id[$_db_konter] = $_data_outlet['code_id'];
//         $_db_id_outlet[$_db_konter] = $_data_outlet['building_id'];
//         $_db_harga_motor_tambah[$_db_konter] = $_data_outlet['hrg_tambah_motor'];
//         $_db_harga_motor_isi_baru[$_db_konter] = $_data_outlet['hrg_isi_baru_motor'];
//         $_db_harga_mobil_tambah[$_db_konter] = $_data_outlet['hrg_tambah_mobil'];
//         $_db_harga_mobil_isi_baru[$_db_konter] = $_data_outlet['hrg_isi_baru_mobil'];
// 		$_db_konter++;
// 	}
//     //=================================================================================
//     // $truncate = $koneksi_utama->query("truncate table $____table_nama");
//     //=================================================================================
//     for($coun=0; $coun<$_db_konter; $coun++){
//         //=====================================================================
//           $_home_n1_b = 0;$_home_n1_a = 0;$_home_n1_n = 0;$_home_n1_awal = 0;$_home_tot_n1 = 0;
//           $_home_n2_b = 0;$_home_n2_a = 0;$_home_n2_n = 0;$_home_n2_awal = 0;$_home_tot_n2 = 0;
//           $_home_n3_b = 0;$_home_n3_a = 0;$_home_n3_n = 0;$_home_n3_awal = 0;$_home_tot_n3 = 0;
//           $_home_n4_b = 0;$_home_n4_a = 0;$_home_n4_n = 0;$_home_n4_awal = 0;$_home_tot_n4 = 0;
//           $_home_lock = 0;$_total_rupiah = 0;
//           $_home_date = "2020-01-01 00:00:01";
//           //=====================================================================
//         $___nama_db = strtolower($_db_nama[$coun]);
//         // echo $___nama_db;
//     	$break_hasil = mysqli_query($koneksi,"Select * From $___nama_db Where date Between '$date_start' and '$date_end' order by date");
//     	while ($data = mysqli_fetch_array($break_hasil)){
//             $result_n1 = $data['tambah_motor'];$result_n2 = $data['tambah_mobil'];
//             $result_n3 = $data['isi_baru_motor'];$result_n4 = $data['isi_baru_mobil'];
//             // echo $result_n1."  ";
//             //====================================================================
//             $_home_n1_n = $result_n1;$_home_n2_n = $result_n2;
//             $_home_n3_n = $result_n3;$_home_n4_n = $result_n4;
//             if($_home_n1_n >= $_home_n1_b){$_home_n1_b = $_home_n1_n;}
//             if($_home_n1_n <  $_home_n1_b){$_home_tot_n1 = $_home_tot_n1 + $_home_n1_b;$_home_n1_b = $_home_n1_n;}
//             if($_home_n2_n >= $_home_n2_b){$_home_n2_b = $_home_n2_n;}
//             if($_home_n2_n <  $_home_n2_b){$_home_tot_n2 = $_home_tot_n2 + $_home_n2_b;$_home_n2_b = $_home_n2_n;}
//             if($_home_n3_n >= $_home_n3_b){$_home_n3_b = $_home_n3_n;}
//             if($_home_n3_n <  $_home_n3_b){$_home_tot_n3 = $_home_tot_n3 + $_home_n3_b;$_home_n3_b = $_home_n3_n;}
//             if($_home_n4_n >= $_home_n4_b){$_home_n4_b = $_home_n4_n;}
//             if($_home_n4_n <  $_home_n4_b){$_home_tot_n4 = $_home_tot_n4 + $_home_n4_b;$_home_n4_b = $_home_n4_n;}
//             //====================================================================
//             $_home_date = $data['date'];
//         }
//         $_home_date = substr($_home_date,11,8);
//         $_home_tot_n1 = ($_home_tot_n1 + $_home_n1_b) - $_home_n1_awal;
//         $_home_tot_n2 = ($_home_tot_n2 + $_home_n2_b) - $_home_n2_awal;
//         $_home_tot_n3 = ($_home_tot_n3 + $_home_n3_b) - $_home_n3_awal;
//         $_home_tot_n4 = ($_home_tot_n4 + $_home_n4_b) - $_home_n4_awal;
//         //======================================================================
//         //======================================================================
//         $_a___for_waktu = abs(substr($_home_date,0,2))*60 + abs(substr($_home_date,3,5));
//         if(abs($_a___for_waktu - $_menit_all) < 20){$_hasil_for_waktu = 1;}
    
//         else{$_hasil_for_waktu = 0;} 
//         //======================================================================
//         //======================================================================
//         $_total_rupiah = ($_home_tot_n1 * $_db_harga_motor_tambah[$coun]) +
//                          ($_home_tot_n2 * $_db_harga_mobil_tambah[$coun]) +
//                          ($_home_tot_n3 * $_db_harga_motor_isi_baru[$coun]) +
//                          ($_home_tot_n4 * $_db_harga_mobil_isi_baru[$coun]);
//         // echo $_total_rupiah;

//         //   $saved = $koneksi_utama->query("insert into $____table_nama (
//         //                 device_id,
//         //                 name,
//         //                 user_id,
//         //                 ban_tambah_motor,
//         //                 ban_tambah_mobil,
//         //                 ban_isi_baru_motor,
//         //                 ban_isi_baru_mobil,
//         //                 total_rupiah,
//         //                 waktu) 
//         //               values( 
//         //                 '$_db_device_id[$coun]',
//         //                 '$_db_nama_outlet[$coun]',
//         //                 '$_db_user_id[$coun]',
//         //                 '$_home_tot_n1', 
//         //                 '$_home_tot_n2', 
//         //                 '$_home_tot_n3',
//         //                 '$_home_tot_n4',
//         //                 '$_total_rupiah', 
//         //                 '$_home_date')");
                        
//         $saved = $koneksi_utama->query("update $____table_nama set
                            
//                             name                ='$_db_nama_outlet[$coun]',
//                             user_id             ='$_db_user_id[$coun]',
//                             ban_tambah_motor    ='$_home_tot_n1',
//                             ban_tambah_mobil    ='$_home_tot_n2',
//                             ban_isi_baru_motor  ='$_home_tot_n3',
//                             ban_isi_baru_mobil  ='$_home_tot_n4',
//                             total_rupiah        ='$_total_rupiah',
//                             waktu               ='$_home_date'
//                             where device_id     ='$_db_device_id[$coun]'  ");
                                
                                
//         //   echo "ok sip ".$_total_rupiah."___".$_db_device_id[$coun]."<br>";

//     }

    
// ?>

// <?php
//     $date_tanggal_p 	= date('Y-m-d');
//     $date_end_jam_p   = date('H:i:s');
//     $date_now_p   = $date_tanggal_p." ".$date_end_jam_p;
//     $date_str_p   = strtotime($date_now_p);
//     $no_p = 0;
//     $jadi = $koneksi_utama->query("update base_2 set 
//                                 $_user_nama             ='$date_now_p' 
//                                 where no                ='$no_p' ");
// ?>



