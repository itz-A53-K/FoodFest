<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    include '_dbConnect.php';
    $order_id=$_POST['order_id'];

    $orderUpdt= "UPDATE `orders` SET `order_status` = 'preparing'WHERE `orders`.`order_id` = $order_id";
    $result=mysqli_query($conn,$orderUpdt);
    if($result){
        header('Location:/FoodFest/admin/home.php');
    }
}

?>