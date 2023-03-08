<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>


<?php

//error_reporting(1);


if (isset($_GET['return'])) {

    $id = $_GET['return'];

    $qry_one = "SELECT
    purchase.purchase_id,
    purchase.purchase_qty,
    products.product_id
    FROM purchase 
    LEFT JOIN products ON products.product_id = purchase.product_id 
    WHERE purchase_id=$id";

    $result_a = mysqli_query($link,$qry_one);

    while($one_row=mysqli_fetch_array($result_a)){

        $purchase_id = $one_row['purchase_id'];
        $product_id = $one_row['product_id'];
        $purchase_qty = $one_row['purchase_qty'];
        //$per = $one_row['per'];

        $sql = "UPDATE purchase SET purchase_return = 0 WHERE purchase_id=$purchase_id";

        $sql_one = "UPDATE products SET purchase_qty=purchase_qty-$purchase_qty, qty_p=qty_p-$purchase_qty, qty_s=qty_s-$purchase_qty WHERE product_id = $product_id";
        
        if ($link->query($sql) === TRUE) {           

        } else {
            echo "Error Purchase " . $link->error;
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
                    <h4 class="text-dark mb-4">ပစ္စည်းအဝင် စာရင်း အစီရင်ခံစာ</h4>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Stock In Report</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label class="form-label">နေ့ရက်ဖြင့် စစ်ထုတ်ရန်&nbsp;
                                            <input type="text" class="d-inline-block form-control  form-control-sm" placeholder="စရက်" name="min" id="min" style="max-width: 150px;">
                                            <input type="text" class="d-inline-block form-control  form-control-sm" placeholder="ဆုံးရက်" name="max" id="max" style="max-width: 150px;">
                                            &nbsp;
                                        </label>
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
                                <table class="table table-hover table-sm my-0" id="tablePurchaseReport">
                                    <thead>
                                        <tr>
                                            <th>ရက်စွဲ</th>            
                                            <th>အမျိုးအမည်</th>
                                            <th>ရေတွက်ပုံ</th>
                                            <th>အရေအတွက်</th>
                                            <th>စျေးနှုန်း</th>
                                            <th>တန်ဖိုး</th>
                                            <th>ဂိုထောင်</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $db->prepare("SELECT
                                            purchase_id,
                                            purchase_date,
                                            products.product_name,
                                            units.unit_name,
                                            purchase.purchase_qty,
                                            purchase_price,
                                            purchase_amount,
                                            supplier.supplier_name,
                                            warehouse.warehouse_name,
                                            payment.payment_name
                                            FROM purchase
                                            LEFT JOIN products ON products.product_id = purchase.product_id
                                            LEFT JOIN units ON units.unit_id = purchase.unit_id
                                            LEFT JOIN supplier ON supplier.supplier_id = purchase.supplier_id
                                            LEFT JOIN warehouse ON warehouse.warehouse_id = purchase.warehouse_id
                                            LEFT JOIN payment ON payment.payment_id = purchase.payment_id
                                            WHERE purchase_order = 1 AND purchase_return = 1
                                            ");
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {                                                
                                            ?>
                                                    <td><?php echo date_format(date_create($row['purchase_date']), "d-m-Y"); ?></td>
                                                    <td><?php echo $row['product_name']; ?></td>
                                                    <td><?php echo $row['unit_name']; ?></td>
                                                    <td><?php echo $row['purchase_qty']; ?></td>
                                                    <td><?php echo $row['purchase_price']; ?></td>
                                                    <td><?php echo $row['purchase_amount']; ?></td>
                                                    <td><?php echo $row['warehouse_name']; ?></td>
                                                    <td>
                                                        <a class="me-3" href="?return=<?php echo $row['purchase_id'];?>" id="edit">
                                                            Return
                                                        </a>                                                        
                                                        <!--<a class="me-3" href="?edit_id=<?php echo $row['purchase_id'];?>" id="edit">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        <a href="?del_id=<?php echo $row['purchase_id']; ?>" id="delete">
                                                            <i class="icon-trash"></i>
                                                        </a>-->
                                                    </td>
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
                    <div class="text-center my-auto copyright"><span>Copyright © Tstock 2022</span></div>
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