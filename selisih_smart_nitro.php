

  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>



  <?php 
  include_once './program/program_selisih_smart_nitro.php';
  include_once './navbar.php';
  include_once './sidebar.php';
  //======================================================================
  //======================================================================
  //======================================================================
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-random"></i>&nbsp;Selisih Smart Nitro</h1>
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
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Tahun - Bulan:</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_tahun_input">
                          <?php for($_ssn_free_counter = 0;$_ssn_free_counter < $_ssn_counter_tahun_bulan;$_ssn_free_counter++){ 
                            if($_ses_ssn_tahun_bulan == $_ssn_tahun_bulan[$_ssn_free_counter]){ ?>
                              <option selected="selected"><?php echo $_ssn_tahun_bulan[$_ssn_free_counter]; ?></option>
                            <?php } 
                            if($_ses_ssn_tahun_bulan != $_ssn_tahun_bulan[$_ssn_free_counter]){ ?>
                            <option><?php echo $_ssn_tahun_bulan[$_ssn_free_counter]; ?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Outlet :</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_outlet_input">
                          <?php for($_ssn_free_counter = 0;$_ssn_free_counter < $_ssn_counter_outlet;$_ssn_free_counter++){ 
                            if($_ses_ssn_outlet == $_ssn_outlet[$_ssn_free_counter]){ ?>
                              <option selected="selected"><?php echo $_ssn_outlet[$_ssn_free_counter]; ?></option>
                            <?php } 
                            if($_ses_ssn_outlet != $_ssn_outlet[$_ssn_free_counter]){ ?>
                            <option><?php echo $_ssn_outlet[$_ssn_free_counter]; ?></option>
                          <?php }} ?>


                        </select>
                      </div>
                    </div>
                    <?php if($_ssn_counter_outlet <= 20) { ?>
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_selisih" value="FILTER" class="btn btn-info btn-round btn-block">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($_ssn_counter_outlet > 20) { ?>
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_sellisih_1" value="FILTER KE 1" class="btn btn-info btn-round btn-block">
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_sellisih_1" value="FILTER KE 2" class="btn btn-info btn-round btn-block">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div> 
                </div>
              </div>
              <div class="card">
                <div class="card-body">


                  <div class="row">
                    <div class="col-12">
                      <table  id="table_ssn" class="table table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Outlet</th>
                            <th style="text-align: center">Karyawan</th>
                            <th style="text-align: center">Tanggal</th>
                            <th style="text-align: center">Shift</th>
                            <th style="text-align: center">Omset S.Nitro</th>
                            <th style="text-align: center">Omset Total</th>
                            <th style="text-align: center">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php 
                                  for($_free_counter = 0; $_free_counter < $__ssn_counter ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                      <td><?php echo $__ssn_outlet[$_free_counter]; ?></td>
                                      <td><?php echo $__ssn_karyawan[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $__ssn_tanggal[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $__ssn_shift[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo "Rp ".number_format($__ssn_omset_2[$_free_counter],2,',','.'); ?></td>
                                      <td style="text-align: center"><?php echo "Rp ".number_format($__ssn_omset[$_free_counter],2,',','.'); ?></td>
                                      <td style="text-align: center">
                                          <?php if($__ssn_omset_detail[$_free_counter] == 1){ ?>
                                            <span class="badge badge-success">OK</span>
                                          <?php } ?>
                                          <?php if($__ssn_omset_detail[$_free_counter] == 0){ ?>
                                            <span class="badge badge-danger">SELISIH</span>
                                          <?php } ?>
                                            <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_counter; ?>">
                                            <span class="badge badge-info">View</span></a>

                                            <a href="./hiperlink/hip_ra_ssn.php?id=<?php echo $__ssn_presence_id[$_free_counter]; ?>">
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
              </div>
            </div>
            
          </div>
        </form>
      </div>


<?php for($_free_counter = 0; $_free_counter < $__ssn_counter ; $_free_counter++){ ?>
      <div class="modal fade" id="<?php echo "modal".$_free_counter; ?>">
        <div class="modal-dialog">


              <div class="card bg-light">
                <div class="card-header bg-info text-muted text-center border-bottom-0">
                  <b>Detail Absensi</b>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-8">
                      <h2 class="lead"><b><?php echo $__ssn_karyawan[$_free_counter]; ?></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                          <b>&nbsp;&nbsp;Lokasi Outlet: </b> <?php echo $__ssn_outlet[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                          <b>&nbsp;&nbsp;Tanggal: </b> <?php echo $__ssn_tanggal[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                          <b>&nbsp;&nbsp;SHIFT : </b> <?php echo $__ssn_shift[$_free_counter]; ?>&nbsp;&nbsp;
                                        <?php if($__ssn_check_telat[$_free_counter] == 1){ ?>
                                            <span class="badge badge-danger">Telat</span>
                                        <?php } ?><br/>
                          <b>&nbsp;&nbsp;Shift IN: </b> <?php echo $__ssn_time_in_presence[$_free_counter]; ?><br/>
                          <b>&nbsp;&nbsp;Shift Out : </b> <?php echo $__ssn_time_out_presence[$_free_counter]; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>
                          <b>&nbsp;&nbsp;Report OMSET : </b><?php echo "Rp ".number_format($__ssn_omset[$_free_counter],2,',','.'); ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>
                          <b>&nbsp;&nbsp;Smart Nitro OMSET : </b><?php echo "Rp ".number_format($__ssn_omset_2[$_free_counter],2,',','.'); ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>
                          <b>&nbsp;&nbsp;Selisih OMSET : </b>
                                        <?php if($__ssn_omset_detail[$_free_counter] == 0){ ?>
                                            <span class="badge badge-danger">
                                                <?php echo "Rp ".number_format($__ssn_omset_detail_2[$_free_counter],2,',','.'); ?>
                                            </span>
                                        <?php } ?>
                                        <?php if($__ssn_omset_detail[$_free_counter] == 1){ ?>
                                            <span class="badge badge-success">
                                                <?php echo "Rp ".number_format($__ssn_omset_detail_2[$_free_counter],2,',','.'); ?>
                                            </span>
                                        <?php } ?>
                                        
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bolt"></i></span>
                          <b>&nbsp;&nbsp;KWH Akhir : </b><?php echo $__ssn_kwh[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-motorcycle"></i></span>
                          <b>&nbsp;&nbsp;Tambal Ban : </b> <?php echo $__ssn_tambal_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Promo : </b> <?php echo $__ssn_promo_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Error : </b> <?php echo $__ssn_error_2_motor[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul> 
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-car"></i></span>
                          <b>&nbsp;&nbsp;Tambal Ban : </b> <?php echo $__ssn_tambal_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Promo : </b> <?php echo $__ssn_promo_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Error : </b> <?php echo $__ssn_error_2_mobil[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-open-text"></i></span>
                          <b>&nbsp;&nbsp;Keterangan : </b><?php echo $__ssn_keterangan[$_free_counter]; ?>
                        </li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <div class="row">
                        <label><small><b>Check In :</b></small></label>
                      </div>
                      <div class="row text-center">
                        <!--<img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> -->
                        <img src="<?php echo $__ssn_picture_in[$_free_counter]; ?>" class="product-image" alt="Product Image"> 
                      </div>
                      <div class="row">
                        <label><small><b>Check Out :</b></small></label>
                      </div>
                      <div class="row text-center">
                        <!--<img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> -->
                        <?php if($__ssn_time_out_presence[$_free_counter] != "00:00:00"){ ?>
                            <img src="<?php echo $__ssn_picture_out[$_free_counter]; ?>" class="product-image" alt="Product Image"> 
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
  include_once './footer.php';
  ?>





  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>
