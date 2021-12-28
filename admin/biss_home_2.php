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
  date_default_timezone_set("Asia/Bangkok");
  date_default_timezone_get();  
  $_tanggal_now = date('Y-m-d');  
  $_menit_all = abs(date('H'))*60 + abs(date('i'));
?>
<?php
  if (empty($_GET)) {
    $_ans_id = "1";
    $_ans_day = "today";
  }
  else{$_ans_day = $_GET['day'];$_ans_id = $_GET['id'];}
  $_ans_mode = 0;
  if($_ans_day == "today"){
    $_date_aktif = date('Y-m-d');
    $_ans_mode = 0;
  }
  if($_ans_day == "edit"){
    $_date_aktif = $_GET['date'];
    $_ans_mode = 1;
  }
  $_tanggal_now = $_date_aktif;
?>
<?php
  $___nama_db_1 = "data_today";
  $___nama_db_2 = "master_outlet";
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
  $_a___for_waktu           = "";
  $_a___counter             = 0;
//========================================================================================================
//========================================================================================================
//========================================================================================================
//========================================================================================================
//========================================================================================================
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
    $_a___counter++;
  }
?>

<?php
  $_home_n1_b = 0;$_home_n1_a = 0;$_home_n1_n = 0;$_home_n1_awal = 0;$_home_tot_n1 = 0;
  $_home_n2_b = 0;$_home_n2_a = 0;$_home_n2_n = 0;$_home_n2_awal = 0;$_home_tot_n2 = 0;
  $_home_n3_b = 0;$_home_n3_a = 0;$_home_n3_n = 0;$_home_n3_awal = 0;$_home_tot_n3 = 0;
  $_home_n4_b = 0;$_home_n4_a = 0;$_home_n4_n = 0;$_home_n4_awal = 0;$_home_tot_n4 = 0;
  $_home_lock = 0;$_total_rupiah = 0;
  //============================================================================================================
  if($_ans_mode == 0){
    $_b___date_aktif_start = $_date_aktif." "."00:00:01";
    $_b___date_aktif_end   = $_date_aktif." ".date('H:i:s');
  }
  if($_ans_mode == 1){
    $_b___date_aktif_start = $_date_aktif." "."00:00:01";
    $_b___date_aktif_end   = $_date_aktif." "."23:59:59";
  }
  //============================================================================================================
  $_b___nama_db          = "data_".strtolower($_a___device_id[$_ans_id]);
  $_b_id___db  = mysqli_query($koneksi_b,"select * from $_b___nama_db Where date Between '$_b___date_aktif_start' and '$_b___date_aktif_end' order by date");
  //===============================================================================
  $_db_id___grafik_data_abc_1 = "";
  $_db_id___grafik_data_abc_2 = "";
  $_db_id___grafik_data_abc_3 = "";
  $_db_id___grafik_data_abc_4 = "";
  $_db_id___grafik_nama = "";
  //===============================================================================
  $_h___no                  = array(3000);
  $_h___date                = array(3000);
  $_h___tambah_motor        = array(3000);
  $_h___tambah_mobil        = array(3000);
  $_h___isi_baru_motor      = array(3000);
  $_h___isi_baru_mobil      = array(3000);
  $_h___counter             = 0;
  //===============================================================================
  while ($data = mysqli_fetch_array($_b_id___db)){
      $result_n1 = $data['tambah_motor'];$result_n2 = $data['tambah_mobil'];
      $result_n3 = $data['isi_baru_motor'];$result_n4 = $data['isi_baru_mobil'];
      //=======================================================================
      $_h___date[$_h___counter] = substr($data['date'],11,5);
      $_h___tambah_motor[$_h___counter] = $data['tambah_motor'];
      $_h___tambah_mobil[$_h___counter] = $data['tambah_mobil'];
      $_h___isi_baru_motor[$_h___counter] = $data['isi_baru_motor'];
      $_h___isi_baru_mobil[$_h___counter] = $data['isi_baru_mobil'];
      //=======================================================================
      //=======================================================================
      $_db_id___grafik_nama       .= "'".substr($data["date"], 11 , -3)."',";
      $_db_id___grafik_data_abc_1 .= $data["tambah_motor"].",";
      $_db_id___grafik_data_abc_2 .= $data["tambah_mobil"].",";
      $_db_id___grafik_data_abc_3 .= $data["isi_baru_motor"].",";
      $_db_id___grafik_data_abc_4 .= $data["isi_baru_mobil"].",";
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
    $_db_id___grafik_data_abc_1 = substr($_db_id___grafik_data_abc_1, 0 , -1);
    $_db_id___grafik_data_abc_2 = substr($_db_id___grafik_data_abc_2, 0 , -1);
    $_db_id___grafik_data_abc_3 = substr($_db_id___grafik_data_abc_3, 0 , -1);
    $_db_id___grafik_data_abc_4 = substr($_db_id___grafik_data_abc_4, 0 , -1);
    $_db_id___grafik_nama       = substr($_db_id___grafik_nama, 0 , -1);
//================================================================================================
//================================================================================================
//================================================================================================
  $_dis_1 = $_total_rupiah;
  $_dis_2 = ($_home_tot_n1*$_a___harga_motor_tambah[$_ans_id]) + ($_home_tot_n3*$_a___harga_motor_isi_baru[$_ans_id]);
  $_dis_3 = ($_home_tot_n2*$_a___harga_mobil_tambah[$_ans_id]) + ($_home_tot_n4*$_a___harga_mobil_isi_baru[$_ans_id]);
  $_dis_4 = $_home_tot_n1 + $_home_tot_n2 + $_home_tot_n3 + $_home_tot_n4 ;
//=================================================================================================
  $_dis_a_1 = $_home_tot_n1;
  $_dis_a_2 = $_a___harga_motor_tambah[$_ans_id];
  $_dis_a_3 = $_home_tot_n1 * $_a___harga_motor_tambah[$_ans_id];
  if($_dis_a_1 == 0){$_dis_a_4 = 0;}
  else{$_dis_a_4 = round(($_dis_a_3 / $_dis_1) * 100 ,1);}
//=================================================================================================
  $_dis_b_1 = $_home_tot_n3;
  $_dis_b_2 = $_a___harga_motor_isi_baru[$_ans_id];
  $_dis_b_3 = $_home_tot_n3 * $_a___harga_motor_isi_baru[$_ans_id];
  if($_dis_b_1 == 0){$_dis_b_4 = 0;}
  else{$_dis_b_4 = round(($_dis_b_3 / $_dis_1) * 100 ,1);}
//=================================================================================================
  $_dis_c_1 = $_home_tot_n2;
  $_dis_c_2 = $_a___harga_mobil_tambah[$_ans_id];
  $_dis_c_3 = $_home_tot_n2 * $_a___harga_mobil_tambah[$_ans_id];
  if($_dis_c_1 == 0){$_dis_c_4 = 0;}
  else{$_dis_c_4 = round(($_dis_c_3 / $_dis_1) * 100 ,1);}
//=================================================================================================
  $_dis_d_1 = $_home_tot_n4;
  $_dis_d_2 = $_a___harga_mobil_isi_baru[$_ans_id];
  $_dis_d_3 = $_home_tot_n4 * $_a___harga_mobil_isi_baru[$_ans_id];
  if($_dis_d_1 == 0){$_dis_d_4 = 0;}
  else{$_dis_d_4 = round(($_dis_d_3 / $_dis_1) * 100 ,1);}
//=================================================================================================
//=================================================================================================


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
msg = " ||| Rangkum Langsung |||" + msg;pos = 0;
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
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-xl bg-white navbar-light">
    <div class="container">
      <a href="/biss_home_1.php" class="navbar-brand">
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
        <div class="row mb-1">
          <div class="col-6">
            <h4 class="m-0 text-dark">Outlet<small><b>&nbsp<?php echo substr($_a___nama_outlet[$_ans_id], 0,6); ?></b>
              <div class="btn-group dropright">
                <button type="button" class="btn btn-default dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
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
            </small>
            </h4>
          </div><!-- /.col -->
          <div class="col-6">



            <ol class="breadcrumb float-sm-right">
              
              <form method="post">
                <div class="input-group date">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control float-right" name="date_1" id="date_1"  data-date-end-date="0d">
                  <input type="submit" name="btn_go" value="Go!" class="btn btn-info btn-flat">
                </div>
              </form>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">



        <div class="row">
          <div class="col-md-12  col-lg-12"> 
            <div class="card card-purple">
              <div class="card-header">
                <h5 class="card-title">Summary Day <small><i class="fa fa-arrow-circle-right"></i>
                  <b>
                    <?php
                      echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;
                    ?>
                  </b></small></h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-3">
                    
                    <div class="info-box mb-3 bg-maroon">
                      <span class="info-box-icon"><i class="fa fa-money"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Total Income</span>
                        <span class="info-box-number"><?php echo "Rp. ".number_format($_dis_1)." ,-"; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="info-box mb-3 bg-olive">
                      <span class="info-box-icon"><i class="fa fa-motorcycle"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Motor Income</span>
                        <span class="info-box-number"><?php echo "Rp. ".number_format($_dis_2)." ,-"; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <div class="clearfix hidden-md-up"></div>
                  <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="info-box mb-3 bg-pink">
                      <span class="info-box-icon"><i class="fa fa-car"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Mobil Income</span>
                        <span class="info-box-number"><?php echo "Rp. ".number_format($_dis_3)." ,-"; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="info-box mb-3 bg-navy">
                      <span class="info-box-icon"><i class="fa fa-check-square"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Total Ban</span>
                        <span class="info-box-number"><?php echo $_dis_4." Ban"; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div> 
                </div>         
              </div>
            </div>



          </div>
        </div>


        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-6"> 
            <div class="card card-purple">
              <div class="card-header">
                <h5 class="card-title">Totalisator Calc <small><i class="fa fa-arrow-circle-right"></i>
                  <b>
                    <?php
                      echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;
                    ?>
                  </b></small></h5>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-olive text-xl">
                    <i class="fa fa-motorcycle fa-2x"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">Tmbh Angin <big><b><?php echo $_dis_a_1; ?></b></big> Ban @ Rp <big><b><?php echo number_format($_dis_a_2); ?></b></big></span>
                    <span class="text-muted">= Rp <big><b><?php echo number_format($_dis_a_3); ?></b></big> ,- (<?php echo $_dis_a_4; ?>%)</span>
                    <span class="font-weight-bold">Isi Baru <big><b><?php echo $_dis_b_1; ?></b></big> Ban @ Rp <big><b><?php echo number_format($_dis_b_2); ?></b></big></span>
                    <span class="text-muted">= Rp <big><b><?php echo number_format($_dis_b_3); ?></b></big> ,- (<?php echo $_dis_b_4; ?>%)</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-pink text-xl">
                    <i class="fa fa-car fa-2x"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">Tmbh Angin <big><b><?php echo $_dis_c_1; ?></b></big> Ban @ Rp <big><b><?php echo number_format($_dis_c_2); ?></b></big></span>
                    <span class="text-muted">= Rp <big><b><?php echo number_format($_dis_c_3); ?></b></big> ,- (<?php echo $_dis_c_4; ?>%)</span>
                    <span class="font-weight-bold">Isi Baru <big><b><?php echo $_dis_d_1; ?></b></big> Ban @ Rp <big><b><?php echo number_format($_dis_d_2); ?></b></big></span>
                    <span class="text-muted">= Rp <big><b><?php echo number_format($_dis_d_3); ?></b></big> ,- (<?php echo $_dis_d_4; ?>%)</span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-lg-6">
            <div class="card card-purple">
              <div class="card-header">
                <h5 class="card-title">Grafik Totalisator <small><i class="fa fa-arrow-circle-right"></i>
                  <b>
                    <?php
                      echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;
                    ?>
                  </b></small></h5>
              </div>
              <div class="card-body">
                  <div class="chart">
                        <!-- Sales Chart Canvas -->
                    <canvas id="barChart" height="290" style="height: 290px;"></canvas>
                  </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-12 col-sm-12  col-lg-12">
            <div class="card card-purple">
              <div class="card-header">
                <h5 class="card-title">Grafik Total Ban <small><i class="fa fa-arrow-circle-right"></i>
                  <b>
                    <?php
                      echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;
                    ?>
                  </b></small></h5>
              </div>
              <div class="card-body">
                  <div class="chart">
                        <!-- Sales Chart Canvas -->
                    <canvas id="areaChart" height="290" style="height: 290px;"></canvas>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12  col-lg-12"> 
            <div class="card card-purple">
              <div class="card-header">
                <h5 class="card-title">Tabel Data <small><i class="fa fa-arrow-circle-right"></i>
                  <b>
                    <?php
                      // if($_ans_mode == 0){
                      // echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun
                      //     ."  (Last Update ".$_h___date[$_h___counter-1].")";}
                      // if($_ans_mode == 1){
                      // echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;}

                      echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;

                    ?>
                  </b></small></h5>
              </div>
              <div class="card-body">  
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">No</th>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">Time</th>
                      <th colspan="2" style="text-align: center;vertical-align: middle">Tambah Angin</th>
                      <th colspan="2" style="text-align: center;vertical-align: middle">Isi Baru</th>
                    </tr>
                    <tr>
                      <th style="text-align: center;vertical-align: middle"><small>Motor <i class="fa fa-motorcycle"></i></small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Mobil <i class="fa fa-car"></i></small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Motor <i class="fa fa-motorcycle"></i></small></th>
                      <th style="text-align: center;vertical-align: middle"><small>Mobil <i class="fa fa-car"></i></small></th>
                    </tr>
                  </thead> 
                      <tbody>
                        <?php
                          for($for_1 = $_h___counter-1;$for_1>0;$for_1--){   ?>
                          <tr>
                            <td style="text-align: center"><small><?php echo $for_1;?></small></td>
                            <td style="text-align: center"><b><?php echo $_h___date[$for_1];?></b></td>
                            <td style="text-align: center"><?php echo $_h___tambah_motor[$for_1];?></td>
                            <td style="text-align: center"><?php echo $_h___tambah_mobil[$for_1];?></td>
                            <td style="text-align: center"><?php echo $_h___isi_baru_motor[$for_1];?></td>
                            <td style="text-align: center"><?php echo $_h___isi_baru_mobil[$for_1];?></td>
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
      locale: {
        format: "D MMM YY",
      },
      // maxDate: '20 September 2020',  
      // maxDate: '<?php echo date("j F Y"); ?>',  
    })
  })




    //============================================================================================
    //============================================================================================


    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var ChartData_ho = {
      labels  : ['Mtr Tambah', 'Mtr Isi Baru','Mbl Tambah', 'Mbl Isi Baru'],
      datasets: [
        {
          label               : ['Motor','Mobil'],
          backgroundColor     : ['#3d9970','#3d9970','#e83e8c','#e83e8c'],
          // borderColor         : 'rgba(60,141,90,1)',    
          barPercentage: 1,
          barThickness: [35,20,35,20],
          maxBarThickness: 45,
          minBarLength: 2,
          data                : [<?php echo $_dis_a_3; ?>,<?php echo $_dis_b_3; ?>,
                                <?php echo $_dis_c_3; ?>,<?php echo $_dis_d_3; ?>
                                ],
        }
      ]
    }
    var barChartData = jQuery.extend(true, {}, ChartData_ho)
    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,        
      legend: {
        display: false
      },      
            "hover": {
              "animationDuration": 0
            },
             "animation": {
                "duration": 1,
              "onComplete": function() {
                var chartInstance = this.chart,
                  ctx = chartInstance.ctx;
 
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';
 
                this.data.datasets.forEach(function(dataset, i) {
                  var meta = chartInstance.controller.getDatasetMeta(i);
                  meta.data.forEach(function(bar, index) {
                    var data = dataset.data[index];
                    ctx.fillText('Rp.' + Intl.NumberFormat().format(data) + ',-', bar._model.x, bar._model.y - 5);
                  });
                });
              }
            },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    // return 'Rp. ' + tooltipItem;
                    // return 'Rp. ' + tooltipItem.yLabel;
                    return  'Rp. ' + Intl.NumberFormat().format(tooltipItem.yLabel) + '  ,-';
                }
            }
        },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          },
          stacked: true,
          scaleLabel: {
            display: false,
            // labelString: 'Total Income (x 1000)'
          }
        }],
        yAxes: [{
          display: true,
          gridLines : {
            display : true,
          },
          stacked: true,
          scaleLabel: {
            display: false,
            // labelString: '7 Days Date'
          },
          ticks     : {
            display : false,
            stepSize: <?php echo ((max($_dis_a_3,$_dis_b_3,$_dis_c_3,$_dis_d_3))+60000)/4;?>,
            maxRotation : 0,
            minRotation : 0,
            callback: function(value, index, values) {
                        return 'Rp. '+Intl.NumberFormat().format(value);
                        // return 'Rp. ' + value;
                    }
          },
        }]
      }
    }
    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
    //============================================================================================
    //============================================================================================
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    var areaChartData = {
      labels  : [<?php echo $_db_id___grafik_nama;?>],
      datasets: [
        {
          label               : 'Tambah Motor',
          backgroundColor     : 'rgba(23,162,184,0)',
          borderColor         : 'rgba(23,162,184,0.8)',
          pointRadius         : 0,
          LabelAngle          : 25,
          pointColor          : '#8CBAE3',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $_db_id___grafik_data_abc_1;?>]
        },
        {
          label               : 'Isi Baru Motor',
          backgroundColor     : 'rgba(220,53,69,0)',
          borderColor         : 'rgba(220,53,69,0.8)',
          pointRadius         : 0,
          LabelAngle          : 25,
          pointColor          : '#8CBAE3',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $_db_id___grafik_data_abc_3;?>]
        },
        {
          label               : 'Tambah Mobil',
          backgroundColor     : 'rgba(40,167,69,0)',
          borderColor         : 'rgba(40,167,69,0.8)',
          pointRadius         : 0,
          LabelAngle          : 25,
          pointColor          : '#8CBAE3',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $_db_id___grafik_data_abc_2;?>]
        },
        {
          label               : 'Isi Baru Mobil',
          backgroundColor     : 'rgba(255,193,7,0)',
          borderColor         : 'rgba(255,193,7,0.8)',
          pointRadius         : 0,
          LabelAngle          : 25,
          pointColor          : '#8CBAE3',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $_db_id___grafik_data_abc_4;?>]
        },
      ]
    }    
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      datasetFill : false,
      legend: {
        display: true,
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          },
          ticks     : {
            maxRotation : 35,
            minRotation : 35,
          },
          scaleLabel: {
            display: true,
            labelString: 'Waktu'
            // labelString: '<?php echo " ".$_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;?>'
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          },
          scaleLabel: {
            display: true,
            labelString: 'Total Ban'
          }
        }]
      }
    }
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })  


