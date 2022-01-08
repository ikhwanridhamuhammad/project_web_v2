<?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
?>

<?php
  $_______nama_db_base = "mirovtec_base_new";
//     $session_nama_client = $_SESSION['nama_client'];
//   $_______nama_db = "u8828523_nitro_bella";
  $_______nama_db = $_SESSION['nama_db'];
  $_______nama_server = "localhost";
  $_______nama_username = "mirovtec_ikhwan";
  $_______nama_password = "ikhwan12345hifza";
  $koneksi = mysqli_connect($_______nama_server,$_______nama_username,$_______nama_password,$_______nama_db);
  $koneksi_b = mysqli_connect($_______nama_server,$_______nama_username,$_______nama_password,$_______nama_db_base);
  $_tanggal_now = date('Y-m-d');    
  date_default_timezone_set("Asia/Bangkok");
  date_default_timezone_get();
  $_menit_all = abs(date('H'))*60 + abs(date('i'));
?>
<?php
  $___nama_db_1 = "data_today";
  $___nama_db_2 = "master_outlet";
  $___nama_db_3 = "kalkulasi_outlet";
?>
<?php
  $_jok_bulan_tahun     = array(30);
  $_sot_bulan_tahun     = array(30);
  $_jok_coun            = 6;
  for($_p_koun = 0;$_p_koun<$_jok_coun;$_p_koun++){
    $_7_date = date_create(date('Y-m-d'));
    date_sub($_7_date,date_interval_create_from_date_string($_p_koun." months"));
    $_jok_bulan_tahun[$_p_koun] = date_format($_7_date,"F Y");
    $_sot_bulan_tahun[$_p_koun] = date_format($_7_date,"Y-m");
  }
?>
<?php
  if (empty($_GET)) {
    $_ans_id = "1";
    $_ans_day = "today";
  }
  else{$_ans_id = $_GET['id'];$_ans_day = $_GET['day'];}
  $_ans_mode_edit = 0;
  $_ans_mode = 0;
  if($_ans_day == "today"){
    $_date_aktif = date('Y-m');
    $_date_aktif_str = date('F Y');
    $_ans_mode = 0;
    $_ans_mode_edit = 0;
  }
  if($_ans_day == "edit"){
    $_date_aktif = $_GET['date'];
    $_date_aktif_1 = date_create(date($_date_aktif));
    $_date_aktif_str = date_format($_date_aktif_1,"F Y");
    $_ans_mode = 1;
    $_ans_mode_edit = 0;
  }
  if($_ans_day == "action"){
    $_date_aktif = $_GET['date'];
    $_date_aktif_1 = date_create(date($_date_aktif));
    $_date_aktif_str = date_format($_date_aktif_1,"F Y");
    $_no_aktif = $_GET['no'];
    $_ans_mode = 2;
    $_ans_mode_edit = 1;
  }
  if($_ans_day == "delete"){
    $_date_aktif = $_GET['date'];
    $_date_aktif_1 = date_create(date($_date_aktif));
    $_date_aktif_str = date_format($_date_aktif_1,"F Y");
    $_no_aktif = $_GET['no'];
    $_ans_mode = 3;
    $_ans_mode_edit = 0;
    $delete_1 = $koneksi->query("delete from $___nama_db_3 where no='$_no_aktif' ");   ?>
      <script>
        window.location.href="<?php echo "?id=".$_ans_id."&day=edit"."&date=".$_date_aktif;?>";  
      </script>

    <?php
  }

  $_tanggal_now = $_date_aktif;
  $_date_semu_start = date_create(date($_date_aktif."-01"));
  $_date_aktif_java_start = date_format($_date_semu_start,"d F Y");
  $_date_semu_end_limit = date_format($_date_semu_start,"t");
  $_date_semu_end = date_create(date($_date_aktif."-".$_date_semu_end_limit));
  $_date_aktif_java_end = date_format($_date_semu_end,"d F Y");
  $_date_aktif_java_default = date('d')." ".date_format($_date_semu_end,"F Y");
//=================================================================================
//=================================================================================
//=================================================================================
?>
<?php
  $_a___no                  = array(100);
  $_a___id_outlet           = array(100);
  $_a___nama_outlet         = array(100);
  $_a___device_id           = array(100);
  $_a___harga_motor_tambah  = array(100);
  $_a___harga_mobil_tambah  = array(100);
  $_a___harga_motor_isi_baru= array(100);
  $_a___harga_mobil_isi_baru= array(100);
  $_a___harga_tambal_motor  = array(100);
  $_a___harga_tambal_mobil  = array(100);
  $_a___for_waktu           = "";
  $_a___counter             = 0;
