<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      <?php
        if($____deta_counter<=10){ ?>
        "paging": false,
      <?php
        }
        else{ ?>
        "paging": true,  
      <?php
        }
      ?>
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>