  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_topi'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/pro_extension_sensor.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-eye"></i>&nbsp;EXT Sensor Teknisi</h5>
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
                              value="<?php echo $_ex_sen_value_date; ?>" data-date-end-date="0d">
                      </div>
                    </div>
                    <div class="col-5 mb-0">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Outlet :</label>
                        <select class="form-control select2" onchange="location = this.value;" style="width: 100%;" name="nama_outlet_input">



                          <?php for($_shsn_free_counter = 0;$_shsn_free_counter < $_ex_sen_outlet_counter;$_shsn_free_counter++){ 
                            if($_ses_ex_sen_outlet == $_ex_sen_outlet[$_shsn_free_counter]){ ?>
                              <option selected="selected"><?php echo $_ex_sen_outlet[$_shsn_free_counter]; ?></option>
                            <?php } 
                            if($_ses_ex_sen_outlet != $_ex_sen_outlet[$_shsn_free_counter]){ ?>
                            <option><?php echo $_ex_sen_outlet[$_shsn_free_counter]; ?></option>
                          <?php }} ?>
                          



                        </select>
                      </div>
                    </div>
                    <div class="col-2 mt-0">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                          <div class="input-group date">
                            <input type="submit" name="btn_filter_exs" value="GO" class="btn btn-info btn-round btn-block">
                          </div>

                      </div>
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
                            <th style="text-align: center; width:10%">No</th>
                            <th style="text-align: center">Status Outlet</th>
                          </tr>
                        </thead> 
                        <tbody>

                                <?php if($_es_konter != 0){ ?>
                                <?php 
                                  for($_free_counter = 0; $_free_counter <= $_es_konter ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                      <td>
                                        <b>
                                        <?php echo "Jam "; ?>
                                        <?php echo $_es_start_kondisi[$_free_counter]; ?>
                                        <?php echo " - ";?>
                                        <?php echo $_es_end_kondisi[$_free_counter]; ?><br>
                                        <?php if($_es_kondisi[$_free_counter] == 1){ ?>
                                            <span class="badge badge-warning">TUTUP</span>
                                        <?php } ?>
                                        <?php if($_es_kondisi[$_free_counter] == 2){ ?>
                                            <span class="badge badge-success">BUKA</span>
                                        <?php } ?>
                                        <?php if($_es_kondisi[$_free_counter] == 0){ ?>
                                            <span class="badge badge-danger">RUSAK</span>
                                        <?php } ?>
                                        <?php if($_es_selisih[$_free_counter] < 60) {
                                          echo $_es_selisih[$_free_counter] % 60;
                                          echo " Menit";
                                        } ?> 
                                        <?php if($_es_selisih[$_free_counter] >= 60) {
                                          echo floor($_es_selisih[$_free_counter] / 60);
                                          echo " Jam ";
                                          echo $_es_selisih[$_free_counter] % 60;
                                          echo " Menit";
                                        } ?>
                                        </b>
                                      </td>  

                                      
                                    </tr>
                                      <?php
                                  }
                                ?>
                                <?php } ?>
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
