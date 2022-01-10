  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_riwayat_absensi_m.php';
  include_once './m_navbar.php';
  //===============================================================================================
  
  //===============================================================================================
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-calendar-alt"></i>&nbsp;Riwayat Absensi</h5>

            <!-- <br>
            <h5 class="m-0 text-dark">
              <?php echo $_ses_ra_outlet; ?></h5><br>
            <h5 class="m-0 text-dark">
              <?php echo $_ses_ra_karyawan; ?></h5><br> -->

          </div>
          <div class="col-6 text-right">
            <a href="./hiperlink/hip_ra_m.php"><i class="fas fa-long-arrow-alt-left"></i>&nbsp;back</a>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row text-sm">
          <div class="col-12">
            <div class="card">
                <table  id="example2" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th style="text-align: center ; width:10%">No</th>
                    <th style="text-align: center">Detail Absen</th>
                    <th style="text-align: center ; width:15%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php for($__ra_free_counter = 0;$__ra_free_counter < $__ra_counter; $__ra_free_counter++){ ?>
                    <tr>
                      <td style="text-align: center"><?php echo $__ra_free_counter+1; ?></td>

                      <td>
                        <b>
                        <a href="./hiperlink/hip_ra_karyawan_m.php?nama=<?php echo $__ra_nama_karyawan[$__ra_free_counter]; ?>"><?php echo $__ra_nama_karyawan[$__ra_free_counter]; ?></a>
                        &nbsp;
                        <i class="fas fa-long-arrow-alt-right"></i>
                        &nbsp;&nbsp;
                        <a href="./hiperlink/hip_ra_outlet_m.php?outlet=<?php echo $__ra_nama_outlet[$__ra_free_counter]; ?>"><?php echo $__ra_nama_outlet[$__ra_free_counter]; ?></a></b>
                        <br>
                        
                        <?php echo $__ra_tanggal_3[$__ra_free_counter]; ?>
                        <i class="fas fa-long-arrow-alt-right"></i>
                        <?php echo $__ra_nama_shift[$__ra_free_counter]; ?>
                          <?php if($__ra_check_telat[$__ra_free_counter] == 1){ ?>
                            <span class="badge badge-danger">Telat</span>
                          <?php } ?>
                        <br>
                        <?php echo $__ra_check_in_p[$__ra_free_counter]; ?>
                        
                        <i class="fas fa-long-arrow-alt-right"></i>
                        
                        <?php echo $__ra_check_out_p[$__ra_free_counter]; ?>
                      </td>



                      <td style="text-align: center">
                        <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$__ra_free_counter; ?>">
                        <span class="badge badge-info">View</span></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>


<?php for($_free_counter = 0; $_free_counter < $__ra_counter ; $_free_counter++){ ?>
      <div class="modal fade" id="<?php echo "modal".$_free_counter; ?>">
        <div class="modal-dialog">


              <div class="card bg-light">
                <div class="card-header bg-info text-muted text-center border-bottom-0">
                  <b>Detail Absensi</b>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-8">
                      <h2 class="lead"><b><?php echo $__ra_nama_karyawan[$_free_counter]; ?></b></h2>
                      <ul class="ml-2 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                          <b>&nbsp;Lokasi Outlet: </b> <?php echo $__ra_nama_outlet[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-2 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                          <b>&nbsp;Tanggal: </b> <?php echo $__ra_tanggal_3[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-2 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                          <b>&nbsp;SHIFT : </b> <?php echo $__ra_nama_shift[$_free_counter]; ?>&nbsp;&nbsp;
                                        <?php if($__ra_check_telat[$_free_counter] == 1){ ?>
                                            <span class="badge badge-danger">Telat</span>
                                        <?php } ?><br/>
                          <b>&nbsp;Shift IN: </b> <?php echo $__ra_check_in_p[$_free_counter]; ?><br/>
                          <b>&nbsp;Shift Out : </b> <?php echo $__ra_check_out_p[$_free_counter]; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-2 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>
                          <b>&nbsp;OMSET : </b>
                          
                          <?php echo "Rp ".number_format($__ra_omset[$_free_counter],2,',','.'); ?>
                        </li>
                      </ul>
                      <ul class="ml-2 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bolt"></i></span>
                          <b>&nbsp;KWH Akhir : </b><?php echo $__ra_kwh[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-2 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-motorcycle"></i></span>
                          <b>&nbsp;Tambal Ban : </b> <?php echo $__ra_tambal_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;Promo : </b> <?php echo $__ra_promo_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;Error : </b> <?php echo $__ra_error_motor[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul> 
                      <ul class="ml-2 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-car"></i></span>
                          <b>&nbsp;Tambal Ban : </b> <?php echo $__ra_tambal_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;Promo : </b> <?php echo $__ra_promo_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;Error : </b> <?php echo $__ra_error_mobil[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-2 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-open-text"></i></span>
                          <b>&nbsp;Keterangan : </b><?php echo $__ra_information[$_free_counter]; ?>
                        </li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <div class="row">
                        <label><small><b>Check In :</b></small></label>
                      </div>
                      <div class="row text-center">
                        <!--<img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> -->
                        <img src="<?php echo $__ra_picture_in[$_free_counter]; ?>" class="product-image" alt="Product Image"> 
                      </div>
                      <div class="row">
                        <label><small><b>Check Out :</b></small></label>
                      </div>
                      <div class="row text-center">
                        <!--<img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> -->
                        <?php if($__ra_check_out_p[$_free_counter] != "00:00:00"){ ?>
                            <img src="<?php echo $__ra_picture_out[$_free_counter]; ?>" class="product-image" alt="Product Image"> 
                        <?php } ?>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>

                <div class="card-footer text-right">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
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