//=================================================================================
//=================================================================================
//=================================================================================
  $_a___counter=1;
  $_a___db_data_today  = mysqli_query($koneksi,"select * from $___nama_db_2 order by no");
  while ($_a___data = mysqli_fetch_array($_a___db_data_today)){
    $_a___no[$_a___counter] = $_a___data['no'];
    $_a___id_outlet[$_a___counter] = $_a___data['id_outlet'];
    $_a___nama_outlet[$_a___counter] = $_a___data['nama_outlet'];
    $_a___device_id[$_a___counter] = $_a___data['device_id'];
    $_a___harga_motor_tambah[$_a___counter] = $_a___data['harga_motor_tambah'];
    $_a___harga_motor_isi_baru[$_a___counter] = $_a___data['harga_motor_isi_baru'];
    $_a___harga_mobil_tambah[$_a___counter] = $_a___data['harga_mobil_tambah'];
    $_a___harga_mobil_isi_baru[$_a___counter] = $_a___data['harga_mobil_isi_baru'];
    $_a___harga_tambal_motor[$_a___counter] = $_a___data['harga_tambal_motor'];
    $_a___harga_tambal_mobil[$_a___counter] = $_a___data['harga_tambal_mobil'];
    $_a___counter++;
  }
//=================================================================================
//=================================================================================
//=================================================================================
?>
<?php
  $_oo___no                   = array(150);
  $_oo___tanggal              = array(150);
  $_oo___shift                = array(150);
  $_oo___jam_mulai            = array(150);
  $_oo___jam_selesai          = array(150);
  $_oo___harga_tambal_motor   = array(150);
  $_oo___jumlah_tambal_motor  = array(150);
  $_oo___harga_tambal_mobil   = array(150);
  $_oo___jumlah_tambal_mobil  = array(150);
  $_oo___total_income_real    = array(150);
  $_oo___total_income_smart_nitro = array(150);
  $_oo___keterangan_shift     = array(150);
  $_oo___keterangan_harian    = array(150);
  $_oo___counter = 0;
//=================================================================================
//=================================================================================
  $_cc___no = 0;$_cc___tanggal = "";$_cc___shift = 0;$_cc___jam_mulai = "";$_cc___jam_selesai = "";
  $_cc___harga_tambal_motor = 0;$_cc___harga_tambal_mobil = 0;$_cc___jumlah_tambal_motor = 0;$_cc___jumlah_tambal_mobil = 0;
  $_cc___metode_hitung = 0;
  $_cc___total_income_real = 0;$_cc___total_income_smart_nitro = 0;$_cc___keterangan_shift = 0;$_cc___keterangan_harian = 0;
