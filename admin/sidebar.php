  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4  text-sm">

    <li class="text-center mb-3 mt-4 mr-4 ">
      <a href="./index.php"><img src="../dist/img/sn5.png" class="user-image img-responsive"  style="width: 90%; height: 90%"></a>
    </li>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?php if($_global_page_program <= 2){echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if($_global_page_program <= 2){echo "active";} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./dashboard.php" class="nav-link <?php if($_global_page_program == 1){echo "active";} ?>">  
                  <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                  <p>Dashboard Today</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./dashboard_detail.php" class="nav-link <?php if($_global_page_program == 2){echo "active";} ?>"> 
                  <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                  <p>Dashboard Detail</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./riwayat_absensi.php" class="nav-link <?php if($_global_page_program == 3){echo "active";} ?>">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Riwayat Absensi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./pemasukan_outlet.php" class="nav-link <?php if($_global_page_program == 4){echo "active";} ?>">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Pemasukan Outlet
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($_global_page_program >= 5 && $_global_page_program <=6){echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if($_global_page_program >= 5 && $_global_page_program <=6){echo "active";} ?>">
              <i class="nav-icon fas fa-random"></i>
              <p>
                Smart Nitro
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./selisih_smart_nitro.php" class="nav-link <?php if($_global_page_program == 5){echo "active";} ?>">  
                  <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                  <p>Selisih Smart Nitro</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./data_smart_nitro.php" class="nav-link <?php if($_global_page_program == 6){echo "active";} ?>"> 
                  <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                  <p>Data Smart Nitro</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview <?php if($_global_page_program >= 7 && $_global_page_program <=9){echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if($_global_page_program >= 7 && $_global_page_program <=9){echo "active";} ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./setting_outlet.php" class="nav-link <?php if($_global_page_program == 7){echo "active";} ?>">  
                  <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                  <p>Setting Outlet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./setting_shift.php" class="nav-link <?php if($_global_page_program == 8){echo "active";} ?>"> 
                  <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                  <p>Setting Shift</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./setting_user.php" class="nav-link <?php if($_global_page_program == 9){echo "active";} ?>"> 
                  <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                  <p>Setting User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="./logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>




