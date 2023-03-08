<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$tz = timezone_open("Asia/Yangon");

$user = $_SESSION["username"];
$user_type = $_SESSION["user_type"];

include ('includes/connection.php');

$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$php_file_name = basename($url);
//parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
//$title = isset($_GET['page']) ? ucwords(str_replace("_", ' ', $_GET['page'])) : "Home";
//$title = str_replace("Persons Companies","Persons/Companies",$title);
$title = $php_file_name ? ucwords(str_replace(".php", ' ', $php_file_name)) : "Home";
$title = str_replace("Persons Companies","Persons/Companies", $title);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Twater <?php echo $title; ?></title>
    <meta name="description" content="Tstock">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">
    <link rel="icon" type="image/png" sizes="130x130" href="assets/img/theikdi_logo_dark.png?h=c3bba6c1acf4a11aaba8055a3eecfe89">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=d18c626db9b6d019173a30a59c07e76d">

    
    <!-- dselect -->
    <link rel="stylesheet" href="assets/library/dselect/dselect.css">
<!--
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    -->
    <link rel="stylesheet" href="assets/NunitoFonts.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css?h=320bd0471c3e8d6b9dd55c98e185506c">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css?h=320bd0471c3e8d6b9dd55c98e185506c">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css?h=320bd0471c3e8d6b9dd55c98e185506c">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css?h=320bd0471c3e8d6b9dd55c98e185506c">

    <link rel="stylesheet" href="assets/css/styles.min.css?h=94b88c1a520368addbe97350e2c2bce0">
    <!-- Data Table 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/datatables.min.css"/>
-->
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables.min.css"/>

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"> -->
    <link rel="stylesheet" href="assets/dataTables.dateTime.min.css">
    
    
    <style>
        #tbl_head{
            display: none;
        }
        #tbl_footer{
            display: none;
        }
        @media print{
            #tbl_head{
                display: block;
            }
            #tbl_hide{
                display: none;
            }
        }
        .theikdi-menu-link a{
            color: #0a0a0a;
            text-decoration: overline;
        }
    </style>

</head>
<body id="page-top" class="sidebar-toggled"><!-- <body id="page-top"> -->
    <div id="wrapper">

