  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_data_smart_nitro.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-random"></i>&nbsp;Data Smart Nitro</h5>
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
                    <div class="col-6">
                      <label>&nbsp;&nbsp;Tanggal :</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-calendar-minus fa-sm"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" name="date_dsn_1" id="date_dsn_1" 
                              value="<?php echo $_dsn_value_date; ?>" data-date-end-date="0d">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Outlet :</label>
                        <select class="form-control select2" onchange="location = this.value;" style="width: 100%;" name="nama_outlet_input">
                          <?php for($_free_counter = 0;$_free_counter < $_dsn_counter_outlet;$_free_counter++){ 
                            if($_ses_dsn_outlet == $_dsn_outlet[$_free_counter]){ ?>
                              <option value="./hiperlink/hip_dsn.php?outlet=<?php echo $_dsn_outlet[$_free_counter]; ?>" selected="selected"><?php echo $_dsn_outlet[$_free_counter]; ?></option>
                            <?php } 
                            if($_ses_dsn_outlet != $_dsn_outlet[$_free_counter]){ ?>
                            <option value="./hiperlink/hip_dsn.php?outlet=<?php echo $_dsn_outlet[$_free_counter]; ?>"><?php echo $_dsn_outlet[$_free_counter]; ?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Shift :</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_shift_input">
                          <!-- <option selected="selected">ALL</option> -->
                          <?php for($_free_counter = 0;$_free_counter < $_dsn_counter_shift;$_free_counter++){ 
                            if($_ses_dsn_shift == $_dsn_shift[$_free_counter]){ ?>
                              <option selected="selected"><?php echo $_dsn_shift[$_free_counter]; ?></option>
                            <?php } 
                            if($_ses_dsn_shift != $_dsn_shift[$_free_counter]){ ?>
                            <option><?php echo $_dsn_shift[$_free_counter]; ?></option>
                          <?php }} ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                          <div class="input-group date">
                            <input type="submit" name="btn_filter_dsn" value="FILTER" class="btn btn-info btn-round btn-block">
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
                      <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"><i class="fas fa-home"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Outlet : <b><?php echo $_ses_dsn_outlet; ?></b></span>
                          <span class="info-box-text">Shift : <b><?php echo $_ses_dsn_shift." (".$_dsn_shift_time_in[$_dsn_pilihan_shift]." - ".$_dsn_shift_time_out[$_dsn_pilihan_shift].")"; ?></b></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="info-box mb-3 bg-maroon">
                        <span class="info-box-icon"><i class="fas fa-motorcycle"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Tambah Angin : <b><?php echo $_home_tot_n1; ?> Ban</b></span>
                          <span class="info-box-text">Isi Baru : <b><?php echo $_home_tot_n3; ?> Ban</b></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="info-box mb-3 bg-navy">
                        <span class="info-box-icon"><i class="fas fa-car"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Tambah Angin : <b><?php echo $_home_tot_n2; ?> Ban</b></span>
                          <span class="info-box-text">Isi Baru : <b><?php echo $_home_tot_n4; ?> Ban</b></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row mt-2">
                    <div class="col-12">

                      <div class="position-relative mb-4">
                        <canvas id="areaChart" height="290"></canvas>
                      </div>
                    </div>
                    <div class="col-12"> 
                      <table id="example2" class="table  table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th rowspan="2" style="text-align: center;vertical-align: middle">No</th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle">Time</th>
                            <th colspan="2" style="text-align: center;vertical-align: middle">Tambah Angin</th>
                            <th colspan="2" style="text-align: center;vertical-align: middle">Isi Baru</th>
                          </tr>
                          <tr>
                            <th style="text-align: center;vertical-align: middle">Motor <i class="fa fa-motorcycle"></i></th>
                            <th style="text-align: center;vertical-align: middle">Mobil <i class="fa fa-car"></i></th>
                            <th style="text-align: center;vertical-align: middle">Motor <i class="fa fa-motorcycle"></i></th>
                            <th style="text-align: center;vertical-align: middle">Mobil <i class="fa fa-car"></i></th>
                          </tr>
                        </thead> 
                            <tbody>
                              <?php
                                for($for_1 = $_h___counter-1;$for_1>-1;$for_1--){   ?>
                                <tr>
                                  <td style="text-align: center"><?php echo $for_1;?></td>
                                  <td style="text-align: center"><b><?php echo $_h___date[$for_1];?></b></td>
                                  <td style="text-align: center"><?php echo $_h___tambah_motor[$for_1];?></td>
                                  <td style="text-align: center"><?php echo $_h___tambah_mobil[$for_1];?></td>
                                  <td style="text-align: center"><?php echo $_h___isi_baru_motor[$for_1];?></td>
                                  <td style="text-align: center"><?php echo $_h___isi_baru_mobil[$for_1];?></td>
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




    </section>
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
