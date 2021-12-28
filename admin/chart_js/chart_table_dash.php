<script>
    //Date range picker with time picker
  $(function () {
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false ,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });

  $(function () {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [<?php echo $___dash_grafik_nama;?>],
      datasets: [
        {
          label               : 'Total',
          backgroundColor     : 'rgba(23,162,184,0.8)',
          borderColor         : 'rgba(0,0,0,1)',
          pointRadius         : 5,
          LabelAngle          : 45,
          data                : [<?php echo $____dash_grafik_omset;?>],
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
            display : false,
          },
          ticks     : {
            maxRotation : 45,
            minRotation : 0,
          },
        }],
        yAxes: [{
          display: false,
          gridLines : {
            display : false,
          },
          ticks     : {
            stepSize: <?php echo ($____total_max_omset+130000)/2;?>,
            maxRotation : 35,
            minRotation : 35,
            callback: function(value, index, values) {
                        return 'Rp. '+Intl.NumberFormat().format(value/1000) + ' K';
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
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold',
    stepSize: <?php echo ($____total_max_omset+130000)/2;?>,
  }


  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : [<?php echo $___dash_grafik_nama;?>],
      datasets: [
        {
          label          : 'Smart Nitro',
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [<?php echo $____dash_grafik_omset;?>],
        },
        {
          label          : 'Report',
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [10000, 300000, 400000, 0],
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      legend             : {
        display: true
      },
      scales             : {
        yAxes: [{
          display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : false,
          gridLines: {
            display: true
          },
          ticks    : ticksStyle
        }]
      }
    }
  })


})

  $(function () {
    $("#tabel_dash_1").DataTable({
      <?php
        if($____dash_counter_data < 7){ ?>
          "paging": false, 
          <?php
        }
        else{ ?>
          "paging": true, 
        <?php }
      ?>
      "lengthChange": false,
      "pageLength": 7,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
    });
  })


</script>