//=================================================================================
//=================================================================================
  // $_date_aktif_java_end = date_format($_date_semu_end,"d F Y");
  $_oo___date_aktif_start = date_format(date_create(date($_date_aktif."-01")),"Y-m-d");
  $_oo___date_aktif_start_pol = date_create(date($_date_aktif."-01"));
  $_oo___date_aktif_end   = date_format(date_create(date($_date_aktif."-".date_format($_oo___date_aktif_start_pol,"t"))),"Y-m-d");
  $_oo___id_db  = mysqli_query($koneksi,"select * from $___nama_db_3 Where date Between '$_oo___date_aktif_start' and '$_oo___date_aktif_end' order by date");
  while ($data = mysqli_fetch_array($_oo___id_db)){
    //=============================================================================
    //=============================================================================
    if($_ans_mode_edit == 1 && $data['no'] == $_no_aktif){
      $_cc___no = $data['no'];
      $_cc___tanggal = date_format(date_create(date($data['date'])),"d F Y");
      $_date_aktif_java_default = $_cc___tanggal;
      $_cc___shift = $data['shift'];$_cc___jam_mulai = substr($data['jam_start'],0,-3);$_cc___jam_selesai = substr($data['jam_end'],0,-3);
      $_cc___harga_tambal_motor = $data['harga_tambal_motor'];$_cc___harga_tambal_mobil = $data['harga_tambal_mobil'];
      $_cc___jumlah_tambal_motor = $data['tambal_motor'];$_cc___jumlah_tambal_mobil = $data['tambal_mobil'];
      $_cc___metode_hitung = $data['metode_hitung'];
      $_cc___total_income_real = $data['total_income_real'];$_cc___total_income_smart_nitro = $data['total_income_smart_nitro'];
      $_cc___keterangan_shift = $data['ket_layak_shift'];$_cc___keterangan_harian = $data['ket_layak_hari'];
    }
    //=============================================================================
    //=============================================================================
    if($_ans_id == $data['outlet']){
      $_oo___no[$_oo___counter] = $data['no'];
      $_oo___tanggal[$_oo___counter] = date_format(date_create(date($data['date'])),"j M Y");
      $_oo___shift[$_oo___counter] = $data['shift'];
      $_oo___jam_mulai[$_oo___counter] = substr($data['jam_start'],0,-3);
      $_oo___jam_selesai[$_oo___counter] = substr($data['jam_end'],0,-3);
      $_oo___harga_tambal_motor[$_oo___counter] = $data['harga_tambal_motor'];
      $_oo___harga_tambal_mobil[$_oo___counter] = $data['harga_tambal_mobil'];
      $_oo___jumlah_tambal_motor[$_oo___counter] = $data['tambal_motor'];
      $_oo___jumlah_tambal_mobil[$_oo___counter] = $data['tambal_mobil'];
      $_oo___total_income_real[$_oo___counter] = $data['total_income_real'];
      $_oo___total_income_smart_nitro[$_oo___counter] = $data['total_income_smart_nitro'];
      $_oo___keterangan_shift[$_oo___counter] = $data['ket_layak_shift'];
      $_oo___keterangan_harian[$_oo___counter] = $data['ket_layak_hari'];
      $_oo___counter++;
    }
  }
//=================================================================================
//=================================================================================
//=================================================================================
?>












<?php
              $___hari = array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
              $_dash_name_day = strtotime($_tanggal_now);
              $_dash_name_day_2 = date('N', $_dash_name_day);
              $_dash_name_day = $___hari[$_dash_name_day_2-1];
              $___bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
              $_dash_name_month = strtotime($_tanggal_now);
              $_dash_name_month_2 = date('n', $_dash_name_month);
              $_dash_name_month = $___bulan[$_dash_name_month_2-1];
              
              $_dash_name_tanggal = strtotime($_tanggal_now);
              $_dash_name_tanggal = date('j', $_dash_name_tanggal);
              
              $_dash_name_tahun = strtotime($_tanggal_now);
              $_dash_name_tahun = date('Y', $_dash_name_tahun);
?>



<!DOCTYPE html>
<html>





<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="dist/img/oke.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<script type='text/javascript'>
//<![CDATA[
msg = " SMART NITRO ";
msg = " ||| Kalkulasi Bulanan |||" + msg;pos = 0;
function scrollMSG() {
document.title = msg.substring(pos, msg.length) + msg.substring(0, pos); pos++;
if (pos > msg.length) pos = 0
window.setTimeout("scrollMSG()",100);
}
scrollMSG();
//]]>
</script>






<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <!-- Navbar -->
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-xl bg-white navbar-light">
    <div class="container">
      <a href="/biss_home_1.php"  class="navbar-brand">
        <img src="/dist/img/jadi deh_267.png" alt="AdminLTE Logo" class="thumbnail-image"
             style="opacity: 1">
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="/biss_home_1.php" class="nav-link"><i class="fa fa-home"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="/biss_home_2.php" class="nav-link"><i class="fa fa-object-group"></i> Rangkum Langsung</a>
          </li>
          <li class="nav-item">
            <a href="/biss_home_3.php" class="nav-link"><i class="fa fa-sitemap"></i> Kalkulasi Bulanan</a>
          </li>
          <li class="nav-item">
            <a href="/biss_home_4.php" class="nav-link"><i class="fa fa-newspaper-o"></i> Kalkulasi Harian</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-cog"></i> Setting</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/master_produk.php" class="dropdown-item"><i class="fa fa-cubes"></i> Master Produk</a></li>
              <li><a href="/master_outlet.php" class="dropdown-item"><i class="fa fa-compass"></i> Master Outlet</a></li>
              <li><a href="/user_access.php" class="dropdown-item"><i class="fa fa-user-plus"></i> User Access</a></li>
              <li><a href="/logout.php" class="dropdown-item"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->

    </div>
  </nav>
  <!-- /.navbar -->

