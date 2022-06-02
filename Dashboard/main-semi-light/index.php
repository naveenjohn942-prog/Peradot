<?php
include '../../config.php';
include '../../function.php';


if (!isset($_SESSION["id"])) {
  header("Location: ../../index/login.php");
}

$id = $_SESSION['id'];

$user_sql = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
$user_row = mysqli_fetch_assoc($user_sql);
$deposit = $user_row['deposit'];
if ($user_row['admin'] == 1) {
  header("Location: admin.php");
}

date_default_timezone_set("Asia/Kolkata");
$today = date("F j, Y, G:i:s");
$next_claim = date("F j, Y G:i:s", strtotime("+1 day"));

$check_package = mysqli_query($con, "SELECT * FROM package WHERE user_id = $id");
$check_package_id = mysqli_query($con, "SELECT id FROM package WHERE user_id = $id");

if (mysqli_num_rows($check_package) > 0) {
    
    $package_row = mysqli_fetch_assoc($check_package);
    $check_time = $package_row['timestamp'];
    $reward = $package_row['reward'];
}



// claim reward system 
if(isset($_POST['claim'])){
    mysqli_query($con, "UPDATE package SET days = days - 1, timestamp = '$next_claim' where user_id = $id");
    mysqli_query($con, "UPDATE users SET amount = amount + '$reward' where id = $id");
    redirect('index.php');


}
 






// API from Coinlayer.com 
// $key = "53e1d737e84c49af9a618033520546af";
// $link = "http://api.coinlayer.com/api/live?access_key=".$key;

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $link);

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// curl_close($ch);

// $result = json_decode($result, true);

// if(isset($result['success'])) {
// $btc = $result['rates']['BTC'];
$btc = 28863.81;
// $usdt = $result['rates']['USDT'];
$usdt = 1.027;
// $eth = $result['rates']['ETH'];
$eth = 1786.743;
// $xrp = $result['rates']['XRP'];
$xrp = 0.3917;
// $ltc = $result['rates']['LTC'];
$ltc = 63.235;
// $adcn = $result['rates']['ADCN'];
$adcn = 0.00013;
$sumup = intval($btc) + intval($usdt) + intval($eth) + intval($xrp) + intval($ltc) + intval($adcn);
$sumup = substr($sumup, 0, 3);
// } 
$deposite_sql = mysqli_query($con, "SELECT SUM(d_amount) AS d_amount FROM deposite WHERE user_id = $id");
$deposite_row = mysqli_fetch_assoc($deposite_sql);

$withdraw_sql = mysqli_query($con, "SELECT SUM(w_amount) AS w_amount FROM withdraw WHERE user_id = $id");
$withdraw_row = mysqli_fetch_assoc($withdraw_sql);
// $today = date("F j, Y, g:i a"); 


