<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest - Welcome to Food Fest</title>
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
    $srcInp=$_GET['srcInp'];
    $checkSrcInp="SELECT * FROM `food_items` WHERE match (food_Name,food_Desc) against('$srcInp')";
    $result=mysqli_query($conn,$checkSrcInp);
    $srcResults=false;
    
    ?>
    <section class="searchResults">
        <h1>Search results for : <em><?php echo $srcInp?></em></h1>
        <div>
            <?php
               while ($row=mysqli_fetch_assoc($result)) {
                
            //         $srcResults=true;
            echo '
            <div class="line">
                <img src="img/burger.jpeg" alt="" srcset="">

                <h4 class="foodName">'.$row["food_Name"].'</h4>
                <span>₹'.$row["price"].'</span>
                <p>'.$row["food_Desc"].'</p>

            </div>';
                    
                      
               }
            ?>
        </div>
    </section>


</body>

</html>