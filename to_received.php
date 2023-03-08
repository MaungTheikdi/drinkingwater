<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php


if (isset($_GET['received_update'])) {
    $id = $_GET['received_update'];
    $sql = "UPDATE sale SET payment_id = 2 WHERE sale_id=$id";
    if ($link->query($sql) === TRUE) {
        //
    } else {
        echo "Error deleting record: " . $link->error;
    }
    $link->close();
}

?>

                <div class="container-fluid">
                    <h4 class="text-dark mb-4">ရရန်ရှိရန်ရှိ စာရင်း</h4>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">ဝယ်သူများ ထံမှ ရရန် စာရင်း</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-hover table-sm my-0" id="tableNoStock">
                                    <thead>
                                        <tr>
                                            <th>ရက်စွဲ</th>            
                                            <th>အမျိုးအမည်</th>
                                            <th>ရေတွက်ပုံ</th>
                                            <th>အရေအတွက်</th>
                                            <th>စျေးနှုန်း</th>
                                            <th>တန်ဖိုး</th>
                                            <th>ဝယ်သူ</th>
                                            <th>ဂိုထောင်</th>
                                            <th>ပေးခြေစနစ်</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $db->prepare("SELECT
                                            sale_id,
                                            sale_date,
                                            products.product_name,
                                            units.unit_name,
                                            sale.sale_qty,
                                            sale_price,
                                            sale_amount,
                                            customer.customer_name,
                                            warehouse.warehouse_name,
                                            payment.payment_name
                                            FROM sale
                                            LEFT JOIN products ON products.product_id = sale.product_id
                                            LEFT JOIN units ON units.unit_id = sale.unit_id
                                            LEFT JOIN customer ON customer.customer_id = sale.customer_id
                                            LEFT JOIN warehouse ON warehouse.warehouse_id = sale.warehouse_id
                                            LEFT JOIN payment ON payment.payment_id = sale.payment_id
                                            WHERE sale_order = 1 AND sale.payment_id = 1
                                            ");
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {                                                
                                            ?>
                                                    <td><?php echo date_format(date_create($row['sale_date']),"d-m-Y") ; ?></td>
                                                    <td><?php echo $row['product_name']; ?></td>
                                                    <td><?php echo $row['unit_name']; ?></td>
                                                    <td><?php echo $row['sale_qty']; ?></td>
                                                    <td><?php echo $row['sale_price']; ?></td>
                                                    <td><?php echo $row['sale_amount']; ?></td>
                                                    <td><?php echo $row['customer_name']; ?></td>
                                                    <td><?php echo $row['warehouse_name']; ?></td>
                                                    <td><?php echo $row['payment_name']; ?></td>
                                                    <td>
                                                        <a class="me-3"href="?received_update=<?php echo $row['sale_id']; ?>">
                                                            ရှင်းပြီး
                                                        </a>
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

    <script>
        $(document).ready(function() {
            $('#tableNoStock').DataTable( {
                dom: 'Bfrtip',
                buttons: [ 'excelHtml5', 'print' ]
            } );
            $(".buttons-excel").css("background-color", "#147874");
            $(".buttons-print").css("background-color", "#858796");
        } );  
    </script>

</body>

</html>