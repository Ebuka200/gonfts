<?php 
session_start();
include '../includes/config.php';



$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

$flag = true;

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
    // $id = intval($id);
    $sql = "SELECT * FROM requests where id = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            // $post_date = date('F j, Y', $row['post_date']);
            $id = $row['id'];
            $username = $row['username'];
            $image = $row['image'];
            $package = $row['package'];
            $ammount = $row['ammount'];
            
        }
    }
}else{
    header ("Location: index.php");
}


if(isset($_POST['submit'])){
    $err_flag = false;

   

    if(isset($err_flag) && $err_flag === false){
        $id = $_GET['id'];
        $username = $_POST['username'];
        $ammount = $_POST['ammount'];
        $package = $_POST['package'];
        $date = date("Y-m-d");

        $sql = "SELECT * FROM accounts WHERE username='$username'";

        $query = mysqli_query($conn, $sql);

        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $balance = $row['balance'];
                $ref_user = $row['referred_by'];
                echo $balance;
                $sum = $balance + $ammount;
                $sql1 = "UPDATE requests SET ammount='$ammount' WHERE username='$username'";
                $sql2 = "UPDATE accounts SET balance='$sum' WHERE username='$username'";
                $sql3 = "UPDATE accounts SET current_plan='$package' WHERE username='$username'";
                $sql4 = "UPDATE requests SET status='approved' WHERE id='$id'";
                $sql5 = "INSERT INTO transactions( date, description, amount,username) values('$date' , 'CREDIT' ,'$ammount','$username')";

                if($row['deposit_status'] == "no"){
                  $arrayVariable = array(
                    "5" => 5,
                    "4" => 3,
                    "3" => 2,
                    "2" => 1,
                    "1" => 1
                  );
                  $username_count = $ref_user;
                  $referral_total = 0;
                  for($x=5;$x>0;$x--){
                      print_r($arrayVariable[$x]);
                      print_r($username_count);        
                      $sql = "SELECT * FROM accounts WHERE username = '$username_count' ORDER BY id DESC";
                      $result = mysqli_query($conn, $sql);
                      //add if statement to check if it's return num_row()
                      $row = mysqli_fetch_assoc($result);
                      // while(){
                        // echo $row['referred_by'];
                        print_r($row['referred_by']);
                         // Subtract percentage amount with default amount
                         $referral_bonus = ($arrayVariable[$x] / 100) * $ammount;
                         $referral_total = $referral_total + $referral_bonus;
                         // Update current user with appropriate percententage amount
                         $row['referral_bonus'] = $referral_bonus + intval($row['referral_bonus']);
                         print_r($row['referral_bonus']);
                         $referral_bonus = $row['referral_bonus'];
                         $update_sql = "UPDATE accounts SET referral_bonus='$referral_bonus' WHERE username = '$username_count' ";
                         $update_query = mysqli_query($conn, $update_sql);
                         $username_count = $row['referred_by'];
                        if(is_null($row['referred_by'])){
                          break;
                        }else{
                         
                        }
                      // } 
                    }

                    $sql9 = "UPDATE accounts SET deposit_status='yes' WHERE username='$username'";
                    $query9 = mysqli_query($conn, $sql9);
                }

                $query1 = mysqli_query($conn, $sql1);
                $query2 = mysqli_query($conn, $sql2);
                $query3 = mysqli_query($conn, $sql3);
                $query4 = mysqli_query($conn, $sql4);

                if($query1 && $query2 && $query3 && $query4){
                    $error = true;
      
                    echo "<script>
                            alert('Approved Succesfully');
                            
                          </script>";
                          header("Location: requests.php"); 
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

    <title>Account settings - Account </title>

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
                <li class="menu-item ">
                    <a href="withdrawals.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-copy-alt"></i>
                        <div data-i18n="Analytics">Withdrawals</div>
                    </a>
                </li>
                <li class="menu-item active">
                    <a href="requests.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-copy-alt"></i>
                        <div data-i18n="Analytics">Requests</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="nft.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-food-menu"></i>
                        <div data-i18n="Analytics">NFT's</div>
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
                    <a href="logout.php" class="menu-link">
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span>Details</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <!-- <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-notifications.html"
                        ><i class="bx bx-bell me-1"></i> Notifications</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-connections.html"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                      >
                    </li> -->
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Payment Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img
                                src="../<?php echo $image ?>"
                                alt="user-avatar"
                                class="d-block rounded"
                                height="100"
                                width="100"
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal"
                                />
                                <div class="button-wrapper">
                                <button 
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#basicModal"
                                    
                                    >
                                    View Photo
                                </button>
                                
                                    <p class="text-muted mb-0">.</p>
                                </div>
 
                        </div>
                        <div class="row pt-2 mt-4 ">
                            <form id="formAuthentication" role="form" action="details.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-3 ">
                                        <div class="mb-3">
                                                <label for="" class="mb-2">Username</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="defaultFormControlInput"
                                                    placeholder="John Doe"
                                                    aria-describedby="defaultFormControlHelp"
                                                    name="username"
                                                    value="<?php echo $username ?>"
                                                />
                                                
                                        </div>
                                    </div>

                                    <div class="col-3 ">
                                      <div class="mb-3">
                                          <label for="exampleFormControlSelect1" class="form-label">Choose Plan</label>
                                          <input
                                                type="text"
                                                class="form-control"
                                                id="defaultFormControlInput"
                                                placeholder="John Doe"
                                                aria-describedby="defaultFormControlHelp"
                                                name="package"
                                                value="<?php echo $package ?>"
                                            />
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="col-3 ">
                                        <div class="mb-3">
                                                <label for="" class="mb-2 text-info"> Amount</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="defaultFormControlInput"
                                                    placeholder="John Doe"
                                                    aria-describedby="defaultFormControlHelp"
                                                    name="ammount"
                                                    value="<?php echo $ammount ?>"

                                                />
                                                
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 col-6">
                                    <input href="" class="btn btn-primary d-grid w-100" type="submit" name="submit" value="Confirm"/>
                                </div>

                            </form>    

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
                                        <h2 class="text-center" id="package"></h2><hr class="mx-5">
                                        

                                        <div class="modal-body" >
                                          <img src="../<?php echo $image ?>" height="500" width="100%">
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
  
                        </div>
                      </div>
                    </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                 
                </div>
               
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

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    
    <script>
      let img = document.getElementById("img1");
      // Function to increase image size
      function enlargeImg() {
        // Set image size to 1.5 times original
        img.style.transform.toggle = "scale(10)";
        img.style.
        // Animation effect
        img.style.transition = "transform 0.25s ease";
      }
      // Function to reset image size
      function resetImg() {
        // Set image size to original
        img.style.transform = "scale(1)";
        img.style.transition = "transform 0.25s ease";
      }

    </script>
  </body>
</html>