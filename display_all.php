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
 <!-- Upper Section for Plants Page -->
<div class="hero-section text-center text-white py-5" style="background: linear-gradient(135deg, #4caf50, #81c784);">
    <div class="container">
        <h1 class="display-4 fw-bold" style="font-family: 'Arial', sans-serif;">Welcome to Faizul Nursery Showroom</h1>
        <p class="lead">Discover a world of greenery. From vibrant flowers to soothing indoor plants, we have everything to brighten your space.</p>
        <div class="mt-4">
            
            <a href="care_tips.php" class="btn btn-outline-light btn-lg">See Care Tips</a>
        </div>
    </div>
</div>

<!-- Highlight Section -->
<div class="highlight-section py-4" style="background-color: #f4f6f7;">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-3">
                <h3 class="fw-bold text-success">Wide Variety</h3>
                <p>Choose from a vast collection of plants suitable for both indoor and outdoor spaces.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h3 class="fw-bold text-success">Quality Guaranteed</h3>
                <p>Our plants are nurtured with care to ensure they thrive in your home or office.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h3 class="fw-bold text-success">Expert Guidance</h3>
                <p>Get expert tips and advice on plant care from our knowledgeable team.</p>
            </div>
        </div>
    </div>
</div>

<!-- Plants Heading -->
<div class="plants-heading text-center my-5">
    <h2 class="display-4 fw-bold" style="color: #388e3c; font-family: 'Verdana', sans-serif;">Explore Our Plant Collection</h2>
    <p class="lead">Bring life to your space with our carefully selected plants. Perfect for any environment!</p>
</div>

<div class="row">
<div class="col-md-10">
    <div class="row g-4 px-1">
         <?php
        get_all_products();
        get_unique_categories();
        get_unique_brands();
        ?> 
        
<!-- <div class="col-md-4 mb-2">
    <div class="card h-100">
        <img src="./images/Date palm (5500).jpg" class="card-img-top" alt="Date Palm" data-bs-toggle="modal" data-bs-target="#plantModal1">
        <div class="card-body">
            <h5 class="card-title">Date Palm - 5500/-</h5>
            <p class="card-text">A majestic palm tree that brings elegance to any garden.</p>
            <a href="#" class="btn btn-warning">Add to Cart</a>
            <a href="#" class="btn btn-success">View More</a>
        </div>
    </div>
</div> -->

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
            <div class="modal-footer">
                <a href="#" class="btn btn-warning">Add to Cart</a>
                <a href="#" class="btn btn-success">View More</a>
            </div>
        </div>
    </div>
</div>



        <!-- Washing Tonia Card -->
        <!-- Card for Washing Tonia -->
<!-- <div class="col-md-4 mb-2">
    <div class="card h-100">
        <img src="./images/washing tonia (5500).jpg" class="card-img-top" alt="Washing Tonia" data-bs-toggle="modal" data-bs-target="#plantModal2">
        <div class="card-body">
            <h5 class="card-title">Washing Tonia - 5500/-</h5>
            <p class="card-text">A beautiful plant with lush green foliage that adds vibrance to your space.</p>
            <a href="#" class="btn btn-warning">Add to Cart</a>
            <a href="#" class="btn btn-success">View More</a>
        </div>
    </div>
</div> -->

