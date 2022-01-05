  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>

  <?php 
  include_once './program/program_dashboard.php';
  include_once './navbar.php';
  include_once './sidebar.php';
  //===============================================================================================
  
  //===============================================================================================
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard Today</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row text-sm">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4><b>
                  <?php 
                    echo $____dash_counter_status; 
                  ?>
                </b></h4>
                <!-- <h3>32</h3> -->

                <p>Outlet Buka</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-home"></i>
              </div>
              <a href="./dashboard_detail.php" class="small-box-footer text-sm">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <h4><b><?php echo $___dash_counter_data - $____dash_counter_status; ?></b></h4>

                <p>Outlet Tutup</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-home"></i>
              </div>
              <a href="./dashboard_detail.php" class="small-box-footer text-sm">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $___89_total = 0;
                  for($_free_counter = 0; $_free_counter < $____dash_counter_data ; $_free_counter++){
                    $___89_total += $____total_omset_outlet[$_free_counter];
                  }
                ?>
                <h4><b><small><?php echo "Rp "; ?></small><?php echo number_format($___89_total,0,',','.'); ?></b></h4>
                <p>Omset Smart Nitro</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <a href="./dashboard_detail.php" class="small-box-footer text-sm">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4><b><?php echo $_____dash_counter_data; ?></b></h4>

                <p>Karyawan Absensi</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-person-add"></i>
              </div>
              <a href="./dashboard_detail.php" class="small-box-footer text-sm">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row text-sm">
          <?php if($____dash_counter_data <10) { ?>
          <div class="col-7">
          <?php } ?>
          <?php if($____dash_counter_data >=10) { ?>
          <div class="col-12">
          <?php } ?>
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"><b>Omset Semua Outlet</b></h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="mr-auto d-flex flex-column text-left">
                    <span class="text-info">
                      <b><?php echo "Rp ".number_format($___89_total,2,',','.'); ?>
                    </span>
                    <span class="text-muted">Total Omset</span></b>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> <?php echo "Rp ".number_format($____total_max_omset,2,',','.'); ?>
                    </span>
                    <span class="text-muted">Omset Tertinggi</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="areaChart" height="200"></canvas>
                </div>

              </div>
            </div>
          </div>
          <?php if($____dash_counter_data <10) { ?>
          <div class="col-5">
          <?php } ?>
          <?php if($____dash_counter_data >=10) { ?>
          <div class="col-12">
          <?php } ?>
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
        <div class="row">
        </div>
      </div>
    </section>
  </div>















  

  <?php
  include_once './footer.php';
  ?>



  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>
