<?php
session_start();

include('includes/connection.php');

//Customer
if(isset($_POST['save_customer'])) {
    
    $a = $_POST['customer_name'];
    $b = $_POST['customer_phone'];
    $c = $_POST['customer_address'];

    $e = $_POST['rent_balance'];

    $sql = "INSERT INTO customer (customer_name, customer_phone, customer_address, rent_balance) VALUES ('$a', '$b','$c', '$e')";
    if (mysqli_query($link, $sql)) {
        header('Location: customer.php');
	 } else {
        header('Location: 404.php');
	 }
	 mysqli_close($link);
}
if(isset($_POST['update_customer'])) {

    $id= $_POST['id'];
    $a = $_POST['customer_name'];
    $b = $_POST['customer_phone'];
    $c = $_POST['customer_address'];
    $e = $_POST['rent_balance'];
    
    $sql = "UPDATE customer SET customer_name='$a', customer_phone='$b', customer_address='$c', rent_balance='$e'  WHERE customer_id='$id' ";
    if (mysqli_query($link, $sql)) {
        header('Location: customer.php');
	 } else {
		header('Location: 404.php');
	 }
	 mysqli_close($link);
}

?>