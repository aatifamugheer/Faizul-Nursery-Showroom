<?php
include('./includes/connect.php');
$product_id=$_GET['id'];
$sql = "SELECT * FROM products WHERE product_id = $product_id";
$res = mysqli_query($con, $sql);
if(mysqli_num_rows($res) > 0){
    echo json_encode(mysqli_fetch_assoc($res));
}else{
    echo "No data Found";
}