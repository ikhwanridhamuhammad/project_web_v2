  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_setting_outlet.php';
  include_once './m_navbar.php';
  //===============================================================================================
  
  //===============================================================================================
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-cogs"></i>&nbsp;Setting Outlet</h5>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form method="POST" onsubmit="return validasi(this)" >
          <div class="row text-sm">
            <div class="col-12">
              <div class="card">
                  <table id="example2" class="table table-striped table-bordered table-valign-middle">
                    <thead>
                      <tr>
                        <th style="text-align: center;vertical-align: middle ; width: 6%">No</th>
                        <th style="text-align: center;vertical-align: middle">Outlet Detail</th>
                        <th style="text-align: center;vertical-align: middle ; width: 10%">Aksi</th>
                      </tr>
                    </thead> 




                    <tbody>
                      <?php 
                        for($_free_counter = 0; $_free_counter < $_so_counter_outlet ; $_free_counter++){ ?>
                      <tr>
                        <td style="text-align: center">
                          <?php echo $_free_counter+1; ?>
                        </td>
                        <td>
                          <b><?php echo $_so_outlet[$_free_counter]; ?>
                          <i class="fas fa-long-arrow-alt-right"></i>
                          <?php echo $_so_alamat[$_free_counter]; ?></b>
                          <br>
                          <i class="fas fa-motorcycle"></i>
                          Tambal/Tambah/Baru
                          <br>
                          <?php echo "(".$_so_hrg_tambal_motor[$_free_counter]."/".$_so_hrg_tambah_motor[$_free_counter]."/".$_so_hrg_isi_baru_motor[$_free_counter].")"; ?>
                          <br>
                          <i class="fas fa-car"></i>
                          Tambal/Tambah/Baru
                          <br>
                          <?php echo "(".$_so_hrg_tambal_mobil[$_free_counter]."/".$_so_hrg_tambah_mobil[$_free_counter]."/".$_so_hrg_isi_baru_mobil[$_free_counter].")"; ?>
                        </td>
                        <td style="text-align: center">
                          <a href="./hiperlink/hip_so.php?outlet=<?php echo $_so_outlet[$_free_counter]; ?>">
                          <span class="badge badge-warning">Edit</span></a>
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
        </form>
      </div>




    </section>
  </div>















  

  <?php
  include_once './m_footer.php';
  ?>



  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>