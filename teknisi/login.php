  <?php 
    error_reporting(0);
    ob_start();
    session_start();
    include_once '../program/database.php';
    include_once './program/global_var_run.php';
    if($_SESSION['admin_topi'])
    // if($__global_run == 1)
    {
        header("location:./index.php");
    }
    else
    {

  ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./index.php"><b>M I R O V T E C H</b><br><b>T E K N I S I</b>
    
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <p class="login-box-msg">Silahkan Login untuk Memulai</p>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email"  name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password"  name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
              </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login" >Login</button>
          </div>
          <div class="col-4">
              </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>




<?php
  
  $salt       = '$%DSuTyr47542@#&*!=QxR094{a911}+';

  if (isset($_POST['login'])) {

    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $userid=100;
    $password   = hash('sha256',$salt.$pass);

    $_so_query_user     = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND user_id = '$userid' ";
    $_so_result_user    = $__konek_absensi->query($_so_query_user); 
    $data               = $_so_result_user->fetch_assoc();
    $ketemu             = $_so_result_user->num_rows;
    if($ketemu >=1){
      $_SESSION["global_db_nama"] = $data['db_nama'];
      $_SESSION["global_user_id"] = $data['user_id'];
      $_SESSION["admin_topi"]          = $data['user_id'];
      include_once '../admin/program/session_mulai.php';
      header("location:./index.php");
    }
    else{ ?>

                <script type="text/javascript">
                    alert("Login Gagal Username dan Password Salah.. Silahkan Ulangi Lagi");
                </script>

<?php
    }


  }

?>

<?php
}
?>
