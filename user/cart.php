<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="css/utils.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <?php
    include 'partial/_dbConnect.php';
    include 'partial/_header.php';
    
        if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!='true'){
            header("Location:/FoodFest/account.php");
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
                                    
                                    </div>';
                            echo '
                            </div>
                        </div>';
                    
                        
                }
                else{
                    echo ' <h1>No Cart item yet . Add some items first.</h1>';
                }
        echo '
            </section>';
        }
    ?>

    <div class="logoutModal hidden">
        <h3>Do you really want to logout?</h3>
        <div>
            <button class="btn cancelBtn">Cancel</button>
            <form action="partial/_logoutFunctional.php" method="post">
                <input type="hidden" name="currentUrl" value="<?php echo $_SERVER['REQUEST_URI'];?>">
                <button type="submit" class="btn">Logout</button>
            </form>
        </div>
    </div>
    <script src="/FoodFest/script.js"></script>
    <script src="js/logout.js"></script>
</body>

</html>