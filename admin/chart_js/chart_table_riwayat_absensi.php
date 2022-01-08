<script>
    function validasi(form){
          if (form.ea_tambal_motor.value=="") {
              alert("Nilai Tambal Motor Tidak Boleh Kosong");
              form.ea_tambal_motor.focus();
              return(false);
          }
          if (form.ea_tambal_mobil.value=="") {
              alert("Nilai Tambal Mobil Tidak Boleh Kosong");
              form.ea_tambal_mobil.focus();
              return(false);
          }
          if (form.ea_promo_mobil.value=="") {
              alert("Nilai Promo Mobil Tidak Boleh Kosong");
              form.ea_promo_mobil.focus();
              return(false);
          }
          if (form.ea_promo_motor.value=="") {
              alert("Nilai Promo Motor Tidak Boleh Kosong");
              form.ea_promo_motor.focus();
              return(false);
          }
          if (form.ea_error_mobil.value=="") {
              alert("Nilai Error Mobil Tidak Boleh Kosong");
              form.ea_error_mobil.focus();
              return(false);
          }
          if (form.ea_error_motor.value=="") {
              alert("Nilai Error Motor Tidak Boleh Kosong");
              form.ea_error_motor.focus();
              return(false);
          }
          if (form.ea_omset.value=="") {
              alert("Nilai Omset Tidak Boleh Kosong");
              form.ea_omset.focus();
              return(false);
          }
          if (form.ea_kwh.value=="") {
              alert("Nilai KWh Listrik PLN Tidak Boleh Kosong");
              form.ea_kwh.focus();
              return(false);
          }
        return(true);
    }
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  $(function () {
    $('#date_1').daterangepicker({
      singleDatePicker: true,
      // maxDate: "29 NOVEMBER 2021",
      maxDate: "<?php echo $tanggal_limit_max; ?>",
      locale: {
        format: "D MMM YYYY",
      }
      
    })

    $('#date_2').daterangepicker({
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