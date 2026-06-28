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
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    /> -->
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
        <link rel="stylesheet" href="styles.css" />
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
<!-- <div class="search-results-section py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="display-5 fw-bold" style="color: #388e3c; font-family: 'Verdana', sans-serif;">Search Results</h2>
            <p class="lead">Here are the plants that match your search query. Explore and find the perfect plant for your space!</p>
        </div>
    </div>
 </div> -->
 <!-- Search Results Section -->
<!-- Search Results Section -->
<div class="search-results-section py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="display-5 fw-bold text-light animated-heading">Search Results</h2>
      <p class="lead text-light animated-text">
        Welcome to <span class="fw-bold text-highlight">Faizul Nursery</span>! Discover a wide variety of plants that bring life and freshness to your spaces.
        Explore our curated collection and find the perfect plant for your home or office.
      </p>
      <p class="text-light animated-text">Here are the plants that match your search query. Happy browsing!</p>
    </div>
  </div>
</div>

<style>
  .search-results-section {
    background: linear-gradient(to right, #4caf50, #81c784, #388e3c);
    padding: 60px 0;
    animation: fadeIn 1.5s ease-in-out;
  }

  .animated-heading {
    animation: slideIn 2s ease-out;
  }

  .animated-text {
    animation: fadeInText 3s ease-in-out;
  }

  .text-highlight {
    color: #ffcc80;
    font-size: 1.3rem;
    font-weight: bold;
    text-decoration: underline;
    text-transform: uppercase;
    animation: pulse 1.5s infinite alternate;
  }

  @keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
  }

  @keyframes slideIn {
    0% { transform: translateX(-100%); opacity: 0; }
    100% { transform: translateX(0); opacity: 1; }
  }

  @keyframes fadeInText {
    0% { opacity: 0; }
    100% { opacity: 1; }
  }

  @keyframes pulse {
    0% { transform: scale(1); }
    100% { transform: scale(1.1); }
  }
</style>


 <div class="row">
<div class="col-md-10">
    <div class="row g-4 px-1">
         <?php
        search_product();
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
