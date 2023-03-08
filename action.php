<?php

include('includes/connection.php');

if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {

    $_SESSION['select_tract_id'] = $_POST['product_id'];

    $query = "SELECT * FROM products LEFT JOIN units ON units.unit_id = products.purchase_unit WHERE product_id = " . $_POST['product_id'];
    $result = $link->query($query);

    if ($result->num_rows > 0) {
        //echo '<option value="">ရွေးချယ်ပါ</option>';
        while ($row = $result->fetch_assoc()) {
            //echo $row['unit_name'];
            //echo '<option value="' . $row['unit_id'] . '">' . $row['unit_name'] . '</option>';
            //echo '<div class="col-md-1">';
            echo '<input class="form-control" type="hidden" id="unit_id" value="'.$row['unit_id'].'" name="unit_id">';
            echo '<input class="form-control me-2" type="text" id="unit_name" value="'.$row['unit_name'].'" name="unit_name" readonly="">';

            echo '
            <input class="form-control me-2" type="number" id="purchase_qty" min="1" placeholder="Qty" value="<?php echo $h; ?>" name="purchase_qty" 
                                required="" onblur="calPurchase();">
            ';
            echo '
            <input class="form-control me-2" type="number" id="purchase_price" placeholder="Unit Price" 
             name="purchase_price" required="" value="'.$row['purchasing_price'].'" onblur="calPurchase();">
            ';
            echo '
            <input type="hidden" id="warehouse_id" name="warehouse_id" value="'.$row['warehouse_id'].'">
            ';
            //echo '</div>';
        }
    } else {
        echo '<option value="">Not available</option>';
    }
}

