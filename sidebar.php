<!--<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" 
style="background: linear-gradient(45deg, #1f5597, #0b51d1);">-->

<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled" 
style="background: linear-gradient(45deg, #1f5597, #0b51d1);">

    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-dice-d6" style="color: var(--bs-yellow);"></i></div>
            <div class="sidebar-brand-text mx-3"><span style="color: var(--bs-warning);">Tstock</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                <p class="mb-0">စာရင်းသွင်းရန်</p>
            </div>
            <?php if($user_type == "admin" || $user_type == "sale" ){?>
            <?php
            } ?>
            <?php if($user_type == "admin" || $user_type == "sale" ){?>
            <li class="nav-item">
                <a class="nav-link" href="sale.php"><i class="fas fa-arrow-circle-up"></i>ရေဗူးအရောင်း </a>
            </li>
            
            <?php
            } ?>
            
            <hr class="sidebar-divider">

            <?php if($user_type == "admin"){?>
            <div class="sidebar-heading">
                <p class="mb-0">အစီရင်ခံစာ</p>
            </div>

            <li class="nav-item">
                <div>
                    <a class="btn btn-link nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-3" href="#collapse-3" role="button">
                        <i class="fas fa-table"></i>&nbsp;<span>အစီရင်ခံစာများ</span>
                    </a>
                    <div class="collapse" id="collapse-3">
                        <div class="bg-white border rounded py-2 collapse-inner">
                            <!-- <h6 class="collapse-header">ကုန်ပစ္စည်း</h6> -->
                            <a class="collapse-item" href="stock.php">- </a>            
                            <a class="collapse-item" href="no_stock.php">--</a>                           
                            <a class="collapse-item" href="report_purchase.php">--- </a>
                            <a class="collapse-item" href="report_sale.php">--------</a>
                        </div>
                    </div>
                </div>
            </li>
            
            <?php
            /*
            <li class="nav-item"><a class="nav-link" href="stock.php"><i class="fas fa-database"></i><span>Stock List</span></a></li>
            <li class="nav-item"><a class="nav-link" href="no_stock.php"><i class="fas fa-cart-plus"></i><span>Zero Stock</span></a></li>
            <li class="nav-item"><a class="nav-link" href="to_pay.php"><i class="fas fa-table"></i><span>&nbsp;ပေးရန်ရှိစာရင်း</span></a></li>
            <li class="nav-item"><a class="nav-link" href="to_received.php"><i class="fas fa-table"></i><span>&nbsp;ရရန်ရှိစာရင်း</span></a></li>
            <li class="nav-item"><a class="nav-link" href="report_purchase.php"><i class="fas fa-table"></i><span>Stock In Report</span></a></li>
            <li class="nav-item"><a class="nav-link" href="report_sale.php"><i class="fas fa-table"></i><span>Stock Out Report</span></a></li>
            
            */
            ?>


            <?php
            } ?>
              
            <!-- 
            <li class="nav-item"><a class="nav-link" href="invoice_purchase.php">
                <i class="fas fa-table"></i>
                <span>Purchase Invoice</span></a>
            </li> 

            <li class="nav-item"><a class="nav-link" href="invoice_sale.php">
                <i class="fas fa-table"></i>
                <span>Sale Invoice</span></a>
            </li> 
             -->
            <!--
            
            -->
            <hr class="sidebar-divider">
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>

<div class="d-flex flex-column" id="content-wrapper">