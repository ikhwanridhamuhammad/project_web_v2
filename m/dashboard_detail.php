  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_dashboard_detail.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;Dashboard Detail&nbsp;<small>- <b>Top Outlet</b></small>
            </h5>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fa fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>(1)</b> <?php echo $___deta_outlet[0];?></span>
                <span class="info-box-number"><?php echo "Rp ".number_format($___deta_omset[0],0,',','.')." ,-"; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-lime"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>(2)</b> <?php echo $___deta_outlet[1];?></span>
                <span class="info-box-number"><?php echo "Rp ".number_format($___deta_omset[1],0,',','.')." ,-"; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-orange"><i class="fa fa-check-square"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>(3)</b> <?php echo $___deta_outlet[2];?></span>
                <span class="info-box-number"><?php echo "Rp ".number_format($___deta_omset[2],0,',','.')." ,-"; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        </div>
        <div class="row text-sm">
          <div class="col-12">
            <div class="card">
                <table  id="example2" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Outlet Detail</th>
                    <th style="text-align: center">Omset (Rp)</th>
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
                          echo "<br>";

                          $nama1="";$nama2="";$nama3="";$nama4="";$nama5="";
                          $shift1="";$shift2="";$shift3="";$shift4="";$shift5="";
                          parse_str($____deta_karyawan[$_free_counter]);
                          parse_str($____deta_shift[$_free_counter]);
                          ?>
                          <!-- ========================================== -->
                            <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_isi; ?>">
                            <span class="badge badge-info"><?php echo $nama1.$shift1; ?></a></span>
                            <?php if(!empty($nama1)){$_free_isi++;} ?>
                            <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_isi; ?>">
                            <span class="badge badge-warning"><?php echo $nama2.$shift2; ?></a></span>
                            <?php if(!empty($nama2)){$_free_isi++;} ?>
                            <?php echo $nama3;?>
                            <span class="badge badge-info"><?php echo $shift3; ?></span>
                            <?php if(!empty($nama3)){$_free_isi++;} ?>
                            <?php echo $nama4;?>
                            <span class="badge badge-info"><?php echo $shift4; ?></span>
                            <?php if(!empty($nama4)){$_free_isi++;} ?>
                            <?php echo $nama5;?>
                            <span class="badge badge-info"><?php echo $shift5; ?></span>
                            <?php if(!empty($nama5)){$_free_isi++;} ?>

                          </td>
                          <td style="text-align: center"><?php echo number_format($____deta_omset[$_free_counter],0,',','.'); ?></td>

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


<?php for($_free_counter = 0; $_free_counter < $_deta_coounter ; $_free_counter++){ ?>
      <div class="modal fade" id="<?php echo "modal".$_free_counter; ?>">
        <div class="modal-dialog">


              <div class="card bg-light">
                <div class="card-header text-muted text-center border-bottom-0">
                  <b>Detail Absensi</b>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 text-center">
                      <h1 class="lead"><b><?php echo $_deta_nama_karyawan[$_free_counter]; ?></b></h1>
                    </div>
                    <div class="col-2"></div>
                  </div>
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 text-center">
                      <img src="<?php echo $_deta_picture_in[$_free_counter]; ?>" class="product-image" alt="Product Image"> 
                    </div>
                    <div class="col-2"></div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                          <b>Lokasi Outlet: </b> <?php echo $_deta_nama_outlet[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                          <b>Shift: </b> <?php echo $_deta_shift[$_free_counter]; ?>&nbsp;&nbsp;
                                        <?php if($_deta_shift_telat[$_free_counter] == 1){ ?>
                                            <span class="badge badge-danger">Telat</span>
                                        <?php } ?><br/>
                          <b>Shift In: </b> <?php echo $_deta_shift_in_p[$_free_counter]; ?><br/>
                          <b>Shift Out : </b> <?php echo $_deta_shift_out_p[$_free_counter]; ?><br/>
                          
                        </li>
                      </ul>
                    </div>
                    <div class="col-6">
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>
                          <b>Report OMSET : <br></b><?php echo "Rp ".number_format($_deta_omset[$_free_counter],2,',','.'); ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bolt"></i></span>
                          <b>KWH Akhir : </b><?php echo $_deta_kwh[$_free_counter]; ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-motorcycle"></i></span>
                          <b>Tambal Ban : </b> <?php echo $_deta_tambal_motor[$_free_counter]." Ban"; ?><br/>
                          <b>Promo : </b> <?php echo $_deta_promo_motor[$_free_counter]." Ban"; ?><br/>
                          <b>Error : </b> <?php echo $_deta_error_motor[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul>                      
                    </div>
                    <div class="col-6">
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-car"></i></span>
                          <b>Tambal Ban : </b> <?php echo $_deta_tambal_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>Promo : </b> <?php echo $_deta_promo_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>Error : </b> <?php echo $_deta_error_mobil[$_free_counter]." Ban"; ?><br/>
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
  include_once './m_footer.php';
  ?>



  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>
