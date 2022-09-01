<?php 
include 'dashboard/includes/config.php';

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

$flag = true;
$wallet_err = false;

$category = $_GET['category'];

if(isset($_GET['category'])){

    $sql = "SELECT * FROM nfts WHERE category = '$category'";
                            
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $string = $row['image']; 
        $newstring = explode("../", $string); 
    }
  
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Category</title>
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
        <div class="spinner-grow" style="width: 3rem; height: 3rem; background-color:rgb(6, 3, 21, .5);" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 sticky-top p-0" style="border-top: rgb(2, 2, 139)">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5" style="background-color: rgb(2, 2, 139);">
            <h2 class="mb-2 text-white">NFTs</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="index.php#liveauctions" class="nav-item nav-link">Auctions</a>
                <!-- <a href="#collections" class="nav-item nav-link">Collections</a> -->
                <a href="index.php#category" class="nav-item nav-link active">Category</a>
                <a href="index.php#artists" class="nav-item nav-link">Artists</a>
                <a href="dashboard/" class="nav-item nav-link">Sign In</a>
                
                <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
            </div>
            <!-- <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>+17473083545</h4> -->
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
   
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center">
                
                <h1 class="mb-0 px-4">Category : <?php echo $category ?></h1>
                <h6 class="text-secondary text-uppercase mt-2">Explore all collections in Art category</h6>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.1s">
                <?php
                                            
                            $sql = "SELECT * FROM nfts WHERE category = '$category'";
                            
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $string = $row['image']; 
                                $newstring = explode("../", $string); 
                                $rowcount = mysqli_num_rows( $result );
                                // print($newstring[1]); 
                                if($rowcount = 0){
                            ?>
                            <div class="bg-danger">
                                <p class="text-center">No item to show</p>
                            </div>
                           
               
                   
                <?php }else{?>
                    <div class="col-lg-3 testimonial-item p-4 my-5">
                                <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                                <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                                        <!-- <div class="service-item p-4"> -->
                                        <div class="overflow-hidden mb-4">
                                            <a href="product.html"><img class="img" src="dashboard/<?php echo $newstring[1] ?>" alt="" height="250px" width="100%"></a> 
                                        </div>
                                        <span class="badge bg-dark mb-2"><?php echo $row['category'] ?></span>
                                        <a href="product.html"><h4 class="mb-3"><?php echo $row['name'] ?></h4></a>
                                        <p><?php echo $row['description'] ?></p>
                                        <a href="<?php echo $row['link'] ?>"><p class="bagde p-2 text-info"><?php echo $row['link'] ?></p></a>
                                            <!-- <a class="btn-slide mt-2" href="service.html"><i class="fa fa-arrow-right"></i><span>Read More</span></a> -->
                                        <!-- </div> -->
                                </div>
                            </div>
                <?php }} ?>    
            </div>
              
            
        </div>
    </div>
<!-- About End -->



  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-light mb-4">GONFTs</h4>
                    <p class="mb-2">The world’s first and largest digital marketplace for<br> crypto collectibles and non-fungible tokens (NFTs). Buy, sell, and discover exclusive digital items.</p>
                    <!-- <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>972-998 N Lamer St, Burbank, CA 91506, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+174-730-83545</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>support@example.com</p> -->
                    <!-- <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Useful Links</h4>
                    <a class="btn btn-link" href="index.php">Home</a>
                    <a class="btn btn-link" href="index.php#auctions">Auctions</a>
                    <a class="btn btn-link" href="index.php#category">Category</a>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="dashboard/">Sign In</a>
                    <a class="btn btn-link" href="index.php#artists">Artists</a>
                </div>
                <!-- <div class="col-lg-2 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p class="text-info">Please signup for our newsletters.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                       Copyright &copy; 2022 <a class="border-bottom" href=""></a>, All Right Reserved.
                    </div>
                    <!-- <div class="col-md-6 text-center text-md-end " style="display: flex; float: right">
                        <p class="mb-2 mx-2"><i class="fab fa-facebook-f" aria-hidden="true"></i></p>
                        <p class="mb-2 mx-2"><i class="fab fa-twitter" aria-hidden="true"></i></p>
                        <p class="mb-2 mx-2"><i class="fab fa-instagram" aria-hidden="true"></i></p>
                        <p class="mb-2 mx-2"><i class="fab fa-pinterest" aria-hidden="true"></i></p>

                        
                    </div> -->
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