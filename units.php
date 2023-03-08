<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php include 'update_var.php'; ?>

<div class="container-fluid">
    <h3 class="text-dark mb-4">‌ရေတွက်ပုံ (ယူနစ်)</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form action="functions.php" method="POST">

                <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                <div class="row">
                    <div class="col-md-2 d-grid">
                        <label class="col-form-label">ရေတွက်ပုံ အမည်<br>
                            
                        </label>
                        <input class="form-control" type="text" id="unit_name" name="unit_name" value="<?php echo $a; ?>" autocomplete="off">
                    </div>                    
                    <div class="col-md-1 d-grid">
                        <label class="col-form-label">&nbsp;</label>

                            <?php if ($update == true) { ?>
                                <button class="btn btn-success form-control" id="update_unit" type="submit" name="update_unit">Update</button>
                                <a class="btn btn-outline-warning form-control" href="categories.php">Cancel</a>
                            <?php } else { ?>
                                <button class="btn btn-primary form-control" id="save_unit" type="submit" name="save_unit">Save</button>
                            <?php } ?>
                            
                        
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">ရေတွက်ပုံ အမည်များ စာရင်း</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table id="tableCustomer" class="table table-striped" style="width:100%"><!--  class="table table-hover table-sm my-0 display nowrap text-nowrap" -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>အမည်</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $db->prepare("SELECT * FROM units ORDER BY unit_id DESC");
                            $result->execute();
                            for ($i = 0; $row = $result->fetch(); $i++) {                                
                            ?>
                                <tr class="record">
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $row['unit_name']; ?></td>
                                    <td class="text-end">
                                        <a class="p-1 me-2" href="?unit_update=<?php echo $row['unit_id']; ?>">
                                        <i class="fa fa-edit"></i></a>
                                        <a class="p-1" href="?unit_delete=<?php echo $row["unit_id"]; ?>" onclick="return confirm('Do you want delete this record?');">
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

<?php include 'footer.php'; ?>