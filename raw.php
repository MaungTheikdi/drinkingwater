<div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">ဆောင်ရွက်ရန် အဝယ် အော်ဒါစာရင်း</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                            $result = $db->prepare("SELECT 
                                            supplier.supplier_name,
                                            expected_date
                                            FROM purchase
                                            LEFT JOIN supplier ON supplier.supplier_id = purchase.supplier_id
                                            WHERE purchase.purchase_order = 0
                                            ");
                                            $result->execute();
                                            for ($i = 0; $row = $result->fetch(); $i++) {                                                
                                            ?>

                                        <li class="list-group-item">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <h6 class="mb-0"><strong><?php echo $row['supplier_name']; ?></strong></h6>
                                                    <span class="text-danger text-xs"><?php echo $row['expected_date']; ?></span>
                                                </div>
                                                <div class="col-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-bell" style="font-size: 22;margin-right: 6;">
                                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"></path>
                                                        <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">ပစ္စည်းပို့ရန်</h6>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <?php
                                        $result22 = $db->prepare("SELECT 
                                        customer.customer_name,
                                        expected_date
                                        FROM sale
                                        LEFT JOIN customer ON customer.customer_id = sale.customer_id
                                        WHERE sale.sale_order = 0
                                        ");
                                        $result22->execute();
                                        for ($i = 0; $row = $result22->fetch(); $i++) {                                                
                                        ?>

                                        <li class="list-group-item">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <h6 class="mb-0"><strong><?php echo $row['customer_name']; ?></strong></h6>
                                                    <span class="text-danger text-xs"><?php echo $row['expected_date']; ?></span>
                                                </div>
                                                <div class="col-auto"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-bell" style="font-size: 22;margin-right: 6;color: var(--bs-cyan);">
                                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"></path>
                                                        <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                                                    </svg></div>
                                            </div>
                                        </li>

                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>