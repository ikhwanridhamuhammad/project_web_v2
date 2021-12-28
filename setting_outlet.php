
  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>


  <?php 
  include_once './program/program_setting_outlet.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-cogs"></i>&nbsp;Setting Outlet</h1>
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
                  <table id="example2" class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th rowspan="2" style="text-align: center;vertical-align: middle">OUTLET</th>
                        <th rowspan="2" style="text-align: center;vertical-align: middle">CODE ID</th>
                        <th rowspan="2" style="text-align: center;vertical-align: middle;width:20%">ALAMAT</th>
                        <th colspan="3" style="text-align: center;vertical-align: middle">Harga Motor (Rp)</th>
                        <th colspan="3" style="text-align: center;vertical-align: middle">Harga Mobil (Rp)</th>
                        <th rowspan="2" style="text-align: center;vertical-align: middle">Aksi</th>
                      </tr>
                      <tr>
                        <th style="text-align: center;vertical-align: middle">Tambal</th>
                        <th style="text-align: center;vertical-align: middle">Tambah Ang</th>
                        <th style="text-align: center;vertical-align: middle">Isi Baru</th>
                        <th style="text-align: center;vertical-align: middle">Tambal</th>
                        <th style="text-align: center;vertical-align: middle">Tambah Ang</th>
                        <th style="text-align: center;vertical-align: middle">Isi Baru</th>
                      </tr>
                    </thead> 




                    <tbody>


                                <?php 
                                  for($_free_counter = 0; $_free_counter < $_so_counter_outlet ; $_free_counter++){ ?>
                                    <tr>
                                      <td style="text-align: center"><?php echo $_so_outlet[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $_so_code_id[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $_so_alamat[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $_so_hrg_tambal_motor[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $_so_hrg_tambah_motor[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $_so_hrg_isi_baru_motor[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $_so_hrg_tambal_mobil[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $_so_hrg_tambah_mobil[$_free_counter]; ?></td>
                                      <td style="text-align: center"><?php echo $_so_hrg_isi_baru_mobil[$_free_counter]; ?></td>
                                      <td style="text-align: center">
                                        <a href="./hiperlink/hip_so.php?outlet=<?php echo $_so_outlet[$_free_counter]; ?>">
                                        <span class="badge badge-warning">Edit</span></a>
                                      
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
