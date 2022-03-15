  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_selisih_smart_nitro.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-chart-line"></i>&nbsp;Selisih Smart Nitro</h5>
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
                    <div class="col-5">
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
                    <div class="col-5">
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
                    <div class="col-2">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_pemasukan_ssn" value="GO" class="btn btn-success btn-round btn-block">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>




            </div>
            
          </div>
        </form>

        <div class="row text-sm">
          <div class="col-12">
            <div class="card">
                <table  id="example2" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th style="text-align: center ; width:10%">No</th>
                    <th style="text-align: center">Detail Selisih</th>
                    <th style="text-align: center ; width:15%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php for($__ra_free_counter = 0;$__ra_free_counter < $__ssn_counter; $__ra_free_counter++){ ?>
                    <tr>
                      <td style="text-align: center"><?php echo $__ra_free_counter+1; ?></td>

                      <td>
                        <b>
                        <?php echo $__ssn_karyawan[$__ra_free_counter]; ?>
                        &nbsp;
                        <i class="fas fa-long-arrow-alt-right"></i>
                        &nbsp;&nbsp;
                        <?php echo $__ssn_outlet[$__ra_free_counter]; ?>

                        </b>
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
