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

        <style>
        body {
            background-color: #f8f9fa;
        }
        .care-tips-intro {
        background: linear-gradient(135deg, #6db3f2 0%, #1e6a9e 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .highlighted-text {
        font-weight: bold;
        color: #ffe066;
    }
    
    .care-tips-intro::before {
        content: '';
        position: absolute;
        top: 0;
        left: -50%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        transform: skewX(25deg);
        animation: slide-bg 5s infinite linear;
    }
    
    @keyframes slide-bg {
        0% {
            left: -50%;
        }
        100% {
            left: 150%;
        }
    }
    
    .animate__animated {
        --animate-duration: 2s;
    }
        .care-tips-section {
            padding: 60px 15px;
        }
        .care-tip {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .care-tip-icon {
            font-size: 2.5rem;
            color: #28a745;
        }
        .care-tip-title {
            font-size: 1.75rem;
            font-weight: bold;
            margin-top: 10px;
        }
        .care-tip-text {
            font-size: 1rem;
            color: #6c757d;
        }
        .header-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #28a745;
            margin-bottom: 20px;
        }
        .lead-text {
            font-size: 1.2rem;
            margin-bottom: 40px;
            color: #6c757d;
        }
    </style>
      </head>
      <body>
      <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container-fluid">
            <img src="./images/nurserylogo.png" alt="Nursery Logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="display_all.php">Plants</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">Services</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    
                </ul>
                
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
       

           <section class="care-tips-intro text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold text-white animate__animated animate__fadeInDown">🌿 See Care Tips for Plants</h1>
        <p class="lead text-white animate__animated animate__fadeInUp">Welcome to <span class="highlighted-text">Faizul Nursery Showroom</span>'s comprehensive guide to plant care. Here, you'll find expert advice to keep your plants healthy, vibrant, and thriving. Whether you're a seasoned gardener or just starting your green journey, our tips will help you nurture your leafy friends with confidence. Explore and enjoy the beauty of nature with our easy-to-follow care tips!</p>
    </div>
</section>
<div class="container text-center my-5">
    <h1 class="header-title">🌱 Care Tips for Thriving Plants 🌿</h1>
    <p class="lead-text">Get expert advice to help your plants flourish. Learn how to care for your green companions with these practical and easy-to-follow tips!</p>
</div>

<div class="container care-tips-section">
    <div class="row">
        <!-- Tip 1: Sunlight -->
        <div class="col-md-6">
            <div class="care-tip">
                <div class="d-flex align-items-center">
                    <div class="care-tip-icon me-3">☀️</div>
                    <div class="care-tip-title">Provide Adequate Sunlight</div>
                </div>
                <p class="care-tip-text">Sunlight is essential for photosynthesis. Most indoor plants thrive with 6-8 hours of indirect sunlight. For outdoor plants, ensure they receive the required amount based on their species.</p>
            </div>
        </div>

        <!-- Tip 2: Watering -->
        <div class="col-md-6">
            <div class="care-tip">
                <div class="d-flex align-items-center">
                    <div class="care-tip-icon me-3">💧</div>
                    <div class="care-tip-title">Water Properly</div>
                </div>
                <p class="care-tip-text">Overwatering is a common mistake. Allow the top inch of soil to dry out between waterings. Adjust watering frequency based on the plant type, season, and indoor climate.</p>
            </div>
        </div>

        <!-- Tip 3: Soil -->
        <div class="col-md-6">
            <div class="care-tip">
                <div class="d-flex align-items-center">
                    <div class="care-tip-icon me-3">🌱</div>
                    <div class="care-tip-title">Use the Right Soil</div>
                </div>
                <p class="care-tip-text">Different plants need different soil types. Use well-draining soil for succulents and cacti, while tropical plants prefer nutrient-rich, moisture-retentive soil.</p>
            </div>
        </div>

        <!-- Tip 4: Fertilizing -->
        <div class="col-md-6">
            <div class="care-tip">
                <div class="d-flex align-items-center">
                    <div class="care-tip-icon me-3">🧴</div>
                    <div class="care-tip-title">Fertilize Regularly</div>
                </div>
                <p class="care-tip-text">Fertilizers provide essential nutrients. Use a balanced fertilizer every 4-6 weeks during the growing season. Reduce or stop feeding during winter months.</p>
            </div>
        </div>

        <!-- Tip 5: Pruning -->
        <div class="col-md-6">
            <div class="care-tip">
                <div class="d-flex align-items-center">
                    <div class="care-tip-icon me-3">✂️</div>
                    <div class="care-tip-title">Prune Dead or Dying Leaves</div>
                </div>
                <p class="care-tip-text">Regular pruning helps maintain plant shape and removes dead or yellowing leaves. This promotes healthier growth and prevents disease spread.</p>
            </div>
        </div>

        <!-- Tip 6: Humidity -->
        <div class="col-md-6">
            <div class="care-tip">
                <div class="d-flex align-items-center">
                    <div class="care-tip-icon me-3">💦</div>
                    <div class="care-tip-title">Maintain Proper Humidity</div>
                </div>
                <p class="care-tip-text">Indoor plants often require higher humidity levels. Use a humidifier, mist the leaves, or place a water tray nearby to increase humidity.</p>
            </div>
        </div>
    </div>
</div>


        
    

        
        <!-- footer section -->
          <?php
          include("./includes/footer.php")
          ?>



       
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        
    <!-- bootstrap js link -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script> -->

    
  </body>
</html>
