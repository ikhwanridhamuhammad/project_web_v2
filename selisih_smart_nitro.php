

  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>



  <?php 
  include_once './program/program_selisih_smart_nitro.php';
  include_once './navbar.php';
  include_once './sidebar.php';
  //======================================================================
  //======================================================================
  //======================================================================
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-random"></i>&nbsp;Selisih Smart Nitro</h1>
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
                    <div class="col-3">
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
                    <div class="col-3">
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
                    <?php if($_ssn_counter_outlet <= 20) { ?>
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_selisih" value="FILTER" class="btn btn-info btn-round btn-block">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($_ssn_counter_outlet > 20) { ?>
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_sellisih_1" value="FILTER KE 1" class="btn btn-info btn-round btn-block">
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_sellisih_1" value="FILTER KE 2" class="btn btn-info btn-round btn-block">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div> 
                </div>
              </div>
              <div class="card">
                <div class="card-body">


                  <div class="row">
                    <div class="col-12">
                      <table  id="table_ssn" class="table table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Outlet</th>
                            <th style="text-align: center">Karyawan</th>
                            <th style="text-align: center">Tanggal</th>
                            <th style="text-align: center">Shift</th>
                            <th style="text-align: center">Omset S.Nitro</th>
                            <th style="text-align: center">Omset Total</th>
                            <th style="text-align: center">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php 
                                  for($_free_counter = 0; $_free_counter < $__ssn_counter ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                      <td><?php echo $__ssn_outlet[$_free_counter]; ?></td>
                                      <td><?php echo $__ssn_karyawan[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $__ssn_tanggal[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $__ssn_shift[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo "Rp ".number_format($__ssn_omset[$_free_counter],2,',','.'); ?></td>
                                      <td style="text-align: center"><?php echo "Rp ".number_format($__ssn_omset[$_free_counter],2,',','.'); ?></td>
                                      <td style="text-align: center"><?php echo $__ssn_code_id[$_free_counter]; ?></td>

                                      
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
