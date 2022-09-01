<?php 

include 'admin/includes/config.php';

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
// $query2 = "SELECT * FROM productdetails";4

if (isset($_GET['invoice'])) {
   $result = urldecode($_GET['invoice']); 

  $result = $_GET['invoice'];
  $sql = "SELECT * FROM product WHERE invoice='$result' ";
  $query = mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){ 
      $productid = $row['productid'];
      $weight = $row['weight'];
      $quantity = $row['quantity'];
      $shipment = $row['shipment'];
      $invoice = $row['invoice'];
      $consignment = $row['consignment'];
      $comment = $row['comment'];
  }

}

else{
  echo "<script>
  alert('Invalid Invoice Number');
  location.href = 'trackproduct.php';
      </script>"; 
}


$sql2 = "SELECT * FROM sender WHERE invoice='$result' ";
$query2 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($query2) > 0){
  while($row = mysqli_fetch_array($query2)){ 
    $fullname = $row['fullname'];
    $email = $row['email'];
    $phone = $row['phone'];
    $location = $row['location'];
    
}



}



$sql3 = "SELECT * FROM receiver WHERE invoice='$result' ";
$query3 = mysqli_query($conn, $sql3);
if(mysqli_num_rows($query3) > 0){
  while($row = mysqli_fetch_array($query3)){ 
    $fullname2 = $row['fullname'];
    $email2 = $row['email'];
    $phone2 = $row['phone'];
    $location2 = $row['location'];
    
}

}




}
else{
  echo "<script>
  location.href = 'trackproduct.php';
      </script>"; 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Logistica - Shipping Company Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/LX.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 sticky-top p-0" style="border-top: rgb(2, 2, 139)">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5" style="background-color: rgb(2, 2, 139);">
            <h2 class="mb-2 text-white">LX</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="price.html" class="dropdown-item">Pricing Plan</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="quote.html" class="dropdown-item active">Free Quote</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> -->
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>+174-7308-3545</h4>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <!-- <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Quote</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Quote</li>
                </ol>
            </nav>
        </div>
    </div> -->
    <!-- Page Header End -->


    <!-- Quote Start -->
    <div class="container-xxl py-1">
        <div class="container-fluid py-5">
            <div class="row g-5 align-items-center mb-2">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <!-- <h6 class="text-secondary text-uppercase mb-3">Get A Quote</h6> -->
                    <h4 class="mb-2" style="font-size: 20px;font-weight: normal">USER DASHBOARD</h4>
                    <h6 class="mb-3"style="font-size: 15px">TRACKING DETAILS FOR <?php echo $invoice ?></h6>                    
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="ecommerce-purchase-invoice-generator/invoice.php?invoice=<?php echo $invoice ?>" target="_blank" title="Generate Invoice">
                         <h6 class="text-info" style="float: right">Download invoice</h6>
                    </a>     
                </div>
               
            </div>
           
            <div class="row">
                <div class="col-lg-3 wow fadeInUp">
                    <div class="col-md-12 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item p-4" style="border-top: 3px solid rgb(2, 2, 139);">
                            <!-- <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="img/service-1.jpg" alt="">
                            </div> -->
                            <h6 class="mb-3">Sender: <?php echo $fullname ?></h6>
                            <hr>
                            <h6 class="mb-2" style="color:rgb(54, 52, 52); font-size: 13px"><span class="fa fa-envelope"></span>  Email :</h6>
                            <h6 style="color:rgb(78, 76, 76); font-size: 12px"><?php echo $email ?></h6>
                            <hr>
                            <h6 class="mb-2" style="color:rgb(54, 52, 52); font-size: 13px"><span class="fa fa-phone"></span>  Phone :</h6>
                            <h6 style="color:rgb(78, 76, 76); font-size: 12px"><?php echo $phone ?></h6>
                            <hr>
                            <h6 class="mb-2" style="color:rgb(54, 52, 52); font-size: 13px"><span class="fa fa-map-marker-alt"></span>  Location :</h6>
                            <h6 style="color:rgb(78, 76, 76); font-size: 12px"><?php echo $location ?></h6>
                            
                            <!-- <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a> -->
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 wow fadeInUp mt-4 mb-3" data-wow-delay="0.3s">
                        <div class="service-item p-4" style="border-top: 3px solid rgb(2, 2, 139);">
                            <!-- <div class="overflow-hidden mb-4">
                                <img class="img-fluid" src="img/service-1.jpg" alt="">
                            </div> -->
                            <h6 class="mb-3">Receiver: <?php echo $fullname2 ?></h6>
                            <hr>
                            <h6 class="mb-2" style="color:rgb(54, 52, 52); font-size: 13px"><span class="fa fa-envelope"></span>  Email :</h6>
                            <h6 style="color:rgb(78, 76, 76); font-size: 12px"><?php echo $email2 ?></h6>
                            <hr>
                            <h6 class="mb-2" style="color:rgb(54, 52, 52); font-size: 13px"><span class="fa fa-phone"></span>  Phone :</h6>
                            <h6 style="color:rgb(78, 76, 76); font-size: 12px"><?php echo $phone2 ?></h6>
                            <hr>
                            <h6 class="mb-2" style="color:rgb(54, 52, 52); font-size: 13px"><span class="fa fa-map-marker-alt"></span>  Location :</h6>
                            <h6 style="color:rgb(78, 76, 76); font-size: 12px"><?php echo $location2 ?></h6>
                            
                            <!-- <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a> -->
                        </div>
                    </div>

                    
                </div>
                <div class="col-lg-9 wow fadeInUp" style="margin-top: -1px">
                    <div class="service-item p-4" style="border-top: 3px solid rgb(2, 2, 139);">
                        <!-- <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                        </div> -->
                        <h6 class="mb-3">Details: </h6>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-1 d-none d-sm-block" >
                                <span class="fa fa-weight p-3" style="height: 40px;width:100%; background-color: rgb(16, 4, 70); color: #fff;border-radius: 4px"></span>
                            </div>
                            <div class="col-lg-11 col-sm-12">
                                <div style="height: 40px; width:100%; background-color: rgb(226, 219, 219);border-radius: 4px">
                                    <p style="padding-top: 10px;padding-left: 20px; color: rgb(2, 2, 139); font-weight: bold; font-size: 13px">Weight : <span style="color: black; padding-left: 15px"><?php echo $weight ?></span></p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1 d-none d-sm-block" >
                                <span class="fa fa-list p-3" style="height: 40px;width:100%; background-color: rgb(16, 4, 70); color: #fff;border-radius: 4px"></span>
                            </div>
                            <div class="col-lg-11 col-sm-12">
                                <div style="height: 40px; width:100%; background-color: rgb(226, 219, 219);border-radius: 4px">
                                    <p style="padding-top: 10px;padding-left: 20px; color: rgb(2, 2, 139); font-weight: bold;font-size: 13px">Quantity : <span style="color: black; padding-left: 15px"><?php echo $quantity ?></span></p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1 d-none d-sm-block" >
                                <span class="fa fa-road p-3" style="height: 40px;width:100%; background-color: rgb(16, 4, 70); color: #fff;border-radius: 4px"></span>
                            </div>
                            <div class="col-lg-11 col-sm-12">
                                <div style="height: 40px; width:100%; background-color: rgb(226, 219, 219);border-radius: 4px">
                                    <p style="padding-top: 10px; padding-left: 20px; color: rgb(2, 2, 139); font-weight: bold;font-size: 13px;">Mode of Shipment : <span style="color: black; padding-left: 15px"><?php echo $shipment ?></span></p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1 d-none d-sm-block" >
                                <span class="fa fa-clipboard p-3" style="height: 40px;width:100%; background-color: rgb(16, 4, 70); color: #fff;border-radius: 4px"></span>
                            </div>
                            <div class="col-lg-11 col-sm-12">
                                <div style="height: 40px; width:100%; background-color: rgb(226, 219, 219);border-radius: 4px">
                                    <p style="padding-top: 10px;padding-left: 20px; color: rgb(2, 2, 139); font-weight: bold;font-size: 13px;">Invoice Number : <span style="color: black; padding-left: 15px"><?php echo $invoice ?></span></p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1 d-none d-sm-block" >
                                <span class="fa fa-sticky-note p-3" style="height: 40px;width:100%; background-color: rgb(16, 4, 70); color: #fff;border-radius: 4px"></span>
                            </div>
                            <div class="col-lg-11 col-sm-12">
                                <div style="height: 40px; width:100%; background-color: rgb(226, 219, 219);border-radius: 4px">
                                    <p style="padding-top: 10px; padding-left: 20px; color: rgb(2, 2, 139); font-weight: bold; font-size: 13px;">Consignment Details : <span style="color: black; padding-left: 15px"><?php echo $consignment ?></span></p>                                   
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1 d-none d-sm-block" >
                                <span class="fa fa-comment p-3" style="height: 40px;width:100%; background-color: rgb(16, 4, 70); color: #fff;border-radius: 4px"></span>
                            </div>
                            <div class="col-lg-11 col-sm-12">
                                <div style="min-height: 200px; width:100%; background-color: rgb(226, 219, 219);border-radius: 4px">
                                    <p class="pt-3" style="padding-left: 20px;padding-bottom: 0px; color: rgb(2, 2, 139); font-weight: bold;font-size: 13px;">Comment</p><hr>
                                    <h6 class="text-dark" style="padding-left: 15px; padding-right: 15px; padding-bottom: 15px; font-size: 13px; line-height: 20px"><?php echo $comment ?></h6>
                                    
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-3" >
                            <p class="p-2" style="height: 40px;width:100%; background-color: rgb(16, 4, 70);; color: #fff;border-radius: 4px; font-size: 13px">Pickup: 2022-02-07</p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1 d-none d-sm-block" >
                                <span class="fa fa-weight p-3" style="height: 40px;width:100%; background-color: rgb(16, 4, 70); color: #fff;border-radius: 4px"></span>
                            </div>
                            <div class="col-lg-11 col-sm-12">
                                <div style="min-height: 200px; width:100%; background-color: rgb(226, 219, 219);border-radius: 4px; padding-bottom: 15px">
                                    <p class="pt-3" style="padding-left: 20px;padding-bottom: 0px; color: rgb(2, 2, 139); font-weight: bold;font-size: 13px;">Consignment Present Status</p><hr>
                                    <div class="service-item p-4" style="border-top: 3px solid rgb(2, 2, 139); background-color: #fff; margin-left: 15px;margin-right: 15px;padding-bottom: 15px;">
                                        <!-- <div class="overflow-hidden mb-4">
                                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                                        </div> -->
                                        <div class="table-responsive">
                                            <table class="table table-responsive table-striped table-sm " style="font-size: 13px">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Present Location</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Comments</th>
                                                    
                                                    
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $sql4 = "SELECT * FROM consignment WHERE invoice='$result' ";
                                                    $query4 = mysqli_query($conn, $sql4);
                                                    if(mysqli_num_rows($query4) > 0){
                                                    while($row = mysqli_fetch_array($query4)){ 
                                                        $date = $row['date'];
                                                        $present_location = $row['present_location'];
                                                        $status = $row['status'];
                                                        $comment = $row['comment'];
                                                    
                                                ?>
                                                    <tr>
                                                    <td><?php echo $date ?></td>
                                                    <td><?php echo $present_location ?></td>
                                                    <td><?php echo $status ?></td>
                                                    <td> <?php echo $comment ?></td> 
                                                    
                                                    </tr>
                                                    
                                                <?php }} ?>
                 
                                                 
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        
                                        <!-- <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a> -->
                                    </div>      
                                    
                                </div>
                            </div>
                        </div>
                       
                        <!-- <a class="btn-slide mt-2" href=""><i class="fa fa-arrow-right"></i><span>Read More</span></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->
        

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>972-998 N Lamer St, Burbank, CA 91506, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+174 730 83545</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>support@example.com</p>
                    <!-- <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="service.html">Air Freight</a>
                    <a class="btn btn-link" href="service.html">Sea Freight</a>
                    <a class="btn btn-link" href="service.html">Road Freight</a>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="about.html">About Us</a>
                    <a class="btn btn-link" href="contact.html">Contact Us</a>
                    <a class="btn btn-link" href="service.html">Our Services</a>
                    <a class="btn btn-link" href="contact.html">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p class="text-info">Please signup for our newsletters.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; 2022 <a class="border-bottom" href="">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>