<!-- /. aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<!-- /. aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<!-- /. aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<!-- /. aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<!-- /. aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<!-- /. aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<!-- /. aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->









  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h4 class="m-0 text-dark">Kalkulasi Bulanan Outlet</h4>
            <h4 class="m-0 text-dark"><small><b><?php echo $_a___nama_outlet[$_ans_id]; ?></b>
              <div class="btn-group dropright">
                <button type="button" class="btn btn-default dropdown-toggle  dropdown-toggle-split" data-toggle="dropdown">
                </button>
                <ul class="dropdown-menu">
                  <?php
                    for($____hit = 1; $____hit < $_a___counter; $____hit++){   ?>
                      <li><a class="dropdown-item" href="<?php echo "?id=".$_a___id_outlet[$____hit]."&day=today";?>"><?php echo $_a___nama_outlet[$____hit]; ?></a></li>
                  <?php                    
                    }
                  ?>              
                </ul>
              </div>
              Periode 
              <b><?php echo $_date_aktif_str; ?></b>
              <!-- <b><?php echo $_oo___date_aktif_end; ?></b> -->
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <?php
                    for($____hit = 0; $____hit < $_jok_coun; $____hit++){   ?>
                      <li><a class="dropdown-item" href="<?php echo "?id=".$_ans_id."&day=edit"."&date=".$_sot_bulan_tahun[$____hit];?>"><?php echo $_jok_bulan_tahun[$____hit]; ?></a></li>
                  <?php                    
                    }
                  ?>              
                </ul>
              </div>
            </small>
            </h4>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">


      <form method="POST" onsubmit="return validasi(this)" >
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-6"> 
            <div class="card card-maroon">
              <div class="card-header">
                <h5 class="card-title">Input Waktu</h5>
              </div>
              <div class="card-body">
                <div class="row mb-1">
                  <div class="col-12">
                    <label>Tanggal :</label>   
                    <div class="input-group date">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" name="date_1" id="date_1"  data-date-end-date="0d">
                    </div>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-6">
                    <label>Start :</label> 
                      <div class="input-group date" id="time_1" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="time_1" 
                                  <?php  
                                    if($_ans_mode_edit == 1){echo "value="."\"".$_cc___jam_mulai."\"";}
                                  ?>
                                data-target="#time_1">
                        <div class="input-group-append" data-target="#time_1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                        </div>
                      </div>
                  </div>
                  <div class="col-6">
                    <label>Finish :</label> 
                      <div class="input-group date" id="time_2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="time_2" 
                                  <?php  
                                    if($_ans_mode_edit == 1){echo "value="."\"".$_cc___jam_selesai."\"";}
                                  ?>
                                data-target="#time_2">
                        <div class="input-group-append" data-target="#time_2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Jadwal Shift :</label>
                      <select class="form-control" name="jadwal">
                        <?php 
                          if($_ans_mode_edit == 0){ ?>
                            <option value="1">Shift 1</option>
                            <option value="2">Shift 2</option>    <!--  selected  -->
                            <option value="3">Shift 3</option>
                        <?php
                          }
                        ?>
                        <?php
                          if($_ans_mode_edit == 1){ ?>
                            <option value="1" <?php if($_cc___shift == 1){echo "selected";} ?> >Shift 1</option>
                            <option value="2" <?php if($_cc___shift == 2){echo "selected";} ?> >Shift 2</option>
                            <option value="3" <?php if($_cc___shift == 3){echo "selected";} ?> >Shift 3</option>
                        <?php    
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-lg-6"> 
            <div class="card card-maroon">
              <div class="card-header">
                <h5 class="card-title">Input Data</h5>
              </div>
              <div class="card-body">
                <div class="row mb-1">
                  <div class="col-6">
                    <label>Tambal Motor :</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="tambal_motor" 
                                <?php  
                                  if($_ans_mode_edit == 1){echo "value="."\"".$_cc___jumlah_tambal_motor."\"";}
                                ?>
                              data-inputmask='"mask": "9999"' data-mask >
                      <div class="input-group-append">
                        <span class="input-group-text">. Ban</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Tambal Mobil :</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="tambal_mobil" 
                                <?php  
                                  if($_ans_mode_edit == 1){echo "value="."\"".$_cc___jumlah_tambal_mobil."\"";}
                                ?>
                              data-inputmask='"mask": "9999"' data-mask >
                      <div class="input-group-append">
                        <span class="input-group-text">. Ban</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-12">
                    <label>Total Income Real :</label>
                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text">Rp. </span>
                      </div>
                      <input type="text" class="form-control" name="total_income" 
                                <?php  
                                  if($_ans_mode_edit == 1){echo "value="."\"".$_cc___total_income_real."\"";}
                                ?>
                              data-inputmask='"mask": "9999999999"' data-mask >
                      <div class="input-group-append">
                        <span class="input-group-text">, -</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Method Kalkulasi :</label>
                      <select class="form-control" name="metode">
                        <?php 
                          if($_ans_mode_edit == 0){ ?>
                            <option value="0">Start From Zero</option>
                            <option value="1">Start with Value</option> 
                        <?php
                          }
                        ?>
                        <?php
                          if($_ans_mode_edit == 1){ ?>
                            <option value="0" <?php if($_cc___metode_hitung == 0){echo "selected";} ?> >Start From Zero</option>
                            <option value="1" <?php if($_cc___metode_hitung == 1){echo "selected";} ?> >Start with Value</option> 
                        <?php    
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-3 col-md-3 col-sm-3"> 
          </div>
          <div class="col-6 col-md-6 col-sm-6"> 
            <div class="card">
              <div class="input-group date">
                <input type="submit" name="btn_save" 
                        <?php
                          if($_ans_mode_edit == 1){echo "value="."\""."SAVE EDIT DATA"."\"";}
                          if($_ans_mode_edit == 0){echo "value="."\""."ENTRY DATA"."\"";}
                        ?>
                        class="btn btn-info btn-round btn-block">
                <!-- <button type="button" class="btn btn-default btn-block">.btn-block</button> -->
              </div>
            </div>
          </div>
          <div class="col-3 col-md-3 col-sm-3"> 
          </div>
        </div>
      </form>

        <div class="row">
          <div class="col-md-12  col-lg-12"> 
            <div class="card card-maroon">
              <div class="card-header">
                <h5 class="card-title">Tabel Data Kelayakan</h5>
              </div>
              <div class="card-body table-responsive p-0">  
                <table id="example2" class="table table-bordered table-striped text-nowrap">
                  <thead>
                    <tr>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">No</th>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">Tanggal</th>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">Shift</th>
                      <th colspan="2" style="text-align: center;vertical-align: middle">Tambal Motor</th>
                      <th colspan="2" style="text-align: center;vertical-align: middle">Tambal Mobil</th>
                      <th colspan="2" style="text-align: center;vertical-align: middle">Total Income</th>
                      <th colspan="2" style="text-align: center;vertical-align: middle">Keterangan</th>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">Action</th>
                    </tr>
                    <tr>
                      <th style="text-align: center;vertical-align: middle"><small>Harga @</small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Jumlah</small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Harga @</small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Jumlah</small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Real</small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Smart Nitro</small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Shift</small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Harian</small></th>
                    </tr>
                  </thead> 
                  <tbody>
                      <?php
                        for($__hit = 0; $__hit < $_oo___counter; $__hit++){   ?>
                        <tr>
                          <td style="text-align: center"><small><?php echo $__hit+1; ?></small></td>
                          <td style="text-align: center"><small><?php echo $_oo___tanggal[$__hit]; ?></small></td>
                          <td style="text-align: center"><small><?php echo $_oo___shift[$__hit]."  (".$_oo___jam_mulai[$__hit]." - ".$_oo___jam_selesai[$__hit].")"; ?></small></td>
                          <td style="text-align: center"><small><?php echo "Rp. ".number_format($_oo___harga_tambal_motor[$__hit])." ,-"; ?></small></td>
                          <td style="text-align: center"><small><?php echo $_oo___jumlah_tambal_motor[$__hit]." Ban"; ?></small></td>
                          <td style="text-align: center"><small><?php echo "Rp. ".number_format($_oo___harga_tambal_mobil[$__hit])." ,-"; ?></small></td>
                          <td style="text-align: center"><small><?php echo $_oo___jumlah_tambal_mobil[$__hit]." Ban"; ?></small></td>
                          <td style="text-align: center"><small><?php echo "Rp. ".number_format($_oo___total_income_real[$__hit])." ,-"; ?></small></td>
                          <td style="text-align: center"><small><?php echo "Rp. ".number_format($_oo___total_income_smart_nitro[$__hit])." ,-"; ?></small></td>
                          <?php
                            if($_oo___keterangan_shift[$__hit] == 0){ ?>
                              <td style="text-align: center"><small><span class="badge badge-danger">Tidak Layak</span></small></td>
                          <?php    
                            }
                          ?>
                          <?php
                            if($_oo___keterangan_shift[$__hit] == 1){ ?>
                              <td style="text-align: center"><small><span class="badge badge-success">Layak</span></small></td>
                          <?php    
                            }
                          ?>
                          <?php
                            if($_oo___keterangan_harian[$__hit] == 0){ ?>
                              <td style="text-align: center"><small><span class="badge badge-danger">Tidak Layak</span></small></td>
                          <?php    
                            }
                          ?>
                          <?php
                            if($_oo___keterangan_harian[$__hit] == 1){ ?>
                              <td style="text-align: center"><small><span class="badge badge-success">Layak</span></small></td>
                          <?php    
                            }
                          ?>

                              <td>
                                <a href="<?php echo "?id=".$_ans_id."&day=action"."&date=".$_date_aktif."&no=".$_oo___no[$__hit];?>"> <span class="badge bg-info"><i class="fa fa-edit"></i> Edit</span></a>
                                <a href="<?php echo "?id=".$_ans_id."&day=delete"."&date=".$_date_aktif."&no=".$_oo___no[$__hit];?>"> <span class="badge bg-warning"><i class="fa fa-trash"></i> Hapus</span></a>
                              </td>
                        </tr>
                      <?php                    
                        }
                      ?>  
                    


                  </tbody>          
                </table>  
              </div>

            </div>



          </div>
        </div>








        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>






<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false ,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "lengthMenu"  : [[7, 14, 21, -1], [7, 14, 21, "All"]],
      "language": {
          "paginate": {
            "previous": "<<",
            "next": ">>",
          }
        }
    });
  });
