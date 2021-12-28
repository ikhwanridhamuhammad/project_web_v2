

  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>




  <?php 
  include_once './program/program_edit_absensi.php';
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
            <h2 class="m-0 text-dark">Edit Absensi</h2>
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
            <div class="col-8">
              <div class="card">
                <div class="card-body">
                  <div class="row ml-2 mb-2">
                      <h2 class="lead"><b><?php echo $__ea_nama; ?></b></h2>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <ul class="ml-4 mt-1 mb-3 fa-ul">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                          <b>&nbsp;&nbsp;Lokasi Outlet: </b> <?php echo $__ea_outlet; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-1 mb-3 fa-ul">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                          <b>&nbsp;&nbsp;Check In: </b> <?php echo $__ea_check_in; ?>
                        </li>
                      </ul>
                    </div>  
                    <div class="col-6">
                      <ul class="ml-4 mt-1 mb-3 fa-ul">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                          <b>&nbsp;&nbsp;Tanggal Masuk: </b> <?php echo $__ea_tanggal; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-1 mb-3 fa-ul">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                          <b>&nbsp;&nbsp;Check Out: </b> <?php echo $__ea_check_out; ?>
                        </li>
                      </ul>
                    </div>  
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-4">
                      <label>Tambal Motor :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ea_tambal_motor" 
                        value="<?php echo $__ea_tambal_motor; ?>"
                        data-inputmask='"mask": "999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">. Ban</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <label>Promo Motor :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ea_promo_motor" 
                        value="<?php echo $__ea_promo_motor; ?>"
                        data-inputmask='"mask": "999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">. Ban</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <label>Error Motor :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ea_error_motor" 
                        value="<?php echo $__ea_error_motor; ?>"
                        data-inputmask='"mask": "999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">. Ban</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-4">
                      <label>Tambal Mobil :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ea_tambal_mobil" 
                        value="<?php echo $__ea_tambal_mobil; ?>"
                        data-inputmask='"mask": "999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">. Ban</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <label>Promo Mobil :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ea_promo_mobil" 
                        value="<?php echo $__ea_promo_mobil; ?>"
                        data-inputmask='"mask": "999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">. Ban</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <label>Error Mobil :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ea_error_mobil" 
                        value="<?php echo $__ea_error_mobil; ?>"
                        data-inputmask='"mask": "999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">. Ban</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-6">
                      <label>Omset :</label>
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text">Rp </span>
                        </div>
                        <input type="text" class="form-control" name="ea_omset" 
                        value="<?php echo $__ea_omset; ?>"
                        data-inputmask='"mask": "999999999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <label>KWH PLN :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ea_kwh" 
                        value="<?php echo $__ea_kwh; ?>"
                        data-inputmask='"mask": "999999"' data-mask >
                        <div class="input-group-append">
                          <span class="input-group-text">Kwh</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3 mt-2 text-sm">
                    <div class="col-12">
                      <label>Keterangan :</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="ea_keterangan" 
                        value="<?php echo $__ea_information; ?>" >
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
            <div class="col-4">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">

                          <div class="row">
                            <label><small><b>Photo Check In :</b></small></label>
                          </div>
                          <div class="row text-center">
                            <img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> 
                          </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      
                          <div class="row">
                            <label><small><b>Photo Check Out :</b></small></label>
                          </div>
                          <div class="row text-center">
                            <img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> 
                          </div>
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
  include_once './footer.php';
  ?>





  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>
