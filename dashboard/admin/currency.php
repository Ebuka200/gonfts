<?php 
session_start();

include '../includes/config.php';

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    
    if(isset($_POST['submit'])){

      //Getting values from forms
      $currency = $_POST['currency'];

      $sql = "INSERT INTO currencies( name ) values('$currency')";
      // $sql = "INSERT INTO productdetails(name) values('Brenda')";
      $query = mysqli_query($conn, $sql);
      $error = false;
     
      if($query){
          $error = true;

          echo "<script>
                  alert('Currency registered successfully');
                  location.href ='currency.php';
                </script>"; 
      }else {
          
          echo "Accountt not added";
          echo mysqli_error($conn);
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

    <title>Dashboard -</title>

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
        <?php include('../includes/adminsidebar.php'); ?>
        
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
                      <a class="dropdown-item" href="account.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <!--<li>-->
                    <!--  <a class="dropdown-item" href="#">-->
                    <!--    <i class="bx bx-cog me-2"></i>-->
                    <!--    <span class="align-middle">Settings</span>-->
                    <!--  </a>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--  <a class="dropdown-item" href="#">-->
                    <!--    <span class="d-flex align-items-center align-middle">-->
                    <!--      <i class="flex-shrink-0 bx bx-credit-card me-2"></i>-->
                    <!--      <span class="flex-grow-1 align-middle">Billing</span>-->
                    <!--      <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>-->
                    <!--    </span>-->
                    <!--  </a>-->
                    <!--</li>-->
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
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
                
                <!-- Order Statistics -->
                <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
                    <div class="card">
                        <div class="row">
                          <div class="col-10">
                              <h3 class="card-header pb-0">Currency</h3>
                          </div>
                          
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                              
                               
                                  <div class="row pt-2">
                                      <form id="formAuthentication" class="mb-3" role="form" action="currency.php" method="post" enctype="multipart/form-data">
                                      <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="mb-2">
                                                    Enter Currency
                                                </label>
                                                <input class="py-2 form-control" placeholder="Enter Currency" name="currency" />
                                                    
                                            </div>
                                      </div>
                                      <div class="col-6">
                                          <!--<label for="" class="col-12 mb-2">.</label>-->
                                          <input class="btn btn-info" type="submit" name="submit" value="Add Currency">
                                      </div>
                                        
                                      </form>
                                  </div>
                                          
                            </div>                           
                        </div>
                          <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>CURRENCY</th>   
                                        <!--<th>ACTION</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $sql = "SELECT * FROM currencies";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_assoc($result)){
                                    
                                    ?>
                                        <tr id="tablerow_<?php echo $row['id'] ?>">
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                           
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
                <!--/ Order Statistics --> 
              </div>


            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  Â© Copyright
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
     function showRate(){
       let crypto = document.getElementById('crypto').value;
       if(crypto == "bitcoin"){
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
