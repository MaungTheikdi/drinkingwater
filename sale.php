<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php

    $sms_button = false;
    $normal_button = true;

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
?>

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-dark mb-0">ရေဗူးအရောင်း </h4>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="switchDefault" onclick="showHide()">
                            <label class="form-check-label" for="switchDefault">SMS Enable</label>

                            <input class="form-check-input" type="checkbox" role="switch" id="switchDefault1" onclick="showHideNormal()">
                            <label class="form-check-label" for="switchDefault1"></label>
                        </div>
                        
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                <form action="sale_water.php" method="POST">

                                
                                        <input class="form-control" type="hidden" id="sale_id" name="sale_id" value="<?php echo $id; ?>">

                                        <div class="row mb-4">
                                            <div class="col-md-2">
                                                <input class="form-control" id="sale_date" type="date" name="sale_date" required="">
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">
                                            <div class="col-md-4 mb-2">
                                                <select class="form-select" name="product_id" id="product_id" data-dselect-search="true" data-dselect-max-height="300px" required>
                                                    <option value="<?php echo $d; ?>"> <?php if ($d != null) {
                                                                                            echo $e;
                                                                                        } else {
                                                                                            echo "Select Customer";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM customer ");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['customer_id']; ?>">
                                                            <?php echo $row['customer_name']." , ".$row['customer_address']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- cm -->
                                        <div class="row d-flex mb-4" id="unit_id1">

                                        </div>
                                        <!-- end cm -->

                             
                                        <div class="row mb-2">

                                            <div class="col-md-4">
                                                <?php if ($update == true) { ?>
                                                    <button class="btn btn-success me-2" id="update_sale" type="button" name="update_sale">Update</button>
                                                    <a class="btn btn-outline-warning" role="button" href="sale.php">Cancle</a>
                                                <?php } else { ?>
                                                    <button style="display:block" class="btn btn-primary" id="save_sale" type="submit" name="save_sale">Save</button>
                                                    <button style="display:none" class="btn btn-danger" id="save_sale_sms" type="submit" name="save_sale_sms">Save & Send SMS Invoice</button>

                                                    
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

                    <!--
                    <div class="row" id="DivIdToPrint">
                        <div class="col">
                            <h2 id="tbl_head">သီသီအေးထွန်း ကုန်မျိုးစုံရောင်းဝယ်ရေး</h2>
                            <p id="tbl_head"> လိပ်စာ၊ ဖုန်းနံပါတ်</p>
                            <div class="table-responsive">
                                <table class="table" id="tableSale">           
                                </table>
                            </div>
                            <p id="tbl_footer">ဝယ်ယူအားပေးမှုကို အထူးကျေးဇူးတင်ရှိပါသည်။</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-info" href="sale.php?sale_invoice=<?php  echo "TTG". date("ymdHis"); ?>"><i class="fas fa-save"></i>Save</a>
                            <button class="btn btn-outline-danger" onclick="printDiv()"><i class="fas fa-print"></i>Print</button>
                            <a class="btn btn-wraning" target="_blank" href="invoice.php?sale_invoice=<?php  echo $_GET['sale_invoice']; ?>"><i class="fas fa-print"></i>Print</a>                           
                        
                        </div>
                    </div>
                    -->
                </div>
    </div>
<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Copyright © 2023 | Theikdi Maung(ရေသန့်ဗူး) </span></div>
    </div>
</footer>
</div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
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

<!-- Print -->
<script>
        function printDiv(){

            var divToPrint=document.getElementById('DivIdToPrint');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            

            newWin.document.write('<html><head><style>#tableSale{width:100%;}@media print{#tbl_head{display: block;text-align: center;}#tbl_footer{display: block; color: blue;}#tbl_hide{display: none;}}</style></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

            setTimeout(function(){newWin.close();},10);

            }
    </script>


<!-- Table 1 -->
<script>
        $(document).ready(function() {
            $.ajax({
                url: "sale_ajax_select.php",
                success: function(data) {
                    //console.log(data);
                    $("#tableSale").html(data);
                }
            });
        });
    </script>
<!-- Save -->
<script>
/* 
    $('#save_sale').click(function() {
        $sale_date = $('#sale_date').val();
        $sale_invoice = $('#sale_invoice').val();
        $customer_id = $('#customer_id').val();
        $product_id = $('#product_id').val();
        $unit_id = $('#unit_id').val();
        $sale_qty = $('#sale_qty').val();
        $sale_price = $('#sale_price').val();
        $sale_amount = $('#sale_amount').val();
        $warehouse_id = $('#warehouse_id').val();
        $payment_id = $('#payment_id').val();
        $sale_discount = $('#sale_discount').val();


        if (!$('#sale_date').val() || !$('#customer_id').val() || !$('#product_id').val() || 
            !$('#unit_id').val() || !$('#sale_qty').val() || !$('#sale_price').val() || 
            !$('#sale_amount').val() || !$('#warehouse_id').val() || !$('#payment_id').val())  {

            $('#error_row').addClass("text-danger");
            $('#error_row').text("အားလုံးဖြည့်ပါ။");

        } else {
            $.ajax({
                url: "purchase_ajax_insert.php",
                method: "POST",
                data: {
                    sale_date: $sale_date,
                    sale_invoice:$sale_invoice,
                    customer_id: $customer_id,
                    product_id: $product_id,
                    unit_id: $unit_id,

                    sale_qty: $sale_qty,
                    sale_price: $sale_price,
                    sale_amount: $sale_amount,
                    warehouse_id: $warehouse_id,
                    payment_id: $payment_id,
                    sale_discount: $sale_discount
                },
                success: function(dataabc) {
                    $.ajax({
                        url: "sale_ajax_select.php",
                        success: function(dataabc) {
                            $("#tableSale").html(dataabc);
                        }
                    });

                    $('#sale_qty').val('');
                    $('#sale_price').val('');
                    $('#sale_amount').val('');
                    $('#sale_discount').val('');

                    $('#error_row').removeClass("text-danger");
                    $('#error_row').addClass("text-success");
                    $('#error_row').text("လုပ်ဆောင်မှု အောင်မြင်ပါသည်။");

                    //window.location.href = "index.php";
                }
            });
        }
       
    });
*/
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#product_id").on("change", function() {
            var product_id = $(this).val();
            $.ajax({
                url: "action_sale.php",
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
<script type="text/javascript">
function calSale () {
    var rent = parseFloat(document.getElementById('rent_no').value, 10),
        old = parseFloat(document.getElementById('old_rent_balance').value, 10),
        return_no = parseFloat(document.getElementById('return_no').value, 10)

    document.getElementById('new_rent_balance').value = (rent + old) - return_no
}
function showHide(){
    var x = document.getElementById("save_sale_sms");
    //var z = document.getElementById("save_sale");
    if (x.style.display === "none"){
        x.style.display = "block";
        document.getElementById("save_sale").style.display = "none";
        //z.style.display = "none";
    } else {
        x.style.display = "none";
        document.getElementById("save_sale").style.display = "block";
        //z.style.display = "block";
    }
}
function showHideNormal(){
    var x = document.getElementById("save_sale");
    //var z = document.getElementById("save_sale");
    if (x.style.display === "none"){
        x.style.display = "block";
        document.getElementById("save_sale_sms").style.display = "none";
        //z.style.display = "none";
    } else {
        x.style.display = "none";
        document.getElementById("save_sale_sms").style.display = "block";
        //z.style.display = "block";
    }
}
</script>

</body>

</html>