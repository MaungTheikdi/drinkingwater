</div>
<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Copyright © Theikdi Maung</span></div>
    </div>
</footer>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>


<script src="assets/bootstrap/js/bootstrap.min.js?h=1eb47230ed13e88113270f63f470e160"></script>
<script src="assets/js/chart.min.js?h=320bd0471c3e8d6b9dd55c98e185506c"></script>
<script src="assets/js/script.min.js?h=54606dd47d265960e4f87e56fbe7f6ac"></script>




<!-- Data Table 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>-->

<script src="assets/jquery-3.5.1.js"></script>
<script src="assets/jquery.dataTables.min.js"></script>
<script src="assets/dataTables.bootstrap5.min.js"></script>

<!-- MDB -->

<!-- Select -->
<script src="assets/library/dselect/dselect.js"></script>
<!--
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/datatables.min.js"></script>
-->
<script type="text/javascript" src="assets/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/datatables.min.js"></script>

<!-- Data Table Date Range 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>-->

<script src="assets/moment.min.js"></script>
<script src="assets/dataTables.dateTime.min.js"></script>

<!--<script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>-->

<script>
    $(document).ready(function () {
        $('#tableProduct').DataTable({
            footerCallback: function (row, data, start, end, display) {

                var api = this.api();    
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };    
                // Total over all pages
                total = api
                    .column(5)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);    
                // Total over this page
                pageTotal = api
                    .column(5, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(5).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
            },
        });
    });
</script>



<script>
    // search
    dselect(document.querySelector('#category'), {
        search: true,
        maxHeight: '360px',
    })
    
    dselect(document.querySelector('#unit'), {
        search: true,
        maxHeight: '360px',
    })
    
</script>
<script>
    dselect(document.querySelector('#unit_id'), {
        search: true,
        maxHeight: '360px',
    })
    
</script>
<script>
    dselect(document.querySelector('#supplier_id'), {
        search: true,
        maxHeight: '360px',
    })
</script>
<script>
    dselect(document.querySelector('#product_id'), {
        search: true,
        maxHeight: '360px',
    })
</script>
<script>
    dselect(document.querySelector('#company'), {
        search: true,
        maxHeight: '360px',
    })
</script>
<script>
    dselect(document.querySelector('#purchase_unit_id'), {
        search: true,
        maxHeight: '360px',
    })
</script>

<script>
    dselect(document.querySelector('#company_id'), {
        search: true,
        maxHeight: '360px',
    })
</script>

<script>
    dselect(document.querySelector('#purchase_unit'), {
        search: true,
        maxHeight: '360px',
    })
</script>
<script>
    dselect(document.querySelector('#sale_unit'), {
        search: true,
        maxHeight: '360px',
    })
</script>


<script>
    /* Custom filtering function which will search data in column four between two values */
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var min = parseInt($('#min').val(), 10);
        var max = parseInt($('#max').val(), 10);
        var age = parseFloat(data[3]) || 0; // use data for the age column

        if (
            (isNaN(min) && isNaN(max)) ||
            (isNaN(min) && age <= max) ||
            (min <= age && isNaN(max)) ||
            (min <= age && age <= max)
        ) {
            return true;
        }
        return false;
    });

    $(document).ready(function() {
        var table = $('#example').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').keyup(function() {
            table.draw();
        });
    });
</script>

<!-- Custom filtering function which will search data with date in column 4 between two values -->
<script>
    var minDate, maxDate;

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[4]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        // DataTables initialisation
        var table = $('#example').DataTable();

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#tableSupplier').DataTable({
            dom: 'Bfrtip',
            buttons: ['excelHtml5', 'print']
        });
        $('#tableCustomer').DataTable({
            scrollX:true
            //dom: 'Bfrtip',
            //buttons: ['excelHtml5', 'print']
        });
        $('#tableCustomerRp').DataTable({
            scrollX:true,
            dom: 'Bfrtip',
            buttons: ['excelHtml5', 'print']
        });
        //$('#tableProduct').DataTable({
           // dom: 'Bfrtip',
           // buttons: ['excelHtml5', 'print']
            //var sum = $("#tableProduct").DataTable().column(5).data().sum();
            //$('#total').html(sum);
        //});
        $('#tableExpenses').DataTable({
            dom: 'Bfrtip',
            buttons: ['excelHtml5', 'print']
        });

        $('#tableNoStockDash').DataTable({
            
        });



        $(".buttons-excel").css("background-color", "#147874");

        $(".buttons-print").css("background-color", "#858796");

    });
</script>
</body>

</html>