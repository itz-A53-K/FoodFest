<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest Admin Panel</title>
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body id="body">
    <div class="body2">
        <?php
        include 'partial/_dbConnect.php';
        include 'partial/_Ad_Header.php';
        ?>

        <section class="menu">

            <h1>Add new food item</h1>

            <form action="partial/_addItemFunctional.php" method="post" enctype="multipart/form-data" class="form">
                <div>
                    <label for="food_name">Item Name :</label>
                    <input type="text" name="food_name" id="food_name" required>
                </div>
                <div>
                    <label for="food_desc">Item Description :</label>
                    <textarea name="food_desc" id="food-desc" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <label for="price">Item Price :</label>
                    <input type="number" name="price" id="price" required>
                </div>
                <div>
                    <label for="item_Available">Is Item Available?</label>
                    <select name="item_Available" id="item_Available" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>

                    </select>
                </div>
                <div>
                    <label for="category_Id">Choose Food Category :</label>
                    <select name="category_Id" id="category_Id" required>
                        <option value="select_category">--Select Category--</option>

                        <?php
                        $showCategory="SELECT * FROM `food_categories`";
                        $showCategoryResult=mysqli_query($conn,$showCategory);
                        while($row=mysqli_fetch_assoc($showCategoryResult)){
                            echo '
                            <option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
                        }
                            ?>
                    </select>
                </div>

                <div>
                    <label for="food_img">Item Image :</label>
                    <input type="file" name="food_img" id="food_img" required>
                </div>
                <div>
                    <button type="submit">Add Item</button>
                </div>
            </form>

            <!-- <a href="#body" class="goToTop" id="goToTop"><button >Go To Top</button></a> -->
        </section>
    </div>
    <script src="/FoodFest/script.js"></script>
</body>

</html>