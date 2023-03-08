<?php

$update=false;

$id = "";

$a = "";
$b = "";
$c = "";
$d = "";
$e = "";
$f = "";
$g = "";
$h = "";
$i = "";
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

$selling_price = "";
$latli_price = "";



if(isset($_GET['customer_update'])){

    $id=$_GET['customer_update'];

    $sql = "SELECT * FROM customer WHERE customer_id=$id ";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {	
            $a = $row['customer_name'];
            $b = $row['customer_phone'];
            $c = $row['customer_address'];
            $e = $row['rent_balance'];
        }
    }
    $update=true;
}
if(isset($_GET['customer_delete'])){
    $id=$_GET['customer_delete'];
    $sql = "DELETE FROM customer WHERE customer_id=$id";

    if ($link->query($sql) === TRUE) {
    //echo "Record deleted successfully";
    header('Location: customer.php');
    } else {
    echo "Error deleting record: " . $link->error;
    }

    $link->close();
}



//Category
if(isset($_GET['category_update'])){

    $id=$_GET['category_update'];

    $sql = "SELECT * FROM category WHERE category_id=$id ";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {	
            $a = $row['category_name'];
        }
    }
    $update=true;
}
if(isset($_GET['category_delete'])){
    $id=$_GET['category_delete'];
    $sql = "DELETE FROM category WHERE category_id=$id";

    if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $link->error;
    }

    $link->close();
}

//Company or Brand
if(isset($_GET['company_update'])){

    $id=$_GET['company_update'];

    $sql = "SELECT * FROM company WHERE company_id=$id ";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {	
            $a = $row['company_name'];
        }
    }
    $update=true;
}
if(isset($_GET['company_delete'])){
    $id=$_GET['company_delete'];
    $sql = "DELETE FROM company WHERE company_id=$id";

    if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $link->error;
    }

    $link->close();
}

//Units
if(isset($_GET['unit_update'])){

    $id=$_GET['unit_update'];

    $sql = "SELECT * FROM units WHERE unit_id=$id ";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {	
            $a = $row['unit_name'];
        }
    }
    $update=true;
}
if(isset($_GET['unit_delete'])){
    $id=$_GET['unit_delete'];
    $sql = "DELETE FROM units WHERE unit_id=$id";

    if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $link->error;
    }

    $link->close();
}

//Warehouse
if(isset($_GET['warehouse_update'])){

    $id=$_GET['warehouse_update'];

    $sql = "SELECT * FROM warehouse WHERE warehouse_id=$id ";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {	
            $a = $row['warehouse_name'];
        }
    }
    $update=true;
}
if(isset($_GET['warehouse_delete'])){
    $id=$_GET['warehouse_delete'];
    $sql = "DELETE FROM warehouse WHERE warehouse_id=$id";

    if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $link->error;
    }

    $link->close();
}

//Products
if(isset($_GET['product_update'])){

    $id=$_GET['product_update'];

    $sql = "SELECT 
    `product_id` AS pid,
    `product_name`,    
    company.company_id,
    company.company_name,
    purchase_unit,
    (SELECT units.unit_name FROM products LEFT JOIN units ON units.unit_id = products.purchase_unit WHERE products.product_id = pid )  AS purchase_unit_name,
    `purchase_qty`,
    `sale_qty`,
    `selling_price`,
    warehouse.warehouse_id,
    warehouse.warehouse_name,
    `noti`
    FROM products 
    LEFT JOIN company ON company.company_id = products.company_id    
    LEFT JOIN warehouse ON warehouse.warehouse_id = products.warehouse_id
    WHERE products.product_id=$id ";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {	
            $a = $row['product_name'];
            $d = $row['company_id'];
            $e = $row['company_name'];

            $f = $row['purchase_unit'];
            $g = $row['purchase_unit_name'];


            $l = $row['purchase_qty'];

            $n = $row['warehouse_id'];
            $o = $row['warehouse_name'];

            $selling_price = $row['selling_price'];
        }
    }
    $update=true;
}
if(isset($_GET['product_delete'])){
    $id=$_GET['product_delete'];
    $sql = "DELETE FROM products WHERE product_id=$id";

    if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $link->error;
    }

    $link->close();
}

//Expenses
if(isset($_GET['expenses_update'])){

    $id=$_GET['expenses_update'];

    $sql = "SELECT * FROM expenses WHERE expenses_id=$id ";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {	

            $a = $row['expenses_date'];
            $b = $row['expenses_name'];
            $c = $row['expenses_amount'];
            $d = $row['expenses_remark'];
            
        }
    }
    $update=true;
}
if(isset($_GET['expenses_delete'])){
    $id=$_GET['expenses_delete'];
    $sql = "DELETE FROM expenses WHERE expenses_id=$id";

    if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $link->error;
    }

    $link->close();
}

?>