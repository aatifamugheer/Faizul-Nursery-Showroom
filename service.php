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
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #ff7eb3, #ff758c);
            overflow-x: hidden;
        }

        .heading-section {
            padding: 60px 0;
            text-align: center;
            color: #ffffff;
            background: linear-gradient(120deg, #b24592, #f15f79);
            background-size: 400% 400%;
            animation: gradient-bg 8s ease infinite;
        }

        .heading-section h2 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
        }

        .heading-section h2 span {
            color: #f1c40f;
        }

        .heading-section p {
            font-size: 1.25rem;
            color: #f8c471;
        }

        @keyframes gradient-bg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .services-section {
            padding: 40px 0;
        }

        .service-card {
            border-radius: 15px;
            padding: 20px;
            margin: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, background 1s, color 1s;
            min-height: 300px;
            max-width: 300px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, #a29bfe, #6c5ce7);
            opacity: 0;
            transition: opacity 0.5s;
            z-index: 0;
        }

        .service-card:hover::before {
            opacity: 1;
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        .service-card:nth-child(1) {
            background-color: #ff6b6b;
        }

        .service-card:nth-child(1):hover {
            background-color: #ff4757;
        }

        .service-card:nth-child(2) {
            background-color: #1dd1a1;
        }

        .service-card:nth-child(2):hover {
            background-color: #10ac84;
        }

        .service-card:nth-child(3) {
            background-color: #54a0ff;
        }

        .service-card:nth-child(3):hover {
            background-color: #2e86de;
        }

        .service-card:nth-child(4) {
            background-color: #feca57;
        }

        .service-card:nth-child(4):hover {
            background-color: #ff9f43;
        }

        .service-card:nth-child(5) {
            background-color: #ff9ff3;
        }

        .service-card:nth-child(5):hover {
            background-color: #f368e0;
        }

        .service-card:nth-child(6) {
            background-color: #00d2d3;
        }

        .service-card:nth-child(6):hover {
            background-color: #00a3a4;
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ffffff;
            z-index: 1;
        }

        .service-card h4 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #ffffff;
            z-index: 1;
            position: relative;
        }

        .service-card p {
            font-size: 1rem;
            color: #ffffff;
            z-index: 1;
            position: relative;
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
        <section class="heading-section">
    <div class="container">
        <h2>Explore <span>Faizul Nursery</span> Services</h2>
        <p>Our comprehensive services are tailored to bring the beauty of nature into your life.</p>
    </div>
</section>

<section class="services-section">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center">
            <div class="service-card">
                <i class="fas fa-seedling service-icon"></i>
                <h4>Plant Sales</h4>
                <p>Discover a variety of plants to beautify your home and garden. 🌱</p>
            </div>
            <div class="service-card">
                <i class="fas fa-water service-icon"></i>
                <h4>Garden Maintenance</h4>
                <p>Ensure your garden stays healthy and lush with our expert care. 💧</p>
            </div>
            <div class="service-card">
                <i class="fas fa-tree service-icon"></i>
                <h4>Landscaping</h4>
                <p>Create a stunning outdoor space with our bespoke landscaping services. 🌳</p>
            </div>
            <div class="service-card">
                <i class="fas fa-hand-holding-water service-icon"></i>
                <h4>Plant Care Consultation</h4>
                <p>Get personalized advice to nurture your plants. 🌼</p>
            </div>
            <div class="service-card">
                <i class="fas fa-leaf service-icon"></i>
                <h4>Custom Planters</h4>
                <p>Design planters that perfectly complement your decor. 🏡</p>
            </div>
            <div class="service-card">
                <i class="fas fa-shipping-fast service-icon"></i>
                <h4>Delivery Services</h4>
                <p>Receive your plants conveniently delivered to your door. 🚚</p>
            </div>
        </div>
    </div>
</section>

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
