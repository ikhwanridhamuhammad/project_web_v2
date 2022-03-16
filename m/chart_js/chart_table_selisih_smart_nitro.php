<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,  
      "lengthChange": false,
      "searching": false,
      "pageLength": 10,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    $("#table_ssn").DataTable({
      "lengthChange": true,
      "searching": true,
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
