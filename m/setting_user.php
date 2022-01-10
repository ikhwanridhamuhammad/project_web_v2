

  <?php
    error_reporting(0);
    session_start();
    include_once './program/global_var_run.php';
      if($_SESSION['admin_top'] || $__global_run == 1){
  ?>

  <?php 
  include_once './program/program_setting_user.php';
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
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-cogs"></i>&nbsp;Setting User</h1>
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
                <div class="row ml-2 mr-2">
                    <div class="col-6">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <a class="btn btn-warning btn-round btn-block" href="./hiperlink/hip_su_edit_admin.php?action=ok" role="button">EDIT USER ADMIN</a>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>&nbsp;&nbsp;</label>
                        <a class="btn btn-danger btn-round btn-block" href="./hiperlink/hip_su_add.php?action=add" role="button">TAMBAH USER</a>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-12">

                    <table id="example2" class="table table-bordered  table-striped table-valign-middle">
                      <thead>
                        <tr>
                          <th style="text-align: center;vertical-align: middle ; width: 6%">No</th>
                          <th style="text-align: center;vertical-align: middle">Detail User</th>
                          <th style="text-align: center;vertical-align: middle ; width: 6%">Aksi</th>
                        </tr>
                      </thead> 




                      <tbody>



                                  <?php 
                                    for($_free_counter = 0; $_free_counter < $_su_counter ; $_free_counter++){ ?>
                                      <tr>
                                        <td style="text-align: center"><?php echo $_free_counter+1; ?></td>
                                        <td>
                                          <b>
                                          <?php echo $_su_nama[$_free_counter]; ?>
                                          </b>
                                          <i class="fas fa-long-arrow-alt-right"></i>
                                          <?php echo $_su_nik[$_free_counter]; ?>
                                          <br>
                                          <?php echo $_su_email[$_free_counter]; ?>
                                          <br>
                                          Password
                                          <i class="fas fa-long-arrow-alt-right"></i>
                                            <?php if($_su_password[$_free_counter] == "Different") { ?>
                                              <a href="./hiperlink/hip_su_pass.php?id=<?php echo $_su_id[$_free_counter]; ?>">
                                            <?php }?>
                                            <?php if($_su_password[$_free_counter] == "Default") { ?>
                                              <a>
                                            <?php }?>
                                            
                                            <span class="badge badge-<?php echo $_su_password_color[$_free_counter]; ?>"><i class="fa fa-lock"></i>&nbsp;&nbsp;<?php echo $_su_password[$_free_counter]; ?></span></a>
                                          <br>
                                          Akses
                                          <i class="fas fa-long-arrow-alt-right"></i>
                                            <?php if($_su_hapus[$_free_counter] == "Aktif") { ?>
                                              <a href="./hiperlink/hip_su_hapus.php?id=<?php echo $_su_id[$_free_counter]; ?>&act=aktif">
                                            <?php }?>
                                            <?php if($_su_hapus[$_free_counter] == "Nonaktif") { ?>
                                              <a href="./hiperlink/hip_su_hapus.php?id=<?php echo $_su_id[$_free_counter]; ?>&act=nonaktif">
                                            <?php }?>
                                            <span class="badge badge-<?php echo $_su_hapus_color[$_free_counter]; ?>">
                                              
                                              <?php if($_su_hapus[$_free_counter] == "Aktif") { ?>
                                                <i class="fa fa-check-circle"></i>
                                              <?php }?>
                                              <?php if($_su_hapus[$_free_counter] == "Nonaktif") { ?>
                                                <i class="fa fa-times-circle"></i>
                                              <?php }?>

                                              &nbsp;&nbsp;<?php echo $_su_hapus[$_free_counter]; ?></span></a>




                                        </td>

                                        <td style="text-align: center">
                                          <a href="#" data-toggle="modal" data-target="<?php echo "#modal".$_free_counter; ?>">
                                          <span class="badge badge-warning"><i class="fa fa-eye"></i>&nbsp;&nbsp;View</span></a><br>
                                          <a href="./hiperlink/hip_su_edit.php?id=<?php echo $_su_id[$_free_counter]; ?>&action=edit">
                                          <span class="badge badge-warning"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</span></a>
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
          </div>
        </form>
      </div>


<?php for($_free_counter = 0; $_free_counter < $_su_counter ; $_free_counter++){ ?>
      <div class="modal fade" id="<?php echo "modal".$_free_counter; ?>">
        <div class="modal-dialog">


              <div class="card bg-light">
                <div class="card-header bg-warning text-muted text-center border-bottom-0">
                  <b>Detail User</b>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-8">
                      <h2 class="lead"><b><?php echo $_su_nama[$_free_counter]; ?></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user-alt"></i></span>
                          <b>&nbsp;&nbsp;Nickname: </b> <?php echo $_su_nickname[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-id-badge"></i></span>
                          <b>&nbsp;&nbsp;NIK: </b> <?php echo $_su_nik[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-open-text"></i></span>
                          <b>&nbsp;&nbsp;Email: </b> <?php echo $_su_email[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-check"></i></span>
                          <b>&nbsp;&nbsp;Tempat Tanggal Lahir: </b> <?php echo $_su_ttl[$_free_counter]; ?>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone-square"></i></span>
                          <b>&nbsp;&nbsp;Telephone: </b> <?php echo $_su_telp[$_free_counter]; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mt-2 mb-2 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-check-circle"></i></span>
                          <b>&nbsp;&nbsp;Status: </b> <?php echo $_su_hapus[$_free_counter]; ?><br/>
                        </li>
                      </ul>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span>
                          <b>&nbsp;&nbsp;Alamat : </b><?php echo $_su_alamat[$_free_counter]; ?>
                        </li>
                      </ul>
                    </div>
                    <div class="col-4">
                      <div class="row">
                        <label><small><b>Foto Profil :</b></small></label>
                      </div>
                      <div class="row text-center">
                          <!--2021-11-0195b0990c6a4770300af80f109414d318.jpg-->
                          <!--http://localhost/abc/def/geh/assets/images/image.jpg-->
                          <!--mirovtech.net/sw-content/karyawan/2021-11-0195b0990c6a4770300af80f109414d318.jpg-->
                        <!--<img src="../../dist/img/pict_2.jpeg" class="product-image" alt="Product Image"> -->
                        <!--<img src="../../mirovtech.net/sw-content/karyawan/2021-11-0195b0990c6a4770300af80f109414d318.jpg" class="product-image" alt="Product Image"> -->
                        <!--<img src="../../../2021-11-0195b0990c6a4770300af80f109414d318.jpg" class="product-image" alt="Product Image"> -->
                        <img src="<?php echo $_su_foto[$_free_counter]; ?>" class="product-image" alt="Product Image"> 
                      </div>
                      
                      
                    </div>
                  </div>
                </div>

                <div class="card-footer text-right">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
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
  include_once './m_footer.php';
  ?>





  <?php
      }
      else{
          header("location:./login.php");
      }
  ?>
