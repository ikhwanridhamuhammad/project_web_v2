<?php 
    //=================================================
    $_global_db_nama = "contoh";
    $_global_user_id = 2;
    $_global_selisih_menit_online = 20;
    $_global_page_program = 2; // 1 dashboard
    include_once '../admin/database.php';

    for($pol = 1;$pol <20;$pol++){
      // if($pol < 10){$tanggal = "2021-08-0".$pol;}
      // if($pol >=10){$tanggal = "2021-08-". $pol;}
      $tanggal = "2021-8-". $pol;
      $filter ="presence_date='$tanggal' AND MONTH(presence_date) ='8' AND employees_id='18'";
      $query_shift ="SELECT presence.shift_id,shift.time_in,shift.time_out FROM presence,shift WHERE presence.shift_id=shift.shift_id AND presence.employees_id='18' AND $filter";
      $result_shift = $__konek_absensi->query($query_shift);
      $row_shift = $result_shift->fetch_assoc();
      $shift_time_in = $row_shift['time_in'];
      $shift_time_out = $row_shift['time_out'];
      $query_absen ="SELECT *,TIMEDIFF(TIME(time_in),'$shift_time_in') AS selisih,if (time_in>'$shift_time_in','Telat',if(time_in='00:00:00','Tidak Masuk','Tepat Waktu')) AS status, TIMEDIFF(TIME(time_out),'$shift_time_out') AS selisih_out FROM presence WHERE employees_id='18' AND $filter ORDER BY presence_id DESC";
      $result_absen = $__konek_absensi->query($query_absen);
      $row_absen = $result_absen->fetch_assoc();
      // echo $shift_time_in."---".$shift_time_out."---".$row_absen['selisih']."---".$row_absen['status']."---".$row_absen['selisih_out']."<br>";
    }
//===========================================================================================================
//===========================================================================================================
//===========================================================================================================
    $tanggal = "2021-08-23";
    $filter ="presence_date='$tanggal' AND MONTH(presence_date) ='8'";
    // $query_shift ="SELECT presence.building_id,building.name,building.hrg_tambah_motor,building.hrg_tambah_mobil,building.hrg_isi_baru_motor,building.hrg_isi_baru_mobil,building.hrg_tambal_motor,building.hrg_tambal_mobil,employees.employees_name FROM presence,building,employees WHERE presence.building_id=building.building_id AND presence.employees_id = employees.id AND presence.user_id='2'  AND presence_date = '$tanggal'  AND MONTH(presence_date) ='8'";
    // $result_shift = $__konek_absensi->query($query_shift);
//==================================================================================================
//==================================================================================================
//==================================================================================================
//==================================================================================================
//==================================================================================================
    $tanggal = "2021-08-23";
    $ok = 0;
    $filter = "presence_date='$tanggal' AND MONTH(presence_date) ='8'";
    $query_outlet = "SELECT building.code_id,building.building_id,building.name,building.hrg_tambah_motor,building.hrg_tambah_mobil,building.hrg_isi_baru_motor,building.hrg_isi_baru_mobil,building.hrg_tambal_motor,building.hrg_tambal_mobil FROM building WHERE building.user_id = '$_global_user_id' ";
    $result_outlet = $__konek_absensi->query($query_outlet);
    while ($____dash_data = mysqli_fetch_array($result_outlet)){
      $hsl_code_id = $____dash_data['code_id'];
      $hsl_outlet = $____dash_data['building_id'];
      echo "-".$____dash_data['name']."<br>";
      echo "-->".$____dash_data['building_id']."<br>";
      $query_karyawan = "SELECT shift.shift_name,shift.shift_id,presence.shift_id,presence.user_id,presence.building_id,presence.employees_id,employees.employees_name,employees.id,presence.time_in,presence.time_out FROM presence,employees,shift WHERE presence.building_id = '$hsl_outlet' AND shift.shift_id = presence.shift_id AND presence.employees_id = employees.id AND presence.user_id = '2' AND $filter ";
      $result_karyawan = $__konek_absensi->query($query_karyawan);  
      while ($____dash_data_ok = mysqli_fetch_array($result_karyawan)){
        echo "---------->".$____dash_data_ok['employees_name']."----".$____dash_data_ok['time_in']."----".$____dash_data_ok['shift_name']."<br>";
      }
      $query_sn = "SELECT data_today.ban_tambah_motor,data_today.ban_tambah_mobil,data_today.ban_isi_baru_motor,data_today.ban_isi_baru_mobil,data_today.waktu, data_today.device_id FROM data_today WHERE data_today.device_id = '$hsl_code_id' ";
      $result_sn = $__konek_nitro->query($query_sn);  
      while ($____dash_data_sn = mysqli_fetch_array($result_sn)){
        echo "----->".$____dash_data_sn['device_id']."--".$____dash_data_sn['ban_tambah_motor']."--".$____dash_data_sn['ban_tambah_mobil']."--"."<br>";
      }
    }

//===========================================================================================================
//===========================================================================================================
//===========================================================================================================
?>