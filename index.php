<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Faizul Nursery Showroom</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- fontawesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- css file -->
    <link rel="stylesheet" href="style.css" />
    <style>
        body{
    overflow-x: hidden;
}
    </style>
  </head>
  <body>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Faizul Nursery Showroom</title>
        <!-- <link rel="stylesheet" href="styles.css" /> -->
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet"
        />
      </head>
      <body>
<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container-fluid">
        <img src="./images/nurserylogo.png" alt="Nursery Logo" class="logo" style="max-width: 100px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="display_all.php">Plants</a></li>
                <li class="nav-item"><a class="nav-link" href="service.php">Services</a></li>
                <?php if(isset($_SESSION['username'])): ?>
                    <li class="nav-item"><a class="nav-link" href="./users_area/profile.php">My Account</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="./users_area/user_registration.php">Sign Up</a></li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup>
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a></li>
            </ul>
            <form class="d-flex" role="search" action="search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search for plants..." aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
            </form>
        </div>
    </div>
</nav>

    <!-- calling cart function -->
     <?php
     cart();
     ?>
           <!-- second child -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                
                <?php
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                }else{
                    echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                }
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
                }else{
                    echo "<li class='nav-item'><a class='nav-link' href='./users_area/logout.php'>Logout</a></li>";
                }               
                ?>
            </ul>
        </nav>
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        
        <div class="carousel-item active">
            <img src="./images/slider1.png" class="d-block" alt="Nursery Image 1">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-4 fw-bold">Your Perfect Green Companion</h1>
                <p class="lead">Explore our wide range of plants and bring nature into your home or office.</p>
                <div class="mt-4">
                    <a href="display_all.php" class="btn btn-primary btn-lg me-3">Shop Now</a>
                </div>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="./images/slider2.png" class="d-block" alt="Nursery Image 2">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-4 fw-bold">Beautiful Flowers, Beautiful Spaces</h1>
                <p class="lead">From vibrant blooms to calming greenery, we offer the best for your garden or indoor space.</p>
                <div class="mt-4">
                    <a href="display_all.php" class="btn btn-primary btn-lg me-3">Browse Collection</a>
                    
                </div>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="./images/slider3.png" class="d-block" alt="Nursery Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-4 fw-bold">Transform Your Space with Indoor Plants</h1>
                <p class="lead">Add freshness and beauty to your living space with our curated indoor plant selection.</p>
                <div class="mt-4">
                    <a href="care_tips.php" class="btn btn-primary btn-lg me-3">See Care Tips</a>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="marquee-container">
    <marquee behavior="scroll" direction="left" class="marquee-text">
        🌱 Welcome to Our Nursery! 🌸 Explore a wide variety of plants, flowers, and gardening accessories. Free delivery on all orders over 3Lakhs. New arrivals every week! 🌿
    </marquee>
</div>
<div class="plants-heading text-center my-5">
    <h2 class="display-4 fw-bold">Our Bestselling Plants</h2>
    <p class="lead">Browse our collection of plants that will make your space greener and more vibrant. Perfect for your home or office!</p>
</div>
<div class="row">
<div class="col-md-10">
    <div class="row g-4 px-1">
         <?php
        getproducts();
        get_unique_categories();
        get_unique_brands();
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip;  
        ?> 
        


<!-- Modal for Date Palm -->
<div class="modal fade" id="plantModal1" tabindex="-1" aria-labelledby="plantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plantModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="product-img" class="img-fluid mb-3" alt="Date Palm" style="height: 200px; object-fit: cover;">
                <p><strong>Price:</strong> <span id="product-price"></span></p>
                <div id="product-keywords"></div>
            </div>
            
        </div>
    </div>
</div>
    </div>
</div>

<!-- Modal for Plant Details -->
<div class="modal fade" id="plantModal" tabindex="-1" aria-labelledby="plantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plantModalLabel">Plant Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="plantImage" class="img-fluid mb-3" src="" alt="Plant Image">
                <h5 id="plantName"></h5>
                <p id="plantDescription"></p>
                <p id="plantPrice"></p>
            </div>
        </div>
    </div>
</div>

 <div class="col-md-2 bg-light-green p-0">
    <!-- Side nav -->
    <!-- Delivery Brands Section -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-dark-green">
            <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
        </li>
        <?php 
        getbrands();
        ?>
        
    </ul>

    <!-- Categories Section -->
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-dark-green">
            <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        </li>
        <?php 
        getcategories();
       
        ?>
    </ul>
</div>

        </div>
        <!-- footer section -->
          <?php
          include("./includes/footer.php")
          ?>
</div>


        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script src="javascript.js"></script>
    <!-- bootstrap js link -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script> -->

    <script>
        $(document).ready(function(){
            $(document).on('click','.product-img', function(){
                let product_id = $(this).data('product-id');
                $.ajax({
                    url : "getProduct.php",
                    type : "GET",
                    data : {id : product_id},
                    dataType : 'JSON',
                    success : function(response){
                        
                        
                        $('#plantModalLabel').text(response.product_title)
                        $('#product-img').attr('src', "./admin_area/product_images/" + response.product_image2)
                        $('#product-price').text(response.product_price)
                        $('#product-keywords').html(response.product_keywords)
                    },
                    error : function(xhr, status, error){
                        console.log("Error: ",error);
                        
                    },
                    
                })
            })            
        })
    </script>
  </body>
</html>