<!-- Modal for Washing Tonia -->
<!-- <div class="modal fade" id="plantModal2" tabindex="-1" aria-labelledby="plantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plantModalLabel">Washing Tonia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="./images/washing tonia (5500).jpg" class="img-fluid mb-3" alt="Washing Tonia" style="height: 200px; object-fit: cover;">
                <p><strong>Price:</strong> 5500/-</p>
                <p><strong>Sunlight:</strong> 🌞 Indirect to Medium Sunlight (prefers partial shade)</p>
                <p><strong>Watering:</strong> 💧 Moderate watering (keep soil moist but not waterlogged)</p>
                <p><strong>Indoor/Outdoor:</strong> 🌳 Ideal for Indoor use</p>
                <p><strong>Pet Friendly:</strong> 🐶 Yes, it is pet-friendly</p>
                <p><strong>Size:</strong> 🌱 Grows up to 2 feet tall, spreads around 1.5 feet</p>
                <p><strong>Temperature:</strong> 🌡️ Prefers 60°F to 80°F (16°C - 27°C)</p>
                <p><strong>Humidity:</strong> 💦 Prefers higher humidity levels (50%+)</p>
                <p><strong>Growth Rate:</strong> 📈 Moderate growth rate, can grow about 6 inches per year</p>
                <p><strong>Care Instructions:</strong> 🧴 Prefers regular misting to maintain humidity levels, water when the top inch of soil feels dry.</p>
                <p><strong>Planting Instructions:</strong> 🏡 Use well-draining soil and place in a spot with bright, indirect light.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-warning">Add to Cart</a>
                <a href="#" class="btn btn-success">View More</a>
            </div>
        </div>
    </div>
</div> -->


        <!-- Cono Carpus Card -->
        <!-- Card for Cono Carpus -->
<!-- <div class="col-md-4 mb-2">
    <div class="card h-100">
        <img src="./images/cono carpus(1000).jpg" class="card-img-top" alt="Cono Carpus" data-bs-toggle="modal" data-bs-target="#plantModal3">
        <div class="card-body">
            <h5 class="card-title">Cono Carpus - 1000/-</h5>
            <p class="card-text">A striking tree with fan-shaped leaves, perfect for adding elegance to any outdoor space.</p>
            <a href="#" class="btn btn-warning">Add to Cart</a>
            <a href="#" class="btn btn-success">View More</a>
        </div>
    </div>
</div> -->

<!-- Modal for Cono Carpus -->
<!-- <div class="modal fade" id="plantModal3" tabindex="-1" aria-labelledby="plantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plantModalLabel">Cono Carpus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="./images/cono carpus(1000).jpg" class="img-fluid mb-3" alt="Cono Carpus" style="height: 200px; object-fit: cover;">
                <p><strong>Price:</strong> 1000/-</p>
                <p><strong>Sunlight:</strong> 🌞 Full to Partial Sunlight (ideal for direct sunlight)</p>
                <p><strong>Watering:</strong> 💧 Moderate watering (water thoroughly, allow soil to dry between waterings)</p>
                <p><strong>Indoor/Outdoor:</strong> 🌳 Best for Outdoor use (can also be used as an indoor plant in large spaces)</p>
                <p><strong>Pet Friendly:</strong> 🐶 Yes, it is pet-friendly</p>
                <p><strong>Size:</strong> 🌱 Grows up to 10 feet tall, spreads around 5 feet</p>
                <p><strong>Temperature:</strong> 🌡️ Prefers warm climates (65°F to 85°F / 18°C - 29°C)</p>
                <p><strong>Humidity:</strong> 💦 Prefers low to moderate humidity</p>
                <p><strong>Growth Rate:</strong> 📈 Fast-growing, can grow 1-2 feet per year</p>
                <p><strong>Care Instructions:</strong> 🧴 Water deeply but infrequently, avoid overwatering.</p>
                <p><strong>Planting Instructions:</strong> 🏡 Plant in well-draining soil with a sunny location.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-warning">Add to Cart</a>
                <a href="#" class="btn btn-success">View More</a>
            </div>
        </div>
    </div>
</div> -->


        <!-- Royal Palm Card -->
        <!-- Card for Royal Palm -->
<!-- <div class="col-md-4 mb-2">
    <div class="card h-100">
        <img src="./images/Bottlepalm.jpg" class="card-img-top" alt="Royal Palm" data-bs-toggle="modal" data-bs-target="#plantModal4">
        <div class="card-body">
            <h5 class="card-title">Royal Palm - 5000/-</h5>
            <p class="card-text">A tall, elegant palm tree perfect for creating a tropical feel in your garden or home.</p>
            <a href="#" class="btn btn-warning">Add to Cart</a>
            <a href="#" class="btn btn-success">View More</a>
        </div>
    </div>
