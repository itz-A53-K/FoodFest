<?php
if ($_SERVER['REQUEST_METHOD'] =="POST") {
    include '_dbConnect.php';
    $paymentMethod=$_POST['payment'];
    $user_id=$_POST['user_id'];
    $grand_total=$_POST['grand_total'];
    // echo $paymentMethod;
    // echo $grand_total;
    // echo $user_id;
    $order_id=0;

    $sql="SELECT * FROM `orders`";
    $result=mysqli_query($conn,$sql);
    $no_ofRow=mysqli_num_rows($result);

    $order_id=$no_ofRow+1;

    $insertOrder="INSERT INTO `orders` (`order_id`,`grand_total`,`user_id`) VALUES('$order_id','$grand_total','$user_id')"; 
    $insertOrder_result=mysqli_query($conn,$insertOrder);
    
    $cartItem="SELECT * FROM `cart` WHERE user_id=$user_id";
    $cartItem_result=mysqli_query($conn,$cartItem);

    while($row=mysqli_fetch_assoc($cartItem_result)){
        $food_id= $row['food_id'];
        $quantity= $row['quantity'];
        $total_price= $row['total_price'];

        $insertOrderList = "INSERT INTO `ordered_list` (`food_id`, `quantity`, `total_price`, `order_id`, `user_id`) VALUES ('$food_id', '$quantity',  '$total_price',  '$order_id', '$user_id')";
        $insertOrderList_result=mysqli_query($conn,$insertOrderList);
    }
    $dlt_cartItem="DELETE FROM `cart` WHERE `cart`.`user_id` = $user_id";
    $dlt_cartItem_result=mysqli_query($conn,$dlt_cartItem);

    if($dlt_cartItem){
        
    // echo var_dump($result2); 
        if($paymentMethod=="PayU"){
            echo "Waiting to confirm the payment ....";
            echo "<script type=\"text/javascript\">
            window.open('https://www.payu.in', '_blank')
            </script>";
            echo "<script type=\"text/javascript\">
            setTimeout(() => {  window.location.href='http://localhost/FoodFest/index.php' }, 15000);
            
            </script>";
            // sleep(5);
            // header('Location:../../index.php');
        }
        else{
            header('Location:../../index.php');

        }
    }
}


?>