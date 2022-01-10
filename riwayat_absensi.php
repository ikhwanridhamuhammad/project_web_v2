

  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>

  
  <?php 
  include_once './program/program_riwayat_absensi.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-calendar-alt"></i>&nbsp;Riwayat Absensi</h1>
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
                    <div class="col-2">
                      <label>&nbsp;&nbsp;Tanggal Mulai :</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-calendar-minus fa-sm"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" name="date_1" id="date_1" 
                              value="<?php echo $__ra_value_date_1; ?>" data-date-end-date="0d">
                      </div>
                    </div>
                    <div class="col-2">
                      <label>&nbsp;&nbsp;Tanggal Selesai :</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-calendar-minus fa-sm"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" name="date_2" id="date_2"
                          value="<?php echo $__ra_value_date_2; ?>" data-date-end-date="0d">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group mb-1">
                        <label>&nbsp;&nbsp;Karyawan :</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_karyawan_input">
                          <!-- <option selected="selected">ALL</option> -->
                          <?php for($_ra_free_counter = 0;$_ra_free_counter < $_ra_counter_karyawan;$_ra_free_counter++){ 
                            if($_ses_ra_karyawan == $_ra_karyawan[$_ra_free_counter]){ ?>
                              <option selected="selected"><?php echo $_ra_karyawan[$_ra_free_counter]; ?></option>
                            <?php } 
                            if($_ses_ra_karyawan != $_ra_karyawan[$_ra_free_counter]){ ?>
                            <option><?php echo $_ra_karyawan[$_ra_free_counter]; ?></option>
                          <?php }} ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Outlet :</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_outlet_input">
                          <?php for($_ra_free_counter = 0;$_ra_free_counter < $_ra_counter_outlet;$_ra_free_counter++){ 
                            if($_ses_ra_outlet == $_ra_outlet[$_ra_free_counter]){ ?>
                              <option selected="selected"><?php echo $_ra_outlet[$_ra_free_counter]; ?></option>
                            <?php } 
                            if($_ses_ra_outlet != $_ra_outlet[$_ra_free_counter]){ ?>
                            <option><?php echo $_ra_outlet[$_ra_free_counter]; ?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                          <div class="input-group date">
                            <input type="submit" name="btn_filter" value="FILTER" class="btn btn-info btn-round btn-block">
                          </div>

                      </div>
                    </div>




                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">


                  <div class="row">
                    <div class="col-12">
                      <table id="example2" class="table table-bordered table-striped " >
                        <thead>
                          <tr>
                            <th style="text-align: center;vertical-align: middle">No</th>
                            <th style="text-align: center;vertical-align: middle">Nama</th>
                            <th style="text-align: center;vertical-align: middle">Tanggal</th>
                            <th style="text-align: center;vertical-align: middle">Outlet</th>
                            <th style="text-align: center;vertical-align: middle">SHIFT</th>
                            <th style="text-align: center;vertical-align: middle">Check In</th>
                            <th style="text-align: center;vertical-align: middle">Check Out</th>
                            <th style="text-align: center;vertical-align: middle">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php for($__ra_free_counter = 0;$__ra_free_counter < $__ra_counter; $__ra_free_counter++){ ?>
                            <tr>
                              <td style="text-align: center"><?php echo $__ra_free_counter+1; ?></td>
                              <td><?php echo $__ra_nama_karyawan[$__ra_free_counter]; ?></td>
                              <td style="text-align: center"><?php echo $__ra_tanggal[$__ra_free_counter]; ?></td>
                              <td style="text-align: center"><?php echo $__ra_nama_outlet[$__ra_free_counter]; ?></td>
                              <td style="text-align: center"><?php echo $__ra_nama_shift[$__ra_free_counter]; ?>&nbsp;&nbsp;
                                        <?php if($__ra_check_telat[$__ra_free_counter] == 1){ ?>
                                            <span class="badge badge-danger">Telat</span>
                                        <?php } ?>
                              </td>
                              <td style="text-align: center"><?php echo $__ra_check_in_p[$__ra_free_counter]; ?></td>
                              <td style="text-align: center"><?php echo $__ra_check_out_p[$__ra_free_counter]; ?></td>
                              <td style="text-align: center">
                                <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$__ra_free_counter; ?>">
                                <span class="badge badge-info">View</span></a>
                                <a href="./hiperlink/hip_ra.php?id=<?php echo $__ra_presence_id[$__ra_free_counter]; ?>">
                                <span class="badge badge-warning">Edit</span></a>
                              </td>
                            </tr>


                          <?php } ?>
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
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                          <b>&nbsp;&nbsp;Lokasi Outlet: </b> <?php echo $__ra_nama_outlet[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                          <b>&nbsp;&nbsp;Tanggal: </b> <?php echo $__ra_tanggal_2[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                          <b>&nbsp;&nbsp;SHIFT : </b> <?php echo $__ra_nama_shift[$_free_counter]; ?>&nbsp;&nbsp;
                                        <?php if($__ra_check_telat[$_free_counter] == 1){ ?>
                                            <span class="badge badge-danger">Telat</span>
                                        <?php } ?><br/>
                          <b>&nbsp;&nbsp;Shift IN: </b> <?php echo $__ra_check_in_p[$_free_counter]; ?><br/>
                          <b>&nbsp;&nbsp;Shift Out : </b> <?php echo $__ra_check_out_p[$_free_counter]; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>
                          <b>&nbsp;&nbsp;Report OMSET : </b><?php echo "Rp ".number_format($__ra_omset[$_free_counter],2,',','.'); ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bolt"></i></span>
                          <b>&nbsp;&nbsp;KWH Akhir : </b><?php echo $__ra_kwh[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-motorcycle"></i></span>
                          <b>&nbsp;&nbsp;Tambal Ban : </b> <?php echo $__ra_tambal_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Promo : </b> <?php echo $__ra_promo_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Error : </b> <?php echo $__ra_error_motor[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul> 
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-car"></i></span>
                          <b>&nbsp;&nbsp;Tambal Ban : </b> <?php echo $__ra_tambal_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Promo : </b> <?php echo $__ra_promo_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Error : </b> <?php echo $__ra_error_mobil[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-open-text"></i></span>
                          <b>&nbsp;&nbsp;Keterangan : </b><?php echo $__ra_information[$_free_counter]; ?>
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
  include_once './footer.php';
  ?>




  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>