</script>
</body>
</html>


<?php
    if(isset($_POST['date_1'])){
    $_prog_date_1 = $_POST['date_1'];
    $_prog_date_1 = date_create($_prog_date_1);
    $_prog_date_1 = date_format($_prog_date_1,"Y-m-d");


    // $arr_date_1 = explode(" ",$_prog_date_1);
    //      if($arr_date_1[1] == "Jan"){$arr_date_1[1] = "01";}
    // else if($arr_date_1[1] == "Feb"){$arr_date_1[1] = "02";}
    // else if($arr_date_1[1] == "Mar"){$arr_date_1[1] = "03";}
    // else if($arr_date_1[1] == "Apr"){$arr_date_1[1] = "04";}
    // else if($arr_date_1[1] == "May"){$arr_date_1[1] = "05";}
    // else if($arr_date_1[1] == "Jun"){$arr_date_1[1] = "06";}
    // else if($arr_date_1[1] == "Jul"){$arr_date_1[1] = "07";}
    // else if($arr_date_1[1] == "Aug"){$arr_date_1[1] = "08";}
    // else if($arr_date_1[1] == "Sep"){$arr_date_1[1] = "09";}
    // else if($arr_date_1[1] == "Oct"){$arr_date_1[1] = "10";}
    // else if($arr_date_1[1] == "Nov"){$arr_date_1[1] = "11";}
    // else {$arr_date_1[1] = "12";}
    // if($arr_date_1[0]<10){$arr_date_1[0] = "0".$arr_date_1[0];}
    // $_prog_date_1 = $arr_date_1[2]."-".$arr_date_1[1]."-".$arr_date_1[0];
    
    if(isset($_POST['btn_go'])){ ?>
      <script type="text/javascript">
        window.location.href="<?php echo "?id=".$_ans_id."&day=edit&date=".$_prog_date_1;?>";
      </script>

<?php
    }
    }
?>





<?php
    }
    else{
        header("location:/login.php");
    }
?>