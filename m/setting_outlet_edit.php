  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_setting_outlet_edit.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-cogs"></i>&nbsp;Edit Setting Outlet</h5>
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
                      <h6>Outlet : <?php echo $_so_outlet; ?></h6>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-12">
                      <label>Alamat :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="so_alamat" 
                        value="<?php echo $_so_alamat; ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-12">
                      <label>Tambal Ban Motor :</label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">Rp </span>
                        </div>
                        <input type="text" class="form-control" name="so_tambal_motor" 
                        value="<?php echo $_so_hrg_tambal_motor; ?>"
                        data-inputmask='"mask": "999999999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label>Tambah Angin Motor :</label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">Rp </span>
                        </div>
                        <input type="text" class="form-control" name="so_tambah_motor" 
                        value="<?php echo $_so_hrg_tambah_motor; ?>"
                        data-inputmask='"mask": "999999999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label>Isi Baru Motor :</label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">Rp </span>
                        </div>
                        <input type="text" class="form-control" name="so_isi_baru_motor" 
                        value="<?php echo $_so_hrg_isi_baru_motor; ?>"
                        data-inputmask='"mask": "999999999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4 mt-2 text-sm">
                    <div class="col-12">
                      <label>Tambal Ban Mobil :</label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">Rp </span>
                        </div>
                        <input type="text" class="form-control" name="so_tambal_mobil" 
                        value="<?php echo $_so_hrg_tambal_mobil; ?>"
                        data-inputmask='"mask": "999999999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label>Tambah Angin Mobil :</label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">Rp </span>
                        </div>
                        <input type="text" class="form-control" name="so_tambah_mobil" 
                        value="<?php echo $_so_hrg_tambah_mobil; ?>"
                        data-inputmask='"mask": "999999999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label>Isi Baru Mobil :</label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">Rp </span>
                        </div>
                        <input type="text" class="form-control" name="so_isi_baru_mobil" 
                        value="<?php echo $_so_hrg_isi_baru_mobil; ?>"
                        data-inputmask='"mask": "999999999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
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
