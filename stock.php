<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>


                <div class="container-fluid">
                    <h4 class="text-dark mb-4">ပစ္စည်းလက်ကျန် စာရင်း</h4>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label class="form-label">လက်ကျန် စစ်ထုတ်ရန်&nbsp;
                                            <input type="text" class="d-inline-block form-control  form-control-sm" placeholder="အနည်းဆုံးအရေအတွက်" name="min" id="min" style="max-width: 150px;">
                                            <input type="text" class="d-inline-block form-control  form-control-sm" placeholder="အများဆုံးအရေအတွက်" name="max" id="max" style="max-width: 150px;">
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
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-hover table-sm my-0" id="tableStock">
                                    <thead>
                                        <tr>
                                            <th>စဉ်</th>
                                            <th>အမည်</th>
                                            <th class="text-center">ရေတွက်ပုံ</th>
                                            <th class="text-end">ဝယ်ဈေး</th>
                                            <th class="text-end">ရောင်း‌ဈေး</th>
                                            <th class="text-center">လက်ကျန်(#)</th>
                                            <th class="text-end">လက်ကျန်(ကျပ်)</th>
                                            <th class="text-end">အမြတ်ရနိုင်မှု</th>
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
                                                ORDER BY products.product_id DESC");
                                                $result->execute();
                                                for ($i = 0; $row = $result->fetch(); $i++) {  
                                                    //Profit
                                                    $purchaseUnitQty = $row['qty_p'];
                                                    $a = $row['qty_p']*$row['purchasing_price']; 
                                                    $b = $row['qty_p']*$row['selling_price'];
                                                ?>
                                                    <?php
                                                        if($purchaseUnitQty > 2){
                                                            echo '<tr class="record">';
                                                        } else{
                                                            echo '<tr class="record bg-warning">';
                                                        }
                                                    ?>                                                    
                                                        <td><?php echo $i+1; ?></td>
                                                        <td><?php echo $row['product_name']." - ".$row['company_name']; ?></td>
                                                        <td class="text-center"><?php echo $row['purchase_unit_name']; ?></td>

                                                        <td class="pe-4 text-end"><?php echo $row['purchasing_price']; ?></td>

                                                        <td class="pe-4 text-end"><?php echo $row['selling_price']; ?></td>

                                                        <td class="text-center"><?php echo $purchaseUnitQty; ?></td>

                                                        <td class="pe-4 text-end"><?php echo $a; ?></td>

                                                        <td class="pe-4 text-end">
                                                            <?php                                                                 
                                                                echo $b - $a;
                                                            ?>
                                                        </td>
                                                        
                                                        <td><?php echo $row['warehouse_name']; ?></td>
                                                        
                                                    </tr>
                                            <?php
                                            }
                                            ?>
                                    </tbody> 
                                    <tfoot>
                                        <tr>
                                            <th colspan="6" style="text-align:right">Total :</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
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
    function commaSeparateNumber(val) {
    // remove sign if negative
    var sign = 1;
    if (val < 0) {
        sign = -1;
        val = -val;
    }

    // trim the number decimal point if it exists
    let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();

    while (/(\d+)(\d{3})/.test(num.toString())) {
        // insert comma to 4th last position to the match number
        num = num.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }

    // add number after decimal point
    if (val.toString().includes('.')) {
        num = num + '.' + val.toString().split('.')[1];
    }

    // return result with - sign if negative
    return sign < 0 ? '-' + num : num;
    }
    </script>

    <script>
    $(document).ready(function () {
        $('#tableStock').DataTable({
            footerCallback: function (row, data, start, end, display) {

                var api = this.api();    
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };    
                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0); 
                total2 = api
                .column(7)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);   
                // Total over this page
                /*pageTotal = api
                    .column(5, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                */
                // Update footer
                $(api.column(6).footer()).html(commaSeparateNumber(total));
                $(api.column(7).footer()).html(commaSeparateNumber(total2));
            },

            dom: 'Bfrtip',
            buttons: [ 'excelHtml5', 'print' ]
            
        });

        $(".buttons-excel").css("background-color", "#147874");
        $(".buttons-print").css("background-color", "#858796");
    });
</script>

    <script>
        //$(document).ready(function() {
            //$('#tableStock').DataTable( {
             //   dom: 'Bfrtip',
             //   buttons: [ 'excelHtml5', 'print' ]
            //} );
            
       // } );  
    </script>

    <script>
        /* Custom filtering function which will search data in column four between two values */
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            var min = parseInt($('#min').val(), 10);
            var max = parseInt($('#max').val(), 10);
            var age = parseFloat(data[4]) || 0; // use data for the age column

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
            var table = $('#tableStock').DataTable();
            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').keyup(function() {
                table.draw();
            });
        });
    </script>

</body>

</html>