<?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
?>



<?php
//     $session_nama_client = $_SESSION['nama_client'];
//   $_______nama_db = "u8828523_nitro_bella";
//   $_______nama_db = $_SESSION['nama_db'];
  $_______nama_db = "mirovtec_nitro_teknisi";
  $_______nama_server = "localhost";
  $_______nama_username = "mirovtec_ikhwan";
  $_______nama_password = "ikhwan12345hifza";
  $koneksi = mysqli_connect($_______nama_server,$_______nama_username,$_______nama_password,$_______nama_db);    
  date_default_timezone_set("Asia/Bangkok");
  date_default_timezone_get();
  $_tanggal_now = date('Y-m-d');
  $_tanggal_now_edit = date_create(date('Y-m-d'));
  $_menit_all = abs(date('H'))*60 + abs(date('i'));
?>
<?php
  $___nama_db_1 = "data_today";
  $___nama_db_2 = "master_outlet";
  $___nama_db_3 = "data_paket";
?>
<?php
  $_a___no                  = array(200);
  $_a___id_outlet           = array(200);
  $_a___device_id           = array(200);
  $_a___nama_outlet         = array(200);
  $_a___nama_outlet_2       = array(200);
  $_a___ban_tambah_motor    = array(200);
  $_a___ban_tambah_mobil    = array(200);
  $_a___ban_isi_baru_motor  = array(200);
  $_a___ban_isi_baru_mobil  = array(200);
  $_a___total_rupiah        = array(200);
  $_a___total_rupiah_2      = array(200);
  $_a___status_run          = array(200);
  $_a___real_waktu          = array(200);
  $_a___real_waktu_2        = array(200);
  $_a___for_waktu           = "";
  $_a___counter             = 0;
//========================================================================================================
//========================================================================================================
//========================================================================================================
//========================================================================================================
//========================================================================================================
    $_grafik_data_abc = "";
    $_grafik_data_def = "";
    $_grafik_nama     = "";
  $_a___counter=0;
  $_a___db_data_today  = mysqli_query($koneksi,"select * from $___nama_db_1 order by no");
  while ($_a___data = mysqli_fetch_array($_a___db_data_today)){
    $_a___no[$_a___counter] = $_a___data['no'];
    $_a___device_id[$_a___counter] = $_a___data['device_id'];
    $_a___nama_outlet[$_a___counter] = $_a___data['nama_outlet'];
    $_a___ban_tambah_motor[$_a___counter] = $_a___data['ban_tambah_motor'];
    $_a___ban_tambah_mobil[$_a___counter] = $_a___data['ban_tambah_mobil'];
    $_a___ban_isi_baru_motor[$_a___counter] = $_a___data['ban_isi_baru_motor'];
    $_a___ban_isi_baru_mobil[$_a___counter] = $_a___data['ban_isi_baru_mobil'];
    $_a___total_rupiah[$_a___counter] = $_a___data['total_rupiah'];
    $_a___real_waktu[$_a___counter] = $_a___data['waktu'];
    $_a___for_waktu = abs(substr($_a___data['waktu'],0,2))*60 + abs(substr($_a___data['waktu'],3,5));
    //$_a___status_run[$_a___counter] = $_a___for_waktu;
    if(abs($_a___for_waktu - $_menit_all) < 20){$_a___status_run[$_a___counter] = 1;}
    
    else{$_a___status_run[$_a___counter] = 0;}  
    $_a___real_waktu_2[$_a___counter] = abs($_a___for_waktu - $_menit_all);
    //==========================================================================================
    $_a___counter++;
  }
  //=========================================================================
  $_v___isi_paket           = array(200);
  $_v___calc_paket          = array(200);
  $_v___counter=0;  
  $_v___diff = 0;
  $_v___diff_2 = "";
  $_v___db_data_paket  = mysqli_query($koneksi,"select * from $___nama_db_3 order by no");
  while ($_v___data = mysqli_fetch_array($_v___db_data_paket)){
    $_v___isi_paket[$_v___counter] = date_create($_v___data['isi_paket']);
    $_v___diff=date_diff($_v___isi_paket[$_v___counter],$_tanggal_now_edit);
    $_v___diff_2 = $_v___diff->format("%a");
    $_v___calc_paket[$_v___counter] = 29 - $_v___diff_2;
    $_v___counter++;
  }
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
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="icon" type="image/png" href="/dist/img/ikon_jadi_deh.png"> -->
  <link rel="icon" type="image/png" href="dist/img/oke.png">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Top Navigation</title>
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <style>
    .color-palette {
      border-radius: 15px;
      height: 35px;
      line-height: 35px;
      text-align: center;
      padding-right: 0;
      font-size:90%;
    }
    
    .color-palette-set {
      margin-bottom: 15px;
    }
  </style>


