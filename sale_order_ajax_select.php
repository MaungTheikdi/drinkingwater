<?php
include ("includes/connection.php");


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
payment.payment_name,
sale.expected_date
FROM sale
LEFT JOIN products ON products.product_id = sale.product_id
LEFT JOIN units ON units.unit_id = sale.unit_id
LEFT JOIN customer ON customer.customer_id = sale.customer_id
LEFT JOIN warehouse ON warehouse.warehouse_id = sale.warehouse_id
LEFT JOIN payment ON payment.payment_id = sale.payment_id
WHERE sale_order = 0";

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
            <th>ဖောက်သည်အမည်</th>
            <th>ပေးခြေစနစ်</th>
            <th>မျှောမှန်း ပို့ရက်</th>
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
			<td>'.$data['sale_date'].'</td>
			<td>'.$data['product_name'].'</td>
			<td>'.$data['unit_name'].'</td>
			<td>'.$data['sale_qty'].'</td>
			<td>'.$data['sale_price'].'</td>
            <td>'.$data['sale_amount'].'</td>			
            <td>'.$data['warehouse_name'].'</td>
            <td>'.$data['customer_name'].'</td>
            <td>'.$data['payment_name'].'</td>
            <td>'.$data['expected_date'].'</td>

            <td>
                <a class="me-3" href="?sale_id='.$data['sale_id'].'">
                    ရောင်းပြီး
                </a>
                <a href="?del_id='.$data['sale_id'].'" id="delete">
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

echo "  <script>
            $(document).ready(function() {
                $('#tableSaleOrder').DataTable();
            } );
        </script>";