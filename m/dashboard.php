  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_dashboard.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard Today</h5>
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
                <span class="info-box-number"><?php echo $___dash_counter_data - $____dash_counter_status; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-credit-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Omset Smart Nitro</span>
                <?php
                  $___89_total = 0;
                  for($_free_counter = 0; $_free_counter < $____dash_counter_data ; $_free_counter++){
                    $___89_total += $____total_omset_outlet[$_free_counter];
                  }
                ?>
                <span class="info-box-number"><small><?php echo "Rp "; ?></small><?php echo number_format($___89_total,0,',','.'); ?><small><?php echo " -"; ?></small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-user-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Karyawan Absensi</span>
                <span class="info-box-number"><?php echo $_____dash_counter_data; ?></span>
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
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Nama Outlet</th>
                    <th style="text-align: center">Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      for($_free_counter = 0; $_free_counter < $____dash_counter_data ; $_free_counter++){
                        echo "<tr>";

                          if($____status_outlet[$_free_counter] == 1){ ?>
                            <td style="text-align: center"><span class="badge badge-success">ON</span></td>
                            <?php
                          }
                          else{ ?>
                            <td style="text-align: center"><span class="badge badge-danger">OFF</span></td>
                            <?php
                          }
                          echo "<td><b>";
                          echo $___dash_nama[$_free_counter]." "; ?>
                                <small><span class="badge badge-warning"><?php echo $____dash_waktu[$_free_counter]." Menit"; ?></span></small>
                          <?php
                          echo "</b></td>"; ?>

                          <td style="text-align: center"><?php echo "Rp ".number_format($____total_omset_outlet[$_free_counter],0,',','.'); ?></td>
                          <?php


                        echo "</tr>";
                      }
                    ?>

                  </tbody>
                </table>
            </div>
          </div>
        </div>
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
