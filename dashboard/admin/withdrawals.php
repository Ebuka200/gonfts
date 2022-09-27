<?php 
session_start();
include '../includes/config.php';

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

$flag = true;
$wallet_err = false;
$login_flag = false;

$session_name = $_SESSION['username'];

if (!(isset($_SESSION['username']))) {
    
    $flag = false;
    header("Location: login.php");

}else{
      $username = $_SESSION["username"];
      
      $session_sql = "SELECT * FROM accounts WHERE username = '$username'";
      $session_query = mysqli_query($conn, $session_sql);
      if($session_query){
          $session_row = mysqli_num_rows($session_query);
      }
}

if(isset($_POST['submit'])){
    $err_flag = false;

   

    if(isset($err_flag) && $err_flag === false){

        $username = $_POST['username'];
        $ammount = $_POST['ammount'];
        $id = $_POST['id'];
        $date = date("Y-m-d");

        $sql = "SELECT earnings FROM accounts WHERE username='$username'";

        $query = mysqli_query($conn, $sql);

        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $balance = $row['earnings'];
                $sum = $balance - $ammount;
                $sql1 = "UPDATE withdrawal SET status='approved' WHERE id='$id'";
                $sql2 = "UPDATE accounts SET earnings='$sum' WHERE username='$username'";
                $sql3 = "INSERT INTO transactions( date, description, amount,username) values('$date' , 'WITHDRAWAL', '$ammount','$username')";


                $query1 = mysqli_query($conn, $sql1);
                $query2 = mysqli_query($conn, $sql2);
                $query3 = mysqli_query($conn, $sql3);

                if($query1 && $query2 && $query3){
                    $error = true;
      
                    echo "<script>
                            alert('Approved Succesfully');
                          </script>"; 
                }else {
                    
                    echo "<script>
                            alert('Something went wrong');
                          </script>"; 
                    echo mysqli_error($conn);
                }
            }
            
        }

    }
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
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Withdrawals</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

       <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">gonft</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- <li class="menu-item ">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Admin</div>
              </a>
            </li> -->

            <!-- Layouts -->
            

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">PRODUCT</span>
            </li>
            <li class="menu-item ">
              <a href="users.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Users</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="withdrawals.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-copy-alt"></i>
                <div data-i18n="Analytics">Withdrawals</div>
              </a>
            </li>
            <li class="menu-item ">
              <a href="requests.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-copy-alt"></i>
                <div data-i18n="Analytics">Requests</div>
              </a>
            </li>
            <li class="menu-item ">
              <a href="nft.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Analytics">NFT</div>
              </a>
            </li>

            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">ACCOUNT</span></li>
            <!-- Cards -->
            <li class="menu-item">
              <a href="account.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Account Details</div>
              </a>
            </li>

          
            <li class="menu-item">
                <a href="../index.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-log-out"></i>
                  <div data-i18n="Basic">Logout</div>
                </a>
            </li>
            
            <!-- User interface -->
           

           
          </ul>
        </aside>

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
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
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
                    <h5 class="card-header">Withdrawals</h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>USERNAME</th>
                                        <th>AMOUNT</th>                          
                                        <th>WALLET ADDRESS</th>                          
                                        <th>STATUS</th>                          
                                        <th>ACTION</th>                          
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $sql = "SELECT * FROM withdrawal";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_assoc($result)){
                                    
                                    ?>
                                        <tr id="tablerow_<?php echo $row['id'] ?>">
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td>
                                                $<?php echo $row['ammount'] ?>
                                                <input class="d-none" type="text" value="<?php echo $row['ammount'] ?>" id="amount_<?php echo $row['id'] ?>">
                                            </td>
                                            <td><?php echo $row['walletaddress'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                        
                                            <td>
                                                <?php
                                                  if($row['status'] == "approved"){
                                                ?>
                                                <button 
                                                    class="btn btn-primary"
                                                    >
                                                    Paid
                                                </button>
                                        
                                                <?php
                                                  }else{
                                                ?>
                                                <button 
                                                    class="btn btn-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#basicModal<?php echo $row['id'] ?>"
                                                    onclick="showRate(this)"
                                                    >
                                                    Pay
                                                </button>
                                                <?php
                                                  }
                                                ?>
                                            </td>
                                        
                                        </tr>
                                </div>
                                

                                 <div class="modal fade" id="basicModal<?php echo $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                                       
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
                                            <h5 class="text-center mt-2" id="exampleModalLabel1">Complete Payment to</h5>
                                            <h6 class="text-center mt-2"><?php echo $row['username']; ?></h6>
                                            <h2 class="text-center" id="package"></h2><hr class="mx-5">
                                            

                                            <div class="modal-body" >
                                                <div class="spinner-border spinner-border-sm text-primary" role="status" style="margin-left: 45%">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>

                                                <p class="text-center text-danger mt-4">Pay the BTC equivalent of </p>
                                                <h6 class="text-center text-info" id="price_<?php echo $row['id'] ?>"></h6>
                                                <h6 class="text-center ">to the following wallet Address</h6><br>

                                                <h6 class="text-center mt-3"><?php echo $row['walletaddress']; ?></h6>
                                                <form role="form" action="withdrawals.php" method="post" enctype="multipart/form-data">
                                                    <input class="d-none" type="text" name="username" id="" value="<?php echo $row['username']; ?>">
                                                    <input class="d-none" type="text" name="ammount" id="" value="<?php echo $row['ammount']; ?>">
                                                    <input class="d-none" type="text" name="id" id="" value="<?php echo $row['id']; ?>">
                                                    <input 
                                                        type="submit"
                                                        name="submit"
                                                        class="btn btn-block btn-success col-12"
                                                        id="btn"
                                                        value="I've paid manually"
                                                    />
                                                </form>


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



                                <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
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
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
      // alert("Hello");
     function showRate(element){
       let crypto = "bitcoin";
       let tablerow = $(element).parent().parent();
       let id = tablerow.attr('id').split("_")[1];
       console.log(id);
       if(crypto == "bitcoin"){
            
            $.get("https://api.coindesk.com/v1/bpi/currentprice/USD.json", (res) => {

                let btcPrice = JSON.parse(res).bpi.USD.rate_float;
                let userAmount = document.getElementById("amount_"+id).value;

                let btcValue = Number(userAmount) / btcPrice;
                btcValue = btcValue.toFixed(6);
                let show = document.getElementById("price_"+id).innerHTML = btcValue;
                console.log(btcValue);


            });   


       }else if(crypto == "ethereum"){
            $.get("https://api.coindesk.com/v1/bpi/currentprice/USD.json", (res) => {

                let btcPrice = JSON.parse(res).bpi.USD.rate_float;
                let userAmount = document.getElementById('amount').value;

                let btcValue = Number(userAmount) / btcPrice;
                btcValue = btcValue.toFixed(6);
                let show = document.getElementById('price').innerHTML = btcValue;
                console.log(btcValue);

                if(userAmount > 100 && userAmount < 49999){
                  let package = document.getElementById('package').innerHTML = "Basic";
                }else if(userAmount > 50000 && userAmount < 499999){
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
