<?php

    error_reporting(0);
    ob_start();
    
    session_start();


  $koneksi = new mysqli("localhost","mirovtec_ikhwan","ikhwan12345hifza","mirovtec_base_new");
  

  if($_SESSION['admin']){
        header("location:/index.php");
    }
  else{

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMART NITRO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>SMART NITRO</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <p class="login-box-msg">Silahkan Login untuk Memulai</p>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username"  name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>



<?php

if (isset($_POST['login'])) {

  $nama=$_POST['nama'];
  $pass=$_POST['pass'];

  $ambil = $koneksi->query("select * from tb_user where username='$nama' and password='$pass'");
  $data =$ambil->fetch_assoc();
  $ketemu = $ambil->num_rows;

  if($ketemu >=1){
                                    
    session_start();
    
    $_SESSION[username] = $data [username];
    $_SESSION[pass] = $data [password];
    $_SESSION[level] = $data [level_2];
    $_SESSION[nama_db] = $data [nama_db];
    
    
    if($data['level_2'] == "admin"){
        $_SESSION['admin'] = $data[id];
        $_SESSION['nama'] = $data[nama];
        $_SESSION['nama_client'] = $data[nama_client];
        $_SESSION['level'] = $data[level_2];
        $_SESSION['nama_db'] = $data [nama_db];
        $_SESSION['group_user'] = $data [group_user];
        $_SESSION['group_nitro'] = $data [group_nitro];
        header("location:/index.php");
        
    }
    if($data['level_2'] == "teknisi"){
        $_SESSION['admin'] = $data[id];
        $_SESSION['nama'] = $data[nama];
        $_SESSION['nama_client'] = $data[nama_client];
        $_SESSION['level'] = $data[level_2];
        $_SESSION['nama_db'] = $data [nama_db];
        $_SESSION['group_user'] = $data [group_user];
        $_SESSION['group_nitro'] = $data [group_nitro];
        header("location:/teknisi_290593_1.php");
        
    }
} 
else{
            ?>
                <script type="text/javascript">
                    alert("Login Gagal Username dan Password Salah.. Silahkan Ulangi Lagi");
                </script>
            <?php
        }


}
}
?>
