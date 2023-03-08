<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php

//error_reporting(1);


if (isset($_GET['return'])) {

    $id = $_GET['return'];

    $qry_one = "SELECT
    sale.sale_id,
    sale.sale_qty,
    products.product_id
    FROM sale 
    LEFT JOIN products ON products.product_id = sale.product_id 
    WHERE sale_id=$id";

    $result_a = mysqli_query($link,$qry_one);

    while($one_row=mysqli_fetch_array($result_a)){

        $sale_id = $one_row['sale_id'];
        $product_id = $one_row['product_id'];
        $sale_qty = $one_row['sale_qty'];

        $sql = "UPDATE sale SET sale_return = 0 WHERE sale_id=$sale_id";

        $sql_one = "UPDATE products SET sale_qty=sale_qty-$sale_qty, qty_p=qty_p+$sale_qty WHERE product_id = $product_id";
        //purchase_qty=purchase_qty-$purchase_qty, qty_p=qty_p-$purchase_qty, qty_s=qty_s-$purchase_qty

        if ($link->query($sql) === TRUE) {           

        } else {
            echo "Error Sale " . $link->error;
        }
        if ($link->query($sql_one) === TRUE) {           

        } else {
            echo "Error Product " . $link->error;
        }
        $link->close();
    }
    
}

?>

                <div class="container-fluid">
                    <h4 class="text-dark mb-4"> Drinking Water Selling Report </h4>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Daily Report</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        
                                        <input type="text" class="d-inline-block form-control  form-control-sm" placeholder="စရက်" name="min" id="min" style="max-width: 150px;">
                                            
                                    </div>
                                </div>

                                <div class="col-md-3 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        
                                        <input type="text" class="d-inline-block form-control  form-control-sm" placeholder="ဆုံးရက်" name="max" id="max" style="max-width: 150px;">
                                            &nbsp;
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                        <!-- <label class="form-label">
                                            <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                                        </label> -->
                                    </div>
                                </div>
                                
                            </div>
                            <div class="table-responsive table mt-2">
                                <table class="table table-hover display nowrap text-nowrap table-sm my-0" style="width:100%" id="tablePurchaseReport">
                                    <thead>
                                        <tr>
                                            <th>ရက်စွဲ</th>           
                                            <th> အမည် </th>
                                            <th> ငှားရမ်းဗူး </th>
                                            <th> ပြန်ရဗူးခွံ </th>
                                            <th> ရရန်ကျန်ဗူးခွံ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $db->prepare("SELECT
                                            *
                                            FROM water_distribution
                                            LEFT JOIN customer ON customer.customer_id = water_distribution.customer_id
                                            ");
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {                                                
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['sale_date']; ?></td>
                                                    <td><?php echo $row['customer_name']; ?></td>
                                                    <td><?php echo $row['rent_no']; ?></td>
                                                    <td><?php echo $row['return_no']; ?></td>
                                                    <td><?php echo $row['new_rent_balance']; ?></td>
                                                </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody> 
                                    
                                </table>
                            </div>
                            <div class="row">
                                
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

</body>

</html>