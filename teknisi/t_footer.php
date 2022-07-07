
  <footer class="main-footer text-sm">
    <strong>Copyright &copy; 2019-2021  </strong>
     SMARTNITRO by MIROVTECH.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 4.10.5
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/sparklines/sparkline.js"></script>
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<?php
  if($_global_page_program == 1){include_once './chart_js/chart_table_dash.php';}
  if($_global_page_program == 2){include_once './chart_js/chart_table_data_smart_nitro.php';}
  if($_global_page_program == 5){include_once './chart_js/chart_table_extension_sensor.php';}
  if($_global_page_program == 3){include_once './chart_js/chart_table_paket_data.php';}
  if($_global_page_program == 4){include_once './chart_js/chart_table_top_up.php';}
  
  // if($_global_page_program == 3){include_once './chart_js/chart_table_riwayat_absensi.php';}
  // if($_global_page_program == 4){include_once './chart_js/chart_table_pemasukan.php';}
  // if($_global_page_program == 10){include_once './chart_js/chart_table_pemasukan.php';}
  // if($_global_page_program == 5){include_once './chart_js/chart_table_selisih_smart_nitro.php';}
  // if($_global_page_program == 6){include_once './chart_js/chart_table_data_smart_nitro.php';}
  // if($_global_page_program == 7){include_once './chart_js/chart_table_setting_outlet.php';}
  // if($_global_page_program == 8){include_once './chart_js/chart_table_setting_shift.php';}
  // if($_global_page_program == 9){include_once './chart_js/chart_table_setting_user.php';}
?>

<?php
?>

</body>
</html>



<?php 
  if($_global_page_program == 2){include_once './aksi/data_smart_nitro.php';}
  if($_global_page_program == 3){include_once './aksi/data_paket_data.php';}
  if($_global_page_program == 5){include_once './aksi/extension_sensor.php';}


  // if($_global_page_program == 3){include_once './aksi/riwayat_absensi.php';}
  // if($_global_page_program == 4){include_once './aksi/pemasukan.php';}
  // if($_global_page_program == 10){include_once './aksi/pemasukan_sn.php';}
  // if($_global_page_program == 6){include_once './aksi/data_smart_nitro.php';}
  // if($_global_page_program == 7){include_once './aksi/setting_outlet.php';}
  // if($_global_page_program == 8){include_once './aksi/setting_shift.php';}
  // if($_global_page_program == 9){include_once './aksi/setting_user.php';}
?>