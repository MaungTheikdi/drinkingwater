<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php include 'update_var.php'; ?>

<div class="container-fluid">
    <h3 class="text-dark mb-4">ကုမ္ပဏီများ/တံဆိပ်</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form action="functions.php" method="POST">

                <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                <div class="row">
                    <div class="col-md-3 d-grid">
                        <label class="col-form-label">ကုမ္ပဏီအမည်/တံဆိပ်<br>
                            
                        </label>
                        <input class="form-control" type="text" id="company_name" name="company_name" value="<?php echo $a; ?>" autocomplete="off">
                    </div>                    
                    <div class="col-md-1 d-grid">
                        <label class="col-form-label">&nbsp;</label>

                            <?php if ($update == true) { ?>
                                <button class="btn btn-success form-control" id="update_company" type="submit" name="update_company">Update</button>
                                <a class="btn btn-outline-warning form-control" href="categories.php">Cancel</a>
                            <?php } else { ?>
                                <button class="btn btn-primary form-control" id="save_company" type="submit" name="save_company">Save</button>
                            <?php } ?>
                            
                        
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">ကုမ္ပဏီများ/တံဆိပ်များ စာရင်း</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table id="tableCustomer" class="table table-striped" style="width:100%"><!--  class="table table-hover table-sm my-0 display nowrap text-nowrap" -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ကုမ္ပဏီ/တံဆိပ် အမည်</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $db->prepare("SELECT * FROM company ORDER BY company_id DESC");
                            $result->execute();
                            for ($i = 0; $row = $result->fetch(); $i++) {                                
                            ?>
                                <tr class="record">
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                    <td class="text-end">
                                        <a class="p-1 me-2" href="?company_update=<?php echo $row['company_id']; ?>">
                                        <i class="fa fa-edit"></i></a>
                                        <a class="p-1" href="?company_delete=<?php echo $row["company_id"]; ?>" onclick="return confirm('Do you want delete this record?');">
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