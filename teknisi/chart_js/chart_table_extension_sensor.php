
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


  $(function () {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [<?php echo $_db_id___grafik_nama;?>],
      datasets: [
        {
          label               : 'Tambah Motor',
          backgroundColor     : 'rgba(23,162,184,0)',
          borderColor         : 'rgba(23,162,184,0.8)',
          pointRadius         : 1,
          LabelAngle          : 45,
          data                : [<?php echo $_db_id___grafik_data_abc_1;?>],
        },
        {
          label               : 'Isi Baru Motor',
          backgroundColor     : 'rgba(23,162,184,0)',
          borderColor         : 'rgba(220,53,69,0.8)',
          pointRadius         : 1,
          LabelAngle          : 45,
          data                : [<?php echo $_db_id___grafik_data_abc_3;?>],
        },
        {
          label               : 'Tambah Mobil',
          backgroundColor     : 'rgba(23,162,184,0)',
          borderColor         : 'rgba(40,167,69,0.8)',
          pointRadius         : 1,
          LabelAngle          : 45,
          data                : [<?php echo $_db_id___grafik_data_abc_2;?>],
        },
        {
          label               : 'Isi Baru Mobil',
          backgroundColor     : 'rgba(23,162,184,0)',
          borderColor         : 'rgba(255,193,7,0.8)',
          pointRadius         : 1,
          LabelAngle          : 45,
          data                : [<?php echo $_db_id___grafik_data_abc_4;?>],
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      datasetFill : false,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          },
          ticks     : {
            maxRotation : 35,
            minRotation : 35,
          },
          scaleLabel: {
            display: false,
            labelString: 'Waktu',
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          },
          scaleLabel: {
            display: true,
            labelString: 'Total Ban'
          }
        }],
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })



  });//_grafik_chart_data

</script>

