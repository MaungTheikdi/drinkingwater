<?php

//$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

//$url_components = parse_url($url);
  
//parse_str($url_components['query'], $params);

//echo ' Hi '.$params['name'];

$sale_invoice_number = $_GET['sale_invoice'];
  
?>
<?php

include ("includes/connection.php");

$sql_s="SELECT
*
FROM sale
LEFT JOIN customer ON customer.customer_id = sale.customer_id
LEFT JOIN payment ON payment.payment_id = sale.payment_id
WHERE sale.sale_invoice='$sale_invoice_number'
";
//ORDER BY sale.sale_id DESC LIMIT 1
//WHERE sale.sale_invoice='$sale_invoice_number'
//sale_date = CURDATE() AND sale_order = 1 AND 

$result_s = mysqli_query($link,$sql_s);

$data_s=mysqli_fetch_array($result_s);
if($data_s > 0){
    $sale_invoice_number = $data_s['sale_invoice'];
} else{
    $sale_invoice_number = "";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>သီတဂူ - Tstock:Invoice</title>
    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <!--<img src="logo.png" alt="Company logo" 
                                style="width: 100%; max-width: 300px" />-->
                                သီသီအေးထွန်း<br/>
                                <span style="font-size: 20px;">ကုန်မျိုးစုံရောင်းဝယ်ရေး</span>
                            </td>


                            <td>
                                Invoice #: <?php echo $data_s['sale_invoice']; ?><br />
                                Created: <?php echo date_format(date_create($data_s['sale_date']),"d-m-Y"); ?><br />
                                Payment Method: <?php echo $data_s['payment_name']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                               ရေးမြို့<br />
                                အမှတ် (၁) လမ်း၊<br />
                                ဖုန်း၊ ၀၉-၇၈၄ ၆၇၅ ၂၅၁၊ ၀၉-၄၂၅ ၃၄၆ ၅၈၉
                            </td>


                            <td>
                            <?php echo $data_s['customer_name']; ?><br />
                            <?php echo $data_s['customer_phone']; ?><br />
                            <?php echo $data_s['customer_address']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>#  Item</td>
                <td>Price</td>
            </tr>

            <?php         
            $sql="SELECT
            sale_id,
            sale_date,
            products.product_name,
            units.unit_name,
            sale.sale_qty,
            sale_price,
            sale_amount,
            (SELECT SUM(sale_amount) FROM sale WHERE sale.sale_invoice='$sale_invoice_number') AS sum_sale ,
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
            $i=1;
            $sum_sale = "";
            while($data=mysqli_fetch_array($result))
            {

                $sum_sale = $data['sum_sale'];
                ?>
                <tr class="item">
                            
                            <td>
                                <?php 
                                    echo $i."  ". $data['product_name']." - (".$data['sale_qty']."  ".$data['unit_name']." x ".$data['sale_price']." ကျပ်".")"; 
                                ?>
                            </td>
                            <td><?php echo $data['sale_amount']; ?></td>
                        </tr>
            <?php
                $i++;
            }
            ?>
            <tr class="total">
                <td></td>
                <td>Total: <?php echo $sum_sale; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>