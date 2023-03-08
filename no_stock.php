<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

                <div class="container-fluid">
                    <h4 class="text-dark mb-4">လက်ကျန်မရှိသော ပစ္စည်းများ စာရင်း</h4>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">0 Stock Product</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-hover table-sm my-0" id="tableNoStock">
                                    <thead>
                                        <tr>
                                            <th>စဉ်</th>
                                            <th>အမည်</th>
                                            <th>ရေတွက်ပုံ</th>
                                            <th class="text-end">ရောင်း‌ဈေး</th>
                                            <th class="text-center">လက်ကျန် အရေအတွက်</th>
                                            <th>တည်နေရာ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php //product_id	product_name	category_id	
                                                $result = $db->prepare("SELECT 
                                                `product_id` AS pid,
                                                `product_name`,
                                                company.company_id,
                                                company.company_name,
                                                units.unit_name AS purchase_unit_name,
                                                `purchase_qty`,
                                                `sale_qty`,
                                                `selling_price`,
                                                `purchasing_price`,
                                                qty_p,
                                                qty_s,
                                                warehouse.warehouse_id,
                                                warehouse.warehouse_name,
                                                `noti`
                                                FROM products 
                                                LEFT JOIN units ON units.unit_id = products.purchase_unit
                                                LEFT JOIN company ON company.company_id = products.company_id    
                                                LEFT JOIN warehouse ON warehouse.warehouse_id = products.warehouse_id
                                                WHERE qty_p < 1
                                                ORDER BY products.product_id DESC");
                                                $result->execute();
                                                for ($i = 0; $row = $result->fetch(); $i++) {  
                                                    //Profit
                                                    //$purchaseUnitQty = $row['qty_s'];
                                                    $a = $row['qty_p']*$row['purchasing_price']; 
                                                    $b = $row['qty_p']*$row['selling_price'];
                                                ?>
                                                   <tr class="record">
                                                                                                        
                                                        <td><?php echo $i+1; ?></td>
                                                        <td><?php echo $row['product_name']." - ".$row['company_name']; ?></td>
                                                        <td><?php echo $row['purchase_unit_name']; ?></td>

                                                        <td class="pe-4 text-end"><?php echo $row['selling_price']; ?></td>

                                                        <td class="text-center"><?php echo $row['qty_p']; ?></td>
                                                        
                                                        <td><?php echo $row['warehouse_name']; ?></td>
                                                        
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