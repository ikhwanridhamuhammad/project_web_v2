

  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>

  
  <?php 
  include_once './program/program_extension_sensor.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-eye"></i>&nbsp;Extension Sensor Smart Nitro</h1>
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
                    <div class="col-4">
                      <label>&nbsp;&nbsp;Tanggal :</label>
                      <div class="input-group date">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-calendar-minus fa-sm"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" name="date_1" id="date_1" 
                              value="<?php echo $_ex_sen_value_date; ?>" data-date-end-date="0d">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Outlet :</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_outlet_input">



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
                    <div class="col-4">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                          <div class="input-group date">
                            <input type="submit" name="btn_filter_shsn" value="FILTER" class="btn btn-info btn-round btn-block">
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
                      <table  id="table_shsn_2" class="table table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Jam Start</th>
                            <th style="text-align: center">Jam End</th>
                            <th style="text-align: center">Kondisi</th>
                          </tr>
                        </thead>
                        <tbody>
<<<<<<< HEAD
                                <?php if($_h___counter != 0){ ?>
=======
                                <?php if($_es_konter != 0){ ?>
>>>>>>> 2b396654e436ec1f018e9e9c62f951f006862162
                                <?php 
                                  for($_free_counter = 0; $_free_counter <= $_es_konter ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                      <td><?php echo $_es_start_kondisi[$_free_counter]; ?></td>
                                      <td><?php echo $_es_end_kondisi[$_free_counter]; ?></td>
                                      <td>

                                        <?php if($_es_kondisi[$_free_counter] == 1){ ?>
                                            <span class="badge badge-warning">TUTUP</span>
                                        <?php } ?>
                                        <?php if($_es_kondisi[$_free_counter] == 2){ ?>
                                            <span class="badge badge-success">BUKA</span>
                                        <?php } ?>
                                        <?php if($_es_kondisi[$_free_counter] == 0){ ?>
                                            <span class="badge badge-danger">RUSAK</span>
                                        <?php } ?>
                                        <b>
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
              <!-- 
              <div class="card">
                <div class="card-body">


                  <div class="row">
                    <div class="col-12">
                      <table  id="table_shsn" class="table table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Jam</th>
                            <th style="text-align: center">Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php 
                                  for($_free_counter = 0; $_free_counter < $_h___counter ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                      <td><?php echo $_h___date[$_free_counter]; ?></td>
                                      <td>

                                        <?php if($_h___sen_door[$_free_counter] == 1){ ?>
                                            <span class="badge badge-warning">TUTUP</span>
                                        <?php } ?>
                                        <?php if($_h___sen_door[$_free_counter] == 2){ ?>
                                            <span class="badge badge-success">BUKA</span>
                                        <?php } ?>
                                        <?php if($_h___sen_door[$_free_counter] == 0){ ?>
                                            <span class="badge badge-danger">RUSAK</span>
                                        <?php } ?>
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
               -->
            </div>
          </div>
        </form>
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

