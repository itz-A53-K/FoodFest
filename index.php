<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest - Welcome to Food Fest</title>
    <link rel="stylesheet" href="user/css/utils.css">
    <link rel="stylesheet" href="user/css/index.css">
    <link rel="stylesheet" href="user/css/header_footer.css">
</head>

<body>
    <?php 
    unset($_SESSION['alert']);
    include 'user/partial/_header.php';
    include 'user/partial/_dbConnect.php';
    ?>
    <section class="homeBody">
        <?php
            include 'user/partial/_alert.php';
        ?>


        <div class="foodCategory" id="foodCategory">
            <h3>Categories</h3>
            <div class="categories">
                <?php
            $sql= "SELECT * FROM `food_categories`";
            $result= mysqli_query($conn,$sql);

            while($row=mysqli_fetch_assoc($result)){
                echo '
                <a href="/FoodFest/user/food_Item.php?category_id='. $row["category_id"].'">
                    <div class="item_card">
                        <div class="img">
                            <img src="/FoodFest/img/'.$row['category_img_path'].'" alt="" srcset="">
                        </div>
                        <div class="desc">
                            <a href="/FoodFest/user/food_Item.php?category_id='. $row["category_id"].' " class="foodName">'.$row["category_name"].'</a>
                        </div>
                    </div>
                </a>';
                    
            }
            ?>
            </div>
        </div>
        <div class="popular">
            <div class="header">
                <h3>Our Popular Dishes</h3>
                <button class="seeAll"><a href="/FoodFest/user/food_Item.php">See All >></a></button>
            </div>
            <div class="popularItems">
                <?php
                    echo '
                    <a href="/FoodFest/user/food_Item.php">
                        <div class="item_card">';
                            $sql= "SELECT * FROM `food_items` WHERE food_Id=22";
                            $result= mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                            echo '
                            <div class="img">
                            <img src="/FoodFest/img/'.$row['food_Item_img_path'].'" alt="" srcset="">
                            </div>
                            <div class="desc">
                                <h4>'.$row['food_Name'].'</h4>
                                <p>'.$row['food_Desc'].'</p>
                            </div>
                        </div>
                    </a>
                    <a href="/FoodFest/user/food_Item.php">
                        <div class="item_card">';
                            $sql= "SELECT * FROM `food_items` WHERE food_Id=5";
                            $result= mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                            echo '
                            <div class="img">
                                <img src="/FoodFest/img/'.$row['food_Item_img_path'].'" alt="" srcset="">
                            </div>
                            <div class="desc">
                                <h4>'.$row['food_Name'].'</h4>
                                <p>'.$row['food_Desc'].'</p>
                            </div>
                        </div>
                    </a>
                    <a href="/FoodFest/user/food_Item.php">
                        <div class="item_card">';
                            $sql= "SELECT * FROM `food_items` WHERE food_Id=14";
                            $result= mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                            echo '
                            <div class="img">
                                <img src="/FoodFest/img/'.$row['food_Item_img_path'].'" alt="" srcset="">
                            </div>
                            <div class="desc">
                                <h4>'.$row['food_Name'].'</h4>
                                <p>'.$row['food_Desc'].'</p>
                            </div>
                        </div>
                    </a>
                    
                    
                    ';
                ?>
            </div>
            <div class="popularItems">
                <?php
                    echo '
                    
                    <a href="/FoodFest/user/food_Item.php">
                        <div class="item_card">';
                            $sql= "SELECT * FROM `food_items` WHERE food_Id=12";
                            $result= mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                            echo '
                            <div class="img">
                            <img src="/FoodFest/img/'.$row['food_Item_img_path'].'" alt="" srcset="">
                            </div>
                            <div class="desc">
                                <h4>'.$row['food_Name'].'</h4>
                                <p>'.$row['food_Desc'].'</p>
                            </div>
                        </div>
                    </a>
                    <a href="/FoodFest/user/food_Item.php">
                        <div class="item_card">';
                            $sql= "SELECT * FROM `food_items` WHERE food_Id=2";
                            $result= mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                            echo '
                            <div class="img">
                                <img src="/FoodFest/img/'.$row['food_Item_img_path'].'" alt="" srcset="">
                            </div>
                            <div class="desc">
                                <h4>'.$row['food_Name'].'</h4>
                                <p>'.$row['food_Desc'].'</p>
                            </div>
                        </div>
                    </a>
                    <a href="/FoodFest/user/food_Item.php">
                        <div class="item_card">';
                            $sql= "SELECT * FROM `food_items` WHERE food_Id=18";
                            $result= mysqli_query($conn,$sql);
                            $row=mysqli_fetch_assoc($result);
                            echo '
                            <div class="img">
                                <img src="/FoodFest/img/'.$row['food_Item_img_path'].'" alt="" srcset="">
                            </div>
                            <div class="desc">
                                <h4>'.$row['food_Name'].'</h4>
                                <p>'.$row['food_Desc'].'</p>
                            </div>
                        </div>
                    </a>
                   
                    ';
                ?>

            </div>
            <button class="seeAll"><a href="/FoodFest/user/food_Item.php">See All >></a></button>
        </div>


        <div class="about" id="about">
            <h3>About Us</h3>
            <div>
                <p>
                    Welcome to FoodFest, the premier online destination for ordering food .
                </p>
                <p>
                    At FoodFest, we are passionate about bringing people and food together.
                    Our website is designed to be user-friendly and intuitive, so you can find and order from our
                    restaurant with just a few clicks. Whether you're in the mood for rolls, biryani or burgers , we've
                    got you covered.</p>
                <p>
                    Thank you for choosing
                    FoodFest – we look forward to serving you soon!
                </p>
            </div>
        </div>

    </section>


    <footer>
        <h1>Copyright &copy; FoodFest.com</h1>
        <p>Designed & developed by: Abinash, Samir.</p>
    </footer>
    <script src="/FoodFest/script.js"></script>
    <script src="/FoodFest/user/js/logout.js"></script>
</body>

</html>