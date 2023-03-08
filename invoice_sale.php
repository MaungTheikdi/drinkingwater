<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php //include 'update_var.php'; ?>

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">အရောင်း ပြေစာများ</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table id="tableCustomer" class="table table-striped" style="width:100%"><!--  class="table table-hover table-sm my-0 display nowrap text-nowrap" -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Invoice No.</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Payment</th>
                            <th>Warehouse</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $db->prepare("SELECT
                            sale_date,
                            sale_invoice,
                            sale_return,
                            customer.customer_name,
                            warehouse.warehouse_name,
                            payment.payment_name,
                            SUM(sale_qty) AS sale_qty,
                            SUM(sale_amount) AS sale_price,
                            SUM(sale_discount) AS sale_discount
                            FROM `sale` 
                            LEFT JOIN customer ON customer.customer_id = sale.customer_id
                            LEFT JOIN warehouse ON warehouse.warehouse_id = sale.warehouse_id
                            LEFT JOIN payment ON payment.payment_id = sale.payment_id
                            GROUP BY sale_invoice
                            ");
                            $result->execute();
                            for ($i = 0; $row = $result->fetch(); $i++) {                                
                            ?>
                                <?php 
                                if($row['sale_return'] == "0") {
                                    echo '<tr class="record bg-info">';
                                } else{
                                    echo '<tr class="record">';
                                }
                                ?>
                                
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo date_format(date_create($row['sale_date']), "d-m-Y"); ?></td>
                                    <td><?php echo $row['sale_invoice']; ?></td>
                                    <td><?php echo $row['customer_name']; ?></td>
                                    <td><?php echo $row['sale_price']; ?></td>
                                    <td><?php echo $row['sale_discount']; ?></td>
                                    <td><?php echo $row['payment_name']; ?></td>
                                    <td><?php echo $row['warehouse_name']; ?></td>

                                    <td class="text-end">
                                        <a class="p-1 me-2" target="_blank" href="invoice.php?sale_invoice=<?php echo $row['sale_invoice']; ?>">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<?php include 'footer.php'; ?>