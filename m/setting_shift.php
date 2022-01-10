

  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_setting_shift.php';
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
            <h5 class="m-0 text-dark"><i class="nav-icon fas fa-cogs"></i>&nbsp;Setting Shift</h5>
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
                    <table id="example2" class="table table-bordered table-striped table-valign-middle">
                      <thead>
                        <tr>
                          <th style="text-align: center;vertical-align: middle ; width: 6%">NO</th>
                          <th style="text-align: center;vertical-align: middle">Outlet Detail</th>
                          <th style="text-align: center;vertical-align: middle ; width: 6%">Aksi</th>
                        </tr>
                      </thead> 




                      <tbody>


                                  <?php 
                                    for($_free_counter = 0; $_free_counter < $_ss_counter_shift ; $_free_counter++){ ?>
                                      <tr>
                                        <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                        <td>
                                          <b>
                                          <?php echo $_ss_outlet[$_free_counter]; ?>
                                          </b>
                                          <i class="fas fa-long-arrow-alt-right"></i>
                                          <?php echo $_ss_shift[$_free_counter]; ?>
                                          <br>
                                          <?php echo "(".$_ss_time_in[$_free_counter]." - ".$_ss_time_out[$_free_counter].")"; ?>
                                        </td>
                                        <td style="text-align: center">
                                          <a href="./hiperlink/hip_ss.php?outlet=<?php echo $_ss_outlet[$_free_counter]; ?>&shift=<?php echo $_ss_shift[$_free_counter]; ?>">
                                          <span class="badge badge-warning"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</span></a><br>
                                          <a href="./hiperlink/hip_ss_add.php?outlet=<?php echo $_ss_outlet[$_free_counter]; ?>">
                                          <span class="badge badge-success"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;add</span></a>
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
