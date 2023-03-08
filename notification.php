<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php 

?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Notification Setting</h3>
                    <div class="row mb-3">
                        
                        <div class="col-md-12 col-lg-12">
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Notification Products Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            include 'includes/connection.php';

                                            $select_qry = "SELECT * FROM notification WHERE notification_id = 1";

                                            $userrun = mysqli_query($link,$select_qry);
                                            $resultUser = mysqli_fetch_assoc($userrun);

                                            $old_password = $resultUser['notification_count'];

                                            if(isset($_POST['save_password'])) {
                                                $new_password = $_POST['notification_count'];

                                                $pass_qry = "UPDATE notification SET notification_count=$new_password WHERE notification_id = 1";

                                                if(mysqli_query($link, $pass_qry)){
                                                    echo '<script> window.location.replace("notification.php"); </script>';
                                                }
                                            
                                            
                                            }


                                            ?>
                                            <form method="POST">
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-4">
                                                        <div class="form-group">
                                                            <label class="mb-2" for="old_password">
                                                                <strong>
                                                                လက်ရှိ Noti ရယူရန် သတ်မှတ်ထားသော ကုန်ပ္စည်းလက်ကျန် အရေအတွက်မှာ
                                                                </strong>
                                                            </label>
                                                            <input class="form-control" type="text" value="<?php echo $old_password; ?>" id="old_password" placeholder="Old Password" name="old_password" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <div class="form-group">
                                                            <label class="mb-2" for="password"><strong>
                                                            Noti ရယူရန် အသစ် သတ်မှတ်မည့် ကုန်ပ္စည်းလက်ကျန် အရေအတွက်မှာ
                                                            </strong></label>
                                                            <input class="form-control" type="text" id="notification_count" name="notification_count">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" name="save_password" type="submit">Update Notification</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

<?php include 'footer.php'; ?>