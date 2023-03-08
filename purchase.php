<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php

    $update = false;

    $id = "";

    $a = "";
    $b = "";
    $c = "";
    $d = "";
    $e = "";
    $f = "";
    $g = "";
    $h = "";

    $j = "";
    $k = "";
    $l = "";
    $m = "";
    $n = "";
    $o = "";
    $p = "";
    $q = "";
    $r = "";
    $s = "";
    $t = "";
    $u = "";
    $v = "";
    $w = "";
    $x = "";
    $y = "";
    $z = "";

    if (isset($_GET['del_id'])) {
        $id = $_GET['del_id'];
        $sql = "DELETE FROM purchase WHERE purchase_id=$id";
        if ($link->query($sql) === TRUE) {
            //
        } else {
            echo "Error deleting record: " . $link->error;
        }
        $link->close();

        //header('location: purchase.php');
    }

    if (isset($_GET['edit_id'])) {
        $id = $_GET['edit_id'];
        $sql = "SELECT
                weekly_progress.id AS wid,
                
                completed_measurement
                FROM
                weekly_progress
                LEFT JOIN villages ON villages.village_id = weekly_progress.village_id
                LEFT JOIN pc1_project ON pc1_project.id = weekly_progress.project_id
                LEFT JOIN state_division ON state_division.state_id = township.state_id

                WHERE weekly_progress.id = $id";


        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);

        $a = $row['date'];
        $b = $row['tract_id'];
        $c = $row['tract_name'];
        $d = $row['village_id'];
        $e = $row['village_name'];

        $update = true;
    }


?>

<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-dark mb-0">Stock  အဝင်</h4>
                        

                        
                        <a type="button" href="setting_products.php" class="btn btn-outline-danger btn-sm" >
                            ပစ္စည်းအသစ်ထည့်ရန်
                        </a>

                        
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form><!--  method="post" action="functions.php" -->
                        <?php
                            $_SESSION['purchase_invoice_no'] = $_GET['purchase_invoice'];
                        ?>
                        <input class="form-control" type="hidden" id="purchase_id" name="purchase_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="purchase_invoice" id="purchase_invoice" value="<?php echo $_SESSION['purchase_invoice_no'];?>">                    

                        <div class="row mb-4">
                            <div class="col-md-2">
                                <input class="form-control" id="purchase_date" type="date" name="purchase_date" value="<?php echo $a; ?>" required="">
                            </div>
                            <div class="col-md-2 d-none">
                                <select class="form-select" name="supplier_id" id="supplier_id" required>
                                    <option value="8">ရောင်းသူ
                                    </option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="row d-flex mb-4">
                            <div class="col-md-4">
                                <select class="form-select" name="product_id" id="product_id" data-dselect-search="true" data-dselect-max-height="300px" required>
                                    <option value="<?php echo $d; ?>"> <?php if ($d != null) {
                                                                            echo $e;
                                                                        } else {
                                                                            echo "ပစ္စည်း ရွေးချယ်ပါ";
                                                                        } ?>
                                    </option>
                                    <?php
                                    $result = $db->prepare("SELECT
                                    products.product_id,
                                    products.product_name,
                                    company.company_name,
                                    units.unit_name,
                                    warehouse.warehouse_name
                                    FROM products
                                    LEFT JOIN company ON company.company_id = products.company_id
                                    LEFT JOIN units ON units.unit_id = products.purchase_unit
                                    LEFT JOIN warehouse ON warehouse.warehouse_id = products.warehouse_id");
                                    $result->execute();
                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                    ?>
                                        <option value="<?php echo $row['product_id']; ?>">
                                            <?php echo $row['product_name']." - ".$row['company_name']." - ".$row['warehouse_name']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>                            
                            
                            <div class="col-md-6 d-flex mb-2">
                                <div class="d-flex me-2" id="unit_id1">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <input class="form-control" type="number" id="purchase_amount" placeholder="Amount" readonly="" value="<?php echo $j; ?>" name="purchase_amount" required="">
                                </div>
                            
                                <div class="col-md-2 d-none">
                                    <select class="form-select" name="payment_id" id="payment_id" required>
                                        <option value="2">ငွေသား</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            
                            <div class="col-md-4">
                                <?php if ($update == true) { ?>
                                    <button class="btn btn-success me-2" id="update_purchase" type="button" name="update_purchase">Update</button>
                                    <a class="btn btn-outline-warning" role="button" href="purchase.php">Cancle</a>
                                <?php } else { ?>
                                    <button class="btn btn-success" id="save_purchase" type="button" name="save_purchase">Stock In</button>
                                <?php } ?>
                            </div>
                            <div class="form-group d-block my-2 mb-2">
                                <label class="d-block" id="error_row"></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table" id="tableOne">

                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align:right">Total MMK:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-warning" href="purchase.php?purchase_invoice=<?php  echo "TTG". date("ymdHis"); ?>"><i class="fas fa-save"></i>Save</a>
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
        $.ajax({
            url: "purchase_ajax_select.php",
            success: function(data) {
                //console.log(data);
                $("#tableOne").html(data);
            }
        });
    });
</script>

<!-- Save -->
<script>
    $('#save_purchase').click(function() {

        $purchase_date = $('#purchase_date').val();
        $purchase_invoice = $('#purchase_invoice').val();
        $supplier_id = $('#supplier_id').val();
        $product_id = $('#product_id').val();
        $unit_id = $('#unit_id').val();
        $purchase_qty = $('#purchase_qty').val();
        $purchase_price = $('#purchase_price').val();
        $purchase_amount = $('#purchase_amount').val();
        $warehouse_id = $('#warehouse_id').val();
        $payment_id = $('#payment_id').val();


        if (!$('#purchase_date').val() || !$('#supplier_id').val() || !$('#product_id').val() || 
            !$('#unit_id').val() || !$('#purchase_qty').val() || !$('#purchase_price').val() || 
            !$('#purchase_amount').val() || !$('#warehouse_id').val() || !$('#payment_id').val())  {

            $('#error_row').addClass("text-danger");
            $('#error_row').text("အားလုံးဖြည့်ပါ။");

        } else {
            $.ajax({
                url: "purchase_ajax_insert.php",
                method: "POST",
                data: {
                    purchase_date: $purchase_date,
                    purchase_invoice: $purchase_invoice,
                    supplier_id: $supplier_id,
                    product_id: $product_id,
                    unit_id: $unit_id,

                    purchase_qty: $purchase_qty,
                    purchase_price: $purchase_price,
                    purchase_amount: $purchase_amount,
                    warehouse_id: $warehouse_id,
                    payment_id: $payment_id
                },
                success: function(dataabc) {
                    $.ajax({
                        url: "purchase_ajax_select.php",
                        success: function(dataabc) {
                            $("#tableOne").html(dataabc);
                        }
                    });

                    $('#purchase_qty').val('');
                    $('#purchase_price').val('');
                    $('#purchase_amount').val('');

                    $('#error_row').removeClass("text-danger");
                    $('#error_row').addClass("text-success");
                    $('#error_row').text("လုပ်ဆောင်မှု အောင်မြင်ပါသည်။");

                    //window.location.href = "index.php";
                    
                }
            });
        }
       
    });
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#product_id").on("change", function() {
            var product_id = $(this).val();
            $.ajax({
                url: "action.php",
                type: "POST",
                cache: false,
                data: {
                    product_id: product_id
                },
                success: function(data) {
                    $("#unit_id1").html(data);
                }
            });
        });
    });
</script>

</body>

</html>