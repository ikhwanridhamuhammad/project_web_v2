  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/pro_dash_teknisi.php';
  include_once './t_navbar.php';
  //===============================================================================================
  
  //===============================================================================================
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard Teknisi</h5>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-home"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Outlet Buka</span>
                <span class="info-box-number">
                  <?php 
                    echo $____dash_counter_status; 
                  ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-home"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Outlet Tutup</span>
                <span class="info-box-number"><?php echo $____dash_counter_data - $____dash_counter_status; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        </div>
        <div class="row text-sm">
          <div class="col-12">
            <div class="card">
                <table  id="tabel_dash_1" class="table table-striped table-valign-middle">
                  <thead>
                  <tr> 
                    <th style="text-align: center; width:20%">Status</th>
                    <th style="text-align: center">Nama Outlet</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      for($_free_counter = 0; $_free_counter < $____dash_counter_data ; $_free_counter++){ ?>
                        <tr>
                          <td style="text-align: center">
                            <?php if($____status_outlet[$_free_counter] == 1){ ?>
                              <span class="badge badge-success">ON</span><br>
                            <?php } ?>  
                            <?php if($____status_outlet[$_free_counter] == 0){ ?>
                              <span class="badge badge-danger">OFF</span><br>
                            <?php } ?>  
                          </td>
                          <td><b>
                            <?php echo substr($____dash_name[$_free_counter],0,8)." "; ?>
                                <span class="badge badge-warning"><?php echo $____dash_waktu[$_free_counter]." Mnt"; ?></span>&nbsp;
                                <span class="badge badge-primary"><?php echo $____dash_waktu_ori[$_free_counter]; ?></span>&nbsp;
                                <span class="badge badge-warning">
                                    <a href="./hiperlink/hip_dsn.php?outlet=<?php echo $____dash_name[$_free_counter]; ?>">
                                  LIHAT</span>

                                <br>
                                <span class="badge badge-success"><?php echo $____dash_user_id[$_free_counter]; ?></span>&nbsp;
                                <span class="badge badge-primary"><i class="fas fa-motorcycle"></i>&nbsp;<?php echo $____total_ban_motor[$_free_counter]; ?></span>&nbsp;
                                <span class="badge badge-primary"><i class="fas fa-car"></i>&nbsp;<?php echo $____total_ban_mobil[$_free_counter]; ?></span>
                                &nbsp;<span class="badge badge-warning"><?php echo $____tanggal_isi_paket[$_free_counter]; ?></span>
                          </b></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>















  

  <?php
  include_once './t_footer.php';
  ?>



  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>
