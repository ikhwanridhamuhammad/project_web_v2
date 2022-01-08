<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,  
      "lengthChange": false,
      "pageLength": 7,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>