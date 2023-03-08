<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php include 'update_var.php'; ?>

                <div class="container-fluid">
                    <h4 class="text-dark mb-3">အသေးသုံး စာရင်း</h4>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="functions.php"><input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                        <div class="row mb-4">
                                            <div class="col-md-2">
                                                <input class="form-control" id="expenses_date" type="date" name="expenses_date" value="<?php echo $a; ?>" required="">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" id="expenses_name" placeholder="အကြောင်းအရာ" name="expenses_name" value="<?php echo $b; ?>" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input class="form-control" type="number" id="expenses_amount" placeholder="ကုန်ကျငွေ" name="expenses_amount" value="<?php echo $c; ?>" required>
                                            </div>
                                            <div class="col-md-2">
                                                <input class="form-control" type="text" id="expenses_remark" placeholder="မှတ်ချက်" name="expenses_remark" value="<?php echo $d; ?>">
                                            </div>
                                            <div class="col-md-3">

                                            <?php if ($update == true) { ?>
                                                <button class="btn btn-success me-2" id="update_expenses" type="submit" name="update_expenses">Update</button>
                                                <a class="btn btn-outline-warning" role="button" href="expense.php">Cancle</a>
                                            <?php } else { ?>
                                                <button class="btn btn-primary" id="save_expenses" type="submit" name="save_expenses">Save</button>
                                            <?php } ?>       
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                
                                <table class="table" id="tableExpenses">
                                    <thead>
                                        <tr>
                                            <th>ရက်စွဲ</th>
                                            <th>အကြောင်းအရာ</th>
                                            <th>ကုန်ကျငွေ</th>
                                            <th>မှတ်ချက်</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $db->prepare("SELECT * FROM expenses ORDER BY expenses_id DESC");
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {
                                            ?>
                                                <tr class="record">
                                                    <td><?php echo date_format(date_create($row['expenses_date']), "d-m-Y"); ?></td>
                                                    <td><?php echo $row['expenses_name']; ?></td>
                                                    <td><?php echo $row['expenses_amount']; ?></td>
                                                    <td><?php echo $row['expenses_remark']; ?></td>
                                                    <td class="text-end">
                                                        <a class="me-3"href="?expenses_update=<?php echo $row['expenses_id']; ?>">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        <a href="?expenses_delete=<?php echo $row["expenses_id"]; ?>" onclick="return confirm('Do you want delete this record?');">
                                                            <i class="icon-trash"></i>
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
            