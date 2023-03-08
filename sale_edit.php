<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php

if(isset($_GET['distribution_update'])){

    $id=$_GET['distribution_update'];

    $sql = "SELECT water_distribution.*, customer.customer_name FROM water_distribution 
    LEFT JOIN customer ON customer.customer_id = water_distribution.customer_id  WHERE distribution_id=$id ";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {	

            $sale_date = $row['sale_date'];
            $customer_id = $row['customer_id'];
            $old_rent_balance = $row['old_rent_balance'];
            $rent_no = $row['rent_no'];
            $return_no = $row['return_no'];
            $new_rent_balance = $row['new_rent_balance'];
            $customer_name = $row['customer_name'];

        }
    }
   
}

?>

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-dark mb-0">ရေဗူးအရောင်း </h4>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                <form action="sale_water.php" method="POST">
                                        <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                                        <div class="row mb-4">
                                            <div class="col-md-2">
                                                <input class="form-control" id="sale_date" value="<?php echo $sale_date; ?>" type="date" name="sale_date" required="">
                                            </div>
                                        </div>

                                        <div class="row d-flex mb-4">
                                            <div class="col-md-4 mb-2">
                                                <select class="form-select" name="product_id" id="product_id"  required>
                                                    <option value="<?php echo $customer_id; ?>"> <?php echo $customer_name; ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- cm -->
                                        <div class="row d-flex mb-4" id="unit_id1">

                <input class="form-control" type="hidden" id="customer_id" value="<?php echo $customer_id; ?>" name="customer_id" readonly="">


                <div class="col-md-3 form-group">
                        <div class="form-group">
                            <label for="" class="control-label">အမည်</label>
                            <input type="text" id="customer_name" value="<?php echo $customer_name; ?>" name="customer_name" readonly="" class="form-control form-control-sm" required="">
                        </div>
                    </div>

                <div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="" class="control-label">ယခင် ဗူးလက်ကျန်</label>
                        <input type="number" id="old_rent_balance" value="<?php echo $old_rent_balance; ?>" name="old_rent_balance" readonly="" class="form-control form-control-sm" required="">
                    </div>
                </div>


                <div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="" class="control-label">ယခု ဗူးရောင်းအရေအတွက်</label>
                        <input type="number" id="rent_no" name="rent_no" value="<?php echo $rent_no; ?>" class="form-control form-control-sm" required="" onkeyup="calSale();">
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="" class="control-label">ယခု ဗူးခွံပြန်ရ အရေအတွက်</label>
                        <input type="number" id="return_no" name="return_no" value="<?php echo $return_no; ?>" class="form-control form-control-sm" required="" onkeyup="calSale();">
                    </div>
                </div>


                <div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="" class="control-label">ယခု ဗူးလက်ကျန်</label>
                        <input type="number" id="new_rent_balance" value="<?php echo $new_rent_balance; ?>" name="new_rent_balance" readonly="" class="form-control form-control-sm" required="">
                    </div>
                </div>

                                        </div>
                                        <!-- end cm -->

                             
                                        <div class="row mb-2">

                                            <div class="col-md-4">
                                                    <button class="btn btn-success me-2" id="update_sale" type="submit" name="update_sale">Update</button>
                                                    <a class="btn btn-outline-warning" role="button" href="index.php">Cancle</a>
                                            </div>
                                        
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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


<script type="text/javascript">
    function calSale () {
        var rent = parseFloat(document.getElementById('rent_no').value, 10),
            old = parseFloat(document.getElementById('old_rent_balance').value, 10),
            return_no = parseFloat(document.getElementById('return_no').value, 10)

        document.getElementById('new_rent_balance').value = (rent + old) - return_no
    }
</script>

</body>

</html>