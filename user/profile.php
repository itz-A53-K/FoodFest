<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/header_footer.css">
</head>

<body>
    <?php
        include 'partial/_dbConnect.php';
        include 'partial/_header.php';
        $user_id=$_SESSION['user_id'];
        
        
        if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!='true'){
            header("Location:/FoodFest/account.php");
        }
        else{
            echo '
            <div class="body2">';

            include 'partial/_alert.php';
            
            echo '
                <section class="profile">
                    <h1>Profile</h1>
                    <div class="img"> <img src="/FoodFest/img/userProfile.png" alt="" srcset=""></div>
                    <div class="profileCard">';

                        $sql="SELECT * FROM `users` WHERE user_id=$user_id";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);

                        echo' 
                        <h2>Name :     <em>'.$row['userName'].'</em></h2>
                        <h2>Email :    <em>'.$row['email'].'</em></h2>
                        <h2>Phone No. :<em>'.$row['ph_No'].'</em></h2>
                        <h2>Address :  <em>'.$row['address'].'</em></h2>
                        ';
                    echo '
                    </div>
                </section>
                
                <section class="myOrders">
                    <h1>My Orders</h1>';
                    $orders="SELECT * FROM `orders` WHERE user_id=$user_id ORDER BY `order_id` DESC";
                    $orders_result=mysqli_query($conn,$orders);
                    $noOfRows=mysqli_num_rows($orders_result);
                    $sno=$noOfRows+1;
                    if($noOfRows==0){
                        echo '<div class="orderCard">
                        <b>No Order Yet !</b> Try ordering some delicious foods <a style="color:rgb(205, 16, 212); text-decoration:underline;" href="/FoodFest/user/food_Item.php">here.</a>
                        </div>';
                    }
                    else{
                        while($row=mysqli_fetch_assoc($orders_result)){
                            $sno-=1;
                            $orderStatus="";
                            if($row['order_status']=="new"){
                                $orderStatus="Yet to accept the order";
                            }
                            else{
                                $orderStatus=$row['order_status'];
                            }
                            echo '
                            <div class="orderCard ">
                                <div class="order">
                                    <div>
                                        <h2>order '.$sno.'</h2>
                                        <p>Total Price: <b>'.$row['grand_total'].'</b></p>
                                        <p>Date:  '.substr($row['order_time'],0,10).'</p>
                                        <p>Status:  <b>'.$orderStatus.'</b></p>
                                    </div>    
                                    <button class="more" id="'.$row['order_id'].'">></button>
                                </div>';
                            if($row['order_status']=="Delivered") {
                                if($row['feedback']==""){
                                    echo '
                                    <form class="feedbackDiv" method="post" action="partial/_feedback.php">
                                        <label for="feedback">Give Your Feedback</label>
                                        <textarea type="text" name="feedback" id="feedback"  placeholder="Your feedback is valuable to us. Tell us your opinion on this product :)" maxlength="500" wrap="hard"></textarea>
                                        <input type="hidden" name="order_id" value="'.$row['order_id'].'">
                                        <input class="button" type="submit" value="Submit">
                                    </form>';
                                }
                                else{
                                    echo ' <h2 style="margin:5px 0"> Thank You For Your Feedback.</h2>';
                                }
                            }
                                echo '
                                <div class="orderDetails hidden" id="orderDetails'.$row['order_id'].'">
                                    <div class="table ">';
                                    $order_id=$row['order_id'];
                                    $food="SELECT * FROM `ordered_list` WHERE order_id=$order_id";
                                    $food_result=mysqli_query($conn,$food);
                                    $food_noOfRows=mysqli_num_rows($food_result);
                                    
                                    $itemTotal=0;
                                    $discount=0;

                                    while($food_row=mysqli_fetch_assoc($food_result)){
                                        
                                        $food_Id=$food_row['food_id'];
                                        $foodName="SELECT * FROM `food_items` WHERE food_Id=$food_Id";
                                        $foodName_result=mysqli_query($conn,$foodName);
                                        $foodName_row=mysqli_fetch_assoc($foodName_result);

                                        $itemTotal=$food_row["total_price"]+$itemTotal;
                                        echo '
                                        <div class="row cartItems">

                                                <div class="cartItem_Left">
                                                    <h4 class="foodName">'.$foodName_row["food_Name"].'</h4>
                                                        
                                                </div>
                                                <div class="cartItem_Right">
                                                    <div>x'.$food_row["quantity"].' </div>

                                                    <div>₹'.$food_row["total_price"].' </div>
                                                </div>
                                            </div>  
                                        
                                        ';
                                    }
                                    if ($itemTotal >=500 && $itemTotal<1000) {
                                
                                        $discount= floor((4/100)*$itemTotal);
                                        }
                                        else if ($itemTotal >=1000 && $itemTotal<1500) {
                                            $discount= floor((6/100)*$itemTotal);
                                        }
                                        else if ($itemTotal >=1500) {
                                            $discount= floor((8/100)*$itemTotal);
                                        }
                                        $tax=23;
                                        echo '
                                        <div class="billDetails">
                                            <h2>Bill Details</h2>
                                                <div class="row">
            
                                                    <div>
                                                        <h4>No. Of Items</h4> 
                                                    </div>
            
                                                    <p>'.$food_noOfRows.' </p>
                                                
                                                </div>
                                                <div class="row">
            
                                                    <div>
                                                        <h4>Items Total</h4> 
                                                    </div>
            
                                                    <p>₹'.$itemTotal.' </p>
                                                
                                                </div>
                                                <div class="row">
            
                                                    <div>
                                                        <h4>Taxes and Charges</h4> 
                                                    </div>
            
                                                    <p>';
                                                    if($food_noOfRows>3){
                                                        $tax*=$food_noOfRows;
                                                        echo '<del>&nbsp;₹&nbsp;'.$tax.'&nbsp;</del>&nbsp;&nbsp; FREE';
                                                        $tax=0;
                                                    }
                                                    else{
                                                        $tax*=$food_noOfRows;
                                                        echo '₹'.$tax;
                                                    }
                                                    echo ' </p>
                                                
                                                </div>
                                                <div class="row">
            
                                                    <div>
                                                        <h4>Discounts</h4> 
                                                    </div>
            
                                                    <p>-₹'.$discount.' </p>
                                                
                                                </div>
                                                <hr>
                                                <div class="row grandTotal">
            
                                                    <div>Total Price</div> 
                                                    <div>₹'.$itemTotal+$tax-$discount.' </div>
                                                
                                                </div>
                                        </div>';
                                    echo '
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    }
                
                echo '
                </section>
            </div>
            ';
            // <footer>
            //     <h1>Copyright &copy; FoodFest.com</h1>
            //     <p>Prepared by: Abinash, Samir.</p>
            // </footer>
        }
        ?>
    <script src="/FoodFest/script.js"></script>
    <script src="js/logout.js"></script>
    <script>
    setTimeout("location.reload(true);", 120000);
    </script>
</body>

</html>