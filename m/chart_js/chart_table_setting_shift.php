
<?php if($_page_program_shift == 1) { ?>
<script>
    function validasi(form){
          if (form.ss_shift_input.value == "") {
              alert("Nama Shift Tidak Boleh Kosong");
              form.ss_shift_input.focus();
              return(false);
          }
          if (form.time_in_input.value == form.time_out_input.value) {
              alert("Jam Shift Tidak Boleh Sama");
              form.time_out_input.focus();
              return(false);
          }
        return(true);
    }
</script>
<?php } ?>

<?php if($_page_program_shift == 2) { ?>
<script>
    function validasi(form){
          if (form.ss_shift_input_add.value == "") {
              alert("Nama Shift Tidak Boleh Kosong");
              form.ss_shift_input_add.focus();
              return(false);
          }
          if (form.time_in_input_add.value == form.time_out_input_add.value) {
              alert("Jam Shift Tidak Boleh Sama");
              form.time_out_input_add.focus();
              return(false);
          }
        return(true);
    }
</script>
<?php } ?>

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

    $('#date_dsn_2').daterangepicker({
      singleDatePicker: true,
      maxDate: "<?php echo $tanggal_limit_max; ?>",
      locale: {
        format: "D MMM YYYY",
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
      "pageLength": 5,
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