</div> -->

<!-- Modal for Royal Palm -->
<!-- <div class="modal fade" id="plantModal4" tabindex="-1" aria-labelledby="plantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plantModalLabel">Royal Palm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="./images/Bottlepalm.jpg" class="img-fluid mb-3" alt="Royal Palm" style="height: 200px; object-fit: cover;">
                <p><strong>Price:</strong> 5000/-</p>
                <p><strong>Sunlight:</strong> 🌞 Full Sunlight (thrives in bright, direct sunlight)</p>
                <p><strong>Watering:</strong> 💧 Regular watering (ensure soil stays slightly moist)</p>
                <p><strong>Indoor/Outdoor:</strong> 🌳 Best for Outdoor use (can also thrive indoors in bright spaces)</p>
                <p><strong>Pet Friendly:</strong> 🐶 Yes, it is pet-friendly</p>
                <p><strong>Size:</strong> 🌱 Can grow up to 20 feet tall and 10 feet wide</p>
                <p><strong>Temperature:</strong> 🌡️ Prefers temperatures between 65°F to 85°F (18°C - 29°C)</p>
                <p><strong>Humidity:</strong> 💦 Prefers moderate to high humidity</p>
                <p><strong>Growth Rate:</strong> 📈 Medium to slow-growing</p>
                <p><strong>Care Instructions:</strong> 🧴 Water regularly, avoid overwatering. Allow soil to dry slightly between waterings.</p>
                <p><strong>Planting Instructions:</strong> 🏡 Plant in well-draining soil and place in a location that gets plenty of sun.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-warning">Add to Cart</a>
                <a href="#" class="btn btn-success">View More</a>
            </div>
        </div>
    </div>
</div> -->


        <!-- Pinus Card -->
        <!-- Card for Pinus -->
<!-- <div class="col-md-4 mb-2">
    <div class="card h-100">
        <img src="./images/Pinus (2000).jpg" class="card-img-top" alt="Pinus" data-bs-toggle="modal" data-bs-target="#plantModal5">
        <div class="card-body">
            <h5 class="card-title">Pinus - 2000/-</h5>
            <p class="card-text">A striking evergreen tree with long, slender needles, ideal for enhancing any outdoor space.</p>
            <a href="#" class="btn btn-warning">Add to Cart</a>
            <a href="#" class="btn btn-success">View More</a>
        </div>
    </div>
</div> -->

<!-- Modal for Pinus -->
<!-- <div class="modal fade" id="plantModal5" tabindex="-1" aria-labelledby="plantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plantModalLabel">Pinus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="./images/Pinus (2000).jpg" class="img-fluid mb-3" alt="Pinus" style="height: 200px; object-fit: cover;">
                <p><strong>Price:</strong> 2000/-</p>
                <p><strong>Sunlight:</strong> 🌞 Full Sunlight (enjoys bright, direct sunlight)</p>
                <p><strong>Watering:</strong> 💧 Water regularly (allow soil to dry between waterings)</p>
                <p><strong>Indoor/Outdoor:</strong> 🌳 Best suited for Outdoor gardens and landscaping</p>
                <p><strong>Pet Friendly:</strong> 🐶 Yes, safe for pets</p>
                <p><strong>Size:</strong> 🌱 Grows up to 10-20 feet tall, ideal for large spaces</p>
                <p><strong>Temperature:</strong> 🌡️ Prefers cooler climates, between 50°F to 75°F (10°C - 24°C)</p>
                <p><strong>Humidity:</strong> 💦 Tolerates moderate humidity levels</p>
                <p><strong>Growth Rate:</strong> 📈 Slow to moderate growth rate</p>
                <p><strong>Care Instructions:</strong> 🧴 Water when the soil feels dry, prune dead branches regularly.</p>
                <p><strong>Planting Instructions:</strong> 🏡 Plant in well-draining, sandy soil with full sunlight exposure.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-warning">Add to Cart</a>
                <a href="#" class="btn btn-success">View More</a>
            </div>
        </div>
    </div>
