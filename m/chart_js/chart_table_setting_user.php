<?php 
  if($_global_script_program == 91){
?>

<script>
    function validasi(form){
          if (form.su_user_nik_add.value=="") {
              alert("NIK Tidak Boleh Kosong");
              form.su_user_nik_add.focus();
              return(false);
          }
          if (form.su_user_email_add.value=="") {
              alert("Alamat Email Tidak Boleh Kosong");
              form.su_user_email_add.focus();
              return(false);
          }
          if (form.su_user_nama_add.value=="") {
              alert("Nama Tidak Boleh Kosong");
              form.su_user_nama_add.focus();
              return(false);
          }
          if (form.su_user_nickname_add.value=="") {
              alert("Nickname Tidak Boleh Kosong");
              form.su_user_nickname_add.focus();
              return(false);
          }
          if (form.su_user_telp_add.value=="") {
              alert("Telepone Tidak Boleh Kosong");
              form.su_user_telp_add.focus();
              return(false);
          }
          if (form.su_user_alamat_add.value=="") {
              alert("Alamat Tidak Boleh Kosong");
              form.su_user_alamat_add.focus();
              return(false);
          }
        return(true);
    }
</script>

<?php
  }
?>



<?php 
  if($_global_script_program == 92){
?>

<script>
    function validasi(form){
          if (form.su_user_nik_edit.value=="") {
              alert("NIK Tidak Boleh Kosong");
              form.su_user_nik_edit.focus();
              return(false);
          }
          if (form.su_user_email_edit.value=="") {
              alert("Alamat Email Tidak Boleh Kosong");
              form.su_user_email_edit.focus();
              return(false);
          }
          if (form.su_user_nama_edit.value=="") {
              alert("Nama Tidak Boleh Kosong");
              form.su_user_nama_edit.focus();
              return(false);
          }
          if (form.su_user_nickname_edit.value=="") {
              alert("Nickname Tidak Boleh Kosong");
              form.su_user_nickname_edit.focus();
              return(false);
          }
          if (form.su_user_telp_edit.value=="") {
              alert("Telepone Tidak Boleh Kosong");
              form.su_user_telp_edit.focus();
              return(false);
          }
          if (form.su_user_alamat_edit.value=="") {
              alert("Alamat Tidak Boleh Kosong");
              form.su_user_alamat_edit.focus();
              return(false);
          }
        return(true);
    }
</script>

<?php
  }
?>


<?php 
  if($_global_script_program == 93){
?>

<script>
    function validasi(form){
          if (form.su_user_username_edit_admin.value=="") {
              alert("Username Tidak Boleh Kosong");
              form.su_user_username_edit_admin.focus();
              return(false);
          }
          if (form.su_user_email_edit_admin.value=="") {
              alert("Alamat Email Tidak Boleh Kosong");
              form.su_user_email_edit_admin.focus();
              return(false);
          }
          if (form.su_user_name_edit_admin.value=="") {
              alert("Nama Tidak Boleh Kosong");
              form.su_user_name_edit_admin.focus();
              return(false);
          }
          if (form.su_user_pass_edit_admin.value=="") {
              alert("Password Tidak Boleh Kosong");
              form.su_user_pass_edit_admin.focus();
              return(false);
          }
        return(true);
    }
</script>

<?php
  }
?>


<script>
  $(function () {
    $('#date_dsn_1').daterangepicker({
      singleDatePicker: true,
      // maxDate: "29 NOVEMBER 2021",
      maxDate: "<?php echo $tanggal_limit_max; ?>",
      locale: {
        format: "D MMM YYYY",
      }
      
    })

    $('#date_ttl_1').daterangepicker({
      singleDatePicker: true,
      maxDate: "<?php echo $tanggal_limit_max; ?>",
      locale: {
        format: "D MMMM YYYY",
      }
      
    })
    $('#date_ttl_3').daterangepicker({
      singleDatePicker: true,
      maxDate: "<?php echo $tanggal_limit_max; ?>",
      locale: {
        format: "D MMMM YYYY",
      }
      
    })
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "lengthChange": false,
      "searching": false,
      "pageLength": 7,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })



</script>