if(isset($_POST['package1'])){
    if($deposit >= 200){
        $new_deposite_amount = $deposit - 200;
        $update_deposite_sql = mysqli_query($con, "UPDATE users SET deposit = $new_deposite_amount WHERE id =$id");
        $insert_package_sql = mysqli_query($con, "INSERT INTO `package`(`user_id`,`package_name`,`package_price`,`reward`,`timestamp`)VALUES($id,'package 1','200', '12','$today')");
        if($update_deposite_sql){
            ?>
            <script>
                alert("Successfully activated your paln");
                window.location.href='index.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Something Went Wrong!! Try again...");
                window.location.href='index.php';
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert("Insufficient Balance ");
            window.location.href='index.php';
        </script>
        <?php
    }
}
if(isset($_POST['package2'])){
    if($deposit >= 500){
        $new_deposite_amount = $deposit - 500;
        $update_deposite_sql = mysqli_query($con, "UPDATE users SET deposit = $new_deposite_amount WHERE id =$id");
        $insert_package_sql = mysqli_query($con, "INSERT INTO `package`(`user_id`,`package_name`,`package_price`,`reward`,`timestamp`)VALUES($id,'package 2','500','30','$today')");
        if($update_deposite_sql){
            ?>
            <script>
                alert("Successfully activated your paln");
                window.location.href='index.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Something Went Wrong!! Try again...");
                window.location.href='index.php';
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert("Insufficient Balance ");
            window.location.href='index.php';
        </script>
        <?php
    }
}
if(isset($_POST['package3'])){
    if($deposit >= 1000){
        $new_deposite_amount = $deposit - 1000;
        $update_deposite_sql = mysqli_query($con, "UPDATE users SET deposit = $new_deposite_amount WHERE id =$id");
        $insert_package_sql = mysqli_query($con, "INSERT INTO `package`(`user_id`,`package_name`,`package_price`,`reward`,`timestamp`)VALUES($id,'package 3','1000','60','$today')");
        if($update_deposite_sql){
            ?>
            <script>
                alert("Successfully activated your paln");
                window.location.href='index.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Something Went Wrong!! Try again...");
                window.location.href='index.php';
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert("Insufficient Balance ");
            window.location.href='index.php';
        </script>
        <?php
    }
}
if(isset($_POST['package4'])){
    if($deposit >= 2000){
        $new_deposite_amount = $deposit - 2000;
        $update_deposite_sql = mysqli_query($con, "UPDATE users SET deposit = $new_deposite_amount WHERE id =$id");
        $insert_package_sql = mysqli_query($con, "INSERT INTO `package`(`user_id`,`package_name`,`package_price`,`reward`,`timestamp`)VALUES($id,'package 4','2000','120','$today')");
        if($update_deposite_sql){
            ?>
            <script>
                alert("Successfully activated your plan");
                window.location.href='index.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Something Went Wrong!! Try again...");
                window.location.href='index.php';
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert("Insufficient Balance ");
            window.location.href='index.php';
        </script>
        <?php
    }
}
if(isset($_POST['package5'])){
    if($deposit >= 4000){
        $new_deposite_amount = $deposit - 4000;
        $update_deposite_sql = mysqli_query($con, "UPDATE users SET deposit = $new_deposite_amount WHERE id =$id");
        $insert_package_sql = mysqli_query($con, "INSERT INTO `package`(`user_id`,`package_name`,`package_price`,`reward`,`timestamp`)VALUES($id,'package 5','4000', '240', '$today')");
        if($update_deposite_sql){
            ?>
            <script>
                alert("Successfully activated your paln");
                window.location.href='index.php';
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Something Went Wrong!! Try again...");
                window.location.href='index.php';
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert("Insufficient Balance ");
            window.location.href='index.php';
        </script>
        <?php
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>
        Panel
    </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="css/vendors_css.css" />
    <!--amcharts -->
    <link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Style-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/skin_color.css" />
    <link rel="stylesheet" href="css/custom2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* CSS */
    .button-64 {
        align-items: center;
        background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
        border: 0;
        border-radius: 8px;
        box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
        box-sizing: border-box;
        color: #FFFFFF;
        display: flex;
        font-family: Phantomsans, sans-serif;
        font-size: 20px;
        justify-content: center;
        line-height: 1em;
        max-width: 100%;
        min-width: 140px;
        padding: 3px;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        cursor: pointer;
    }

    .button-64:active,
    .button-64:hover {
        outline: 0;
    }

    .button-64 span {
        background-color: rgb(5, 6, 45);
        padding: 16px 24px;
        border-radius: 6px;
        width: 100%;
        height: 100%;
        transition: 300ms;
    }

    .button-64:hover span {
        background: none;
    }

    @media (min-width: 768px) {
        .button-64 {
            font-size: 24px;
            min-width: 196px;
        }
    }


    /* chart css (center in mobile) */
    .btcwdgt-chart.btcwdgt.btcwdgt-headlines.btcwdgt-clean {
        width: 100% !important;
        text-align: center !important;
        align-self: center !important;
        margin: auto !important;
    }


    /* price list  */

    .card1:hover {
        background: #00ffb6;
        border: 1px solid #00ffb6;
    }

    .card1:hover .list-group-item {
        background: #00ffb6 !important
    }





    .card2:hover {
        background: #00C9FF;
        border: 1px solid #00C9FF;
    }

    .card2:hover .list-group-item {
        background: #00C9FF !important
    }


    .card3:hover {
        background: #ff95e9;
        border: 1px solid #ff95e9;
    }

    .card3:hover .list-group-item {
        background: #ff95e9 !important
    }


    .card:hover .btn-outline-dark {
        color: white;
        background: #212529;
    }
    </style>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <div id="loader"></div>

        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <!-- Logo -->
                <a href="index.php" class="logo" style="text-decoration: none;">
                    <!-- logo-->
                    <div class="logo-mini w-40 m-auto">
                        <span class="light-logo"><img src="../images/logo.png" alt="logo" /></span>
                        <span class="dark-logo"><img src="../images/logo.png" alt="logo" /></span>
                    </div>
                    <div class="logo-lg align-items-center m-auto ">
                        <h3 class="title text-bold text-center"
                            style="color: white; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
                            Peradot</h3>
                    </div>
                </a>
            </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item">
                            <a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light"
                                data-toggle="push-menu" role="button">
                                <i data-feather="align-left"></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item d-none d-xl-inline-block">
                            <a href="" class="waves-effect waves-light nav-link svg-bt-icon btn-primary-light"
                                title="Mailbox">
                                <i data-feather="at-sign"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">

                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen"
                                class="waves-effect waves-light nav-link full-screen btn-primary-light"
                                title="Full Screen">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>


                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle btn-primary-light"
                                data-bs-toggle="dropdown" title="User">
                                <i data-feather="user"></i>
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i>
                                        Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ti-wallet text-muted me-2"></i> My
                                        Wallet</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i>
                                        Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"><i class="ti-lock text-muted me-2"></i>
                                        Logout</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%">

                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="active">
                                <a href="index.php">
                                    <i data-feather="monitor"></i>
                                    <span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="payment.php">
                                    <i data-feather="bar-chart-2"></i>
                                    <span>Transactions</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="reference.php">
                                    <i data-feather="share-2"></i>
                                    <span>Reference Code</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div class="sidebar-widgets mt-5">
                            <div class="mx-25 mt-30 p-30 text-center bg-primary-light rounded5">
                                <img src="../images/trophy.png" alt="" />
                                <h4 class="my-3 fw-500 text-uppercase text-primary">
                                    Start Trading
                                </h4>
                                <span class="fs-12 d-block mb-3 text-black-50">Offering discounts for better online a
                                    store can loyalty
                                    weapon into driving</span>
                                <button type="button" class="waves-effect waves-light btn btn-sm btn-primary mb-5">
                                    Invest Now
                                </button>
                            </div>
                            <div class="copyright text-center m-25">
                                <p>
                                    <strong class="d-block"> Peradot</strong> ©
                                    2022 All Rights Reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xl-9">

                            <div class="col-12">
                                <div class="box">
                                    <div class="box-body text-center">

                                        <h1 class="text-bold">Claim Daily reward</h1>

                                        <!-- claim button  -->

                                        <div>
                    
                                            <?php
                                                
                                                if(mysqli_num_rows($check_package_id)){
                                                    
                                                    if(strtotime($today) >= strtotime($check_time) ) {
                                                    
                                            ?>
                                                    <form method="POST">
                                                    <center><button type="submit" name="claim" class="button-64" id="claim"
                                                        role="button" ><span class="text">Claim now !</span></button>
                                                </center>
                                                    </form>
                                                
                                                <?php
                                                } else {
                                            
                                                ?>
                                            
                                                    <h2 id='demo'>24 : 00 : 00</h2>
                                                    <h5>hr : min: sec</h5>
                                            <?php 
                                               } 
                                            }
                                                else{
                                                    ?>
                                                    <center><button type="submit" name="claim" class="button-64"
                                                        role="button" style="cursor:not-allowed;"><span class="text">No Package Activated!</span></button>
                                                    </center>
                                                    <?php
                                                }
                                            
                                            ?>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="row mx-5">
                                <div class="col-xl-6">
                                    <div class="d-flex top_box">
                                        <h1 class="fw-500 m-0" id="stock-price">$1644.29</h1>

                                    </div>
                                </div>
                                <div class="col-xl-6 text-end my-2">
                                    <h3 class="m-0">Live Bitcoin Transactions (BTC)</h3>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="box">
                                    <div class="customhtab box-header with-border">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a href="#Overview-1" class="nav-link active" data-bs-toggle="tab"
                                                    aria-expanded="false">Chart</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Overview-3" class="nav-link" data-bs-toggle="tab"
                                                    aria-expanded="true">Peradot Transactions</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Overview-4" class="nav-link" data-bs-toggle="tab"
                                                    aria-expanded="true">My Historical Data</a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="box">
                                        <div class="box-body">
                                            <div id="chart">
                                                <div class="tab-content">
                                                    <div id="Overview-1" class="tab-pane active">
                                                        <!-- <div id="chart-timeline"></div> -->
                                                        <center>
                                                            <div class="btcwdgt-chart" bw-cash="true" bw-theme="dark"
                                                                style="width:100% !important; "></div>
                                                        </center>

                                                    </div>
                                                    <div id="Overview-3" class="tab-pane">
                                                        <div>
                                                            <div class="col-12">
                                                                <div class="box">
                                                                    <div class="box-body" style="display: contents;">
                                                                        <div class="table-responsive">
                                                                            <table id="example1"
                                                                                class="table table-bordered no-margin">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Id</th>
                                                                                        <th>User Name</th>
                                                                                        <th>Deposite</th>
                                                                                        <th>Withdraw</th>
                                                                                        <th>Timestamp</th>
                                                                                        <!-- <th>Fees</th>
                                              <th>Block Size</th> -->
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                          // $user_id= $_SESSION["user_id"];
                                          $res = mysqli_query($con, "SELECT * FROM history");                                    // die();
                                          $i = 1;
                                          while ($row = mysqli_fetch_assoc($res)) {

                                          ?>
                                                                                    <tr>
                                                                                        <td><?php echo $i++ ?></td>
                                                                                        <td><?php echo $row['user'] ?>
                                                                                        </td>
                                                                                        <td><?php echo $row['deposit'] ?>
                                                                                        </td>
                                                                                        <td><?php echo $row['withdraw'] ?>
                                                                                        </td>
                                                                                        <td><?php echo $row['timestamp'] ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.box-body -->
                                                                </div>
                                                                <!-- /.box -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="Overview-4" class="tab-pane">
                                                        <div>
                                                            <div class="col-12">
                                                                <div class="box">
                                                                    <div class="box-body">
                                                                        <div class="table-responsive">
                                                                            <table id="example"
                                                                                class="table table-bordered no-margin">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Id</th>
                                                                                        <th>Timestamp</th>
                                                                                        <th>Deposite</th>
                                                                                        <th>Withdraw</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                          // $user_id= $_SESSION["user_id"];
                                          $result = mysqli_query($con, "SELECT timestamp,withdraw,deposit FROM history WHERE user_id = $id");                                    // die();
                                          $i = 1;
                                          while ($rows = mysqli_fetch_assoc($result)) {

                                          ?>
                                                                                    <tr>
                                                                                        <td><?php echo $i++ ?></td>
                                                                                        <td><?php echo $rows['timestamp'] ?>
                                                                                        </td>
                                                                                        <td><?php echo $rows['deposit'] ?>
                                                                                        </td>
                                                                                        <td><?php echo $rows['withdraw'] ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.box-body -->
                                                                </div>
                                                                <!-- /.box -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                            <!-- price list  -->
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <section id="price">
                                            <div class="container-fluid">
                                                <div class="container p-1">
                                                <form action="" method="POST">
                                                    <div class="row">
                                                    
                                                        <div class="col-lg-4 col-md-12 mb-4">
                                                            <div class="card card1 h-100">
                                                                <div class="card-body">
                                                                   
                                                                    <h5 class="card-title">Basic</h5>
                                                                    <small class='text-muted'>Package 1</small>
                                                                    <br><br>
                                                                    <h1>$200</h1>
                                                                    <span class="h2">$360</span>/month
                                                                    <br><br>
                                                                    <div class="d-grid my-3">
                                                                        <button type="button"
                                                                            class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#exampleModal">Select</button>
                                                                    </div>
                                                                    <ul>
                                                                        <li>$12/day for 30Days = $360</li>
                                                                        <li>$160 Profit</li>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><b>$200</b> will be deducted from your account and <b>package 1</b> will be activated</p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package1">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- </form> -->
                                                        <!-- <form action="" method="POST"> -->
                                                        <div class="col-lg-4 col-md-12 mb-4">
                                                            <div class="card card2 h-100">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">Standard</h5>
                                                                    <small class='text-muted'>Package 2</small>
                                                                    <br><br>
                                                                    <h1>$500</h1>
                                                                    <span class="h2">$900</span>/month
                                                                    <br><br>
                                                                    <div class="d-grid my-3">
                                                                        <button type="button"
                                                                            class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#exampleModal1">Select</button>
                                                                    </div>
                                                                    <ul>
                                                                        <li>$30/day for 30Days = $900</li>
                                                                        <li>$400 Profit</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <p><b>$500</b> will be deducted from your account and <b>package 2</b> will be activated</p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package2">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- </form> -->
                                                    <!-- <form action="" method="POST"> -->
                                                        <div class="col-lg-4 col-md-12 mb-4">
                                                            <div class="card card3 h-100">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">Famous</h5>
                                                                    <small class='text-muted'>Package 3 </small>
                                                                    <br><br>
                                                                    <h1>$1000</h1>
                                                                    <span class="h2">$1800</span>/month
                                                                    <br><br>
                                                                    <div class="d-grid my-3">
                                                                        <button type="button"
                                                                            class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#exampleModal2">Select</button>
                                                                    </div>
                                                                    <ul>
                                                                    <li>$60/day for 30Days = $1800</li>
                                                                    <li>$800 Profit</li>


                                                                    </ul>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <p><b>$1000</b> will be deducted from your account and <b>package 3</b> will be activated</p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package3">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- </form> -->
                                                    
                                                        <div class="row align-items-center">
                                                    <!-- <form action="" method="POST"> -->
                                                        <div class="col-lg-6 col-md-12 mb-4">
                                                            <div class="card card1 h-100">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">Premium</h5>
                                                                    <small class='text-muted'>Package 4</small>
                                                                    <br><br>
                                                                    <h1>$2000</h1>
                                                                    <span class="h2">$3600</span>/month
                                                                    <br><br>
                                                                    <div class="d-grid my-3">
                                                                        <button type="button"
                                                                            class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#exampleModal3">Select</button>
                                                                    </div>
                                                                    <ul>
                                                                    <li>$120/day for 30Days = $3600</li>
                                                                        
                                                                       
                                                                        <li>$1600 Profit</li>


                                                                    </ul>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <p><b>$2000</b> will be deducted from your account and <b>package 4</b> will be activated</p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package4">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- </form> -->
                                                    <!-- <form action="" method="POST"> -->
                                                        <div class="col-lg-6 col-md-12 mb-4">
                                                            <div class="card card3 h-100">
                                                                <div class="card-body">

                                                                    <h5 class="card-title">Premium</h5>
                                                                    <small class='text-muted'>Package 5</small>
                                                                    <br><br>
                                                                    <h1>$4000</h1>
                                                                    <span class="h2">$7200</span>/month
                                                                    <br><br>
                                                                    <div class="d-grid my-3">
                                                                        <button type="button"
                                                                            class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#exampleModal4">Select</button>
                                                                    </div>
                                                                    <ul>
                                                                    <li>$240/day for 30Days = $7200</li>
                                                                       <li>$3200 Profit  </li>

                                                                    </ul>
                                                                </div>


                                                            </div>
                                                        </div> 
                                                        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <p><b>$4000</b> will be deducted from your account and <b>package 5</b> will be activated</p>
                                                                    <p>Do you want to proceed??</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="package5">Confirm</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>

                                        </section>

                                    </div>
                                </div>
                            </div>

                        </div>


                        

                        <div class="col-xl-3 col-lg-12 side-bar">
                            <div class="d-flex justify-content-end">

                                <div class="text-end">
                                    <div class="media align-items-center p-0 justify-content-end">
                                        <div>
                                            <h5 class="no-margin fw-500"><?php echo $user_row['username'] ?></h5>
                                            <span><?php echo $user_row['email'] ?></span>
                                        </div>
                                        <div class="text-center m-0">
                                            <a href="#"><i class="cc XRP me-5" title="XRP"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="pt-30">
                                    <div class="media align-items-center p-0">
                                        <div class="m-0">
                                            <h4 class="no-margin fw-500">My Total Balance</h4>
                                            <h1 class="fw-500">
                                                $<?php echo number_format((float)$user_row['amount'], 2, '.', ''); ?>
                                            </h1>
                                            <?php
                                                $package_status = mysqli_query($con, "SELECT * FROM package WHERE user_id = $id");
                                                while($package_row=mysqli_fetch_assoc($package_status)){
                                                    if($package_row['status'] == 0){
                                            ?>
                                            <!-- <p class="text-center p-1 px-5 bg-primary fw-500">Pacakge 1 Activated</p> -->
                                            <p class="text-center p-1 px-5 bg-warning fw-500"><?php echo $package_row['package_name']?> is Not Activated !</p>
                                            <?php } 
                                                else {
                                                    ?>
                                                <p class="text-center p-1 px-5 bg-primary fw-500"><?php echo $package_row['package_name']?> is Activated</p>
                                                    <?php
                                                }
                                            }
                                                ?>
                                            <div class="d-flex">
                                                <p class="m-0">
                                                    <a type="button" href="payment.php"
                                                        class="waves-effect waves-light btn btn-rounded btn-success-light fs-14 p-1 px-3 me-2">Ready
                                                        to invest ?</a>
                                                    <i
                                                        class="mdi mdi-arrow-top-right btn-rounded btn-success down_box_2">
                                                    </i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-40">
                                    <h4 class="fw-500 mt-5">My Space</h4>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 main_item">
                                        <div>
                                            <div class="d-flex align-items-center gap-items-1">
                                                <div class="bg-success-light rounded20 l-h-80 text-center item_box">
                                                    <i
                                                        class="mdi mdi-arrow-bottom-right btn-rounded btn-info down_box_3"></i>
                                                </div>
                                                <div>
                                                    <p class="mb-0">Deposit</p>
                                                    <h3 class="my-0 text-dark fw-700">$<?php
                                                              if ($user_row['deposit'] == NULL) {
                                                                echo "0.00";
                                                              } else {
                                                                echo $user_row['deposit'];
                                                              }
                                                              ?></h3>
                                                </div>
                                            </div>
                                            <div class="row pt-10">

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 sm-pt-20">
                                        <div>
                                            <div class="d-flex align-items-center gap-items-1">
                                                <div class="bg-success-light rounded20 l-h-80 text-center item_box">
                                                    <i
                                                        class="mdi mdi-arrow-top-right btn-rounded btn-success down_box_3"></i>
                                                </div>
                                                <div>
                                                    <p class="mb-0">Withdraw</p>
                                                    <h3 class="my-0 text-dark fw-700">$<?php
                                                              if ($user_row['withdraw'] == NULL) {
                                                                echo "0.00";
                                                              } else {
                                                                echo $user_row['withdraw'];
                                                              }
                                                              ?></h3>
                                                </div>
                                            </div>
                                            <div class="row pt-10">
                                                <div class="col-xl-5 col-lg-3 col-md-4 col-sm-3"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-10">
                                    <h4 class="no-margin fw-500">Convert</h4>
                                    <div class="d-flex justify-content-between bg-light rounded p-10 mx-10 my-15">
                                        <label style="margin-right: 20px;">BTC</label>
                                        <input type="number" name="btc" class="currencyField form-control"
                                            placeholder="BTC" />
                                    </div>
                                    <div class="d-flex justify-content-between bg-light rounded p-10 mx-10 mb-15">
                                        <label style="margin-right: 20px;">USD</label>

                                        <input type="number" name="usd" class="currencyField form-control"
                                            placeholder="USD" />

                                    </div>
                                    <div class="d-flex justify-content-between mb-20">

                                        <div class="text-end">
                                            <p class="fw-500 ms-50 fs-16"><?php echo $today ?></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="hexagon_box">
                                    <div class="box box-inverse bg-dark3 bg-hexagons-white pull-up">
                                        <div class="box-body text-center">
                                            <h2 class="mb-0 text-bold">Live Stats</h2>
                                            <h4>Total Evaluation : $<?php echo $sumup; ?>M</h4>
                                            <ul class="flexbox flex-justified text-center mt-30 bb-1 border-gray pb-20">
                                                <li class="be-1 border-gray">
                                                    <div>USDT</div>
                                                    <small class="fs-16"><?php echo round($usdt, 3); ?></small>
                                                </li>

                                                <li class="be-1 border-gray">
                                                    <div>BTC</div>
                                                    <small class="fs-16"><?php echo round($btc, 2); ?></small>
                                                </li>

                                                <li>
                                                    <div>ETH</div>
                                                    <small class="fs-16"><?php echo round($eth, 3); ?></small>
                                                </li>
                                            </ul>
                                            <ul class="flexbox flex-justified text-center mt-30 bb-1 border-gray pb-30">
                                                <li class="be-1 border-gray">
                                                    <div>XRP</div>
                                                    <small class="fs-16"><?php echo round($xrp, 4); ?></small>
                                                </li>

                                                <li class="be-1 border-gray">
                                                    <div>LTC</div>
                                                    <small class="fs-16"><?php echo round($ltc, 3); ?></small>
                                                </li>

                                                <li>
                                                    <div>ADCN</div>
                                                    <small class="fs-16"><?php echo $adcn; ?></small>
                                                </li>
                                            </ul>
                                            <ul class="flexbox flex-justified text-center mt-20">
                                                <li class="be-1 border-gray">
                                                    <div>% 24h</div>
                                                    <small class="fs-16"><i
                                                            class="fa fa-arrow-up text-success pe-2"></i>1.4</small>
                                                </li>

                                                <li class="be-1 border-gray">
                                                    <div>% 30d</div>
                                                    <small class="fs-16"><i
                                                            class="fa fa-arrow-up text-success pe-2"></i>3.29</small>
                                                </li>

                                                <li>
                                                    <div>% 1y</div>
                                                    <small class="fs-16"><i
                                                            class="fa fa-arrow-up text-success pe-2"></i>54.7</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" target="_blank">Contact</a>
                    </li>
                </ul>
            </div>
            &copy; 2022
            <a href="">Peradot Pvt Ltd</a>.
            All Rights Reserved.
        </footer>


        <!-- ./wrapper -->


        <!-- Page Content overlay -->

        <!-- Vendor JS -->
        <!-- Vendor JS -->
        <script>
        (function(b, i, t, C, O, I, N) {
            window.addEventListener('load', function() {
                if (b.getElementById(C)) return;
                I = b.createElement(i), N = b.getElementsByTagName(i)[0];
                I.src = t;
                I.id = C;
                N.parentNode.insertBefore(I, N);
            }, false)
        })(document, 'script', 'https://widgets.bitcoin.com/widget.js', 'btcwdgt');

        // let ws = new WebSocket('wss://ws.blockchain.info/inv');
        let ws = new WebSocket('wss://stream.binance.com:9443/ws/etheur@trade');
        let stockPriceElement = document.getElementById('stock-price');
        let lastPrice = null;

        ws.onmessage = (event) => {
            let stockObject = JSON.parse(event.data);
            let price = parseFloat(stockObject.p).toFixed(2)
            stockPriceElement.innerText = '$' + price;

            stockPriceElement.style.color = !lastPrice || lastPrice === price ? 'black' : price > lastPrice ?
                'green' : 'red';

            lastPrice = price;

        }
        </script>
        <script>
        $(".currencyField").keyup(function() { //input[name='calc']
            let convFrom;
            if ($(this).prop("name") == "btc") {
                convFrom = "btc";
                convTo = "usd";
            } else {
                convFrom = "usd";
                convTo = "btc";
            }
            $.getJSON("https://api.coindesk.com/v1/bpi/currentprice/usd.json",
                function(data) {
                    var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var exchangeRate = parseInt(data.bpi.USD.rate_float);
                    let amount;
                    if (convFrom == "btc")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + convTo + "']").val(amount.toFixed(2));
                });
        });
        </script>


                    <script>
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                        }
                    // Set the date we're counting down to
                    var countDownDate = new Date("<?php echo $check_time ?>").getTime();

                    // Update the count down every 1 second
                    var x = setInterval(function() {

                        // Get today's date and time
                        var now = new Date().getTime();

                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;

                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Output the result in an element with id="demo"
                        document.getElementById("demo").innerHTML = hours + "h " +
                            minutes + "m " + seconds + "s ";

                        // If the count down is over, write some text 
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("demo").innerHTML = "EXPIRED";
                        }
                    }, 1000);
                    </script>
              
        <script src="js/vendors.min.js"></script>
        <script src="js/pages/chat-popup.js"></script>
        <script src="../assets/icons/feather-icons/feather.min.js"></script>

        <script src="../assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <!-- Crypto Admin App -->
        <script src="js/template.js"></script>
        <script src="js/pages/dashboard2.js"></script>
        <script src="js/pages/dashboard2-chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).ready(function() {
            $('#example1').DataTable();
        });
        </script>
        <!-- <style>
    .btcwdgt-chart .btcwdgt-footer {
      display: none !important;
    }
    </style> -->
</body>

</html>