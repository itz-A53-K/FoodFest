<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <?php
    include 'partial/_dbConnect.php';
    include 'partial/_header.php';
    
        if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!='true'){
            $alert='Please <a href="/FoodFest/account.php"> login</a> first.';
            session_start();
            $_SESSION['alert']=$alert;
            header("Location:/FoodFest/index.php");
        }
        else{
            echo '
            <section class="cartContainer">';
                $user_id= $_SESSION['user_id'];
                
                $sql = "SELECT * FROM `cart` WHERE user_id=$user_id";
                $result = mysqli_query($conn, $sql);
                $no_ofRows= mysqli_num_rows($result);
                if($no_ofRows>0){
                    $discount=0;
                    $itemTotal=0;
                    $sno = 0;
                    echo '
                        <h1>Your Cart</h1>

                        <div class="table">';
                            while($row = mysqli_fetch_assoc($result)){
                                $food_id=$row["food_id"];
                                $foodName ="SELECT * FROM `food_items` WHERE food_Id=$food_id";
                                $foodName_result = mysqli_query($conn,$foodName);
                                $foodName_row = mysqli_fetch_assoc($foodName_result);

                                $sno= $sno+1;
                                $itemTotal=$row["total_price"]+$itemTotal;
                                // <div>
                                //     <img src="../img/'.$row["food_Item_img_path"].'" alt="" srcset="" class="itemImg">      
                                // </div>

                                echo '
                                    <div class="row cartItems">

                                        <div class="cartItem_Left">
                                            <h4 class="foodName">'.$foodName_row["food_Name"].'</h4>
                                                
                                        </div>
                                        <div class="cartItem_Right">
                                            <div>x'.$row["quantity"].' </div>

                                            <div>₹'.$row["total_price"].' </div>
                                        </div>
                                    </div>';   
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

                                        <p>'.$no_ofRows.' </p>
                                    
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
                                        if($no_ofRows>3){
                                            $tax*=$no_ofRows;
                                            echo '<del>&nbsp;₹&nbsp;'.$tax.'&nbsp;</del>&nbsp;&nbsp; FREE';
                                            $tax=0;
                                        }
                                        else{
                                            $tax*=$no_ofRows;
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

                                        <div>To Pay</div> 
                                        <div>₹'.$itemTotal+$tax-$discount.' </div>
                                    
                                    </div>
                            </div>';

                            $address="SELECT * FROM `users` WHERE user_id=$user_id";
                            $address_result=mysqli_query($conn,$address);
                            $address_row=mysqli_fetch_assoc($address_result);

                            // if($address_row['address']==""|| $address_row['ph_No']=="0"){
                                // <form action="partial/_saveDetails.php" method="post" class="saveAddress">
                                echo '
                                    <form action="checkout.php" method="post" class="saveAddress">
                                        <input type="hidden" name="user_id" value="'.$user_id.'">
                                        <label for="address">Delivery address :</label>
                                        <textarea name="address" id="" cols="30" rows="10" placeholder="Please enter your delivery address"  required>'.$address_row['address'].'</textarea>
                                        <label for="ph_No">Phone no.</label>
                                        <input type="text" name="ph_No" id="ph_No" minlength="10" maxlength="10" value="'.$address_row['ph_No'].'"required>
                                        
                                        <input type="hidden" name="toPay" value="'.$itemTotal+$tax-$discount.'">
                                        <input type="hidden" name="user_id" value="'.$user_id.'">
                                        <button type="submit" class="checkoutBtn">Checkout</button>
                                        </form>
                                        </div>';
                                        // <button type="submit" class="btn" >Submit</button>
                                        // <form action="checkout.php" method="post" style="width:100%;display:flex;">
                                    // }
                    
                        
                }
                else{
                    echo ' <h1>Your Cart is empty. Add some items to cart first.</h1>';
                }
        echo '
            </section>';
        }
    ?>


    <footer>
        <h1>Copyright &copy; FoodFest.com</h1>
        <p>Prepared by: Abinash, Samir.</p>
    </footer>
    <script src="/FoodFest/script.js"></script>
    <script src="js/logout.js"></script>
</body>

</html>