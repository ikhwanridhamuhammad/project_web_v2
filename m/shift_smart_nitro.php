  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_shift_smart_nitro.php';
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

          </div>
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
                              value="<?php echo $__shift_sn_value_date; ?>" data-date-end-date="0d">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Outlet :</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_outlet_input">
                          <?php for($_shsn_free_counter = 0;$_shsn_free_counter < $_shift_sn_counter_outlet;$_shsn_free_counter++){ 
                            if($_ses_shift_sn_outlet == $_shift_sn_outlet[$_shsn_free_counter]){ ?>
                              <option selected="selected"><?php echo $_shift_sn_outlet[$_shsn_free_counter]; ?></option>
                            <?php } 
                            if($_ses_shift_sn_outlet != $_shift_sn_outlet[$_shsn_free_counter]){ ?>
                            <option><?php echo $_shift_sn_outlet[$_shsn_free_counter]; ?></option>
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
                <table  id="table_shsn" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th style="text-align: center ; width:10%">No</th>
                    <th style="text-align: center">Detail Shift</th>
                    <th style="text-align: center ; width:25%">Omset</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php for($__ra_free_counter = 0;$__ra_free_counter < $__ssn_counter; $__ra_free_counter++){ ?>
                    <tr>
                      <td style="text-align: center"><?php echo $__ra_free_counter+1; ?></td>

                      <td>
                        <b>
                        <?php echo $__ssn_outlet[$__ra_free_counter]; ?>
                        <br></b>
                        <?php echo $__shift_sn_value_date_4; ?>
                        <i class="fas fa-long-arrow-alt-right"></i>
                        <?php echo $__ssn_shift[$__ra_free_counter]; ?>
                        <br>
                        <?php echo "(".$__ssn_time_in_shift_2[$__ra_free_counter]."-".$__ssn_time_out_shift_2[$__ra_free_counter].")"; ?>  
                        
                      </td>
                      <td style="text-align: center"><?php echo "Rp ".number_format($__ssn_omset[$__ra_free_counter],2,',','.'); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        </form>
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
