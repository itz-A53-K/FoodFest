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
    include 'user/partial/_header.php';
    include 'user/partial/_dbConnect.php';
    ?>
    <section class="homeBody">
        <div class="foodCategory" id="foodCategory">
            <h3>Categories</h3>
            <div class="categories">
                <?php
            $sql= "SELECT * FROM `food_categories`";
            $result= mysqli_query($conn,$sql);

            while($row=mysqli_fetch_assoc($result)){
                echo '
                    <div class="categoryItem">
                        <a href="/FoodFest/user/food_Item.php?category_id='. $row["category_id"].'"><img src="img/'.$row["category_img_path"].'" alt="" srcset=""></a>

                        <a href="/FoodFest/user/food_Item.php?category_id='. $row["category_id"].' " class="foodName">'.$row["category_name"].'</a>

                    </div>';
            }
            ?>
            </div>
        </div>
    </section>
    <div class="logoutModal hidden">
        <h3>Do you really want to logout?</h3>
        <div>
            <button class="btn cancelBtn">Cancel</button>
            <form action="user/partial/_logoutFunctional.php" method="post">
                <input type="hidden" name="currentUrl" value="<?php echo $_SERVER['REQUEST_URI'];?>">
                <button type="submit" class="btn">Logout</button>
            </form>
        </div>
    </div>
    <script src="/FoodFest/script.js"></script>
    <script src="/FoodFest/user/js/logout.js"></script>
</body>

</html>