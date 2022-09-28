<?php 
include 'dashboard/includes/config.php';

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

$flag = true;
$wallet_err = false;



if(isset($_POST['submit'])){

  //Getting values from forms
  $name = $_POST['name'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $artist = $_POST['artist'];
  $link = $_POST['link'];
  $target_file = upload_nft($_FILES['image']);
    if($target_file != false){
      $img_path = $target_file;
    }

  $sql = "INSERT INTO nfts( name, description, category, link, image , artist) values('$name' , '$description' ,'$category', '$link' , '$target_file' , '$artist')";
  // $sql = "INSERT INTO productdetails(name) values('Brenda')";
  $query = mysqli_query($conn, $sql);
  $error = false;
 
  if($query){
      $error = true;
      echo "<script>
      alert('NFT added Succesfully');
      
    </script>";
    header("Location: nft.php"); 
     
  }else {
      
      echo "NFT not registered, A problem occured";
      echo mysqli_error($conn);
  }

  
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NFT</title>
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
<!--Start of Tawk.to Script-->
<!--<script type="text/javascript">-->
<!--var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();-->
<!--(function(){-->
<!--var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];-->
<!--s1.async=true;-->
<!--s1.src='https://embed.tawk.to/62f06b8b54f06e12d88d6ceb/1g9ti87eh';-->
<!--s1.charset='UTF-8';-->
<!--s1.setAttribute('crossorigin','*');-->
<!--s0.parentNode.insertBefore(s1,s0);-->
<!--})();-->
<!--</script>-->
<!--End of Tawk.to Script-->
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
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <!--<h2 class="mb-2 text-white">NFTs</h2>-->
            <img src="img/logo.jpeg" width="100%" height="100%"/>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Discover</a>
                            <div class="dropdown-menu fade-up m-0">
                                <a href="#" class="dropdown-item">Popular</a>
                                <a href="#" class="dropdown-item">Featured</a>
                                <a href="#" class="dropdown-item">New items</a>
                                <a href="#" class="dropdown-item">Collections</a>
                            </div>
                    </div>         -->
                <a href="#home" class="nav-item nav-link active">Home</a>
                <!--<a href="#liveauctions" class="nav-item nav-link">Auctions</a>-->
                <!-- <a href="#collections" class="nav-item nav-link">Collections</a> -->
                <a href="#category" class="nav-item nav-link">Category</a>
                <!--<a href="#artists" class="nav-item nav-link">Artists</a>-->
                <a href="dashboard/login.php" class="nav-item nav-link">Sign In</a>
                
                <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
            </div>
            <!-- <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>+17473083545</h4> -->
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div id="home" class="container-fluid p-0 pb-5" style="min-height: 600px">
        <div class="owl-carousel header-carousel position-relative mb-5">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/istockphoto-1320330053-170667a.jpg" alt="">
                <!-- <span class="img-fluid"></span> -->
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(250, 250, 250, 0.5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-12 col-lg-7">
                                <h2 class="display-5 text-dark animated slideInDown mb-4">Discover Digital Art, Collect and Sell Your Specific NFTs.</h2>
                                <p class="fs-5 fw-medium text-dark mb-4 pb-2">Partner with world's first and largest NFT marketplace to showcase your brand and products.</p>
                                <div class="row">
                                    <div class="col-2"><h2 class="display-5 text-success mb-2" data-toggle="counter-up">200 </h2></div>
                                    <div class="col-1"><h2 class="display-5 text-success mb-2" style="margin-left:-22px"> K </h2></div>
                                </div>
                                
                                <a href="#" class="btn py-md-3 px-md-5 mt-4 me-3 animated slideInLeft" style="border: 2px solid black; color: black; border-radius: 50px">Discover Now</a>
                                
                            </div>
                            <div class="col-10 col-lg-5  d-none d-lg-block">
                                    <div class="row  align-items-center">
                                            <div class="col-sm-6">
                                                <div class="bg-primary mb-4 wow fadeIn" data-wow-delay="0.3s">
                                                        <img src="img/1.jpg" alt="" height="100%" width="100%">
                                                </div>
                                                <div class="bg-secondary wow fadeIn" data-wow-delay="0.5s">
                                                    <img src="img/3.jpg" alt="" height="100%" width="100%">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="bg-success wow fadeIn" data-wow-delay="0.7s" style="height: 270px">
                                                   <img src="img/2.jpg" alt="" height="100%" width="100%">
                                                </div>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div id="liveauctions" class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="text-left">
                    <!-- <h6 class="text-secondary text-uppercase">Testimonial</h6> -->
                    <h1 class="mb-0 px-4">Live Auctions</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <?php
                                        
                        $sql = "SELECT * FROM nfts LIMIT 3";
                        
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $string = $row['image']; 
                            $newstring = explode("../", $string); 
                            // print($newstring[1]);    
                        ?>

                        <div class="testimonial-item p-4 my-5">
                            <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                            <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                                    <!-- <div class="service-item p-4"> -->
                                        <div class="overflow-hidden mb-4">
                                            <a><img class="img" src="dashboard/<?php echo $newstring[1] ?>" alt="" height="250px" width="100%"></a> 
                                        </div>
                                        <span class="badge bg-dark mb-2"><?php echo $row['category'] ?></span>
                                        <a href="#"><h4 class="mb-3"><?php echo $row['name'] ?></h4></a> 
                                        <a href="<?php echo $row['link'] ?>"><p class="bagde p-2 text-info"><?php echo substr($row['link'],0, 30) ?></p></a>
                                        <!-- <a class="btn-slide mt-2" href="service.html"><i class="fa fa-arrow-right"></i><span>Read More</span></a> -->
                                    <!-- </div> -->
                            </div>
                        </div>
                        
                    <?php } ?>
                </div>
            </div>
    </div>
    <!-- About End -->



    <!-- About Start -->
    <!-- <div id="collections" class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-left">
                <h1 class="mb-0 px-4">Top Collections</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img flex-shrink-0" src="img/azuki2.jpg" style="width: 60px; height: 60px;border-radius: 100%">
                        <div class="ms-4">
                            <h5 class="mb-1">Hazuki</h5>
                            <p class="m-0">Created by Beeple</p>
                        </div>
                    </div>
                    <div class="row  align-items-center">
                       
                        <div class="col-6">
                            <div class="bg-success wow fadeIn" data-wow-delay="0.7s" style="height: 282px">
                               <img src="img/azuki3.jpg" alt="" height="100%" width="100%">
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="bg-primary mb-4 wow fadeIn" data-wow-delay="0.3s">
                                    <img src="img/azuki4.jpg" alt="" height="130px" width="100%">
                            </div>
                            <div class="bg-secondary wow fadeIn" data-wow-delay="0.5s">
                                <img src="img/azuki5.jpg" alt="" height="130px" width="100%">
                            </div>
                        </div>
                </div>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img flex-shrink-0" src="img/azuki2.jpg" style="width: 60px; height: 60px;border-radius: 100%">
                        <div class="ms-4">
                            <h5 class="mb-1">Fidenza</h5>
                            <p class="m-0">Created by Lisa Green</p>
                        </div>
                    </div>
                    <div class="row  align-items-center">
                        
                        <div class="col-6">
                            <div class="bg-success wow fadeIn" data-wow-delay="0.7s" style="height: 282px">
                               <img src="img/2.jpg" alt="" height="100%" width="100%">
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="bg-primary mb-4 wow fadeIn" data-wow-delay="0.3s">
                                    <img src="img/1.jpg" alt="" height="100%" width="100%">
                            </div>
                            <div class="bg-secondary wow fadeIn" data-wow-delay="0.5s">
                                <img src="img/3.jpg" alt="" height="100%" width="100%">
                            </div>
                        </div>
                </div>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img flex-shrink-0" src="img/azuki2.jpg" style="width: 60px; height: 60px;border-radius: 100%">
                        <div class="ms-4">
                            <h5 class="mb-1">Fidenza Art</h5>
                            <p class="m-0">Created by Lisa Green</p>
                        </div>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col-6 p-0">
                            <div class="bg-primary mb-4 wow fadeIn" data-wow-delay="0.3s">
                                    <img src="img/1.jpg" alt="" height="100%" width="100%">
                            </div>
                            <div class="bg-secondary wow fadeIn" data-wow-delay="0.5s">
                                <img src="img/3.jpg" alt="" height="100%" width="100%">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-success wow fadeIn" data-wow-delay="0.7s" style="height: 282px">
                               <img src="img/2.jpg" alt="" height="100%" width="100%">
                            </div>
                        </div>
                </div>
                </div>
                <div class="testimonial-item p-4 my-5">
                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                    <div class="d-flex align-items-end mb-4">
                        <img class="img flex-shrink-0" src="img/azuki2.jpg" style="width: 60px; height: 60px;border-radius: 100%">
                        <div class="ms-4">
                            <h5 class="mb-1">Fidenza Art</h5>
                            <p class="m-0">Created by Lisa Green</p>
                        </div>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col-6 p-0">
                            <div class="bg-primary mb-4 wow fadeIn" data-wow-delay="0.3s">
                                    <img src="img/1.jpg" alt="" height="100%" width="100%">
                            </div>
                            <div class="bg-secondary wow fadeIn" data-wow-delay="0.5s">
                                <img src="img/3.jpg" alt="" height="100%" width="100%">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-success wow fadeIn" data-wow-delay="0.7s" style="height: 282px">
                               <img src="img/2.jpg" alt="" height="100%" width="100%">
                            </div>
                        </div>
                </div>
                </div>
              
            </div>
        </div>
    </div> -->
<!-- About End -->

      <!-- About Start -->
      <div id="category" class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-left">
                <!-- <h6 class="text-secondary text-uppercase">Testimonial</h6> -->
                <h1 class="mb-0 px-4">Browse by category</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item p-4 my-5" style="background-image: url('img/art.jpg')">
                    <!-- <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i> -->
                    <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                            <!-- <div class="service-item p-4"> -->
                                <div class="overflow-hidden mb-4">
                                    <!-- <img class="img" src="img/monkey.jpg" alt="" height="250px" width="100%"> -->
                                </div>
                                <span class="badge bg-white mb-2 text-center p-3 m-auto col-12">
                                    <a href="category.php?category=Arts/Paintings"><h4 class="text-dark">Arts/Paintings</h4></a>

                                    <h6 class="" style="color: grey">
                                        <?php 
                                            $sql = "SELECT * FROM nfts WHERE category ='Arts/Paintings'";
                                            if ($result = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                
                                                // Display result
                                                printf($rowcount);
                                             }
                                        ?> Item(s)
                                    </h6>
                                </span>
                               
                            <!-- </div> -->
                     </div>
                </div>
                <div class="testimonial-item p-4 m-3 my-5" style="background-image: url('img/collectible.jpg')">
                    <!-- <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i> -->
                    <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                            <!-- <div class="service-item p-4"> -->
                                <div class="overflow-hidden mb-4">
                                    <!-- <img class="img" src="img/monkey.jpg" alt="" height="250px" width="100%"> -->
                                </div>
                                <span class="badge bg-white mb-2 text-center p-3 m-auto col-12">
                                    <a href="category.php?category=Collectibles"><h4 class="text-dark">Collectibles</h4></a>

                                    <h6 class="" style="color: grey">
                                    <?php 
                                            $sql = "SELECT * FROM nfts WHERE category ='Collectibles'";
                                            if ($result = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                
                                                // Display result
                                                printf($rowcount);
                                             }
                                        ?> Item(s)
                                    </h6>
                                </span>
                               
                            <!-- </div> -->
                     </div>
                </div>
                <div class="testimonial-item p-4 m-3 my-5" style="background-image: url('img/music.jpg')">
                    <!-- <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i> -->
                    <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                            <!-- <div class="service-item p-4"> -->
                                <div class="overflow-hidden mb-4">
                                    <!-- <img class="img" src="img/monkey.jpg" alt="" height="250px" width="100%"> -->
                                </div>
                                <span class="badge bg-white mb-2 text-center p-3 m-auto col-12">
                                    <a href="category.php?category=Music"><h4 class="text-dark">Music</h4></a>

                                    <h6 class="" style="color: grey">
                                    <?php 
                                            $sql = "SELECT * FROM nfts WHERE category ='Music'";
                                            if ($result = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                
                                                // Display result
                                                printf($rowcount);
                                             }
                                        ?> Item(s)
                                    </h6>
                                </span>
                               
                            <!-- </div> -->
                     </div>
                </div>
                <div class="testimonial-item p-4 m-3 my-5" style="background-image: url('img/photo.jpg')">
                    <!-- <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i> -->
                    <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                            <!-- <div class="service-item p-4"> -->
                                <div class="overflow-hidden mb-4">
                                    <!-- <img class="img" src="img/monkey.jpg" alt="" height="250px" width="100%"> -->
                                </div>
                                <span class="badge bg-white mb-2 text-center p-3 m-auto col-12">
                                    <a href="category.php?category=Photography"><h4 class="text-dark">Photography</h4></a>

                                    <h6 class="" style="color: grey">
                                    <?php 
                                            $sql = "SELECT * FROM nfts WHERE category ='Photography'";
                                            if ($result = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                
                                                // Display result
                                                printf($rowcount);
                                             }
                                        ?> Item(s)
                                    </h6>
                                </span>
                               
                            <!-- </div> -->
                     </div>
                </div>
                <div class="testimonial-item p-4 m-3 my-5" style="background-image: url('img/sport.jpg')">
                    <!-- <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i> -->
                    <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                            <!-- <div class="service-item p-4"> -->
                                <div class="overflow-hidden mb-4">
                                    <!-- <img class="img" src="img/monkey.jpg" alt="" height="250px" width="100%"> -->
                                </div>
                                <span class="badge bg-white mb-2 text-center p-3 m-auto col-12">
                                    <a href="category.php?category=Sports"><h4 class="text-dark">Sports</h4></a>

                                    
                                    <h6 class="" style="color: grey">
                                    <?php 
                                            $sql = "SELECT * FROM nfts WHERE category ='Sport'";
                                            if ($result = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                
                                                // Display result
                                                printf($rowcount);
                                             }
                                        ?> Item(s)
                                    </h6>
                                </span>
                               
                            <!-- </div> -->
                     </div>
                </div>
                <div class="testimonial-item p-4 m-3 my-5" style="background-image: url('img/trade.jpg')">
                    <!-- <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i> -->
                    <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                            <!-- <div class="service-item p-4"> -->
                                <div class="overflow-hidden mb-4">
                                    <!-- <img class="img" src="img/monkey.jpg" alt="" height="250px" width="100%"> -->
                                </div>
                                <span class="badge bg-white mb-2 text-center p-3 m-auto col-12">
                                    <a href="category.php?category=Trading Cards"><h4 class="text-dark">Trading Cards</h4></a>
                                    <h6 class="" style="color: grey">
                                    <?php 
                                            $sql = "SELECT * FROM nfts WHERE category ='Trading Cards'";
                                            if ($result = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                
                                                // Display result
                                                printf($rowcount);
                                             }
                                        ?> Item(s)
                                    </h6>
                                </span>
                               
                            <!-- </div> -->
                     </div>
                </div>
                <div class="testimonial-item p-4 m-3 my-5" style="background-image: url('img/virtual.jpg')">
                    <!-- <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i> -->
                    <div class="col-md-6 col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                            <!-- <div class="service-item p-4"> -->
                                <div class="overflow-hidden mb-4">
                                    <!-- <img class="img" src="img/monkey.jpg" alt="" height="250px" width="100%"> -->
                                </div>
                                <span class="badge bg-white mb-2 text-center p-3 m-auto col-12">
                                    <a href="category.php?category=Virtual World"><h4 class="text-dark">Virtual World</h4></a>
                                    <h6 class="" style="color: grey">
                                    <?php 
                                            $sql = "SELECT * FROM nfts WHERE category ='Virtual World'";
                                            if ($result = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                
                                                // Display result
                                                printf($rowcount);
                                             }
                                        ?> Item(s)
                                    </h6>
                                </span>
                               
                            <!-- </div> -->
                     </div>
                </div>
            </div>
        </div>
     </div>
<!-- About End -->


    <!--<div id="artists" class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">-->
    <!--    <div class="container py-5">-->
    <!--        <div class="text-left">-->
                <!-- <h6 class="text-secondary text-uppercase">Testimonial</h6> -->
    <!--            <h1 class="mb-0 px-4">Top Artists</h1>-->
    <!--        </div>-->
    <!--        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">-->
    <!--            <div class="testimonial-item p-4 my-5">-->
    <!--                <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>-->
    <!--                <div class="d-flex align-items-end mb-4">-->
    <!--                    <img class="img flex-shrink-0" src="img/lisa.jpg" style="width: 60px; height: 60px;border-radius: 100%">-->
    <!--                    <div class="ms-4">-->
    <!--                        <h5 class="mb-1">Lisa Green</h5>-->
    <!--                        <p class="m-0">7 collections</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row  align-items-center">-->
                       
    <!--                    <div class="col-12">-->
    <!--                        <div class="btn btn-outline-success wow fadeIn p-2 text-center" data-wow-delay="0.7s" style="height:45px; width: 100%; border-radius: 20px">-->
    <!--                           <i class="fa fa-plus"></i>-->
    <!--                           Follow-->
    <!--                        </div>-->
    <!--                    </div>-->
                       
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="testimonial-item p-4 my-5">-->
    <!--                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>-->
    <!--                    <div class="d-flex align-items-end mb-4">-->
    <!--                        <img class="img flex-shrink-0" src="img/seekers.jpg" style="width: 60px; height: 60px;border-radius: 100%">-->
    <!--                        <div class="ms-4">-->
    <!--                            <h5 class="mb-1">Seekers</h5>-->
    <!--                            <p class="m-0">2 Collections</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row  align-items-center">-->
                           
    <!--                            <div class="col-12">-->
    <!--                                    <div class="btn btn-outline-success wow fadeIn p-2 text-center" data-wow-delay="0.7s" style="height:45px; width: 100%; border-radius: 30px">-->
    <!--                                       <i class="fa fa-plus"></i>-->
    <!--                                       Follow-->
    <!--                                    </div>-->
    <!--                            </div>-->
                           
    <!--                    </div>-->
    <!--            </div>-->
               
    <!--            <div class="testimonial-item p-4 my-5">-->
    <!--                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>-->
    <!--                    <div class="d-flex align-items-end mb-4">-->
    <!--                        <img class="img flex-shrink-0" src="img/clubber.jpg" style="width: 60px; height: 60px;border-radius: 100%">-->
    <!--                        <div class="ms-4">-->
    <!--                            <h5 class="mb-1">Clubber</h5>-->
    <!--                            <p class="m-0">2 Collections</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row  align-items-center">-->
                           
    <!--                            <div class="col-12">-->
    <!--                                    <div class="btn btn-outline-success wow fadeIn p-2 text-center" data-wow-delay="0.7s" style="height:45px; width: 100%; border-radius: 30px">-->
    <!--                                       <i class="fa fa-plus"></i>-->
    <!--                                       Follow-->
    <!--                                    </div>-->
    <!--                            </div>-->
                           
    <!--                    </div>-->
    <!--            </div>-->
    <!--            <div class="testimonial-item p-4 my-5">-->
    <!--                    <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>-->
    <!--                    <div class="d-flex align-items-end mb-4">-->
    <!--                        <img class="img flex-shrink-0" src="img/moondust.jpg" style="width: 60px; height: 60px;border-radius: 100%">-->
    <!--                        <div class="ms-4">-->
    <!--                            <h5 class="mb-1">Moon Dust</h5>-->
    <!--                            <p class="m-0">2 Collections</p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row align-items-center">-->
                           
    <!--                        <div class="col-12">-->
    <!--                            <div class="btn btn-outline-success wow fadeIn p-2 text-center" data-wow-delay="0.7s" style="height:45px; width: 100%; border-radius: 30px">-->
    <!--                                <i class="fa fa-plus"></i>-->
    <!--                                Follow-->
    <!--                            </div>-->
    <!--                        </div>-->
                           
    <!--                    </div>-->
    <!--            </div>-->
               
              
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- Team Start -->
    <!--<div class="container-xxl py-5">-->
    <!--    <div class="container py-5">-->
    <!--        <div class="text-left wow fadeInUp" data-wow-delay="0.1s">-->
    <!--            <h1 class="mb-5">Rescources & News</h1>-->
    <!--        </div>-->
    <!--        <div class="row g-4">-->
    <!--            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                <div class="team-item p-0">-->
    <!--                    <div class="overflow-hidden mb-4">-->
    <!--                        <img class="img-fluid" src="img/news1.jpg" alt="">-->
    <!--                    </div>-->
    <!--                    <h5 class="mb-0 px-4">How to Easily Setup a MetaMask Wallet?</h5>-->
    <!--                    <p class="mb-0 px-4 py-4 mt-2 mb-4"> How To / March 28, 2022</p>-->
                        <!-- <div class="btn-slide mt-1">
    <!--                        <i class="fa fa-share"></i>-->
    <!--                        <span>-->
    <!--                            <a href=""><i class="fab fa-facebook-f"></i></a>-->
    <!--                            <a href=""><i class="fab fa-twitter"></i></a>-->
    <!--                            <a href=""><i class="fab fa-instagram"></i></a>-->
    <!--                        </span>-->
    <!--                    </div> -->-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                <div class="team-item p-0">-->
    <!--                    <div class="overflow-hidden mb-4">-->
    <!--                        <img class="img-fluid" src="img/news2.jpg" alt="">-->
    <!--                    </div>-->
    <!--                    <h5 class="mb-0 px-4">How to Easily Setup a MetaMask Wallet?</h5>-->
    <!--                    <p class="mb-0 px-4 py-4 mt-2 mb-4"> How To / March 28, 2022</p>-->
                        <!-- <div class="btn-slide mt-1">
    <!--                        <i class="fa fa-share"></i>-->
    <!--                        <span>-->
    <!--                            <a href=""><i class="fab fa-facebook-f"></i></a>-->
    <!--                            <a href=""><i class="fab fa-twitter"></i></a>-->
    <!--                            <a href=""><i class="fab fa-instagram"></i></a>-->
    <!--                        </span>-->
    <!--                    </div> -->-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                <div class="team-item p-0">-->
    <!--                    <div class="overflow-hidden mb-4">-->
    <!--                        <img class="img-fluid" src="img/news3.jpg" alt="">-->
    <!--                    </div>-->
    <!--                    <h5 class="mb-0 px-4">How to Easily Setup a MetaMask Wallet?</h5>-->
    <!--                    <p class="mb-0 px-4 py-4 mt-2 mb-4"> How To / March 28, 2022</p>-->
                        <!-- <div class="btn-slide mt-1">
    <!--                        <i class="fa fa-share"></i>-->
    <!--                        <span>-->
    <!--                            <a href=""><i class="fab fa-facebook-f"></i></a>-->
    <!--                            <a href=""><i class="fab fa-twitter"></i></a>-->
    <!--                            <a href=""><i class="fab fa-instagram"></i></a>-->
    <!--                        </span>-->
    <!--                    </div> -->-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                <div class="team-item p-0">-->
    <!--                    <div class="overflow-hidden mb-4">-->
    <!--                        <img class="img-fluid" src="img/news4.jpg" alt="">-->
    <!--                    </div>-->
    <!--                    <h5 class="mb-0 px-4">How to Easily Setup a MetaMask Wallet?</h5>-->
    <!--                    <p class="mb-0 px-4 py-4 mt-2 mb-4"> How To / March 28, 2022</p>-->
                        <!-- <div class="btn-slide mt-1">
    <!--                        <i class="fa fa-share"></i>-->
    <!--                        <span>-->
    <!--                            <a href=""><i class="fab fa-facebook-f"></i></a>-->
    <!--                            <a href=""><i class="fab fa-twitter"></i></a>-->
    <!--                            <a href=""><i class="fab fa-instagram"></i></a>-->
    <!--                        </span>-->
    <!--                    </div> -->-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- Team End -->




    <!-- Footer Start -->
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
                    <a class="btn btn-link" href="dashboard/login.php">Sign In</a>
                    <!--<a class="btn btn-link" href="index.php#artists">Artists</a>-->
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