<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->       
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->           
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs --> 
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="./plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- daterange picker -->   
  <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="./plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="./plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
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
<body class="hold-transition sidebar-mini layout-fixed ">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
    <ul class="navbar-nav">
    </ul>
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><span id="tanggalwaktu"></span></a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./logout.php" class="btn btn-secondary square-btn-adjust"><i class="fas fa-power-off"></i>&nbsp; &nbsp;Logout</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->


