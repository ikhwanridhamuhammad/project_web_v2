  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_topi'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/pro_top_up_teknisi.php';
  include_once './t_navbar.php';
  //===============================================================================================
  
  //===============================================================================================
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-gas-pump"></i>&nbsp;TOP UP Teknisi</h5>
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
          <div class="col-sm-12 col-md-6">
            <?php if($__por_last_balance[0] < 100000){ ?>
            <div class="info-box bg-danger">
            <?php } ?>
            <?php if($__por_last_balance[0] > 100000){ ?>
            <div class="info-box bg-info">
            <?php } ?>

            


              <span class="info-box-icon"><i class="fas fa-money-bill-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Balance Saldo</span>
                <span class="info-box-number">
                  <?php 
                    echo "Rp. ".number_format($__por_last_balance[0],2,',','.'); 
                  ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        </div>
          <div class="row text-sm">
            <div class="col-12">
        

              <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><b>Paket Data Gagal Refund</b></h5>
                </div>
                <div class="row">
                  <div class="col-12">
                      <table id="example2" class="table  table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th style="text-align: center;vertical-align: middle; width:15%">NO</th>
                            <th style="text-align: center;vertical-align: middle">KETERANGAN</th>
                          </tr>
                        </thead> 
                            <tbody>
                              <?php
                                for($for_1 = 0;$for_1 < $_h___counter;$for_1++){   ?>
                                <tr>
                                  <td style="text-align: center"><?php echo $for_1+1;?></td>
                                  <td><b>
                                    <?php echo $_h___nama_outlet[$for_1]." ";?>
                                    <span class="badge badge-warning"><?php echo $_h___waktu[$for_1];?></span>
                                    <span class="badge badge-danger"><?php echo $_h___status[$for_1];?></span>

                                  </b></td>
                                </tr>
                              <?php    
                                }
                              ?>
                            </tbody>          
                      </table>  

                      
                  </div>  
                </div>
              </div>


              <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><b>Antrian Pulsa & Paket Data</b></h5>
                </div>
                <div class="row">
                  <div class="col-12">
                      <table id="example3" class="table  table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th style="text-align: center;vertical-align: middle; width:15%">NO</th>
                            <th style="text-align: center;vertical-align: middle">KETERANGAN</th>
                          </tr>
                        </thead> 
                            <tbody>
                              <?php
                                for($for_1 = 0;$for_1 < $__an_counter;$for_1++){   ?>
                                <tr>
                                  <td style="text-align: center ; vertical-align: middle"><?php echo $for_1+1;?></td>
                                  <td style="vertical-align: middle"><b>
                                    <?php echo $__an_nama_outlet[$for_1];?>
                                    <?php if($__an_status[$for_1] == "SUCCESS"){ ?>
                                      <span class="badge badge-success"><?php echo $__an_status[$for_1];?></span>

                                    <?php } ?>
                                    <?php if($__an_status[$for_1] != "SUCCESS"){ ?>
                                      <span class="badge badge-danger"><?php echo $__an_status[$for_1];?></span>

                                    <?php } ?>
                                    <span class="badge badge-success"><?php echo $__an_code[$for_1];?></span>
                                    <br>
                                    <span class="badge badge-warning"><?php echo $__an_waktu[$for_1];?></span>
                                    <span class="badge badge-info"><?php echo $__an_no_hp[$for_1];?></span>
                                      
                                  </b></td>
                                </tr>
                              <?php    
                                }
                              ?>
                            </tbody>          
                      </table>  

                      
                  </div>  
                </div>
              </div>



              <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><b>Call Back Portal</b></h5>
                </div>
                <div class="row">
                  <div class="col-12">
                      <table id="example4" class="table  table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th style="text-align: center;vertical-align: middle; width:15%">NO</th>
                            <th style="text-align: center;vertical-align: middle">KETERANGAN</th>
                          </tr>
                        </thead> 
                            <tbody>
                              <?php
                                for($for_1 = 0;$for_1 < $__por_counter;$for_1++){   ?>
                                <tr>
                                  <td style="text-align: center ; vertical-align: middle"><?php echo $for_1+1;?></td>
                                  <td style="vertical-align: middle"><b>
                                    <?php echo $__por_no_hp[$for_1];?>
                                    <?php if($__por_status[$for_1] == "SUCCESS"){ ?>
                                      <span class="badge badge-success"><?php echo $__por_status[$for_1];?></span>

                                    <?php } ?>
                                    <?php if($__por_status[$for_1] != "SUCCESS"){ ?>
                                      <span class="badge badge-danger"><?php echo $__por_status[$for_1];?></span>

                                    <?php } ?>
                                    <span class="badge badge-success"><?php echo $__por_code[$for_1];?></span>
                                    <br>
                                    <span class="badge badge-warning"><?php echo $__por_date_insert[$for_1];?></span>
                                    <?php if($__por_last_balance[$for_1] <= 100000){ ?>
                                    <span class="badge badge-danger"><?php echo "Rp. ".$__por_last_balance[$for_1]." ,-";?></span>
                                    <?php } ?>
                                    <?php if($__por_last_balance[$for_1] > 100000){ ?>
                                    <span class="badge badge-info"><?php echo "Rp. ".$__por_last_balance[$for_1]." ,-";?></span>
                                    <?php } ?>
                                      
                                  </b></td>
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
        </form>
      </div>




    </section>
  </div>






    </section>
  </div>




















  

  <?php
  include_once './t_footer.php';
  ?>



  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>
