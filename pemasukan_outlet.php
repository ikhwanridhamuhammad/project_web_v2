
  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>

  <?php 
  include_once './program/program_pemasukan_outlet.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-chart-line"></i>&nbsp;Pemasukan Outlet</h1>
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
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;Outlet :</label>
                        <select class="form-control select2" style="width: 100%;" name="nama_outlet_input">
                          
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
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_pemasukan" value="FILTER" class="btn btn-success btn-round btn-block">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                <?php if($_ses_po_outlet != "ALL"){ ?>
                  <div class="row">
                    <div class="col-12">

                          <div class="d-flex">
                            <p class="mr-auto d-flex flex-column text-left">
                              <span><b>Omset Outlet <?php echo $_ses_po_outlet; ?> Periode <?php echo $_ses_po_tahun_bulan; ?></b></span>
                              <span class="text-success">
                                <b><?php echo "Rp ".number_format($____po_omset_total_outlet,2,',','.'); ?></b>
                              </span>
                            </p>
                            <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                <a class="nav-link active" href="#line-ref" data-toggle="tab">Omset Total</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#area-ref" data-toggle="tab">Tambal Ban</a>
                              </li>
                            </ul>
                          </div>
                          <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="line-ref" style="position: relative; height: 300px;">
                              <canvas id="lineChart" height="320" style="height: 320;"></canvas>
                            </div>
                            <div class="chart tab-pane" id="area-ref" style="position: relative; height: 300px;">
                              <canvas id="line2Chart" height="320" style="height: 320;"></canvas>
                            </div>
                          </div>

<!--                       <div class="chart">
                        <canvas id="lineChart" height="320" style="height: 320px;"></canvas>
                      </div> -->
                    </div>
                    <div class="col-12">
                          <table  id="table_po_1" class="table table-striped table-valign-middle">
                            <thead>
                              <tr>
                                <!-- <th style="text-align: center">No</th> -->
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Karyawan</th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Shift</th>
                                <th style="text-align: center">Omset Tambal</th>
                                <th style="text-align: center">Omset Total</th>
                                <th style="text-align: center">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  for($_free_counter = 0; $_free_counter < $____po_counter ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                      <td style="text-align: center"><?php echo $____po_karyawan[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $____po_tanggal[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $____po_shift[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo "Rp ".number_format($____po_omset_tambal[$_free_counter],2,',','.'); ?></td>
                                      <td style="text-align: center"><?php echo "Rp ".number_format($____po_omset[$_free_counter],2,',','.'); ?></td>
                                      <td style="text-align: center">
                                        <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_counter; ?>">
                                          <span class="badge badge-info">View</span></a>
                                      </td>
                                      
                                    </tr>
                                      <?php
                                  }
                                ?>
                            </tbody>
                          </table>
                    </div>
                  </div>
                <?php } ?>

                <?php if($_ses_po_outlet == "ALL"){ ?>
                  <div class="row">
                    <div class="col-7">

                          <div class="d-flex">
                            <p class="mr-auto d-flex flex-column text-left">
                              <span><b>Omset Total <?php echo $_ses_po_tahun_bulan; ?></b></span>
                              <span class="text-success">
                                <b><?php echo "Rp ".number_format($___po_omset_total,2,',','.'); ?></b>
                              </span>
                            </p>
                          </div>
                      <div class="chart">
                        <canvas id="areaChart" height="320" style="height: 320px;"></canvas>
                      </div>
                    </div>
                    <div class="col-5">
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
                                      <td><a href="./hiperlink/hip_po.php?outlet=<?php echo $___po_outlet[$_free_counter]; ?>"><?php echo $___po_outlet[$_free_counter]; ?></a></td>
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

                <?php } ?>  
                </div>
              </div>
            </div>
            
          </div>
        </form>
      </div>



<?php for($_free_counter = 0; $_free_counter < $____po_counter ; $_free_counter++){ ?>
      <div class="modal fade" id="<?php echo "modal".$_free_counter; ?>">
        <div class="modal-dialog">
              <div class="card bg-light">
                <div class="card-header bg-info text-muted text-center border-bottom-0">
                  <b>Detail Absensi</b>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-8">
                      <h2 class="lead"><b><?php echo $____po_karyawan[$_free_counter]; ?></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span>
                          <b>&nbsp;&nbsp;Lokasi Outlet: </b> <?php echo $_ses_po_outlet; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                          <b>&nbsp;&nbsp;Tanggal: </b> <?php echo $____po_tanggal[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                          <b>&nbsp;&nbsp;Shift IN: </b> <?php echo $____po_check_in[$_free_counter]; ?><br/>
                          <b>&nbsp;&nbsp;Shift Out : </b> <?php echo $____po_check_out[$_free_counter]; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>
                          <b>&nbsp;&nbsp;Report OMSET : </b><?php echo "Rp ".number_format($____po_omset[$_free_counter],2,',','.'); ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-bolt"></i></span>
                          <b>&nbsp;&nbsp;KWH Akhir : </b><?php echo $____po_kwh[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-motorcycle"></i></span>
                          <b>&nbsp;&nbsp;Tambal Ban : </b> <?php echo $____po_tambal_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Promo : </b> <?php echo $____po_promo_motor[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Error : </b> <?php echo $____po_error_motor[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul> 
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-car"></i></span>
                          <b>&nbsp;&nbsp;Tambal Ban : </b> <?php echo $____po_tambal_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Promo : </b> <?php echo $____po_promo_mobil[$_free_counter]." Ban"; ?><br/>
                          <b>&nbsp;&nbsp;Error : </b> <?php echo $____po_error_mobil[$_free_counter]." Ban"; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-open-text"></i></span>
                          <b>&nbsp;&nbsp;Keterangan : </b><?php echo $____po_information[$_free_counter]; ?>
                        </li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <div class="row">
                        <label><small><b>Check In :</b></small></label>
                      </div>
                      <div class="row text-center">
                        <img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> 
                      </div>
                      <div class="row">
                        <label><small><b>Check Out :</b></small></label>
                      </div>
                      <div class="row text-center">
                        <img src="../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> 
                      </div>
                      
                      
                    </div>
                  </div>
                </div>

                <div class="card-footer text-right">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
              </div>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<?php } ?>




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

