<?php
include ("includes/connection.php");

$sql_s="SELECT
sale_invoice
FROM sale
ORDER BY sale.sale_id DESC LIMIT 1
";
//WHERE sale.sale_invoice='$sale_invoice_number'
//sale_date = CURDATE() AND sale_order = 1 AND 

$result_s = mysqli_query($link,$sql_s);

$data_s=mysqli_fetch_array($result_s);
if($data_s > 0){
    $sale_invoice_number = $data_s['sale_invoice'];
} else{
    $sale_invoice_number = "";
}


$sql="SELECT
sale_id,
sale_date,
products.product_name,
units.unit_name,
sale.sale_qty,
sale_price,
sale_amount,
customer.customer_name,
warehouse.warehouse_name,
payment.payment_name
FROM sale
LEFT JOIN products ON products.product_id = sale.product_id
LEFT JOIN units ON units.unit_id = sale.unit_id
LEFT JOIN customer ON customer.customer_id = sale.customer_id
LEFT JOIN warehouse ON warehouse.warehouse_id = sale.warehouse_id
LEFT JOIN payment ON payment.payment_id = sale.payment_id
WHERE sale.sale_invoice='$sale_invoice_number'";
//WHERE sale_date = CURDATE() AND sale_order = 1";

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
            <th id="tbl_hide">ဂိုထောင်</th>
            <!--<th id="tbl_hide">ဖောက်သည်အမည်</th>
            <th id="tbl_hide">ပေးခြေစနစ်</th>-->
            <th id="tbl_hide">Action</th>
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
			<td>'.date_format(date_create($data['sale_date']),"d-m-Y").'</td>
			<td>'.$data['product_name'].'</td>
			<td>'.$data['unit_name'].'</td>
			<td>'.$data['sale_qty'].'</td>
			<td>'.$data['sale_price'].'</td>
            <td>'.$data['sale_amount'].'</td>			
            <td id="tbl_hide">'.$data['warehouse_name'].'</td>
            <!--<td id="tbl_hide">'.$data['customer_name'].'</td>
            <td id="tbl_hide">'.$data['payment_name'].'</td>-->
            <td id="tbl_hide">
                <!--<a class="me-3" href="?edit_id='.$data['sale_id'].'" id="edit">
                    <i class="icon-pencil"></i>
                </a>-->
                <a href="?del_id='.$data['sale_id'].'" id="delete">
                    <i class="icon-trash"></i>
                </a>
            </td>
		</tr>';
		
	$i++;
}
echo '</tbody>';