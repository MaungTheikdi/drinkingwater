<?php

include('includes/connection.php');

if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {

    $_SESSION['select_product_id'] = $_POST['product_id'];

    $query = "SELECT * FROM customer WHERE customer_id = " . $_POST['product_id'];
    $result = $link->query($query);

    if ($result->num_rows > 0) {
        //echo '<option value="">ရွေးချယ်ပါ</option>';
        while ($row = $result->fetch_assoc()) {

                echo '<input class="form-control" type="hidden" id="customer_id" value="'.$row['customer_id'].'" name="customer_id" readonly="">';

                echo '<input class="form-control" type="hidden" id="customer_phone" value="'.$row['customer_phone'].'" name="customer_phone" readonly="">';

                echo '<div class="col-md-3 form-group">
                        <div class="form-group">
                            <label for="" class="control-label">အမည်</label>
                            <input type="text" id="customer_name" value="'.$row['customer_name'].'" name="customer_name" readonly="" class="form-control form-control-sm" required="">
                        </div>
                    </div>';

                echo '<div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="" class="control-label">ယခင် ဗူးလက်ကျန်</label>
                        <input type="number" id="old_rent_balance" value="'.$row['rent_balance'].'" name="old_rent_balance" readonly="" class="form-control form-control-sm" required="">
                    </div>
                </div>';


                echo '<div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="" class="control-label">ယခု ဗူးရောင်းအရေအတွက်</label>
                        <input type="number" id="rent_no" name="rent_no" class="form-control form-control-sm" required="" onkeyup="calSale();">
                    </div>
                </div>';

                echo '<div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="" class="control-label">ယခု ဗူးခွံပြန်ရ အရေအတွက်</label>
                        <input type="number" id="return_no" name="return_no" class="form-control form-control-sm" required="" onkeyup="calSale();">
                    </div>
                </div>';


                echo '<div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="" class="control-label">ယခု ဗူးလက်ကျန်</label>
                        <input type="number" id="new_rent_balance" name="new_rent_balance" readonly="" class="form-control form-control-sm" required="">
                    </div>
                </div>';

        }
    } else {
        echo '<option value="">Not available</option>';
    }
}


