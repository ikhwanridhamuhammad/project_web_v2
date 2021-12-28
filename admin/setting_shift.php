

  <?php
    error_reporting(0);
    session_start();
    if($_SESSION['admin']){
  ?>




  <?php 
  include_once '../admin/program/program_setting_shift.php';
  include_once '../admin/navbar.php';
  include_once '../admin/sidebar.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-cogs"></i>&nbsp;Setting Shift</h1>
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
                <div class="card-body m-0">
                    <table id="example2" class="table table-bordered">
                      <thead class="thead-light">
                        <tr>
                          <th style="text-align: center;vertical-align: middle">NO</th>
                          <th style="text-align: center;vertical-align: middle">OUTLET</th>
                          <th style="text-align: center;vertical-align: middle">CODE ID</th>
                          <th style="text-align: center;vertical-align: middle">SHIFT</th>
                          <th style="text-align: center;vertical-align: middle">TIME IN</th>
                          <th style="text-align: center;vertical-align: middle">TIME OUT</th>
                          <th style="text-align: center;vertical-align: middle">Aksi</th>
                        </tr>
                      </thead> 




                      <tbody>


                                  <?php 
                                    for($_free_counter = 0; $_free_counter < $_ss_counter_shift ; $_free_counter++){ ?>
                                      <tr>
                                        <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                        <td style="text-align: center"><?php echo $_ss_outlet[$_free_counter]; ?></td>
                                        <td style="text-align: center"><?php echo $_ss_code_id[$_free_counter]; ?></td>
                                        <td style="text-align: center"><?php echo $_ss_shift[$_free_counter]; ?></td>
                                        <td style="text-align: center"><?php echo $_ss_time_in[$_free_counter]; ?></td>
                                        <td style="text-align: center"><?php echo $_ss_time_out[$_free_counter]; ?></td>
                                        <td style="text-align: center">
                                          <a href="./hiperlink/hip_ss.php?outlet=<?php echo $_ss_outlet[$_free_counter]; ?>&shift=<?php echo $_ss_shift[$_free_counter]; ?>">
                                          <span class="badge badge-warning"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</span></a>&nbsp;&nbsp;&nbsp;
                                          <a href="./hiperlink/hip_ss_add.php?outlet=<?php echo $_ss_outlet[$_free_counter]; ?>">
                                          <span class="badge badge-success"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tambah</span></a>
                                          <!-- &nbsp;&nbsp;&nbsp; -->

<!--                                           <a href="./hiperlink/hip_ss_remove.php?id=<?php echo $_ss_shift_id[$_free_counter]; ?>">
                                          <span class="badge badge-danger"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp;Hapus</span></a> -->

                                        </td>
                                        
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
  include_once '../admin/footer.php';
  ?>





  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>

