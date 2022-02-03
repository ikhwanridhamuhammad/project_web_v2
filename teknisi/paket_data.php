  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_topi'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/pro_paket_data_teknisi.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-bullhorn"></i>&nbsp;PAKET DATA Teknisi</h5>
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
                        <select class="form-control select2" style="width: 100%;" name="nama_outlet_input">

                          <?php for($_free_counter = 0;$_free_counter < $__pd_counter_outlet;$_free_counter++){ 
                            if($_ses_dsn_outlet == $__pd_outlet[$_free_counter]){ ?>
                              <option value="<?php echo $_free_counter; ?>" selected="selected" ><?php echo $__pd_outlet[$_free_counter]; ?></option>
                            <?php } 
                            if($_ses_dsn_outlet != $__pd_outlet[$_free_counter]){ ?>
                            <option value="<?php echo $_free_counter; ?>" ><?php echo $__pd_outlet[$_free_counter]; ?></option>
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
                <div class="card-header">
                  <h5 class="card-title"><b>3 Hari Paket Data Habis</b></h5>
                </div>
                <div class="row">
                  <div class="col-12">
                      <table id="example2" class="table  table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th style="text-align: center;vertical-align: middle; width:15%">NO</th>
                            <th style="text-align: center;vertical-align: middle">KETERANGAN</th>
                          </tr>
                        </thead> 
                            <tbody>
                              <?php
                                for($for_1 = 0;$for_1 < $__pd_2_counter_outlet;$for_1++){   ?>
                                <tr>
                                  <td style="text-align: center"><?php echo $for_1+1;?></td>
                                  <td><b>
                                    <?php echo $__pd_2_outlet[$for_1]." ";?>
                                    <span class="badge badge-warning"><?php echo $__pd_2_jenis_gsm[$for_1];?></span>
                                    <span class="badge badge-info"><?php echo $__pd_2_calc_paket[$for_1]." Hari";?></span>
                                    <span class="badge badge-success"><?php echo $__pd_2_aktif[$for_1];?></span>

                                  </b></td>
                                </tr>
                              <?php    
                                }
                              ?>
                            </tbody>          
                      </table>  

                      
                  </div>  
                </div>
              </div>


              <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><b>Report Paket Data All</b></h5>
                </div>
                <div class="row">
                  <div class="col-12">
                      <table id="example3" class="table  table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th style="text-align: center;vertical-align: middle; width:15%">NO</th>
                            <th style="text-align: center;vertical-align: middle">KETERANGAN</th>
                          </tr>
                        </thead> 
                            <tbody>
                              <?php
                                for($for_1 = 0;$for_1 < $_f___counter;$for_1++){   ?>
                                <tr>
                                  <td style="text-align: center ; vertical-align: middle"><?php echo $for_1+1;?></td>
                                  <td style="vertical-align: middle"><b>
                                    <?php echo $_f___nama_outlet[$for_1];?>
                                    <span class="badge badge-success"><?php echo $_f___keterangan[$for_1];?></span>
                                    <?php if($_f___mode[$for_1] == "PROGRAM"){ ?>
                                      <span class="badge badge-success"><?php echo $_f___mode[$for_1];?></span>
                                    <?php } ?>
                                    <?php if($_f___mode[$for_1] != "PROGRAM"){ ?>
                                      <span class="badge badge-danger"><?php echo $_f___mode[$for_1];?></span>
                                    <?php } ?>
                                    <br>
                                    <span class="badge badge-warning"><?php echo $_f___tanggal[$for_1];?></span>
                                    <span class="badge badge-info"><?php echo $_f___no_hp[$for_1];?></span>
                                      
                                  </b></td>
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
