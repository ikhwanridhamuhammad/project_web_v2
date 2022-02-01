
  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>

  <?php 
  include_once './program/program_pemasukan_outlet_sn.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-chart-line"></i>&nbsp;Pemasukan Outlet Smart Nitro</h1>
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
                    <div class="col-3">
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
                    <div class="col-3">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <div class="input-group date">
                          <input type="submit" name="btn_filter_pemasukan_sn" value="FILTER" class="btn btn-success btn-round btn-block">
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
                            </ul>
                          </div>
                          <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="line-ref" style="position: relative; height: 300px;">
                              <canvas id="lineChart" height="320" style="height: 320;"></canvas>
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
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Tambah Motor</th>
                                <th style="text-align: center">Tambah Mobil</th>
                                <th style="text-align: center">Isi Baru Motor</th>
                                <th style="text-align: center">Isi Baru Mobil</th>
                                <th style="text-align: center">Omset Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  for($_free_counter = 0; $_free_counter < $____po_counter ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                      <td style="text-align: center"><?php echo $____po_tanggal[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $____po_tambah_motor[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $____po_tambah_mobil[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $____po_isi_baru_motor[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $____po_isi_baru_mobil[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo "Rp ".number_format($____po_omset[$_free_counter],2,',','.'); ?></td>
                                      
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
                    <?php if($___po_counter>20){ ?> 
                    <div class="col-12">
                    <?php } ?> 
                    <?php if($___po_counter<21){ ?> 
                    <div class="col-7">
                    <?php } ?> 

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
                    <?php if($___po_counter>20){ ?> 
                    <div class="col-12">
                    <?php } ?> 
                    <?php if($___po_counter<21){ ?> 
                    <div class="col-5">
                    <?php } ?> 
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

                <?php } ?>  
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

