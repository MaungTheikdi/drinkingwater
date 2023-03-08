<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php include 'update_var.php'; ?>

<div class="container-fluid">
    <h3 class="text-dark mb-4">ငွေပေး‌ခြေစနစ်</h3>
    
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-striped" style="width:100%"><!--  class="table table-hover table-sm my-0 display nowrap text-nowrap" -->
                    <thead>
                        <tr>
                            <th>စဉ်</th>
                            <th>အမျိုးအစား</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $db->prepare("SELECT * FROM payment ORDER BY payment_id ASC");
                            $result->execute();
                            for ($i = 0; $row = $result->fetch(); $i++) {                                
                            ?>
                                <tr class="record">
                                    <td><?php echo $row['payment_id']; ?></td>
                                    <td><?php echo $row['payment_name']; ?></td>                                    
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