</script>

<script>
  $(function () {



    $('#date_1').daterangepicker({
      singleDatePicker: true,
      // period: 'month',
      minDate: '<?php echo $_date_aktif_java_start; ?>',
      maxDate: '<?php echo $_date_aktif_java_end; ?>',
      startDate: '<?php echo $_date_aktif_java_default; ?>',
      locale: {
        // viewMode: "YEARS", 
      // minDate: '06/01/2013',
      // maxDate: '06/30/2015',   
        // format: 'DD-MM-YYYY'
        format: "D MMMM YYYY",
      }
      // format: "DD MMMM YYYY",
      
    })

    // $('#date_1').daterangepicker({
    //   singleDatePicker: true,
    //   showDropdowns: true,
    //   minDate: '06/01/2013',
    //   maxDate: '06/30/2015',      
    //   format: 'DD/MM/YYYY'
    // }).on('hide.daterangepicker', function (ev, picker) {
    //   $('.table-condensed tbody tr:nth-child(2) td').click();
    //   alert(picker.startDate.format('MM/YYYY'));
    // })




    $('.clock_1').datetimepicker({
      // format: 'LT'
    })
    $('.clock_2').datetimepicker({
      // format: 'LT'
    })
    //Timepicker
    $('#time_1').datetimepicker({
      format: 'HH:mm',
      // defaultDate: '05:00',
    })
    $('#time_2').datetimepicker({
      format: 'HH:mm',
      // defaultDate: '23:00',
    })
        //Money Euro
    $('[data-mask]').inputmask()
  })




    //============================================================================================
    //============================================================================================


