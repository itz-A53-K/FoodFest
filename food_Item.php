<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest - Food items</title>
    <link rel="stylesheet" href="user/css/utils.css">
    <link rel="stylesheet" href="user/css/style.css">
    <link rel="stylesheet" href="user/css/header_footer.css">
</head>
<body>
    <?php
    include 'user/partial/_dbConnect.php';
    include 'user/partial/_header.php';
    ?>
    <?php
    $category_id= $_GET['category_id'];
    $sql= "SELECT * FROM `food_items` WHERE category_id = $category_id";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){

echo '
<div class="line">
    <img src="img/burger.jpeg" alt="" srcset="">

    <h4 class="foodName">'.$row["food_Name"].'</h4>
    <span>₹'.$row["price"].'</span>
    <p>'.$row["food_Desc"].'</p>

</div>';
        
    }     
   
   ?>

</body>
</html>