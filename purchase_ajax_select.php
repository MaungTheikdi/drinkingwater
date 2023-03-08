<?php
include ("includes/connection.php");

$sql_s="SELECT
purchase_invoice
FROM purchase
ORDER BY purchase.purchase_id DESC LIMIT 1
";
//WHERE purchase.purchase_invoice='$purchase_invoice_number'
//purchase_date = CURDATE() AND purchase_order = 1 AND 

$result_s = mysqli_query($link,$sql_s);

$data_s=mysqli_fetch_array($result_s);
if($data_s > 0){
    $purchase_invoice_number = $data_s['purchase_invoice'];
} else{
    $purchase_invoice_number = "";
}



$sql="SELECT
purchase_id,
purchase_invoice,
purchase_date,
products.product_name,
units.unit_name,
purchase.purchase_qty,
purchase_price,
purchase_amount,
supplier.supplier_name,
warehouse.warehouse_name,
payment.payment_name
FROM purchase
LEFT JOIN products ON products.product_id = purchase.product_id
LEFT JOIN units ON units.unit_id = purchase.unit_id
LEFT JOIN supplier ON supplier.supplier_id = purchase.supplier_id
LEFT JOIN warehouse ON warehouse.warehouse_id = purchase.warehouse_id
LEFT JOIN payment ON payment.payment_id = purchase.payment_id
WHERE purchase.purchase_invoice='$purchase_invoice_number'";
//
//purchase_date = CURDATE() AND purchase_order = 1 AND 

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
            <th>ဂိုထောင်</th>
			<th>Action</th>
		</tr>';
echo '</thead>';
echo '<tbody>';
$i=1;
while($data=mysqli_fetch_array($result))
{

	echo '	
		<tr class="record">
			<td>'.$i.'</td>
			<td>'.date_format(date_create($data['purchase_date']),"d-m-Y").'</td>
			<td>'.$data['product_name'].'</td>
			<td>'.$data['unit_name'].'</td>
			<td>'.$data['purchase_qty'].'</td>
			<td>'.$data['purchase_price'].'</td>
            <td>'.$data['purchase_amount'].'</td>
            <td>'.$data['warehouse_name'].'</td>
            <td>
                <button class="btn btn-primary" id="purchase_delete" type="button" value="'.$data['purchase_id'].'" name="purchase_delete">Delete</button>
                <!--<a href="?del_id='.$data['purchase_id'].'" id="purchase_delete">
                    <i class="icon-trash"></i>
                </a>-->
            </td>
		</tr>';
		
	$i++;
}
echo '</tbody>';

echo '<script src="ajax.js"></script>';
