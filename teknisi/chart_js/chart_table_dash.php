


<script>

  $(function () {
    $("#tabel_dash_1").DataTable({
      "paging": true,
      "lengthChange": false,
      <?php if(($____dash_counter_data - $____dash_counter_status) > 20) {?>
        "pageLength": 15,
      <?php } ?>
      <?php if(($____dash_counter_data - $____dash_counter_status) <=20) {?>
        "pageLength": <?php echo ($____dash_counter_data - $____dash_counter_status)+3 ; ?>,
      <?php } ?>
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
    });
  })


</script>