

  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>





  <?php 
  include_once './program/program_setting_user_edit_admin.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-cogs"></i>&nbsp;Edit User Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form method="POST" onsubmit="return validasi(this)" >
          <?php if($_su_edit_error == 1){ ?>
          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
              <div class="callout callout-danger">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Email sudah digunakan. Silahkan gunakan yang lain.
              </div>
            </div>
            <div class="col-2">
            </div>
          </div>
          <?php } ?>
          <?php if($_su_edit_error == 2){ ?>
          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
              <div class="callout callout-danger">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Email yang digunakan tidak valid.
              </div>
            </div>
            <div class="col-2">
            </div>
          </div>
          <?php } ?>
          <?php if($_su_edit_error == 3){ ?>
          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
              <div class="callout callout-danger">
                <h5><i class="fas fa-info"></i> Note:</h5>
                Username sudah digunakan. Silahkan gunakan yang lain.
              </div>
            </div>
            <div class="col-2">
            </div>
          </div>
          <?php } ?>

          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
              <div class="card">
                <div class="card-body">
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-12">
                      <label>&nbsp;&nbsp;Username :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-user-alt fa-sm"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="su_user_username_edit_admin" 
                            value="<?php echo $_su_edit_value_username; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-12">
                      <label>&nbsp;&nbsp;Email :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-envelope-open-text fa-sm"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="su_user_email_edit_admin" 
                            value="<?php echo $_su_edit_value_email; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-12">
                      <label>&nbsp;&nbsp;Nama :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-user-alt fa-sm"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="su_user_name_edit_admin"
                            value="<?php echo $_su_edit_value_name; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-12">
                      <label>&nbsp;&nbsp;Password :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-key fa-sm"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" name="su_user_pass_edit_admin"
                            value="<?php echo $_su_edit_value_pass; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row text-sm">
                    <div class="col-3">
                    </div>
                    <div class="col-6">
                        <div class="card">
                          <div class="input-group date">
                            <input type="submit" name="btn_save_data_edit_admin" value="SIMPAN EDIT DATA" class="btn btn-info btn-round btn-block">
                          </div>
                        </div>
                    </div>
                    <div class="col-3">
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-2">
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
