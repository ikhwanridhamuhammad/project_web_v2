

  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>




  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>



  