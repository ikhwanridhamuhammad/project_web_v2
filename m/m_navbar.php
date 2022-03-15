<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->       
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->           
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs --> 
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- daterange picker -->   <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<script type='text/javascript'>
//<![CDATA[
msg = " SMART NITRO ";
msg = " ||| MIROVTECH |||" + msg;pos = 0;
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
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a href="./dashboard.php"  class="navbar-brand">
        <img src="../dist/img/sn10_edit.png" alt="AdminLTE Logo" class="thumbnail-image"
             style="opacity: 1">
      </a>
      
      <button class="navbar-toggler order-1 ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="./dashboard.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Dashboard Today</a></li>
              <li><a href="./dashboard_detail.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Dashboard Detail</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./hiperlink/hip_ra_m.php" class="nav-link"><i class="fas fa-calendar-alt"></i> Riwayat Absensi</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-chart-line"></i> Pemasukan Outlet</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="./hiperlink/hip_po_sn_m.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Pemasukan Outlet SN</a></li>
              <li><a href="./hiperlink/hip_po_m.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Pemasukan Outlet Real</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-random"></i> Smart Nitro</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="./selisih_smart_nitro.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Selisih Smart Nitro</a></li>
              <li><a href="./hiperlink/hip_dsn_m.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Data Smart Nitro</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-cogs"></i> Master</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="./setting_outlet.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Setting Outlet</a></li>
              <li><a href="./setting_shift.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Setting Shift</a></li>
              <li><a href="./setting_user.php" class="dropdown-item"><i class="fa fa-arrow-alt-circle-right"></i> Setting User</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./logout.php" class="nav-link"><i class="fa fa-power-off"></i> Logout</a>
          </li>
        </ul>
      </div>


    </div>
  </nav>









