<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php include 'update_var.php'; ?>

<div class="container-fluid">
    <h3 class="text-dark mb-4">ဖောက်သည်များ</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form action="functions.php" method="POST">
                <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                <div class="row">
                    <div class="col-md-3 d-grid">
                        <label class="col-form-label">အမည်<br>
                            <input class="form-control" type="text" id="customer_name" name="customer_name" value="<?php echo $a; ?>" required>
                        </label>
                    </div>

                    <div class="col-md-2 d-grid">
                        <label class="col-form-label">ဖုန်း
                            <input class="form-control" type="text" id="customer_phone" name="customer_phone" value="<?php echo $b; ?>" required>
                        </label>
                    </div>
                    <div class="col-md-3 d-grid">
                        <label class="col-form-label">လိပ်စာ
                            <input class="form-control" type="text" id="customer_address" name="customer_address" value="<?php echo $c; ?>" required>
                        </label>
                    </div>

                    

                    <div class="col-md-2 d-grid">
                        <label class="col-form-label">ရရန်ကျန် ရေဗူးခွံ
                            <input class="form-control" type="number" id="rent_balance" name="rent_balance" value="<?php echo $e; ?>" required>
                        </label>
                    </div>

                    <div class="col-md-2 d-grid">
                        <label class="col-form-label">&nbsp;

                            <?php if ($update == true) { ?>
                                <button class="btn btn-success form-control" id="update_customer" type="submit" name="update_customer">Update</button>
                                <a class="btn btn-outline-warning form-control" href="customer.php">Cancel</a>
                            <?php } else { ?>
                                <button class="btn btn-primary form-control" id="save_customer" type="submit" name="save_customer">Save</button>
                            <?php } ?>
                            
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">ဖောက်သည်များ စာရင်း</p>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-2"> <!-- <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info"> -->
                <table id="tableCustomer" class="table table-striped table-sm display nowrap text-nowrap" style="width:100%"><!-- class="table table-striped display nowrap" style="width:100%" class="table table-hover table-sm my-0 display nowrap text-nowrap" -->
                    <thead>
                        <tr>
                        <th> စဉ် </th>
                            <th>အမည်</th>
                            <th>ဖုန်း</th>
                            <th>လိပ်စာ</th>
                            <th> ရရန်ကျန်ရေဗူးခွံ </th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
                            $result->execute();
                            for ($i = 1; $row = $result->fetch(); $i++) {                                
                            ?>
                                <tr class="record">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['customer_name']; ?></td>
                                    <td><?php echo $row['customer_phone']; ?></td>
                                    <td><?php echo $row['customer_address']; ?></td>
                                    <td><?php echo $row['rent_balance']; ?></td>
                                    <td class="text-end">
                                        <a class="p-1 me-2" href="?customer_update=<?php echo $row['customer_id']; ?>">
                                        <i class="fa fa-edit"></i></a>
                                        <a class="p-1" href="?customer_delete=<?php echo $row["customer_id"]; ?>" onclick="return confirm('Do you want delete this record?');">
                                        <i class="fa fa-trash text-danger"></i></a>
                                    </td>
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