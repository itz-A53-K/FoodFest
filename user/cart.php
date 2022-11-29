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
    ?>
    <?php
        if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!='true'){
            header("Location:/FoodFest/account.php");
        }
        else{
            $user_id= $_SESSION['user_id'];
            
            $sql = "SELECT * FROM `cart` WHERE user_id=$user_id";
            $result = mysqli_query($conn, $sql);
            $no_ofRows= mysqli_num_rows($result);
            
            $discount=0;
            $toPay=0;
            $sno = 0;
            $cartItem=false;
            echo '
            <section class="cartContainer">
                <h1>Your Cart</h1>
                <div class="container">

                    <table class="table">
                        <h3>Items</h3>
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Food Items</th>
                                <th>Quantity</th>
                                <th>Price</th>

                            </tr>
                        </thead>

                        <tbody>';
                            
                                while($row = mysqli_fetch_assoc($result)){
                                $cartItem=true; 
                                
                                $sno= $sno+1;
                                $toPay=$row["total_price"]+$toPay;
                                echo '
                                    <tr>
                                        <th>' . $sno. '.</th>

                                        <td>
                                            <h4 class="foodName">'.$row["food_Name"].'</h4>
                                                
                                        </td>

                                        <td>' . $row["quantity"] .' </td>

                                        <td>' . $row["total_price"] .' </td>
                                        
                                            
                                    </tr>';
                                }

                            echo '
                        </tbody>
                    </table>
                </div>';

                if($cartItem){
                    if ($toPay >=1000 && $toPay<1500) {
                        $discount= floor((2/100)*$toPay);
                    }
                    else if ($toPay >=1500 && $toPay<2000) {
                        $discount= floor((4/100)*$toPay);
                    }
                    else if ($toPay >=2000) {
                        $discount= floor((8/100)*$toPay);
                    }
                    $tax=50;
                    echo '
                        <div class="container">
                            <h2>Bill Details</h2>
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <tr>
                                        <th>Total No Of Items</th>
                                        <td>'.$no_ofRows.'</td>
                    
                                    </tr>
                                    <tr>
                                        <th>Items Total</th>
                                        <td>₹'.$toPay.'</td>
                                    </tr>
                                    <tr>
                                        <th>Taxes and Charges</th>
                                        <td>₹'.$tax.'</td>
                                    </tr>
                                    <tr>
                                        <th>Discounts</th>
                                        <td>-₹'.$discount.'</td>
                                    </tr>

                                </tbody>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <p>..........................................................</p>
                                    <tr>
                                        <th>To Pay</th>
                                        <td>₹'.$toPay+$tax-$discount.'</td>
                                    </tr>
                                </tbody>
                            </table>
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