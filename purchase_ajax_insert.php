<?php

require_once 'includes/connection.php';

//Insert Purchase
if(isset($_POST['purchase_date'])){

    $purchase_date  = $_POST['purchase_date'];
    $purchase_invoice = $_POST['purchase_invoice'];
    $supplier_id = $_POST['supplier_id'];
    $product_id = $_POST['product_id'];
    $unit_id = $_POST['unit_id'];
    $purchase_qty = $_POST['purchase_qty'];
    $purchase_price = $_POST['purchase_price'];
    $purchase_amount = $_POST['purchase_amount'];
    $warehouse_id = $_POST['warehouse_id'];
    $payment_id = $_POST['payment_id'];

    $sql = "INSERT INTO purchase ( purchase_date, purchase_invoice, supplier_id, product_id, unit_id, purchase_qty, purchase_price , purchase_amount, warehouse_id, payment_id , expected_date) 
            VALUES 
            ('".$purchase_date."','".$purchase_invoice."','".$supplier_id."','".$product_id."','".$unit_id."','".$purchase_qty."','".$purchase_price ."','".$purchase_amount."','".$warehouse_id."','".$payment_id ."','".$purchase_date."')";
    //mysqli_query($conn,$sql);

    if(mysqli_query($conn,$sql)){

        $result = $db->prepare("SELECT * FROM products WHERE product_id = $product_id ");
        $result->execute();
        for ($i = 0; $row = $result->fetch(); $i++) {
            //$p_per = $row['per'];
            //purchase_qty_per=purchase_qty_per+($p_per*$purchase_qty),
        }
        $result2 = $db->prepare("UPDATE products SET 
        purchase_qty=purchase_qty+$purchase_qty ,
        qty_p=qty_p+$purchase_qty,
        qty_s=qty_s+$purchase_qty,
        purchasing_price=$purchase_price
        WHERE product_id = $product_id ");
        $result2->execute();
    }
}


//Insert Purchase Order
if(isset($_POST['purchase_order_date'])){

    $purchase_order_date  = $_POST['purchase_order_date'];
    $supplier_id = $_POST['supplier_id'];
    $product_id = $_POST['product_id'];
    $unit_id = $_POST['unit_id'];
    $purchase_qty = $_POST['purchase_qty'];
    $purchase_price = $_POST['purchase_price'];
    $purchase_amount = $_POST['purchase_amount'];
    $warehouse_id = $_POST['warehouse_id'];
    $payment_id = $_POST['payment_id'];

    $expected_date = $_POST['expected_date'];

    

    $sql = "INSERT INTO purchase ( purchase_date, supplier_id, product_id, unit_id, purchase_qty, purchase_price , purchase_amount, warehouse_id, payment_id , expected_date, 	purchase_order) 
            VALUES 
            ('".$purchase_order_date."','".$supplier_id."','".$product_id."','".$unit_id."','".$purchase_qty."','".$purchase_price ."','".$purchase_amount."','".$warehouse_id."','".$payment_id ."','".$expected_date."', '0')";
    mysqli_query($conn,$sql);


}


//Insert Sale
if(isset($_POST['sale_date'])){

    $sale_date  = $_POST['sale_date'];
    $sale_invoice = $_POST['sale_invoice'];
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $unit_id = $_POST['unit_id'];
    $sale_qty = $_POST['sale_qty'];
    $sale_price = $_POST['sale_price'];
    $sale_amount = $_POST['sale_amount'];
    $warehouse_id = $_POST['warehouse_id'];
    $payment_id = $_POST['payment_id'];
    $sale_discount = $_POST['sale_discount'];

    if($sale_discount == null){
        $sale_discount_result = 0;
    } else{
        $sale_discount_result = $_POST['sale_discount'];
    }
    //if(isset($_POST['sale_discount'])==null || empty)
    

    $sql = "INSERT INTO sale ( sale_date, sale_invoice, customer_id, product_id, unit_id, sale_qty, 
    sale_price , sale_amount, warehouse_id, payment_id, expected_date, sale_discount ) 
            VALUES 
            ('".$sale_date."','".$sale_invoice."','".$customer_id."','".$product_id."','".$unit_id."','".$sale_qty."',
            '".$sale_price ."','".$sale_amount."','".$warehouse_id."','".$payment_id ."','".$sale_date."','".$sale_discount_result."')";
    
    if(mysqli_query($conn,$sql)){

        $result = $db->prepare("SELECT * FROM products WHERE product_id = $product_id ");
        $result->execute();
        for ($i = 0; $row = $result->fetch(); $i++) {
            //$p_per = $row['per'];
            //sale_qty_per = sale_qty_per+($sale_qty/$p_per), 
        }
        $result2 = $db->prepare("UPDATE products SET 
        sale_qty = sale_qty+$sale_qty ,        
        qty_p = qty_p-$sale_qty
        WHERE product_id = $product_id ");
        $result2->execute();
    }


}

//Insert Sale Order
if(isset($_POST['sale_order_date'])){

    $sale_order_date  = $_POST['sale_order_date'];
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $unit_id = $_POST['unit_id'];
    $sale_qty = $_POST['sale_qty'];
    $sale_price = $_POST['sale_price'];
    $sale_amount = $_POST['sale_amount'];
    $warehouse_id = $_POST['warehouse_id'];
    $payment_id = $_POST['payment_id'];

    $expected_date = $_POST['expected_date'];
    

    $sql = "INSERT INTO sale ( sale_date, customer_id, product_id, unit_id, sale_qty, sale_price , sale_amount, 
    warehouse_id, payment_id, expected_date, sale_order ) 
            VALUES 
            ('".$sale_order_date."','".$customer_id."','".$product_id."','".$unit_id."','".$sale_qty."',
            '".$sale_price ."','".$sale_amount."','".$warehouse_id."','".$payment_id ."','".$expected_date."', '0')";

    mysqli_query($conn,$sql);


}


//Delete Purchase
if (isset($_GET['purchase_delete'])) {
    $purchase_delete = $_GET['purchase_delete'];
    $sql = "DELETE FROM purchase WHERE purchase_id=$purchase_delete";
    if ($link->query($sql) === TRUE) {
        //
    } else {
        echo "Error deleting record: " . $link->error;
    }
    $link->close();
}

//Delete Sale
if (isset($_GET['sale_delete'])) {
    $sale_delete = $_GET['sale_delete'];
    $sql = "DELETE FROM sale WHERE sale_id=$sale_delete";
    if ($link->query($sql) === TRUE) {
        //
    } else {
        echo "Error deleting record: " . $link->error;
    }
    $link->close();
}

