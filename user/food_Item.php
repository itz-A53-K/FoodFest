<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest - Food items</title>
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_footer.css">
</head>

<body>
    <?php
    include 'partial/_dbConnect.php';
    include 'partial/_header.php';
    ?>
    <div class="foodItemContainer">
        <?php
        

            $method=$_SERVER['REQUEST_METHOD'];
            if ($method=="POST" ) {

                $query=$_POST['query'];
                $checkSrcInp="SELECT * FROM `food_items` WHERE match (food_Name,food_Desc) against('$query')";
                $result=mysqli_query($conn,$checkSrcInp);
                $srcResults=false;   
                
                echo'    
                <div class="searchResults">
                
                <div>
                <h2>Search results for : <em>&nbsp;'. $query.'</em></h2>
                ';


                while ($srcRow=mysqli_fetch_assoc($result)) {

                    $srcResults=true;
                    echo '
                        <div class="card">
                            <img src="../img/'.$srcRow["food_Item_img_path"].'" alt="" srcset="">
                            <div>
                                <h4 class="foodName">'.$srcRow["food_Name"].'</h4>
                                <span>₹'.$srcRow["price"].'</span> 
                                <p>'.$srcRow["food_Desc"].'</p>

                                <form action="partial/_addToCart.php" method="post" >
                                    <input type="hidden" value="'.$srcRow["food_Id"].'" name="food_Id">
                                    <input type="hidden" value="'. $_SERVER['REQUEST_URI'].'" name="currentUrl">
                                    <input type="number" name="quantity" id="" value="1">';
                                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true'){
                                            // header("Location:/FoodFest/account.php");
                                            echo '<input type="hidden" name="user_id" id="" value="'.$_SESSION['user_id'].'">
                                            <button class="btn" type="submit">Add to cart</button>';
                                        }
                                        else{
                                            echo '<button class="btnDisable">Add to card</button>';
                                        }
                                echo '   
                                </form> 
                            </div>
                        </div>   
                    ';
                }

                if (!$srcResults) {
                    echo nl2br('<h3>No match found for "<em>'.$query.'</em>"</h3>
                    <h5> Suggestions:

                    &nbsp;&nbsp;I) Make sure that all words are spelled correctly.
                    &nbsp;&nbsp;II) Try different food name.</h5>');
                }
                echo '
                </div>
                </div>';
            }

            else{
                
                $category_id= $_GET['category_id'];
                $sql= "SELECT * FROM `food_items` WHERE category_id = $category_id";
                $result = mysqli_query($conn,$sql);

                echo '<h2>Food Items</h2>';
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                        <div class="card">
                            <img src="../img/'.$row["food_Item_img_path"].'" alt="" srcset="">
                        
                            <div>
                                <h4 class="foodName">'.$row["food_Name"].'</h4>
                                <span>₹'.$row["price"].'</span> 
                                <p>'.$row["food_Desc"].'</p>
                        
                                <form action="partial/_addToCart.php" method="post" >
                                    <input type="hidden" value="'.$row["food_Id"].'" name="food_Id">
                                    <input type="hidden" value="'. $_SERVER['REQUEST_URI'].'" name="currentUrl">
                                    <input type="number" name="quantity" id="" value="1">';
                                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true'){
                                            // header("Location:/FoodFest/account.php");
                                            echo '<input type="hidden" name="user_id" id="" value="'.$_SESSION['user_id'].'">
                                            <button class="btn" type="submit">Add to cart</button>';
                                        }
                                        else{
                                            echo '<button class="btnDisable">Add to card</button>';
                                        }
                                echo '   
                                </form> 
                            </div>
                        </div>   
                    ';
                }
            }
        
        ?>
    </div>

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