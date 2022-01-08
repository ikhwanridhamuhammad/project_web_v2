  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_pemasukan_outlet_sn.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-chart-line"></i>&nbsp;Pemasukan Outlet Smart Nitro</h5>
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
                        <select class="form-control select2" style="width: 100%;" name="nama_tahun_input_sn">

                          <?php for($_po_free_counter = 0;$_po_free_counter < $_po_counter_tahun_bulan;$_po_free_counter++){ 
                            if($_ses_po_tahun_bulan == $_po_tahun_bulan[$_po_free_counter]){ ?>
                              <option selected="selected"><?php echo $_po_tahun_bulan[$_po_free_counter]; ?></option>
                            <?php } 
                            if($_ses_po_tahun_bulan != $_po_tahun_bulan[$_po_free_counter]){ ?>
                            <option><?php echo $_po_tahun_bulan[$_po_free_counter]; ?></option>
                          <?php }} ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Outlet :</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_outlet_input_sn">
                          
                          <?php for($_po_free_counter = 0;$_po_free_counter < $_po_counter_outlet;$_po_free_counter++){ 
                            if($_ses_po_outlet == $_po_outlet[$_po_free_counter]){ ?>
                              <option selected="selected"><?php echo $_po_outlet[$_po_free_counter]; ?></option>
                            <?php } 
                            if($_ses_po_outlet != $_po_outlet[$_po_free_counter]){ ?>
                            <option><?php echo $_po_outlet[$_po_free_counter]; ?></option>
                          <?php }} ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_pemasukan_sn" value="GO" class="btn btn-success btn-round btn-block">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php if($_ses_po_outlet != "ALL"){ ?>
              <div class="card">
                  <div class="row">
                    <div class="col-12 mt-2 mb-1 text-left">
                      <span><b>
                        &nbsp;&nbsp;&nbsp;&nbsp;Omset Outlet <?php echo $_ses_po_outlet; ?> Periode <?php echo $_ses_po_tahun_bulan; ?>
                      </b></span><br>
                      <span class="text-success">
                        <b>&nbsp;&nbsp;&nbsp;
                          <?php echo "Rp ".number_format($____po_omset_total_outlet,2,',','.'); ?>
                        
                      </b></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                          <table  id="table_po_1" class="table table-striped table-valign-middle">
                            <thead>
                              <tr>
                                <th style="text-align: center; width:3%">No</th>
                                <th style="text-align: center">Detail</th>
                                <th style="text-align: center; width:30%">Omset (Rp)</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  for($_free_counter = 0; $_free_counter < $____po_counter ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_free_counter+1; ?></td>


                                      <td>
                                        <?php echo $____po_tanggal_2[$_free_counter]; ?>
                                        <br>
                                        <i class="fa fa-car"></i>
                                        <?php echo "Tambah ".$____po_tambah_mobil[$_free_counter]; ?>  
                                        <i class="fa fa-long-arrow-alt-right"></i>
                                        <?php echo "Isi Baru ".$____po_isi_baru_mobil[$_free_counter]; ?>
                                        <br>
                                        <i class="fa fa-motorcycle"></i>
                                        <?php echo "Tambah ".$____po_tambah_motor[$_free_counter]; ?> 
                                        <i class="fa fa-long-arrow-alt-right"></i>
                                        <?php echo "Isi Baru ".$____po_isi_baru_motor[$_free_counter]; ?>
                                        



                                      </td>


                                      <td style="text-align: center"><?php echo number_format($____po_omset[$_free_counter],0,',','.'); ?></td>
                                      
                                    </tr>
                                      <?php
                                  }
                                ?>
                            </tbody>
                          </table>
                    </div>
                  </div>
              </div>
              <?php } ?>


              <?php if($_ses_po_outlet == "ALL"){ ?>
              <div class="card">
                  <div class="row">
                    <div class="col-12 mt-2 mb-1 text-left">
                      <span><b>
                        &nbsp;&nbsp;&nbsp;&nbsp;Omset Total <?php echo $_ses_po_tahun_bulan; ?>
                      </b></span><br>
                      <span class="text-success">
                        <b>&nbsp;&nbsp;&nbsp;
                          <?php echo "Rp ".number_format($___po_omset_total,2,',','.'); ?>
                      </b></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                          <table  id="table_po_2" class="table table-striped table-valign-middle">
                            <thead>
                              <tr>
                                <!-- <th style="text-align: center">No</th> -->
                                <th style="text-align: center">Nama Outlet</th>
                                <th style="text-align: center">Periode</th>
                                <th style="text-align: center">Omset</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  for($_free_counter = 0; $_free_counter < $___po_counter ; $_free_counter++){ ?>
                                    <tr>
                                      <td><a href="./hiperlink/hip_po_sn.php?outlet=<?php echo $___po_outlet[$_free_counter]; ?>"><?php echo $___po_outlet[$_free_counter]; ?></a></td>
                                      <td style="text-align: center"><?php echo $_ses_po_tahun_bulan; ?></td>
                                      <td style="text-align: center"><?php echo "Rp ".number_format($___po_omset[$_free_counter],2,',','.'); ?></td>
                                    </tr>
                                      <?php
                                  }
                                ?>

                            </tbody>
                          </table>
                    </div>
                  </div>
              </div>
              <?php } ?>



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
