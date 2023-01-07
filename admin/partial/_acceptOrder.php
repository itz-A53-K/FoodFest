<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    session_start();
    include '_dbConnect.php';
    $order_id=$_POST['order_id'];
    $order_status=$_POST['order_status'];
    
    if($order_status=="new"){

        $orderUpdt= "UPDATE `orders` SET `order_status` = 'Preparing'WHERE `orders`.`order_id` = $order_id";
        $result=mysqli_query($conn,$orderUpdt);
        if($result){
            $alert="Order accepted.";
            $_SESSION['alert']=$alert;
            header('Location:/FoodFest/admin/home.php');
        }
    }
    else if($order_status=="Preparing"){

        $orderUpdt= "UPDATE `orders` SET `order_status` = 'Out for delivery'WHERE `orders`.`order_id` = $order_id";
        $result=mysqli_query($conn,$orderUpdt);
        if($result){
            $alert="Order ready. Out for delivery";
            $_SESSION['alert']=$alert;
            header('Location:/FoodFest/admin/home.php?btn=preparing');
        }
    }
    else if($order_status=="Out For Delivery"){

        $orderUpdt= "UPDATE `orders` SET `order_status` = 'Delivered'WHERE `orders`.`order_id` = $order_id";
        $result=mysqli_query($conn,$orderUpdt);
        if($result){
            $alert="Order delivered successfully.";
            $_SESSION['alert']=$alert;
            header('Location:/FoodFest/admin/home.php?btn=Out_For_Delivery');
        }
    }

}

?>