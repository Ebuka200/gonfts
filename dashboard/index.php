<?php 

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(-1);

session_start();
include 'includes/config.php';

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

$flag = true;
$wallet_err = false;

$session_name = $_SESSION['username'];


if (!(isset($_SESSION['username']))) {
    
    $flag = false;
    header("Location: login.php");

}else{
      $username = $_SESSION["username"];
      
      $session_sql = "SELECT * FROM accounts WHERE username = '$username'";
      $balance_sql = "SELECT balance FROM accounts WHERE username = '$username'";
      $session_login = "SELECT date FROM login WHERE username = '$username' ORDER BY id DESC LIMIT 2";
      $plan_sql = "SELECT current_plan FROM accounts WHERE username = '$username'";
      $earning_sql = "SELECT earnings FROM accounts WHERE username = '$username'";
      $last_earned = "SELECT last_earned_date FROM login WHERE username = '$username'";

      $session_query = mysqli_query($conn, $session_sql);
      $login_query = mysqli_query($conn, $session_login);
      $balance_query = mysqli_query($conn, $balance_sql);
      $plan_query = mysqli_query($conn, $plan_sql);
      $earn_query = mysqli_query($conn, $earning_sql);
      $last_earned_query = mysqli_query($conn, $last_earned);

      $login_row = mysqli_fetch_assoc($login_query);
      $login_row = mysqli_fetch_assoc($login_query);
      $balance_row = mysqli_fetch_assoc($balance_query);
      $plan_row = mysqli_fetch_assoc($plan_query);
      $earn_row = mysqli_fetch_assoc($earn_query);
      $last_earned_row = mysqli_fetch_assoc($last_earned_query);

      // print_r($balance_row);

      // print_r($login_row);  

      // checking if new account
      if(sizeof($login_row) > 0){
        $now = time(); // or your date as well
        $your_date = strtotime(explode(" ",$login_row['date'])[0]);
        // print_r(explode(" ",$login_row['date'])[0]);
        $datediff = $now - $your_date;
        
       $new_date = round($datediff / (60 * 60 * 24))-1;
       if($plan_row['current_plan'] == "Basic"){
          $date = date("Y-m-d");
          $sum = 0.0025 * $balance_row['balance'] * $new_date;
          $newsum = $sum + $earn_row['earnings'];
          $sql = "UPDATE accounts SET earnings='$newsum' WHERE username='$username'";
          $sql2 = "INSERT INTO login( username) values('$username')";
          $query = mysqli_query($conn, $sql);
          $query2 = mysqli_query($conn, $sql2);
            
        }
        elseif($plan_row['current_plan'] == "Pro"){
          $date = date("Y-m-d");
          $sum = 0.0030 * $balance_row['balance'] * $new_date;
          $newsum = $sum + $earn_row['earnings'];
          $sql = "UPDATE accounts SET earnings='$newsum' WHERE username='$username'";
          $sql2 = "INSERT INTO login( username) values('$username')";
          $query = mysqli_query($conn, $sql);
          $query2 = mysqli_query($conn, $sql2);
            
        }
        elseif($plan_row['current_plan'] == "Premium"){
          $date = date("Y-m-d");
          $sum = 0.0050 * $balance_row['balance'] * $new_date;
          $newsum = $sum + $earn_row['earnings'];
          $sql = "UPDATE accounts SET earnings='$newsum' WHERE username='$username'";
          $sql2 = "INSERT INTO login( username) values('$username')";
          $query = mysqli_query($conn, $sql);
          $query2 = mysqli_query($conn, $sql2);
            
        }

    }

      if($session_query && $login_query){
          $session_row = mysqli_num_rows($session_query);
      }
}

if(isset($_POST['submit'])){

  //Getting values from forms
  $username = $_SESSION['username'];
  $amount = $_POST['withdrawamount'];
  $wallet = $_POST['withdrawwallet'];

  // echo $session_name;
  $sql2 = "SELECT * from accounts where username='$username'";
  $query = mysqli_query($conn, $sql2);

  if ($query) {
   
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
      $balance = $row['balance'];
      if($amount < $balance ){
          $sql = "INSERT INTO withdrawal( username, ammount, walletaddress) values('$session_name' , '$amount' ,'$wallet')";
          $query = mysqli_query($conn, $sql);
          $error = false;
     
          if($query){
              $error = true;

              echo "<script>
                      alert('Account registered successfully');
                    </script>"; 
          }else {
              
              echo "Accountt not added";
              echo mysqli_error($conn);
          }
        
      }else{
        $wallet_err = true;
      }
    }
  } 


  // $error = false;
 
  // if($query){
  //     $error = true;

  //     echo "<script>
  //             alert('Account registered successfully');
  //             location.href ='login.php';
  //           </script>"; 
  // }else {
      
  //     echo "Accountt not added";
  //     echo mysqli_error($conn);
  // }

  
}


?>

