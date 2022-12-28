<?php
$method= $_SERVER['REQUEST_METHOD'];

if ($method=="POST") {
    include '_dbConnect.php';

    $currentUrl=$_POST['currentUrl'];
    $food_Id=$_POST['food_Id'];
    $quantity=$_POST['quantity'];
    $user_id=$_POST['user_id'];

    if($quantity>=11){
        $alert="<b>Sorry! You cann't add more then 10 quantity.</b>";
    }
    else{

        $sqlFood_item= "SELECT * FROM `food_items` WHERE food_Id=$food_Id";
        $resultFood_item= mysqli_query($conn,$sqlFood_item);
        $rowFood_item= mysqli_fetch_assoc($resultFood_item);

        $food_Name=$rowFood_item['food_Name'];
        $total_price= $rowFood_item["price"]*$quantity;

        // $checkDubCartItem="SELECT * FROM `cart` WHERE food_id = $food_Id";
        $checkDubCartItem="SELECT * FROM `cart` WHERE food_id = $food_Id AND user_id=$user_id";
        $checkDubCartItemResult=mysqli_query($conn,$checkDubCartItem);
        $row=mysqli_fetch_assoc($checkDubCartItemResult);
        $noOfRows= mysqli_num_rows($checkDubCartItemResult);

        if ($rowFood_item['item_Available']=="Yes") {
        
            if ($noOfRows>0 ){
                $quantity = $row["quantity"]+$quantity;
                $updTotal_price=$rowFood_item["price"]*$quantity;
                if($quantity>50){
                    $alert="<b>Sorry! You cann't order more then 50 quantity.</b>";
                }
                else{
                    $sql="UPDATE `cart` SET `quantity` = '$quantity', `total_price` = '$updTotal_price' WHERE `cart`.`food_id` = $food_Id AND `user_id`=$user_id";
                    $result=mysqli_query($conn,$sql);
                }
            } 
            else{
                $sql_ins="INSERT INTO `cart` (`food_id`, `quantity`, `user_id`, `total_price`) VALUES ('$food_Id', '$quantity', '$user_id', '$total_price')";
                $result=mysqli_query($conn,$sql_ins);
            }

            if ($result) {
                $quantity=$quantity-$row['quantity'];
                $alert="$quantity item added to cart. Go to <a href='/FoodFest/user/cart.php'>cart</a>";
                session_start();
                $_SESSION['alert']=$alert;
                header ("Location:$currentUrl");
                exit();
            }
        }
        else{
            $alert="Sorry! This item is out of stock for now. Please try after some time.";
            
        }
    }
    session_start();
    $_SESSION['alert']=$alert;
    header ("Location:$currentUrl");
}

?>