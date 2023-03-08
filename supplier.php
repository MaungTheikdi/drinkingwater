<?php include 'header.php';?>

<?php include 'sidebar.php';?>

<?php include 'topbar.php';?>

<?php include 'update_var.php';?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Suppliers</h3>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="functions.php" method="POST">
                                <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                <div class="row">

                                    <div class="col-md-3 d-grid"><label class="col-form-label">အမည်
                                        <input class="form-control" type="text" id="supplier_name" name="supplier_name" value="<?php echo $a; ?>"></label>
                                    </div>
                                    <div class="col-md-2 d-grid"><label class="col-form-label">ဖုန်း
                                        <input class="form-control" type="text" id="supplier_phone" name="supplier_phone" value="<?php echo $b; ?>"></label>
                                    </div>
                                    <div class="col-md-3 d-grid"><label class="col-form-label">လိပ်စာ
                                        <input class="form-control" type="text" id="supplier_address" name="supplier_address" value="<?php echo $c; ?>"></label>
                                    </div>
                                    <div class="col-md-2 d-grid"><label class="col-form-label">မှတ်ချက်
                                        <input class="form-control" type="text" id="supplier_note" name="supplier_note" value="<?php echo $d; ?>"></label>
                                    </div>
                                    <div class="col-md-2 d-grid"><label class="col-form-label">&nbsp;

                                        <?php if ($update == true) { ?>
                                            <button class="btn btn-success form-control" id="update_supplier" type="submit" name="update_supplier">Update</button></label>
                                        <a class="btn btn-outline-warning" href="supplier.php">Cancel</a>
                                        <?php } else { ?>
                                            <button class="btn btn-primary form-control" id="save_supplier" type="submit" name="save_supplier">Save</button></label>
                                        <?php } ?>
                                        
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">ရောင်းသူများ စာရင်း</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table id="tableSupplier" class="table table-striped" style="width:100%"><!--  class="table table-hover table-sm my-0 display nowrap text-nowrap" -->
                                    <thead>
                                        <tr>
                                            <th>အမည်</th>
                                            <th>ဖုန်း</th>
                                            <th>လိပ်စာ</th>
                                            <th>မှတ်ချက်</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $db->prepare("SELECT * FROM supplier ORDER BY supplier_id DESC");
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {
                                                
                                            ?>
                                                <tr class="record">
                                                    <td><?php echo $row['supplier_name']; ?></td>
                                                    <td><?php echo $row['supplier_phone']; ?></td>
                                                    <td><?php echo $row['supplier_address']; ?></td>
                                                    <td><?php echo $row['supplier_note']; ?></td>
                                                    <td class="text-end">
                                                        <a class="p-1 me-2" href="?supplier_update=<?php echo $row['supplier_id']; ?>">
                                                        <i class="fa fa-edit"></i></a>
                                                        <a class="p-1" href="?supplier_delete=<?php echo $row["supplier_id"]; ?>" onclick="return confirm('Do you want delete this record?');">
                                                        <i class="fa fa-trash text-danger"></i></a>
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

<?php include 'footer.php';?>