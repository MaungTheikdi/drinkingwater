<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php //include 'update_var.php'; ?>

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">ဝယ်ယူမှု ပြေစာများ</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table id="tableCustomer" class="table table-striped" style="width:100%"><!--  class="table table-hover table-sm my-0 display nowrap text-nowrap" -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Invoice No.</th>
                            <th>Supplier</th>
                            
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Warehouse</th>
                            <!--<th class="text-end">Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $db->prepare("SELECT
                            purchase_date,
                            purchase_invoice,
                            purchase_return,
                            supplier.supplier_name,
                            warehouse.warehouse_name,
                            payment.payment_name,
                            SUM(purchase_qty) AS purchase_qty,
                            SUM(purchase_amount) AS purchase_price
                            FROM `purchase` 
                            LEFT JOIN supplier ON supplier.supplier_id = purchase.supplier_id
                            LEFT JOIN warehouse ON warehouse.warehouse_id = purchase.warehouse_id
                            LEFT JOIN payment ON payment.payment_id = purchase.payment_id
                            GROUP BY purchase_invoice
                            ");
                            $result->execute();
                            for ($i = 0; $row = $result->fetch(); $i++) {                                
                            ?>
                                <?php 
                                if($row['purchase_return'] == "0") {
                                    echo '<tr class="record bg-info">';
                                } else{
                                    echo '<tr class="record">';
                                }
                                ?>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo date_format(date_create($row['purchase_date']),"d-m-Y"); ?></td>
                                    <td><?php echo $row['purchase_invoice']; ?></td>
                                    <td><?php echo $row['supplier_name']; ?></td>
                                    <td><?php echo $row['purchase_price']; ?></td>
                                    <td><?php echo $row['payment_name']; ?></td>
                                    <td><?php echo $row['warehouse_name']; ?></td>
                                    

                                    
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