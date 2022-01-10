
  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_setting_shift_edit.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-cogs"></i>&nbsp;Edit Setting Shift</h5>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form method="POST" onsubmit="return validasi(this)" >
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row mb-2">
                      <h6>Outlet : <?php echo $_ss_outlet; ?></h6>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-6">
                      <label>&nbsp;&nbsp;Shift Name :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ss_shift_input" 
                        value="<?php echo $_ss_shift; ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-6">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Time In :</label>
                        <select class="form-control select2" style="width: 100%;" name="time_in_input">
                          <?php for($_free_counter = 0;$_free_counter < $_ss_jam_counter;$_free_counter++){ 
                            if($_ss_time_in == $_ss_jam[$_free_counter]){ ?>
                              <option selected="selected"><?php echo $_ss_jam[$_free_counter]; ?></option>
                            <?php } 
                            if($_ss_time_in != $_ss_jam[$_free_counter]){ ?>
                            <option><?php echo $_ss_jam[$_free_counter]; ?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Time Out :</label>
                        <select class="form-control select2" style="width: 100%;" name="time_out_input">
                          <?php for($_free_counter = 0;$_free_counter < $_ss_jam_counter;$_free_counter++){ 
                            if($_ss_time_out == $_ss_jam[$_free_counter]){ ?>
                              <option selected="selected"><?php echo $_ss_jam[$_free_counter]; ?></option>
                            <?php } 
                            if($_ss_time_out != $_ss_jam[$_free_counter]){ ?>
                            <option><?php echo $_ss_jam[$_free_counter]; ?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row text-sm">
                    <div class="col-3">
                    </div>
                    <div class="col-6">
                        <div class="card">
                          <div class="input-group date">
                            <input type="submit" name="btn_save_data" value="SIMPAN DATA" class="btn btn-info btn-round btn-block">
                          </div>
                        </div>
                    </div>
                    <div class="col-3">
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















  

  <?php
  include_once './m_footer.php';
  ?>



  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>


