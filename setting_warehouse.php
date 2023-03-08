<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php include 'update_var.php'; ?>

                <div class="container-fluid">
                    <h4 class="text-dark mb-3">အပြင်အဆင်များ</h4>
                    <div class="row mb-4">

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <div class="card-header text-light bg-primary">
                                            <h5><i class="fa fa-th"></i>ဂိုထောင်စာရင်း</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                                <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <input class="form-control" type="text" id="warehouse_name" value="<?php  echo $a; ?>" 
                                                        name="warehouse_name" placeholder="ဂိုထောင် အမည်">
                                                    </div>
                                                    <div class="col-md-auto">
                                                        <?php if ($update == true) { ?>
                                                            <button class="btn btn-success me-2" id="update_warehouse" type="submit" name="update_warehouse">Update</button>
                                                            <a class="btn btn-outline-warning" role="button" href="setting_warehouse.php">Cancle</a>
                                                        <?php } else {
                                                            //<button id="save_warehouse" type="submit" name="save_warehouse">Save</button>
                                                             ?>

                                                            <button class="btn btn-primary"  onclick="myFunction()">Save</button>

                                                            <script>
                                                            function myFunction() {
                                                            alert("ဂိုဒေါင် (၂)ခု ထည့်သွင်းထားပြိး ဖြစ်ပါသည်။");
                                                            }
                                                            </script>
                                                            
                                                        <?php } ?>     
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-white bg-primary">
                                                    <th>စဉ်</th>
                                                    <th>အမည်</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $result = $db->prepare("SELECT * FROM warehouse ORDER BY warehouse_id ASC");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {                                
                                                    ?>
                                                        <tr class="record">
                                                            <td><?php echo $i+1; ?></td>
                                                            <td><?php echo $row['warehouse_name']; ?></td>

                                                            <td class="text-end">
                                                                <a class="me-3" href="?warehouse_update=<?php echo $row['warehouse_id']; ?>"><i class="icon-pencil"></i></a>
                                                                <a href="?warehouse_delete=<?php echo $row["warehouse_id"]; ?>" onclick="return confirm('Do you want delete this record?');"><i class="icon-trash"></i></a>
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
                        <!--
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <div class="card-header text-white bg-info justify-content-xl-start align-items-xl-start">
                                            <h5 class="d-xl-flex align-items-xl-center"><i class="fa fa-th"></i>ရေတွက်ပုံစာရင်း</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="function.php"><input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <input class="form-control" type="text" id="unit_name" value="<?php  echo $a; ?>" name="unit_name" placeholder="ခု၊ ဒါဇင်၊ ဗူး"></div>
                                                    <div class="col-md-auto"><button class="btn btn-primary" id="save_unit" type="submit" name="save_unit">Save</button><button class="btn btn-success me-2" id="update_unit" type="submit" name="update_unit">Update</button><a class="btn btn-outline-warning" role="button" href="setting_warehouse.php">Cancle</a></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-white bg-info">
                                                    <th>စဉ်</th>
                                                    <th>အမည်</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>အိတ်</td>
                                                    <td class="text-end"><a class="me-3" href="#"><i class="icon-pencil"></i></a><a href="#"><i class="icon-trash"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>ဒါဇင်</td>
                                                    <td class="text-end"><a class="me-3" href="#"><i class="icon-pencil"></i></a><a href="#"><i class="icon-trash"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>ဖာ</td>
                                                    <td class="text-end"><a class="me-3" href="#"><i class="icon-pencil"></i></a><a href="#"><i class="icon-trash"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <div class="card-header text-dark bg-warning">
                                            <h5><i class="fa fa-th"></i>ပစ္စည်းအမျိုးအစားစာရင်း</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="function.php"><input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                                <div class="row mb-4">
                                                    <div class="col"><input class="form-control" type="text" id="category_name" value="<?php  echo $b; ?>" name="category_name" placeholder="ဆန်၊ ဆီ၊ အချိုရည်"></div>
                                                    <div class="col-md-auto"><button class="btn btn-primary" id="save_category" type="submit" name="save_category">Save</button><button class="btn btn-success me-2" id="update_category" type="submit" name="update_category">Update</button><a class="btn btn-outline-warning" role="button" href="setting_warehouse.php">Cancle</a></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-dark bg-warning">
                                                    <th>စဉ်</th>
                                                    <th>အမည်</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>ဆန်</td>
                                                    <td class="text-end"><a class="me-3" href="#"><i class="icon-pencil"></i></a><a href="#"><i class="icon-trash"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>ဆီ</td>
                                                    <td class="text-end"><a class="me-3" href="#"><i class="icon-pencil"></i></a><a href="#"><i class="icon-trash"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>ကော်ဖီ</td>
                                                    <td class="text-end"><a class="me-3" href="#"><i class="icon-pencil"></i></a><a href="#"><i class="icon-trash"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                        
                    </div>
                </div>

<?php include 'footer.php'; ?>