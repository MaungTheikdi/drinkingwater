<?php

$qry_notification1 = "SELECT * FROM notification WHERE notification_id = 1";

$notification_run1 = mysqli_query($link,$qry_notification1);
$notification_row1 = mysqli_fetch_assoc($notification_run1);

$currentNotiCount = $notification_row1['notification_count'];
//5

$qry_notification = "SELECT
COUNT(customer_id) AS c
FROM customer
WHERE rent_balance > $currentNotiCount";

$notification_run = mysqli_query($link, $qry_notification);
$notification_row = mysqli_fetch_assoc($notification_run);

$notificationCount = $notification_row['c'];


?>

<div id="content">
    <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <h4 class="text-primary d-none d-md-inline-block">သီသီအေးထွန်း ရေသန့်ဗူး</h4>
            
            <ul class="navbar-nav flex-nowrap ms-auto">
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <span class="badge bg-danger badge-counter"><?php echo $notificationCount; ?> </span>
                            <i class="fas fa-bell fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                            <h6 class="dropdown-header">Notification</h6>


                            <?php
                                            $resultNoti = $db->prepare("SELECT
                                            *
                                            FROM customer 
                                            WHERE rent_balance > $currentNotiCount
                                            ");
                                            $resultNoti->execute();
                                            for ($i = 0; $row = $resultNoti->fetch(); $i++) {                                                
                                            ?>

                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="me-3">
                                                            <div class="bg-primary icon-circle text-white fw-bold">
                                                                <?php echo $row['rent_balance'];?>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="small text-gray-500"><?php echo $row['customer_name']; ?></span>
                                                            <p><?php echo $row['customer_address'].' | '.$row['customer_phone']; ?></p>
                                                        </div>
                                                    </a>
                                        <?php
                                        }
                                        ?>

                            <a class="dropdown-item text-center small text-gray-500" href="report_sale_.php">ဗူးရရန်စာရင်းများ အားလုံးကြည့်ရန်</a>
                        </div>
                    </div>
                </li>



                
                
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">                            
                            <i class="fas fa-cog"></i>
                        </a>

                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item" href="sale.php"><i class="fas fa-plus fa-sm fa-fw me-2 text-primary"></i>New Sale</a><!-- fas fa-table -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="customer.php"><i class="fas fa-user fa-sm fa-fw me-2 text-dark"></i>Customer</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="report_today.php"><i class="fas fa-file fa-sm fa-fw me-2 text-success"></i>Today Report</a>
                            <a class="dropdown-item" href="report_by_date.php"><i class="fas fa-file fa-sm fa-fw me-2 text-primary"></i> Daily Report </a>
                            <a class="dropdown-item" href="report_by_month.php"><i class="fas fa-file fa-sm fa-fw me-2 text-primary"></i> Monthly Report </a>
                            <a class="dropdown-item" href="report_sale.php"><i class="fas fa-file fa-sm fa-fw me-2 text-primary"></i> Detail </a>
                            <a class="dropdown-item" href="report_customer.php"><i class="fas fa-file fa-sm fa-fw me-2 text-danger"></i>Customer Report</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-comment fa-sm fa-fw me-2"></i>Info to User</a>
                        </div>                       
                    </div>
                </li>

                <div class="d-none d-sm-block topbar-divider"></div>

                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $user; ?></span>
                            <img class="border rounded-circle img-profile" src="assets/img/avatars/avatar3.jpeg?h=c5166867f10a4e454b5b2ae8d63268b3"></a>

                            <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="notification.php">
                                <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Notification</a>                                
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"> 
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout
                            </a>
                        </div>
                    </div>
                </li>

            </ul>

        </div>
    </nav>



    <div class="row">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Note or Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="insert_note.php" method="POST">
                                    <input type="hidden" name="note_by" id="note_by" value="<?php echo $user; ?>">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Color:</label>
                                        <select class="form-control" name="color_name" id="color_name">
                                            <option value="alert-warning">Warning : ~Yellow</option>
                                            <option value="alert-danger">Danger : ~Red</option>
                                            <option value="alert-primary">Primary : ~Blue</option>
                                            <option value="alert-success">Success : ~Green</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" name="message" id="message-text"></textarea>
                                    </div>
                                    <input class="btn btn-outline-primary form-control" type="submit"  name="save_message" value="Save">
                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
