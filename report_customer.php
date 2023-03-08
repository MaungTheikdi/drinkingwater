<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php

//error_reporting(1);


?>

                <div class="container-fluid">
                    <h4 class="text-dark mb-4"> Drinking Water Customer Report </h4>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Customer Report</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                        <!-- <label class="form-label">
                                            <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                                        </label> -->
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 mt-2">

                                    <table id="tableCustomerRp" class="table table-striped table-sm display nowrap text-nowrap" style="width:100%"><!-- class="table table-striped display nowrap" style="width:100%" class="table table-hover table-sm my-0 display nowrap text-nowrap" -->
                                    <!--<table class="table table-hover display nowrap text-nowrap table-sm my-0" style="width:100%" id="">-->
                                        <thead>
                                        <tr>
                                            <th> စဉ် </th>
                                            <th>အမည်</th>
                                            <th>ဖုန်း</th>
                                            <th>လိပ်စာ</th>
                                            <th> ရရန်ကျန်ရေဗူး </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $result = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
                                                $result->execute();
                                                for ($i = 1; $row = $result->fetch(); $i++) {                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['customer_name']; ?></td>
                                                    <td><?php echo $row['customer_phone']; ?></td>
                                                    <td><?php echo $row['customer_address']; ?></td>
                                                    <td><?php echo $row['rent_balance']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody> 
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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


<!-- Data Table -->
<script src="assets/library/datatable/jquery-3.5.1.js"></script>
<script src="assets/library/datatable/jquery.dataTables.min.js"></script>
<script src="assets/library/datatable/dataTables.bootstrap5.min.js"></script>

<!-- Select -->
<script src="assets/library/dselect/dselect.js"></script>

<script type="text/javascript" src="assets/library/datatable/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/library/datatable/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/library/datatable/datatables.min.js"></script>

<!-- Data Table Date Range -->
<script src="assets/library/datatable/moment.min.js"></script>
<script src="assets/library/datatable/dataTables.dateTime.min.js"></script>
    

    <!-- Custom filtering function which will search data with date in column 4 between two values -->
    <script>
        var minDate, maxDate;

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[0]);

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
            var table = $('#tablePurchaseReport').DataTable({
                scrollX:true,
                dom: 'Bfrtip',
                buttons: [ 'excelHtml5', 'print' ]
            });

            

            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();
            });

            $(".buttons-excel").css("background-color", "#147874");
            $(".buttons-print").css("background-color", "#858796");
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