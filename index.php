<?php include 'header.php';?>

<?php include 'sidebar.php';?>

<?php include 'topbar.php';?>

<?php
include 'includes/connection.php';

error_reporting(1);

$rentqry = "SELECT SUM(rent_no) AS rent_no  
FROM `water_distribution` 
WHERE DATE(sale_date) = CURDATE()";
$rentrun = mysqli_query($link, $rentqry);
$rentrow = mysqli_fetch_assoc($rentrun);
$todayRent = $rentrow['rent_no'];
echo $tadayRent;

$returnqry = "SELECT SUM(return_no) AS return_no  
FROM `water_distribution` 
WHERE DATE(sale_date) = CURDATE()";
$retrunrun = mysqli_query($link, $returnqry);
$returnrow = mysqli_fetch_assoc($retrunrun);
$todayReturn = $returnrow['return_no'];


$sellqry = "SELECT SUM(rent_no) AS sell_no  
FROM `water_distribution`";
$sellrun = mysqli_query($link, $sellqry);
$sellrow = mysqli_fetch_assoc($sellrun);
$todaySell = $sellrow['sell_no'];

$newRentBal = "SELECT SUM(rent_balance) AS rent_balance  FROM `customer`";
$newRentRun = mysqli_query($link, $newRentBal);
$newRentRow = mysqli_fetch_assoc($newRentRun);
$totalRent = $newRentRow['rent_balance'];


if(isset($_GET['distribution_delete'])){

    $id=$_GET['distribution_delete'];

    $customer_id = $_GET['customer_id'];
    $rent_no = $_GET['rent_no'];
    $return_no = $_GET['return_no'];
    $new_rent_balance = $_GET['new_rent_balance'];

    $rent_balance = ($new_rent_balance - $rent_no) + $return_no;

    $cssql = "UPDATE `customer` SET `rent_balance` = $rent_balance WHERE `customer_id`= $customer_id";
        
        if (mysqli_query($link, $cssql)) {

            $sql = "DELETE FROM water_distribution WHERE distribution_id=$id";

                if ($link->query($sql) === TRUE) {
                    header('Location: index.php');
                } else {
                echo "Error deleting record: " . $link->error;
                }

                $link->close();

        } else {
            echo "Error UPDATE: " . $cssql . " " . mysqli_error($link);
            //echo "<script type= 'text/javascript'>alert('Please, don't use the symbol!');</script>";
        }    
}


?>

                <div class="container-fluid">


                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>

                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-dark mb-4">Dashboard</h4>
                        
                        <a href="sale.php" type="button" class="btn btn-primary btn-sm" >
                            New Sale
                        </a>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3 mb-2">
                            <div class="card bg-warning shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-dark fw-bold text-xs mb-1"><span>ယနေ့ ရေဗူးအရောင်း </span></div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                            <span><?php echo number_format($todayRent); ?></span>
                                            <span style=" font-size: 12px; margin-left: 1rem; color: black;">ဗူး</span>
                                            </div>
                                        </div>
                                        <div class="col-auto"><a href="#"><i class="fas fa-shopping-cart fa-2x text-gray-300"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="card bg-success shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-white fw-bold text-xs mb-1"><span>ယနေ့ ဗူးခွံပြန်ရ </span></div>
                                            <div class="text-white fw-bold h5 mb-0">
                                                <span><?php echo number_format($todayReturn); ?></span>
                                                <span style=" font-size: 12px; margin-left: 1rem; color: white;">ဗူး</span>
                                            </div>
                                        </div>
                                        <div class="col-auto"><a href="#"><i class="fas fa-box-open fa-2x text-gray-300"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-3 mb-2">
                            <div class="card bg-primary shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-white fw-bold text-xs mb-1"><span> စုစုပေါင်း ရေဗူးအရောင်း</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-white fw-bold h5 mb-0 me-3">
                                                    <span><?php echo number_format($todaySell); ?></span>
                                                    <span style=" font-size: 12px; margin-left: 1rem; color: white;">ဗူး</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><a href="#"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-3 mb-2">
                            <div class="card bg-danger shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-white fw-bold text-xs mb-1"><span>စုစုပေါင်း ရရန်ကျန်ရေဗူးခွံ </span></div>
                                            <div class="text-white fw-bold h5 mb-0">
                                            <span><?php echo number_format($totalRent); ?></span>
                                            <span style=" font-size: 12px; margin-left: 1rem; color: white;">ဗူး</span>
                                            </div>
                                        </div>
                                        <div class="col-auto"><a href="#"><i class="fas fa-comments-dollar fa-2x text-gray-300"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <?php
                        $result44 = $db->prepare("SELECT * FROM note WHERE DATE(created_date) > (NOW() - INTERVAL 3 DAY) ORDER BY note_id DESC");
                        $result44->execute();
                        for ($i = 0; $row44 = $result44->fetch(); $i++) {
                            ?>

                        <div class="alert <?php echo $row44['note_color']; ?> d-flex align-items-center mb-4" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill"/>
                            </svg>
                            <div>
                                <span><strong><?php echo $row44['note_name']; ?></strong></span><i><?php echo " Created by : " . $row44['note_by']; ?></i>
                            </div>
                        </div>
                    <?php
                        }
                    ?>


                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <h4 class="text-dark mb-4">Today Lastest Sale</h4>
                    </div>

                    <div class="row mb-4">
                        <div class="table-responsive col-md-12">
                            <table class="table table-striped display nowrap text-nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ရက်စွဲ</th>           
                                        <th> အမည် </th>
                                        <th> ငှားရမ်းဗူး </th>
                                        <th> ပြန်ရဗူးခွံ </th>
                                        <th> ရရန်ကျန်ဗူးခွံ </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $result = $db->prepare("SELECT water_distribution.*, customer.customer_name
                                        FROM water_distribution 
                                        LEFT JOIN customer ON customer.customer_id = water_distribution.customer_id
                                        ORDER BY distribution_id DESC
                                        LIMIT 1
                                        ");
                                        $result->execute();
                                        for ($i = 0; $row = $result->fetch(); $i++) {                                                
                                        ?>
                                            <tr>
                                                <td><?php echo $row['sale_date']; ?></td>
                                                <td><?php echo $row['customer_name']; ?></td>
                                                <td><?php echo $row['rent_no']; ?></td>
                                                <td><?php echo $row['return_no']; ?></td>
                                                <td><?php echo $row['new_rent_balance']; ?></td>
                                                <td class="text-end">
                                                    <a class="p-1 me-2" href="sale_edit.php?distribution_update=<?php echo $row['distribution_id']; ?>">
                                                    <i class="fa fa-edit"></i></a>
                                                    <a class="p-1" 
                                                    href="?distribution_delete=<?php 
                                                    echo $row["distribution_id"].
                                                    '&customer_id='.$row["customer_id"].
                                                    '&rent_no='.$row["rent_no"].
                                                    '&return_no='.$row["return_no"].
                                                    '&new_rent_balance='.$row["new_rent_balance"]; 
                                                    ?>" onclick="return confirm('Do you want delete this record?');">
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



<?php include 'footer.php';?>
