<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php 

?>

<div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <img class="mb-3 mt-4 mb-4" src="assets/img/theikdi_logo_dark.png" width="160" height="160">
                                    <h3 class="text-dark mb-4">Welcome, <?php echo $user; ?></h3>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-lg-8">
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            include 'includes/connection.php';

                                            $select_qry = "SELECT * FROM users WHERE username = '$user'";

                                            $userrun = mysqli_query($link,$select_qry);
                                            $resultUser = mysqli_fetch_assoc($userrun);

                                            $old_password = $resultUser['password'];

                                            if(isset($_POST['save_password'])) {
                                                $new_password = $_POST['password'];

                                                $pass_qry = "UPDATE users SET password=MD5('$new_password') WHERE username = '$user'";

                                                if(mysqli_query($link, $pass_qry)){
                                                    echo '<script> window.location.replace("logout.php"); </script>';
                                                }
                                            
                                            
                                            }


                                            ?>
                                            <form method="POST">
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-4">
                                                        <div class="form-group">
                                                            <label for="old_password"><strong>Old Password</strong></label>
                                                            <input class="form-control" type="password" value="<?php echo $old_password; ?>" id="old_password" placeholder="Old Password" name="old_password" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-4">
                                                        <div class="form-group">
                                                            <label for="password"><strong>New Password</strong></label>
                                                            <input class="form-control" type="text" id="password" name="password">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" name="save_password" type="button">Update Password</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

<?php include 'footer.php'; ?>