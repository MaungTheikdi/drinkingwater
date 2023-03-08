<?php
include ("includes/connection.php");

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

$sql="SELECT
purchase_id,
purchase_date,
products.product_name,
units.unit_name,
purchase.purchase_qty,
purchase_price,
purchase_amount,
supplier.supplier_name,
warehouse.warehouse_name,
payment.payment_name,
purchase.expected_date,
purchase.purchase_order
FROM purchase
LEFT JOIN products ON products.product_id = purchase.product_id
LEFT JOIN units ON units.unit_id = purchase.unit_id
LEFT JOIN supplier ON supplier.supplier_id = purchase.supplier_id
LEFT JOIN warehouse ON warehouse.warehouse_id = purchase.warehouse_id
LEFT JOIN payment ON payment.payment_id = purchase.payment_id
WHERE purchase_order = 0 ";

$result = mysqli_query($link,$sql);

echo '<thead>';
echo ' 	<tr>
			<th>#</th>
			<th>ရက်စွဲ</th>            
            <th>အမျိုးအမည်</th>
            <th>ရေတွက်ပုံ</th>
            <th>အရေအတွက်</th>
            <th>စျေးနှုန်း</th>
            <th>တန်ဖိုး</th>
            <th>ရောင်းသူ</th>
            <th>ဂိုထောင်</th>
            <th>ပေးခြေစနစ်</th>
            <th>မျှောမှန်းရက်</th>
			<th>Action</th>
		</tr>';
echo '</thead>';
echo '<tbody>';
$i=1;
$cancel = "Cancel";
$onclick = "executeExample('handleDismiss')";
while($data=mysqli_fetch_array($result))
{

	echo '	
		<tr class="record">
			<td>'.$i.'</td>
			<td>'.$data['purchase_date'].'</td>
			<td>'.$data['product_name'].'</td>
			<td>'.$data['unit_name'].'</td>
			<td>'.$data['purchase_qty'].'</td>
			<td>'.$data['purchase_price'].'</td>
            <td>'.$data['purchase_amount'].'</td>
			<td>'.$data['supplier_name'].'</td>
            <td>'.$data['warehouse_name'].'</td>
            <td>'.$data['payment_name'].'</td>
            <td>'.$data['expected_date'].'</td>
            <td>
                <!--<a class="me-3" href="?edit_id='.$data['purchase_id'].'" id="edit">
                    <i class="icon-pencil"></i>
                </a>-->
                <a href="?purchase_id='.$data['purchase_id'].'">
                    Purchase
                </a>
                <a href="?del_id='.$data['purchase_id'].'" id="delete">
                    <i class="icon-trash"></i>
                </a>
            </td>
		</tr>';
		
	$i++;
}
echo '</tbody>';

echo '<script src="assets/library/datatable/jquery-3.5.1.js"></script>
<script src="assets/library/datatable/jquery.dataTables.min.js"></script>
<script src="assets/library/datatable/dataTables.bootstrap5.min.js"></script>';

echo "<script>
$(document).ready(function() {
    $('#tableOne').DataTable();
} );  
</script>";