</script>
</body>
</html>


<?php
    $_prog_date_1_1 = 0;
    $_prog_date_1_2 = 0;
    $__time_1_hsl = 0;
    $__time_2_hsl = 0;
    $___selisih_fix = 0;
    $___total_tambalan = 0;
    $___ket_layak_1 = 0;
    $___ket_layak_2 = 0;
    //======================================================================
    if(isset($_POST['date_1'])){
      $_prog_date_1 = $_POST['date_1'];
      $_prog_date_1_1 = date_create($_prog_date_1);
      $_prog_date_1_2 = date_format($_prog_date_1_1,"Y-m-d");
    }
    // ======================================================================
    if(isset($_POST['time_1'])){
      $_prog_time_1 = $_POST['time_1'].":00";
      $_arr_time_1 = explode(":",$_prog_time_1);
      $__time_1_hsl = ((intval($_arr_time_1[0]))*60) + (intval($_arr_time_1[1]));
    }
    //======================================================================
    if(isset($_POST['time_2'])){
      $_prog_time_2 = $_POST['time_2'].":00";
      $_arr_time_1 = explode(":",$_prog_time_2);
      $__time_2_hsl = ((intval($_arr_time_1[0]))*60) + (intval($_arr_time_1[1]));
    }
    //======================================================================
    $__diff_time = $__time_2_hsl - $__time_1_hsl;
    $__diff_time_hasil = 0;
    if($__diff_time <= 0){$__diff_time_hasil = 1;}
    if($__diff_time > 0){$__diff_time_hasil = 0;}
    //======================================================================
    if(isset($_POST['jadwal'])){$_prog_shift  = $_POST['jadwal'];}
    if(isset($_POST['tambal_motor'])){$_prog_tambal_motor = intval($_POST['tambal_motor']);}
    if(isset($_POST['tambal_mobil'])){$_prog_tambal_mobil = intval($_POST['tambal_mobil']);}
    if(isset($_POST['total_income'])){$_prog_total_income = intval($_POST['total_income']);}
    if(isset($_POST['metode'])){$_prog_metode  = $_POST['metode'];}
    if(isset($_POST['btn_save'])){ ?>
      <script type="text/javascript">             
          <?php 
            if($__diff_time_hasil == 1){ ?>
              alert("Jam Finish Tidak Boleh Sama atau Lebih Kecil");    
          <?php
            }
          ?> 
          <?php 
            if($__diff_time_hasil == 0){ 
//===========================================================================================================
//===========================================================================================================

                $_home_n1_b = 0;$_home_n1_a = 0;$_home_n1_n = 0;$_home_n1_awal = 0;$_home_tot_n1 = 0;
                $_home_n2_b = 0;$_home_n2_a = 0;$_home_n2_n = 0;$_home_n2_awal = 0;$_home_tot_n2 = 0;
                $_home_n3_b = 0;$_home_n3_a = 0;$_home_n3_n = 0;$_home_n3_awal = 0;$_home_tot_n3 = 0;
                $_home_n4_b = 0;$_home_n4_a = 0;$_home_n4_n = 0;$_home_n4_awal = 0;$_home_tot_n4 = 0;
                $_home_lock = 0;$_total_rupiah = 0;
                //===========================================================================================
                $___date_start = $_prog_date_1_2." ".$_prog_time_1;
                $___date_end = $_prog_date_1_2." ".$_prog_time_2;
                //===========================================================================================
                $_b___nama_db          = "data_".strtolower($_a___device_id[$_ans_id]);
                $_b_id___db  = mysqli_query($koneksi_b,"select * from $_b___nama_db Where date Between '$___date_start' and '$___date_end' order by date");
                //===============================================================================
                $_h___no                  = array(3000);
                $_h___date                = array(3000);
                $_h___tambah_motor        = array(3000);
                $_h___tambah_mobil        = array(3000);
                $_h___isi_baru_motor      = array(3000);
                $_h___isi_baru_mobil      = array(3000);
                $_h___counter             = 0;
                //===============================================================================  //===============================================================================
                while ($data = mysqli_fetch_array($_b_id___db)){
                    $result_n1 = $data['tambah_motor'];$result_n2 = $data['tambah_mobil'];
                    $result_n3 = $data['isi_baru_motor'];$result_n4 = $data['isi_baru_mobil'];
                    //=======================================================================
                    //=======================================================================
                    if($_home_lock == 0 && $_prog_metode == 1){
                      $_home_lock = 1;
                      $_home_n1_awal = $result_n1;
                      $_home_n2_awal = $result_n2;
                      $_home_n3_awal = $result_n3;
                      $_home_n4_awal = $result_n4;
                    }
                    //=======================================================================
                    //=======================================================================
                    $_h___date[$_h___counter] = substr($data['date'],11,5);
                    $_h___tambah_motor[$_h___counter] = $data['tambah_motor'];
                    $_h___tambah_mobil[$_h___counter] = $data['tambah_mobil'];
                    $_h___isi_baru_motor[$_h___counter] = $data['isi_baru_motor'];
                    $_h___isi_baru_mobil[$_h___counter] = $data['isi_baru_mobil'];
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
                    //=======================================================================
                    //=======================================================================
                    $_home_date = $data['date'];
                    $_h___counter++;
                }
                $_home_tot_n1 = ($_home_tot_n1 + $_home_n1_b) - $_home_n1_awal;
                $_home_tot_n2 = ($_home_tot_n2 + $_home_n2_b) - $_home_n2_awal;
                $_home_tot_n3 = ($_home_tot_n3 + $_home_n3_b) - $_home_n3_awal;
                $_home_tot_n4 = ($_home_tot_n4 + $_home_n4_b) - $_home_n4_awal;
                //======================================================================
                //======================================================================
                $_total_rupiah = ($_home_tot_n1 * $_a___harga_motor_tambah[$_ans_id]) +
                                  ($_home_tot_n2 * $_a___harga_mobil_tambah[$_ans_id]) +
                                  ($_home_tot_n3 * $_a___harga_motor_isi_baru[$_ans_id]) +
                                  ($_home_tot_n4 * $_a___harga_mobil_isi_baru[$_ans_id]);
                //======================================================================
                //======================================================================
                $___selisih_fix = $_prog_total_income - $_total_rupiah;
                $___total_tambalan = ($_prog_tambal_motor*$_a___harga_tambal_motor[$_ans_id]) + ($_prog_tambal_mobil*$_a___harga_tambal_mobil[$_ans_id]);
                if($___selisih_fix >= $___total_tambalan){$___ket_layak_1 = 1;}
                if($___selisih_fix < $___total_tambalan){$___ket_layak_1 = 0;}
                $___ket_layak_2 = 0;
                //======================================================================
                //======================================================================
                if($_ans_mode_edit == 0){
                  $saved = $koneksi->query("insert into $___nama_db_3 (outlet,date,jam_start,jam_end,
                            shift,harga_tambal_motor,harga_tambal_mobil,tambal_motor,tambal_mobil,metode_hitung,total_income_real,
                            total_income_smart_nitro,ket_layak_shift,ket_layak_hari) 
                            values( '$_ans_id', '$_prog_date_1_2','$_prog_time_1',
                                    '$_prog_time_2', '$_prog_shift', '$_a___harga_tambal_motor[$_ans_id]', '$_a___harga_tambal_mobil[$_ans_id]', 
                                    '$_prog_tambal_motor', '$_prog_tambal_mobil', '$_prog_metode' ,'$_prog_total_income', 
                                    '$_total_rupiah', '$___ket_layak_1',
                                    '$___ket_layak_2')");
                }  
                if($_ans_mode_edit == 1){
                  $saved_2 = $koneksi->query("update $___nama_db_3 set 
                                outlet='$_ans_id', 
                                date='$_prog_date_1_2', 
                                jam_start='$_prog_time_1', 
                                jam_end='$_prog_time_2',
                                shift='$_prog_shift',
                                harga_tambal_motor='$_cc___harga_tambal_motor',
                                harga_tambal_mobil='$_cc___harga_tambal_mobil', 
                                tambal_motor='$_prog_tambal_motor', 
                                tambal_mobil='$_prog_tambal_mobil', 
                                metode_hitung='$_prog_metode', 
                                total_income_real='$_prog_total_income', 
                                total_income_smart_nitro='$_total_rupiah', 
                                total_income_real='$_prog_total_income', 
                                ket_layak_shift='$___ket_layak_1', 
                                ket_layak_hari='$___ket_layak_2' 
                                where no='$_no_aktif' ");
                }

          ?>
              window.location.href="<?php echo "?id=".$_ans_id."&day=edit"."&date=".$_date_aktif;?>";        
          <?php
            }
          ?>  
      </script>

<?php
    // }
    }
?>






 <script>
    function validasi(form){
          if (form.time_1.value=="") {
              alert("Jam Start Tidak Boleh Kosong");
              form.time_1.focus();
              return(false);
          }
          if (form.time_2.value=="") {
              alert("Jam Finish Tidak Boleh Kosong");
              form.time_2.focus();
              return(false);
          }
          if (form.tambal_motor.value=="") {
              alert("Jumlah Tambal Motor Tidak Boleh Kosong");
              form.tambal_motor.focus();
              return(false);
          }
          if (form.tambal_mobil.value=="") {
              alert("Jumlah Tambal Mobil Tidak Boleh Kosong");
              form.tambal_mobil.focus();
              return(false);
          }
          if (form.total_income.value=="") {
              alert("Total Income Tidak Boleh Kosong");
              form.total_income.focus();
              return(false);
          }
        return(true);
    }
</script>





<?php
    }
    else{
        header("location:/login.php");
    }
?>