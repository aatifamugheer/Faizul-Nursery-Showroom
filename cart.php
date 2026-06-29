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
    <title>Faizul Nursery Showroom - Cart Details</title>
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
    .cart-table th, .cart-table td {
        vertical-align: middle;
    }
    .cart-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }
    .quantity-input {
        width: 60px;
        margin: auto;
    }
    .cart-heading {
        background: linear-gradient(135deg, #a1ffce 0%, #faffd1 100%);
        padding: 40px 20px;
        border-radius: 10px;
    }
    .cart-heading h2 {
        font-family: 'Verdana', sans-serif;
        font-size: 3rem;
    }
    .cart-heading p {
        font-size: 1.2rem;
    }
    .btn-outline-success {
        border-color: #3e8e41;
        color: #3e8e41;
    }
    .btn-outline-success:hover {
        background-color: #3e8e41;
        color: #fff;
    }
    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
    }
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }
    @media (max-width: 768px) {
        .cart-table img {
            width: 80px;
            height: 80px;
        }
        .cart-heading h2 {
            font-size: 2.5rem;
        }
        .cart-heading p {
            font-size: 1rem;
        }
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
                    <li class="nav-item"><a class="nav-link" href="./users_area/user_registration.php">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
                </ul>
            
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
        
<!-- table -->
<div class="container">
    <div class="row">
        <div class="cart-heading text-center my-5">
            <h2 class="display-4 fw-bold" style="color: #3e8e41;">Your Green Cart</h2>
            <p class="lead">Review your selections and make your space greener. Proceed to checkout when you're ready!</p>
        </div>
<form action="" method="post">
        <table class="table table-bordered text-center cart-table">
            
            <tbody>
                
                 <?php
                 
                 $ip = getIPAddress();
                 $total_price=0;
                 $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                 $result=mysqli_query($con,$cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0){
                    echo"<thead class='table-success'>
                <tr>
                    <th>Plant Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Actions</th>
                </tr>
            </thead>";
                
                 while($row=mysqli_fetch_array($result)){
                     $product_id=$row['product_id'];
                     $quantity=$row['quantity'];
                     $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
                     $result_products=mysqli_query($con,$select_products);
                     while($row_product_price=mysqli_fetch_array($result_products)){
                 $product_price=array($row_product_price['product_price']);
                 $price_table=$row_product_price['product_price'];
                 $product_title=$row_product_price['product_title'];
                 $product_image1=$row_product_price['product_image1'];
                 $product_values=array_sum($product_price);
                 $total_price+=$product_values*$quantity;
                     
                 ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./images/<?php echo $product_image1?>" class="cart-img"></td>
                    

                    <td>
        <div>
            <form action="" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                <input type="number" min="1" name="qty" class="form-input text-center quantity-input w-50" value="<?php echo $quantity ?>" required>

                <input type="submit" class="btn btn-outline-success btn-sm" value="Update Cart" name="update_cart">
            </form>
        </div>
    </td>
    <?php
$ip = getIPAddress();
if (isset($_POST['update_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['qty']);

    $update_cart = "UPDATE `cart_details` SET quantity='$quantity' WHERE ip_address='$ip' AND product_id='$product_id'";
    $result_products_quantity = mysqli_query($con, $update_cart);

    if ($result_products_quantity) {
        echo "<script>alert('Cart updated successfully!'); window.open('cart.php','_self');</script>";
    } else {
        echo "<script>alert('Failed to update cart.'); window.open('cart.php','_self');</script>";
    }
}
?>
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>" class="form-check-input"></td>
                    <td>
                       
                         
                        <!-- <button class="btn btn-outline-danger btn-sm">Remove</button> -->
                        <input type="submit" class="btn btn-outline-success btn-sm" value="Remove Item" name="remove_cart">
                    </td>
                </tr>
                <?php
                }
            }
        }else{
            echo "<h2 style='color: red; text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>
      <span style='font-size: 2em;'>🚫</span> 
      Oops! Your Cart is Empty
      </h2>
      <p style='text-align: center; font-size: 1.2em; color: #555; margin-top: 20px;'>
      It looks like you haven't added any items yet. Why not browse our <a href='display_all.php' style='color: #28a745; text-decoration: none;'>collection</a> and find something you love? 
      <br>Don't miss out on making your space greener and more vibrant!</p>";

        }
                ?>
            </tbody>
        </table>
        <?php
        $ip = getIPAddress();

        $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result=mysqli_query($con,$cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
            echo "<div class='d-flex justify-content-between align-items-center mb-5'>
            <h4 class='px-3'>Subtotal: <strong class='text-success'> $total_price/- </strong></h4>
            <input type='submit' class='btn btn-outline-info btn-lg m-3' value='Continue Shopping' name='continue_shopping'>
            
            <a href='./users_area/checkout.php' class='btn btn-success btn-lg'>Checkout</a>
        </div>";
        }else{
            echo"<input type='submit' class='btn btn-outline-info btn-lg m-3' value='Continue Shopping' name='continue_shopping'>";
        }

        if(isset($_POST['continue_shopping'])){
            echo"<script>window.open('index.php','_self')</script>";
        }
        ?>
        
    </div>
</div>
</form>
<!-- function to remove item -->
<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="delete from `cart_details` where product_id= $remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item=remove_cart_item();
?>
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
