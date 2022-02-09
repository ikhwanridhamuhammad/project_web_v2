  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>


  <?php 
  include_once './program/program_dashboard_detail.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard Detail</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h5 class="mb-2"><b>Top 4 Outlet</b></h5>
        <div class="row text-sm">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-purple">
              <span class="info-box-icon"><i class="fa fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo $___deta_outlet[0];?></span>
                <span class="info-box-number"><?php echo "Rp ".number_format($___deta_omset[0],0,',','.'); ?></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  1st First
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-lime">
              <span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo $___deta_outlet[1];?></span>
                <span class="info-box-number"><?php echo "Rp ".number_format($___deta_omset[1],0,',','.'); ?></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  2nd Second
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-orange">
              <span class="info-box-icon"><i class="fa fa-check-square"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo $___deta_outlet[2];?></span>
                <span class="info-box-number"><?php echo "Rp ".number_format($___deta_omset[2],0,',','.'); ?></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  3rd Third
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-fuchsia">
              <span class="info-box-icon"><i class="fa fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo $___deta_outlet[3];?></span>
                <span class="info-box-number"><?php echo "Rp ".number_format($___deta_omset[3],0,',','.'); ?></span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  4th Fourth
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <div class="row  text-sm">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><b>Detail Omset</b></h5>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">Status</th>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">Nama Outlet</th>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">Karyawan</th>
                      <th colspan="2" style="text-align: center;vertical-align: middle">Total Ban</th>
                      <th rowspan="2" style="text-align: center;vertical-align: middle">Total Omset</th>
                    </tr>
                    <tr>
                      <th style="text-align: center;vertical-align: middle"><i class="fa fa-motorcycle"></i></th>
                      <th style="text-align: center;vertical-align: middle"><i class="fa fa-car"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $_free_isi = 0;
                      for($_free_counter = 0; $_free_counter < $____deta_counter ; $_free_counter++){
                        echo "<tr>";
                          //==========================================
                          if($____deta_status[$_free_counter] == 1){ ?>
                            <td style="text-align: center"><span class="badge badge-success">ON</span></td>
                            <?php
                          }
                          else{ ?>
                            <td style="text-align: center"><span class="badge badge-danger">OFF</span></td>
                            <?php
                          }
                          // ==========================================
                          echo "<td>";
                          echo "<b>".$____deta_outlet[$_free_counter]."</b>"." - "."<span class='badge badge-warning'><small><b>".$____deta_waktu[$_free_counter]." Menit"."</b></small></span>"; ?>
                          <?php
                          echo "</td>";
                          $nama1="";$nama2="";$nama3="";$nama4="";$nama5="";
                          $shift1="";$shift2="";$shift3="";$shift4="";$shift5="";
                          parse_str($____deta_karyawan[$_free_counter]);
                          parse_str($____deta_shift[$_free_counter]);
                          ?>
                          <!-- ========================================== -->
                          <td style="text-align: center">
                            <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_isi; ?>">
                            <span class="badge badge-info"><?php echo $nama1.$shift1; ?></a></span>
                            <?php if(!empty($nama1)){$_free_isi++;} ?>
                            <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_isi; ?>">
                            <span class="badge badge-warning"><?php echo $nama2.$shift2; ?></a></span>
                            <?php if(!empty($nama2)){$_free_isi++;} ?>
                            <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_isi; ?>">
                            <span class="badge badge-info"><?php echo $nama3.$shift3; ?></a></span>
                            <?php if(!empty($nama3)){$_free_isi++;} ?>
                            
                            
                            
                            <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_isi; ?>">
                            <span class="badge badge-warning"><?php echo $nama4.$shift4; ?></a></span>
                            <?php if(!empty($nama4)){$_free_isi++;} ?>
                            <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_isi; ?>">
                            <span class="badge badge-warning"><?php echo $nama5.$shift5; ?></a></span>
                            <?php if(!empty($nama5)){$_free_isi++;} ?>


                

                          </td>
                          <td style="text-align: center"><?php echo $____deta_total_motor[$_free_counter]; ?></td>
                          <td style="text-align: center"><?php echo $____deta_total_mobil[$_free_counter]; ?></td>
                          <td style="text-align: center"><?php echo "Rp ".number_format($____deta_omset[$_free_counter],0,',','.'); ?></td>

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
      </div>
<?php for($_free_counter = 0; $_free_counter < $_deta_coounter ; $_free_counter++){ ?>
      <div class="modal fade" id="<?php echo "modal".$_free_counter; ?>">
        <div class="modal-dialog">


              <div class="card bg-light">
                <div class="card-header text-muted text-center border-bottom-0">
                  <b>Detail Absensi</b>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-6">
                      <h2 class="lead"><b><?php echo $_deta_nama_karyawan[$_free_counter]; ?></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                          <b>&nbsp;&nbsp;Lokasi Outlet: </b> <?php echo $_deta_nama_outlet[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                          <b>&nbsp;&nbsp;Shift: </b> <?php echo $_deta_shift[$_free_counter]; ?><br/>
                          <b>&nbsp;&nbsp;Shift IN: </b> <?php echo $_deta_shift_in[$_free_counter]; ?><br/>
                          <b>&nbsp;&nbsp;Shift Out : </b> <?php echo $_deta_shift_out[$_free_counter]; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>
                          <b>&nbsp;&nbsp;Report OMSET : </b><?php echo "Rp ".number_format($_deta_omset[$_free_counter],2,',','.'); ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bolt"></i></span>
                          <b>&nbsp;&nbsp;KWH Akhir : </b><?php echo $_deta_kwh[$_free_counter]; ?>
                        </li>
                      </ul>
                    </div>
                    <div class="col-6 text-center">
                      <!--<img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image">-->
                      <img src="<?php echo $_deta_picture_in[$_free_counter]; ?>" class="product-image" alt="Product Image"> 
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-motorcycle"></i></span>
                          <b>&nbsp;&nbsp;Tambal Ban : </b> <?php echo $_deta_tambal_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Promo : </b> <?php echo $_deta_promo_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Error : </b> <?php echo $_deta_error_motor[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul>                      
                    </div>
                    <div class="col-6">
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-car"></i></span>
                          <b>&nbsp;&nbsp;Tambal Ban : </b> <?php echo $_deta_tambal_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Promo : </b> <?php echo $_deta_promo_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Error : </b> <?php echo $_deta_error_mobil[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-open-text"></i></span>
                          <b>&nbsp;&nbsp;Keterangan : </b><?php echo $_deta_information[$_free_counter]; ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<?php } ?>
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

