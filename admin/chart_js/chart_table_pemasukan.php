<script>
  $(function () {
    $("#example1").DataTable();
    $("#table_po_1").DataTable({
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": true,
    });
    $("#table_po_2").DataTable({
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": true,
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

  })
</script>

<script>
  $(function () {



    $('#date_1').daterangepicker({
      singleDatePicker: true,
      locale: {
        format: "D MMM YY",
      },
      // maxDate: '20 September 2020',  
      // maxDate: '<?php echo date("j F Y"); ?>',  
    })
  })

</script>


<script>
    //Date range picker with time picker
  $(function () {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [<?php echo $____po_grafik_nama_2;?>],
      datasets: [
        {
          label               : 'Total',
          backgroundColor     : 'rgba(40,167,69,0.8)',
          borderColor         : 'rgba(0,0,0,1)',
          pointRadius         : 5,
          LabelAngle          : 45,
          data                : [<?php echo $____po_grafik_data_2;?>],
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    // return 'Rp. ' + tooltipItem;
                    // return 'Rp. ' + tooltipItem.yLabel;
                    return 'Rp. ' + Intl.NumberFormat().format(tooltipItem.yLabel) + '  ,-';
                }
            }
        },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          },
          ticks     : {
            maxRotation : 35,
            minRotation : 0,
          },
        }],
        yAxes: [{
          display: true,
          gridLines : {
            display : true,
          },
          ticks     : {
            maxRotation : 45,
            minRotation : 0,
            callback: function(value, index, values) {
                        return ''+Intl.NumberFormat().format(value/1000) + ' K';
                        // return 'Rp. ' + value;
                    }
          },
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



<script>
    //Date range picker with time picker
  $(function () {
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')

    var lineChartData = {
      labels  : [<?php echo $____po_grafik_nama_1;?>],
      datasets: [
        {
          label               : 'Total',
          backgroundColor     : 'rgba(40,167,69,0.8)',
          borderColor         : 'rgba(0,0,0,1)',
          pointRadius         : 5,
          LabelAngle          : 45,
          data                : [<?php echo $____po_grafik_data_1;?>],
        },
      ]
    }

    var lineChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    // return 'Rp. ' + tooltipItem;
                    // return 'Rp. ' + tooltipItem.yLabel;
                    return 'Rp. ' + Intl.NumberFormat().format(tooltipItem.yLabel) + '  ,-';
                }
            }
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
        }],
        yAxes: [{
          display: true,
          gridLines : {
            display : true,
          },
          ticks     : {
            maxRotation : 35,
            minRotation : 35,
            callback: function(value, index, values) {
                        return ''+Intl.NumberFormat().format(value/1000) + ' K';
                        // return 'Rp. ' + value;
                    }
          },
        }],
      }
    }

    // This will get the first returned node in the jQuery collection.
    var lineChart       = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    })



  });//_grafik_chart_data

</script>


<script>
    //Date range picker with time picker
  $(function () {
    var line2ChartCanvas = $('#line2Chart').get(0).getContext('2d')

    var line2ChartData = {
      labels  : [<?php echo $____po_grafik_nama_1;?>],
      datasets: [
        {
          label               : 'Total',
          backgroundColor     : 'rgba(40,167,69,0.8)',
          borderColor         : 'rgba(0,0,0,1)',
          pointRadius         : 5,
          LabelAngle          : 45,
          data                : [<?php echo $____po_grafik_datt_1;?>],
        },
      ]
    }

    var line2ChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    // return 'Rp. ' + tooltipItem;
                    // return 'Rp. ' + tooltipItem.yLabel;
                    return 'Rp. ' + Intl.NumberFormat().format(tooltipItem.yLabel) + '  ,-';
                }
            }
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
        }],
        yAxes: [{
          display: true,
          gridLines : {
            display : true,
          },
          ticks     : {
            maxRotation : 35,
            minRotation : 35,
            callback: function(value, index, values) {
                        return ''+Intl.NumberFormat().format(value/1000) + ' K';
                        // return 'Rp. ' + value;
                    }
          },
        }],
      }
    }

    // This will get the first returned node in the jQuery collection.
    var line2Chart       = new Chart(line2ChartCanvas, { 
      type: 'line',
      data: line2ChartData, 
      options: line2ChartOptions
    })



  });//_grafik_chart_data

</script>