</div> -->


        <!-- Basmarkiya Plants Card -->
        <!-- Card for Basmarkiya Plants -->
<!-- <div class="col-md-4 mb-2">
    <div class="card h-100">
        <img src="./images/Basmarkiya plants(3500).jpg" class="card-img-top" alt="Basmarkiya Plants" data-bs-toggle="modal" data-bs-target="#plantModal6">
        <div class="card-body">
            <h5 class="card-title">Basmarkiya Plants - 3500/-</h5>
            <p class="card-text">A beautiful tropical plant that thrives in moist environments, perfect for enhancing your home decor.</p>
            <a href="#" class="btn btn-warning">Add to Cart</a>
            <a href="#" class="btn btn-success">View More</a>
        </div>
    </div>
</div> -->

<!-- Modal for Basmarkiya Plants -->
<!-- <div class="modal fade" id="plantModal6" tabindex="-1" aria-labelledby="plantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plantModalLabel">Basmarkiya Plants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="./images/Basmarkiya plants(3500).jpg" class="img-fluid mb-3" alt="Basmarkiya Plants" style="height: 200px; object-fit: cover;">
                <p><strong>Price:</strong> 3500/-</p>
                <p><strong>Sunlight:</strong> 🌞 Prefers moderate sunlight (indirect light is best)</p>
                <p><strong>Watering:</strong> 💧 Keep the soil moist, but avoid overwatering</p>
                <p><strong>Indoor/Outdoor:</strong> 🏡 Suitable for indoor spaces with indirect light</p>
                <p><strong>Pet Friendly:</strong> 🐶 Yes, safe for pets</p>
                <p><strong>Size:</strong> 🌱 Grows up to 2-3 feet tall, perfect for small spaces</p>
                <p><strong>Temperature:</strong> 🌡️ Thrives in temperatures between 60°F to 80°F (15°C - 27°C)</p>
                <p><strong>Humidity:</strong> 💦 Prefers moderate to high humidity levels</p>
                <p><strong>Growth Rate:</strong> 📈 Moderate growth rate, but grows slowly during colder months</p>
                <p><strong>Care Instructions:</strong> 🧴 Water regularly, remove dead leaves, and occasionally mist the leaves for extra humidity.</p>
                <p><strong>Planting Instructions:</strong> 🏡 Plant in well-draining, peat-based soil and place in a location with indirect sunlight.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-warning">Add to Cart</a>
                <a href="#" class="btn btn-success">View More</a>
            </div>
        </div>
    </div>
</div> -->

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
        <div class="custom-footer bg-dark text-white py-4">
            <!-- Google Map Embed Section -->
        <div class="row mt-4">
            <div class="col-12">
                <h5>Visit Us</h5>
                <!-- Embed Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.218345331331!2d77.03381511534756!3d28.459496181153613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2f63e4fffd5%3A0xf4101988b214e485!2sGreenLeaf%20Nursery!5e0!3m2!1sen!2sin!4v1633204574814!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>At Faizul Nursery Showroom, we provide a wide variety of plants, flowers, and gardening products. Our mission is to help you bring nature into your home and office with high-quality plants and personalized service like Landscaping.</p>
            </div>
            
            <!-- Contact Us Section -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p><i class="fas fa-map-marker-alt"></i>Village:Bilal Pat Post:Asmoli District:Moradabad</p>
                <p><i class="fas fa-phone"></i> +91 9193394001<br> +91 7770000793</p>
                <p><i class="fas fa-envelope"></i> gmail</p>
            </div>
            
            <!-- Follow Us Section -->
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <a href="https://www.facebook.com/faizul.khan.1422" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/faizul_nursery_showroom?igsh=MW04Mjh5cjJicXB6cA==" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/+919193394001" class="text-white" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
        
        

        <!-- Copyright Section -->
        <div class="text-center mt-3">
    <p>&copy; 2025 Faizul Nursery showroom. All rights reserved. Crafted By Aatifa Mugheer .Thank you for supporting our green journey!</p>
</div>
    </div>
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
