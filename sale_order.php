<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php
    error_reporting(1);
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
        $sql = "DELETE FROM sale WHERE sale_id=$id";
        if ($link->query($sql) === TRUE) {
            //
        } else {
            echo "Error deleting record: " . $link->error;
        }
        $link->close();
    }

    if (isset($_GET['sale_id'])) {
        $id = $_GET['sale_id'];
        $sql = "UPDATE sale SET sale_order = 1 WHERE sale_id=$id";
        if ($link->query($sql) === TRUE) {
            //
        } else {
            echo "Error deleting record: " . $link->error;
        }
        $link->close();
    }


?>
                <div class="container-fluid">
                    <h4 class="text-dark mb-3">အရောင်း အော်ဒါ</h4>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <input class="form-control" type="hidden" id="sale_id" name="sale_id" value="<?php echo $id; ?>">
                                        <div class="row mb-4">
                                            <div class="col-md-2">
                                                <input class="form-control" id="sale_order_date" type="date" name="sale_order_date" value="<?php echo $a; ?>" required="">
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-select" name="warehouse_id" id="warehouse_id" required>
                                                    <option value="<?php echo $k; ?>"> <?php if ($k != null) {
                                                                                            echo $l;
                                                                                        } else {
                                                                                            echo "ဂိုထောင် ရွေးချယ်ပါ";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM warehouse");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['warehouse_id']; ?>"><?php echo $row['warehouse_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <select class="form-select" name="product_id" id="product_id" data-dselect-search="true" data-dselect-max-height="300px" required>
                                                    <option value="<?php echo $d; ?>"> <?php if ($d != null) {
                                                                                            echo $e;
                                                                                        } else {
                                                                                            echo "ပစ္စည်း ရွေးချယ်ပါ";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM products");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-2">
                                                <select class="form-select" name="unit_id" id="unit_id" required>
                                                    <option value="<?php echo $f; ?>"> <?php if ($f != null) {
                                                                                            echo $g;
                                                                                        } else {
                                                                                            echo "ရေတွက်ပုံ ရွေးချယ်ပါ";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM units");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['unit_id']; ?>"><?php echo $row['unit_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2"><input class="form-control" type="number" id="sale_qty" min="1" placeholder="Qty" value="<?php echo $e; ?>" name="sale_qty" required="" onblur="calSale();"></div>
                                            <div class="col-md-2"><input class="form-control" type="number" id="sale_price" placeholder="Unit Price" value="<?php echo $f; ?>" name="sale_price" required="" onblur="calSale();"></div>
                                            <div class="col-md-2"><input class="form-control" type="number" id="sale_amount" placeholder="Amount" readonly="" value="<?php echo $g; ?>" name="sale_amount" required=""></div>
                                            <div class="col-md-2">
                                                <select class="form-select" name="payment_id" id="payment_id" required>
                                                    <option value="<?php echo $m; ?>"> <?php if ($m != null) {
                                                                                            echo $n;
                                                                                        } else {
                                                                                            echo "ပေးခြေစနစ် ရွေးချယ်ပါ";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM payment");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['payment_id']; ?>"><?php echo $row['payment_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-select" name="customer_id" id="customer_id" required>
                                                    <option value="<?php echo $b; ?>"> <?php if ($b != null) {
                                                                                            echo $c;
                                                                                        } else {
                                                                                            echo "ဝယ်သူ";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM customer");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['customer_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="input-group"><span class="input-group-text">မျှောမှန်း ပို့ရက်</span>
                                                    <div class="input-group-text" style="background: rgb(255,255,255);border-style: dashed;">
                                                    <input class="form-control" id="expected_date" type="date" name="expected_date" value="<?php echo $j; ?>" required=""></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <?php if ($update == true) { ?>
                                                    <button class="btn btn-success me-2" id="update_sale_order" type="button" name="update_sale_order">Update</button>
                                                    <a class="btn btn-outline-warning" role="button" href="sale_order.php">Cancle</a>
                                                <?php } else { ?>
                                                    <button class="btn btn-primary" id="save_sale_order" type="button" name="save_sale_order">Save</button>
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
                                <table class="table" id="tableSaleOrder">
                                    
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

    <!-- Table 1 -->
    <script>
            $(document).ready(function() {
                $.ajax({
                    url: "sale_order_ajax_select.php",
                    success: function(data) {
                        //console.log(data);
                        $("#tableSaleOrder").html(data);
                    }
                });
            });
        </script>
    <!-- Save -->
    <script>
        $('#save_sale_order').click(function() {
            $sale_order_date = $('#sale_order_date').val();
            $customer_id = $('#customer_id').val();
            $product_id = $('#product_id').val();
            $unit_id = $('#unit_id').val();
            $sale_qty = $('#sale_qty').val();
            $sale_price = $('#sale_price').val();
            $sale_amount = $('#sale_amount').val();
            $warehouse_id = $('#warehouse_id').val();
            $payment_id = $('#payment_id').val();
            $expected_date = $('#expected_date').val();


            if (!$('#sale_order_date').val() || !$('#customer_id').val() || !$('#product_id').val() || 
                !$('#unit_id').val() || !$('#sale_qty').val() || !$('#sale_price').val() || 
                !$('#sale_amount').val() || !$('#warehouse_id').val() || !$('#payment_id').val() || !$('#expected_date').val())  {

                $('#error_row').addClass("text-danger");
                $('#error_row').text("အားလုံးဖြည့်ပါ။");

            } else {
                $.ajax({
                    url: "purchase_ajax_insert.php",
                    method: "POST",
                    data: {
                        sale_order_date: $sale_order_date,
                        customer_id: $customer_id,
                        product_id: $product_id,
                        unit_id: $unit_id,

                        sale_qty: $sale_qty,
                        sale_price: $sale_price,
                        sale_amount: $sale_amount,
                        warehouse_id: $warehouse_id,
                        payment_id: $payment_id,
                        expected_date: $expected_date
                    },
                    success: function(dataabc) {
                        $.ajax({
                            url: "sale_order_ajax_select.php",
                            success: function(dataabc) {
                                $("#tableSaleOrder").html(dataabc);
                            }
                        });

                        $('#sale_qty').val('');
                        $('#sale_price').val('');
                        $('#sale_amount').val('');

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
        dselect(document.querySelector('#customer_id'), {
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


</body>

</html>