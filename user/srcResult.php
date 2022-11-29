<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest - Welcome to Food Fest</title>
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_footer.css">
</head>

<body>
    <?php
    include 'partial/_dbConnect.php';
    include 'partial/_header.php';
    ?>
    <?php
    $query=$_GET['query'];
    $checkSrcInp="SELECT * FROM `food_items` WHERE match (food_Name,food_Desc) against('$query')";
    $result=mysqli_query($conn,$checkSrcInp);
    $srcResults=false;   
    ?>

    <section class="searchResults">
        <h1>Search results for : <em><?php echo $query?></em></h1>
        <div>
            <?php
            
                while ($row=mysqli_fetch_assoc($result)) {
                    
                    $srcResults=true;
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
                                    <input type="number" name="quantity" id="" value="1">
                                    <button class="btn" type="submit">Add to cart</button>
                                </form> 
                            </div>
                        </div>';      
                }

                if (!$srcResults) {
                    echo 'No match found for "<em>'.$query.'</em>"';
                }
            ?>
        </div>
    </section>


</body>

</html>