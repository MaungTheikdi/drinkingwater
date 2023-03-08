<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "includes/connection.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    // Validate credentials
    if (empty($username_err) && empty($password_err)) {

        // Prepare a select statement
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass = md5($password);
        $Sql_Query = "SELECT * FROM users WHERE username = '$username' and password = '$pass' ";
        $check = mysqli_fetch_array(mysqli_query($link, $Sql_Query));
        $user_type = $check['user_type'];

        if (isset($check)) {
            $_SESSION["username"] = $username;
            $_SESSION["user_type"] = $user_type;
            $_SESSION["loggedin"] = true;

            header("location: index.php");
            exit;

        } else {
            echo '<span class="text-white">Invalid Username or Password Please Try Again</span>';
        }
    } else {
        echo "Check Again";
    }
    // Close connection
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Twater">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    
    <title>Login - Twater</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body class="bg-gradient-primary">

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100 pb-5" style="background: linear-gradient(var(--bs-blue), var(--bs-info) 49%, var(--bs-white));">
        <div class="row mb-5">
            <div class="col mb-5">
                <div class="card">
                    <label class="text-danger"></label>
                    <div class="card-header text-center mt-4">
                        <i class="fas fa-raindrops fa-3x" style="color: var(--bs-blue);"></i>
                        <h4 class="mt-2 mb-2">Twater</h4>
                    </div>
                    <div class="card-body text-center">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input class="form-control" type="text" name="username" value="Admin" placeholder="Name or Email" required="">
                            <span class="help-block"><?php echo $username_err; ?></span>
                            <input class="form-control mt-3 mb-3" type="password" name="password" placeholder="Password" required="">
                            <span class="help-block"><?php echo $password_err; ?></span>
                            <button class="btn btn-outline-success w-100" name="login" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(assets/img/drd_logo.png); background-position: center; background-size: contain; background-repeat: no-repeat;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>




                                    <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                        <div class="form-group" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                                            <input class="form-control form-control-user" type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter User Name..." >
                                            <span class="help-block"><?php echo $username_err; ?></span>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>





                                        <hr>
                                        <a class="btn btn-primary btn-block text-white btn-google btn-user" role="button">
                                            <i class="fab fa-google"></i>&nbsp; Login with Google
                                        </a>
                                        <a class="btn btn-primary btn-block text-white btn-facebook btn-user" role="button">
                                            <i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook
                                        </a>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="index.php">Back</a></div>
                                    <div class="text-center"><a class="small" href="#">Powered by: T-Production</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>