<?php
$method= $_SERVER['REQUEST_METHOD'];

if ($method=="POST") {
    include '_dbConnect.php';

    $currentUrl=$_POST['currentUrl'];
    $food_Id=$_POST['food_Id'];
    $quantity=$_POST['quantity'];


    $sqlFood_item= "SELECT * FROM `food_items` WHERE food_Id=$food_Id";
    $resultFood_item= mysqli_query($conn,$sqlFood_item);
    $rowFood_item= mysqli_fetch_assoc($resultFood_item);

    $food_Name=$rowFood_item['food_Name'];
    $total_price= $rowFood_item["price"]*$quantity;

    $sql="INSERT INTO `cart` (`food_id`,`food_Name`, `quantity`, `user_id`, `total_price`) VALUES ('$food_Id','$food_Name', '$quantity', '', '$total_price')";
    $result=mysqli_query($conn,$sql);
    if ($result) {
        header ("Location:$currentUrl");
    }
}

?>