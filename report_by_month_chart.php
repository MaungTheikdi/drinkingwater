<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php include 'topbar.php'; ?>

<?php
    //error_reporting(1);
    $and = 'AND YEAR(sale_date) = ' . $year;
    $months = array();
    $profit = array();
    $unit = array();
    $expense = array();
    $income = array();

    for ($m = 1; $m <= 12; $m++) {
      //Bar Chart
      $sql = "SELECT SUM(unit) as unit FROM meter WHERE MONTH(sale_date) = '$m' AND YEAR(sale_date) = '$year' GROUP BY MONTH(sale_date)"; //SELECT SUM(unit) as unit FROM meter WHERE YEAR(date) = 2021 GROUP BY MONTH(date)
      $rquery = $conn->query($sql);
      $row = $rquery->fetch_assoc();
      array_push($profit, $row["unit"]);

      // Line Chart
      $sql = "SELECT SUM(cost) as cost FROM meter WHERE MONTH(sale_date) = '$m' AND YEAR(sale_date) = '$year' GROUP BY MONTH(sale_date)";
      $bquery = $conn->query($sql);
      $brow = $bquery->fetch_assoc();
      array_push($unit, $brow["cost"]);

      // Expense Chart
      $sql = "SELECT SUM(amount) as amount FROM expense WHERE MONTH(sale_date) = '$m' AND YEAR(sale_date) = '$year' GROUP BY MONTH(sale_date)";
      $equery = $conn->query($sql);
      $erow = $equery->fetch_assoc();
      array_push($expense, $erow["amount"]);

      // Expense Chart
      $sql = "SELECT SUM(amount) as amount FROM income WHERE MONTH(sale_date) = '$m' AND YEAR(sale_date) = '$year' GROUP BY MONTH(sale_date)";
      $iquery = $conn->query($sql);
      $irow = $iquery->fetch_assoc();
      array_push($income, $irow["amount"]);


      // Month
      $num = str_pad($m, 2, 0, STR_PAD_LEFT);
      $month =  date('M', mktime(0, 0, 0, $m, 1));
      array_push($months, $month);
    }

    $months = json_encode($months);
    $profit = json_encode($profit);
    $unit = json_encode($unit);
    $expense = json_encode($expense);
    $income = json_encode($income);
?>

                <div class="container-fluid">
                    <h4 class="text-dark mb-4"> Drinking Water Selling Report </h4>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Daily Report</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>

                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Theikdi Maung</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js?h=1eb47230ed13e88113270f63f470e160"></script>
<script src="assets/js/chart.min.js?h=320bd0471c3e8d6b9dd55c98e185506c"></script>
<script src="assets/js/script.min.js?h=54606dd47d265960e4f87e56fbe7f6ac"></script>


<!-- Data Table -->
<script src="assets/library/datatable/jquery-3.5.1.js"></script>
<script src="assets/library/datatable/jquery.dataTables.min.js"></script>
<script src="assets/library/datatable/dataTables.bootstrap5.min.js"></script>

<!-- Select -->
<script src="assets/library/dselect/dselect.js"></script>

<script type="text/javascript" src="assets/library/datatable/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/library/datatable/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/library/datatable/datatables.min.js"></script>

<!-- Data Table Date Range -->
<script src="assets/library/datatable/moment.min.js"></script>
<script src="assets/library/datatable/dataTables.dateTime.min.js"></script>
    
</body>

</html>