<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        
        <?php include('includes/sidebar.php'); ?>
        
        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                  <i class="bx bx-menu bx-sm"></i>
                </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      class="form-control border-0 shadow-none"
                      placeholder="Search..."
                      aria-label="Search..."
                    />
                  </div>
                </div>
                <!-- /Search -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                  <!-- Place this tag where you want the button to render. -->
                  <!-- <li class="nav-item lh-1 me-3">
                    <a
                      class="github-button"
                      href="https://github.com/themeselection/sneat-html-admin-template-free"
                      data-icon="octicon-star"
                      data-size="large"
                      data-show-count="true"
                      aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                      >Star</a
                    >
                  </li> -->

                  <!-- User -->
                  <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <div class="avatar avatar-online">
                        <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="#">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar avatar-online">
                                <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <span class="fw-semibold d-block">Welcome</span>
                              <small class="text-muted">Admin</small>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="bx bx-user me-2"></i>
                          <span class="align-middle">My Profile</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <i class="bx bx-cog me-2"></i>
                          <span class="align-middle">Settings</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">
                          <span class="d-flex align-items-center align-middle">
                            <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                            <span class="flex-grow-1 align-middle">Billing</span>
                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      <li>
                        <a class="dropdown-item" href="auth-login-basic.html">
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Log Out</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!--/ User -->
                </ul>
              </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Welcome Back
                              <?php 
                                  if(isset($_SESSION['username'])){
                                      while($session_row = mysqli_fetch_assoc($session_query)){
                                          $username = $session_row['username'];
                              ?>
                                  <span> <?php echo $username ?> </span> 🎉
                              <?php }} ?>
                          </h5>
                          <p class="mb-4">
                            Please go to your <span class="fw-bold">Account's page</span> to add your wallet info.
                          </p>

                          <a href="account.php" class="btn btn-sm btn-outline-primary">Check profile</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                
              </div>
              <?php 

                if (isset($_SESSION['username'])) {
                        
                    // $flag = false;
                    $query = "SELECT * FROM accounts where username = '$session_name' ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {  
                    $id = urlencode($row['id']);
              ?>
              <div class="row">
                <div class="col-lg-12 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/cc-primary.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                           
                          </div>
                          <span>Balance</span>
                          <h3 class="card-title text-nowrap mb-1">$<?php echo $row['balance'] ?></h3>
                          
                            <small class="text-success fw-semibold">Lean More<i class="bx bx-right-arrow-alt"></i></small>
                            
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/wallet.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                           
                          </div>
                          <span>Earnings</span>
                          <h3 class="card-title text-nowrap mb-1">$<?php echo $row['earnings'] ?></h3>
                          <small class="text-success fw-semibold">Learn More<i class="bx bx-right-arrow-alt"></i></small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/cc-primary.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                           
                          </div>
                          <span>Current Plan</span>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $row['current_plan'] ?></h3>
                          <small class="text-success fw-semibold">Learn More<i class="bx bx-right-arrow-alt"></i></small>
                        </div>
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
                
              </div>
              <?php } }?>

              
              <div class="row">
                
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Invest Now</h5>
                        <small class="text-muted">Enter amount and choose either coin</small>
                      </div>
                     
                    </div>
                    <div class="card-body mt-3">
                      <form>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Enter Ammount</label>
                          <input required type="text" class="form-control" id="amount" placeholder="Enter Ammount" />
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlSelect1" class="form-label">Select Cryto-currency</label>
                          <select class="form-select" id="crypto" >
                            <option >bitcoin</option>
                            <option >ethereum</option>
                          </select>
                        </div>

                        <div id="selectCurrency" style="visibility: hidden">
                            <select id="currency">
                                <option>usd</option>
                                <option>inr</option>
                            </select>
                        </div>
            
                        
                        <button 
                          type="button"
                          class="btn btn-block btn-primary col-12"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal"
                          id="btn"
                          onclick="showRate()"
                          >Invest</button>


                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">

                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close">
                                  </button>
                                </div>
                                <h5 class="text-center mt-2" id="exampleModalLabel1">Complete Investment</h5>
                                <h2 class="text-center" id="package"></h2><hr class="mx-5">

                                <div class="modal-body" >
                                    <div class="spinner-border spinner-border-sm text-primary" role="status" style="margin-left: 45%">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>

                                    <p class="text-center text-danger mt-4">Pay the BTC equivalent of </p>
                                    <h6 class="text-center text-info" id="price"></h6>
                                    <h6 class="text-center ">to the following wallet Address</h6><br>

                                    <h6 class="text-center mt-3">1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa</h6>

                                   

                                    
                                    <a id="clicker" onclick="goTo()"><p class="text-center text-info mt-4">I've paid </p></a>

                                </div>
                                <!-- <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div> -->
                              </div>
                            </div>
                        </div>

                        <hr>

                        <small class="mt-3">Supported Currencies</small>
                        <div class="row mt-3">
                          <div class="col">
                            <img src="assets/img/icons/brands/png-transparent-bitcoin-com-cryptocurrency-logo-zazzle-bitcoin-text-trademark-logo.png" alt="" width="40" height="40">
                            <img src="assets/img/icons/brands/ethereum-eth-logo.png" alt="" width="50" height="40">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">
                          Withdrawal Request
                        </h5>
                        <small class="text-muted">The withdrawals can reflect from about 48-72hours</small>
                      </div>

                      <?php if($wallet_err == true){ ?>
                        <p class="text-danger">Insufficent Funds Or Invalid Entry</p> 
                      <?php } ?> 
                    </div>
                    <div class="card-body">
                        <form role="form" action="index.php" method="post" enctype="multipart/form-data">
                            <label class="form-label" for="basic-default-fullname">Enter Ammount</label>
                            <div class="input-group mb-3">
                              
                                <input
                                  type="text"
                                  class="form-control"
                                  required
                                  placeholder="Enter Amount"
                                  aria-label="Recipient's username"
                                  aria-describedby="basic-addon13"
                                  name="withdrawamount"
                                />
                                <span class="input-group-text" id="basic-addon13">USD</span>
                              </div>
                              

                              <label class="form-label" for="basic-default-fullname">Enter Wallet Address</label>
                              <div class="input-group mb-3">
                              
                                <input
                                  type="text"
                                  class="form-control"
                                  required
                                  placeholder="Enter Wallet Address"
                                  aria-label="Recipient's username"
                                  aria-describedby="basic-addon13"
                                  name="withdrawwallet"
                                />
                                
                              </div>
                                                   
                              <input type="submit" name="submit" value="Request" class="btn btn-primary btn-block col-12" />
  
                          <hr>
  
                         
                        </form>
                      </div>
                  </div>
                </div>
                <!--/ Expense Overview -->

                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Pending Requests</h5>
                      
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                      <?php 

                        
                            // $flag = false;
                            $query = "SELECT * FROM withdrawal where username = '$session_name' ";
                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($result))
                            {  
                            $id = urlencode($row['id']);
                        ?>
                        
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1"><?php echo $row['status'] ?></small>
                              <h6 class="mb-0">Withdrawal</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">-<?php echo $row['ammount'] ?></h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>

                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  © Copyright
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                 
                </div>
                <!-- <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a>

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a>
                </div> -->
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
   <script src="index.js"></script>
   <script>
     
     function showRate(){
       let crypto = document.getElementById('crypto').value;
       if(crypto == "bitcoin"){
            $.get("https://api.coindesk.com/v1/bpi/currentprice/USD.json", (res) => {

                let btcPrice = JSON.parse(res).bpi.USD.rate_float;
                let userAmount = document.getElementById('amount').value;
                let link = document.getElementById('clicker');

                let btcValue = Number(userAmount) / btcPrice;
                btcValue = btcValue.toFixed(6);
                let show = document.getElementById('price').innerHTML = btcValue;
                console.log(btcValue);

                if(userAmount > 100 && userAmount < 49999){
                  let package = document.getElementById('package').innerHTML = "Basic";
                  package = document.getElementById('package').innerHTML;
                }else if(userAmount > 50000 && userAmount < 499999){
                  let package = document.getElementById('package').innerHTML = "Pro";
                  package = document.getElementById('package').innerHTML;
                }else if(userAmount > 500000){
                  let package = document.getElementById('package').innerHTML = "Premium";
                  
                }else{
                  let package = document.getElementById('package').innerHTML = "Invalid Ammount";
                }
                let package2 = document.getElementById('package').innerHTML;
                // console.log(package2);
                link.setAttribute("href","confirmation.php?ammount="+userAmount+"&package="+package2);
              

            });   


       }else if(crypto == "ethereum"){
            $.get("https://api.coindesk.com/v1/bpi/currentprice/USD.json", (res) => {

                let btcPrice = JSON.parse(res).bpi.USD.rate_float;
                let userAmount = document.getElementById('amount').value;

                let btcValue = Number(userAmount) / btcPrice;
                btcValue = btcValue.toFixed(6);
                let show = document.getElementById('price').innerHTML = btcValue;
                console.log(btcValue);

                userAmount = parseFloat(userAmount);
                alert((userAmount >= 100 && userAmount <= 49999));
                if(userAmount >= 100 && userAmount <= 49999){
                  let package = document.getElementById('package').innerHTML = "Basic";
                }else if(userAmount >= 50000 && userAmount <= 499999){
                  let package = document.getElementById('package').innerHTML = "Pro";
                }else if(userAmount > 500000){
                  let package = document.getElementById('package').innerHTML = "Premium";
                }else{
                  let package = document.getElementById('package').innerHTML = "Invalid Ammount";
                }

            });


       }

     }

     
  
   </script>
  </body>
</html>
