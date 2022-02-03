  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_topi'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/pro_data_sn_teknisi.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-random"></i>&nbsp;Data SN Teknisi</h5>
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
                    <div class="col-5 mb-0">
                      <label>&nbsp;&nbsp;Tanggal :</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control float-right" name="date_dsn_1" id="date_dsn_1" 
                              value="<?php echo $_dsn_value_date; ?>" data-date-end-date="0d">
                      </div>
                    </div>
                    <div class="col-5 mb-0">
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
                    <div class="col-2 mt-0">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                          <div class="input-group date">
                            <input type="submit" name="btn_filter_dsn" value="GO" class="btn btn-info btn-round btn-block">
                          </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card">
                <div class="row">
                    <div class="col-12">
                      <div class="info-box mb-0 bg-warning">
                        <span class="info-box-icon"><i class="fas fa-home"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Outlet : <b><?php echo $_ses_dsn_outlet; ?></b></span>
                          <span class="info-box-text">
                            <i class="fas fa-motorcycle"></i>&nbsp;<b><?php echo $_home_tot_n1 + $_home_tot_n3; ?>&nbsp;&nbsp;&nbsp;
                            <i class="fas fa-car"></i>&nbsp;<?php echo $_home_tot_n2 + $_home_tot_n4; 
                            echo " ---- ".$___dsn_gsm;?>
                          </b></span>
                          <span class="info-box-text"><b>
                            <?php echo $___dsn_isi_paket; ?>
                          </b></span>
                          <span class="info-box-text"><b>
                            <a href="tel:<?php echo $___dsn_no_hp; ?>">
                              <?php echo $___dsn_no_hp; ?></a>
                          </b></span>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="row">  
                  <div class="col-12">

                      <div class="position-relative">
                        <canvas id="areaChart" height="290"></canvas>
                      </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="row">
                  <div class="col-12">
                      <table id="example2" class="table  table-bordered table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th rowspan="2" style="text-align: center;vertical-align: middle">No</th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle">Time</th>
                            <th colspan="2" style="text-align: center;vertical-align: middle">Tambah Angin</th>
                            <th colspan="2" style="text-align: center;vertical-align: middle">Isi Baru</th>
                          </tr>
                          <tr>
                            <th style="text-align: center;vertical-align: middle">MTR<br><i class="fa fa-motorcycle"></i></th>
                            <th style="text-align: center;vertical-align: middle">MBL<br><i class="fa fa-car"></i></th>
                            <th style="text-align: center;vertical-align: middle">MTR<br><i class="fa fa-motorcycle"></i></th>
                            <th style="text-align: center;vertical-align: middle">MBL<br><i class="fa fa-car"></i></th>
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
        </form>
      </div>




    </section>
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
