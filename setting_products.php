<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php include 'update_var.php'; ?>

                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-12 mb-2">
                            <div class="card">
                                <div class="card-header justify-content-xl-start align-items-xl-start">
                                    <h5 class="d-xl-flex align-items-xl-center"><i class="fa fa-th"></i>ပစ္စည်း လက်ကျန်ထည့်ရန်</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="functions.php">
                                        <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                        <div class="row mb-4">

                                        
                                            
                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">အမည်</label>
                                                <input class="form-control" type="text" id="product_name" value="<?php  echo $a; ?>"  
                                                name="product_name" required>
                                            </div>

                                            <div class="col-md-2 mb-2">            
                                                <label class="form-label">အမျိုးအစား</label>                                 
                                                <select  class="form-select"  name="company_id"  id="company_id"  required>
                                                        <option value="<?php echo $d; ?>"> <?php if ($d != null) { echo $e; } else { echo "Select"; } ?>
                                                        </option>
                                                        <?php
                                                            $result = $db->prepare("SELECT * FROM company");
                                                            $result->execute();
                                                            for ($i = 0; $row = $result->fetch(); $i++) {
                                                            ?>
                                                            <option value="<?php echo $row['company_id']; ?>"><?php echo $row['company_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>

                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">ယူနစ်</label>
                                                <select class="form-select" name="purchase_unit" id="purchase_unit" required>
                                                    <option value="<?php echo $f; ?>"> <?php if ($f != null) {
                                                                                            echo $g;
                                                                                        } else {
                                                                                            echo "Select";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM units");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['unit_id']; ?>"><?php echo $row['unit_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!--
                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">Per</label>
                                                <input class="form-control" type="number" name="per" id="per"  value="<?php  echo $h; ?> "
                                                onblur="calProductPer();"
                                                required>
                                            </div>
                                            

                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">ရောင်းသည့် ယူနစ်</label>
                                                <select class="form-select" name="sale_unit" id="sale_unit" required>
                                                    <option value="<?php echo $j; ?>"> <?php if ($j != null) {
                                                                                            echo $k;
                                                                                        } else {
                                                                                            echo "Select";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM units");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['unit_id']; ?>"><?php echo $row['unit_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            -->
                                            <!-- 
                                        </div>
                                        <div class="row">
                                             -->
                                            <div class="col-md-1 mb-2">
                                                <label class="form-label">လက်ကျန်</label>
                                                <input class="form-control" type="number" name="purchase_qty" id="purchase_qty"  value="<?php  echo $l; ?>"
                                                onblur="calProductPer();"
                                                required>
                                            </div>

                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">ဝယ်ဈေး</label>
                                                <input class="form-control" type="number" name="purchasing_price" id="purchasing_price"
                                                required="">
                                            </div>

<!-- 
                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">လက်ကျန်<span class="text-danger">ရောင်းယူနစ်</span></label>
                                                <input class="form-control" type="number" name="purchase_qty_per" id="purchase_qty_per"  value="<?php  echo $m; ?>"
                                                required="" readonly="">
                                            </div>
                                                -->
                                            <input type="hidden" name="sale_qty" value="0">


                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">ရောင်းဈေး</label>
                                                <input class="form-control" type="number" name="selling_price" id="selling_price"  value="<?php  echo $selling_price; ?>"
                                                required="">
                                            </div>
                                            <!-- 
                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">လက်ကား ‌ဈေး</label>
                                                <input class="form-control" type="number" name="latli_price" id="latli_price"  value="<?php  echo $latli_price; ?>"
                                                required="">
                                            </div>
 -->
                                            <!-- <input type="number" name="purchasing_price" value="0"> -->

                                            <div class="col-md-1 mb-2">
                                                <label class="form-label">ဂိုထောင်</label>
                                                <select class="form-select" name="warehouse_id" id="warehouse_id" required>
                                                    <option value="<?php echo $n; ?>"> <?php if ($n != null) {
                                                                                            echo $o;
                                                                                        } else {
                                                                                            echo "Select";
                                                                                        } ?>
                                                    </option>
                                                    <?php
                                                    $result = $db->prepare("SELECT * FROM warehouse");
                                                    $result->execute();
                                                    for ($i = 0; $row = $result->fetch(); $i++) {
                                                    ?>
                                                        <option value="<?php echo $row['warehouse_id']; ?>"><?php echo $row['warehouse_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">Noti</label>                                                    
                                                <div class="form-check form-switch">
                                                    <input type="hidden" name="noti" value="0">
                                                    <input class="form-check-input" type="checkbox" name="noti" value="1" role="switch" checked id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"><!-- Get Noti --></label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2 mb-2">
                                            <label class="form-label"></label>
                                            <?php if ($update == true) { ?>
                                                
                                                <button class="btn btn-success form-control me-2" id="update_product" type="submit" name="update_product">Update</button>
                                                <a class="btn btn-outline-warning" role="button" href="setting_products.php">Cancle</a>
                                                <?php } else { ?>
                                                    <button class="btn btn-primary form-control" id="save_product" type="submit" name="save_product">Save</button>
                                                    <?php } ?>
                                            </div>                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">                                                    
                                <strong>Tstock!</strong> လက်ကျန်တန်ဖိုးသည် ပစ္စည်းဝယ်ယူသည့် နောက်ဆုံး ဝယ်စျေးနှုန်းဖြင့် တွက်ချက်သည်။
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm my-0 diplay no-wrap text-no-wrap" id="tableProduct">
                                    <thead>
                                        <tr>
                                            <th>စဉ်</th>
                                            <th>အမည်</th>
                                            <th>ရေတွက်ပုံ</th>
                                            <th>ရောင်း‌ဈေး</th>
                                            <th>ဝယ်ဈေး</th>
                                            <th>လက်ကျန်(#)</th>
                                            <?php if($user_type == "admin"){?>
                                            <th>လက်ကျန်($)</th>
                                            <?php } ?>
                                            <th>တည်နေရာ</th>
                                            <th>Noti</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php //product_id	product_name	category_id	
                                                $result = $db->prepare("SELECT 
                                                `product_id` AS pid,
                                                `product_name`,
                                                company.company_id,
                                                company.company_name,
                                                units.unit_name AS purchase_unit_name,
                                                `purchase_qty`,
                                                `sale_qty`,
                                                `selling_price`,
                                                `purchasing_price`,
                                                qty_p,
                                                qty_s,
                                                warehouse.warehouse_id,
                                                warehouse.warehouse_name,
                                                `noti`
                                                FROM products 
                                                LEFT JOIN units ON units.unit_id = products.purchase_unit
                                                LEFT JOIN company ON company.company_id = products.company_id    
                                                LEFT JOIN warehouse ON warehouse.warehouse_id = products.warehouse_id
                                                ORDER BY products.product_id DESC");
                                                $result->execute();
                                                for ($i = 0; $row = $result->fetch(); $i++) {    
                                                    //Profit
                                                    $a = ($row['qty_p'])*$row['purchasing_price']; 
                                                    $b = $row['qty_p']*$row['selling_price'];                            
                                                ?>
                                                    <tr class="record">
                                                        <td><?php echo $i+1; ?></td>
                                                        <td><?php echo $row['product_name']." - ".$row['company_name']; ?></td>
                                                        <td><?php echo $row['purchase_unit_name']; ?></td>

                                                        <td><?php echo $row['selling_price']; ?></td>

                                                        <td><?php echo $row['purchasing_price']; ?></td>

                                                        <td><?php echo $row['qty_p']; ?></td>

                                                        <?php if($user_type == "admin"){?>
                                                        <td><?php echo $a; ?></td>
                                                        <?php } ?>
                                                        
                                                        <td><?php echo $row['warehouse_name']; ?></td>
                                                        <td><?php 
                                                        if ($row['noti'] == 0) {
                                                             echo ""; 
                                                             } else { 
                                                                echo '<i class="fas fa-bell text-success"><i>'; } ?></td>
                                                        <td class="text-end">
                                                            <a class="me-3" href="?product_update=<?php echo $row['pid']; ?>">
                                                                <i class="icon-pencil"></i></a>
                                                            <a href="?product_delete=<?php echo $row["pid"]; ?>" onclick="return confirm('Do you want delete this record?');">
                                                                <i class="icon-trash"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php
                                            }
                                            ?>
                                    </tbody>
                                    <?php if($user_type == "admin"){?>
                                    <tfoot>
                                        <tr>
                                            <th colspan="10" style="text-align:right">-</th>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Copyright © Tstock 2022</span></div>
    </div>
</footer>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>


<script src="assets/bootstrap/js/bootstrap.min.js?h=1eb47230ed13e88113270f63f470e160"></script>
<script src="assets/js/chart.min.js?h=320bd0471c3e8d6b9dd55c98e185506c"></script>
<script src="assets/js/script.min.js?h=54606dd47d265960e4f87e56fbe7f6ac"></script>




<!-- Data Table -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<!-- MDB -->

<!-- Select -->
<script src="assets/library/dselect/dselect.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/datatables.min.js"></script>
<!-- Data Table Date Range -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>


<!--<script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>-->

<script>
function calProductPer () {
  var e = parseFloat(document.getElementById('purchase_qty').value, 10),
    t = parseFloat(document.getElementById('per').value, 10)

  document.getElementById('purchase_qty_per').value = e * t
}
</script>
<script>
    function commaSeparateNumber(val) {
  // remove sign if negative
  var sign = 1;
  if (val < 0) {
    sign = -1;
    val = -val;
  }

  // trim the number decimal point if it exists
  let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();

  while (/(\d+)(\d{3})/.test(num.toString())) {
    // insert comma to 4th last position to the match number
    num = num.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
  }

  // add number after decimal point
  if (val.toString().includes('.')) {
    num = num + '.' + val.toString().split('.')[1];
  }

  // return result with - sign if negative
  return sign < 0 ? '-' + num : num;
}
</script>
<script>
    $(document).ready(function () {
        $('#tableProduct').DataTable({
            footerCallback: function (row, data, start, end, display) {

                var api = this.api();    
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };    
                // Total over all pages
                total = api
                    .column(6)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);    
                // Total over this page
                pageTotal = api
                    .column(6, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(5).footer()).html('လက်ကျန်တန်ဖိုး  ' + commaSeparateNumber(pageTotal) + ' (' + commaSeparateNumber(total) + ' ကျပ်)');
            },
        });
    });
</script>
<script>
    dselect(document.querySelector('#company_id'), {
        search: true,
        maxHeight: '360px',
    })
</script>

<script>
    dselect(document.querySelector('#purchase_unit'), {
        search: true,
        maxHeight: '360px',
    })
</script>
<script>
    dselect(document.querySelector('#sale_unit'), {
        search: true,
        maxHeight: '360px',
    })
</script>
</body>

</html>