</head>
<script type='text/javascript'>
//<![CDATA[
msg = " SMART NITRO ";
msg = " ||| Dashboard |||" + msg;pos = 0;
function scrollMSG() {
document.title = msg.substring(pos, msg.length) + msg.substring(0, pos); pos++;
if (pos > msg.length) pos = 0
window.setTimeout("scrollMSG()",100);
}
scrollMSG();
//]]>
</script>


















<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-xl bg-white navbar-light">
    <div class="container">
      <a href="/teknisi_290593_1.php"  class="navbar-brand">
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
            <a href="/teknisi_290593_1.php" class="nav-link"><i class="fa fa-home"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="/teknisi_290593_2.php" class="nav-link"><i class="fa fa-object-group"></i> Rangkum Langsung</a>
          </li>
          <li class="nav-item">
            <a href="/teknisi_290593_3.php" class="nav-link"><i class="fa fa-object-group"></i> Paket Data</a>
          </li>
          <li class="nav-item">
            <a href="/teknisi_290593_4.php" class="nav-link"><i class="fa fa-edit"></i> TOP Up</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-cog"></i> Setting</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/teknisi_290593_user.php" class="dropdown-item"><i class="fa fa-user-plus"></i> User Access</a></li>
              <li><a href="/teknisi_290593_set.php" class="dropdown-item"><i class="fa fa-cog"></i> Setting Server</a></li>
              <li><a href="/logout.php" class="dropdown-item"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->

    </div>
  </nav>
  <!-- /.navbar -->

<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->
<!-- ========================================================================================================  -->















  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-1">
          <div class="col-6">
            <!-- <h1 class="m-0 text-dark">Dashboard <small>Selasa, 1 Sept 2020</small></h1> -->
            <h1 class="m-0 text-dark">Dashboard Teknisi</h1>
          </div><!-- /.col -->
<!--           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div> -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">






        <div class="row">
          <div class="col-md-12 col-sm-12  col-lg-6">
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="card-title">Status Running <small><i class="fa fa-arrow-circle-right"></i>
                  <b>                    
                    <?php
                      echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;
                    ?>
                  </b></small></h5>
              </div>
              <div class="card-footer">
                <div class="row">
                  <?php
                    for($for_1 = 0;$for_1<$_a___counter;$for_1++){
                      if($_a___status_run[$for_1] == 1){   ?>
                        <div class="col-3">
                          <div class="color-palette-set">
                            <div class="bg-success color-palette"><a href="/teknisi_290593_2.php?id=<?php echo $_a___no[$for_1]; ?>&day=today"><small><?php echo $_a___nama_outlet[$for_1] ?></small></a></div>
                          </div>
                        </div>
                      <?php
                      } 
                      else{
                      ?>
                        <div class="col-3">
                          <div class="color-palette-set">
                            <div class="bg-danger color-palette"><a href="/teknisi_290593_2.php?id=<?php echo $_a___no[$for_1]; ?>&day=today"><small><?php echo $_a___nama_outlet[$for_1] ?></small></a></div>
                          </div>
                        </div>

                      <?php
                      }
                      ?>




                  <?php
                    }
                  ?>
                  <!-- /.col -->

                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-12 col-sm-12  col-lg-6">
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="card-title">Tabel Perolehan <small><i class="fa fa-arrow-circle-right"></i>
                  <b>
                    <?php
                      echo $_dash_name_day.", ".$_dash_name_tanggal." ".$_dash_name_month." ".$_dash_name_tahun;
                    ?>
                  </b></small></h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: center;vertical-align: middle">Outlet</th>
                          <th style="text-align: center;vertical-align: middle">Ban</th>
                          <th style="text-align: center;vertical-align: middle">Time</th>
                          <th style="text-align: center;vertical-align: middle">Last</th>
                          <th style="text-align: center;vertical-align: middle">Day</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          for($for_1 = 0;$for_1<$_a___counter;$for_1++){   ?>
                          <tr>
                            <td style="vertical-align: middle"><a href="/teknisi_290593_2.php?id=<?php echo $_a___no[$for_1]; ?>&day=today"><?php echo substr($_a___nama_outlet[$for_1],0,8);?></a></td>
                            <td style="text-align: center;vertical-align: middle"><small><?php echo $_a___ban_tambah_motor[$for_1]+$_a___ban_isi_baru_motor[$for_1]+$_a___ban_tambah_mobil[$for_1]+$_a___ban_isi_baru_mobil[$for_1];?></small></td>
                            <td style="text-align: center;vertical-align: middle"><small><?php echo substr($_a___real_waktu[$for_1],0,5);?></small></td>
                            <td style="text-align: center;vertical-align: middle"><small><?php echo $_a___real_waktu_2[$for_1];?></small></td>
                            <td style="text-align: center;vertical-align: middle"><small><?php echo $_v___calc_paket[$for_1];?></small></td>
                          </tr>
                        <?php    
                          }
                        ?>
                      </tbody>                  
                </table>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>





        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>





</body>
</html>



<script>
    //Date range picker with time picker
  $(function () {
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true ,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });



</script>




<?php
    }
    else{
        header("location:/login.php");
    }
?>
