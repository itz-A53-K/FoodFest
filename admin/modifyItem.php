<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest Admin Panel</title>
    <link rel="stylesheet" href="css/addItem.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/modifyItem.css">
</head>

<body class="body" id="body">
    <div class="body2">
        <?php
            include 'partial/_dbConnect.php';
            include 'partial/_Ad_Header.php';
            $currentUrl= $_SERVER["REQUEST_URI"];
            
            if(!isset($_SESSION['adminLoggedin']) && $_SESSION['adminLoggedin']!='true'){
                header("Location:/FoodFest/account.php");
            }
            else{
                echo '
                <section class="menu">
                ';
                include 'partial/_alert.php';
                echo '
                        <form class="searchForm form" id="search" method="post" action="'. $currentUrl.'">
                            <div>
                                <input type="search" name="query_adp" placeholder="Serch food item here">
                            </div>
                            

                        </form>
                        <div class="foodItemList">';

                            $method=$_SERVER['REQUEST_METHOD'];
                            if ($method=="POST" ) {

                                $query_adp=$_POST['query_adp'];
                                $checkSrcInp="SELECT * FROM `food_items` WHERE match (food_Name,food_Desc) against('$query_adp')";
                                $result=mysqli_query($conn,$checkSrcInp);
                                $srcResults=false;   
                                
                                echo'    
                                <div class="searchResults">
                                
                                <div>
                                <h2>Search results for : <em>&nbsp;'. $query_adp.'</em></h2>
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
                                                <span>Item Available :'.$srcRow["item_Available"].'</span>
                                                <span class="hidden">'.$srcRow["food_Id"].'</span>
                                                <span class="hidden">'.$srcRow["category_id"].'</span>

                                                <button class="modifyBtn" id="'.$srcRow["food_Id"].'">Modify</button>  
                                            </div>    

                                        </div>
                                    ';
                                }

                                if (!$srcResults) {
                                    echo nl2br('<h3>No match found for "<em>'.$query_adp.'</em>"</h3>
                                    <h5> Suggestions:

                                    &nbsp;&nbsp;I) Make sure that all words are spelled correctly.
                                    &nbsp;&nbsp;II) Try different food name.</h5>');
                                }
                                echo '
                                </div>
                                </div>';
                            }

                            else{
                                
                                $sql= "SELECT * FROM `food_items`";
                                $result = mysqli_query($conn,$sql);

                                echo '<h2>Food Items</h2>';
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '
                                        <div class="card">
                                            <img src="../img/'.$row["food_Item_img_path"].'" alt="" srcset="">
                                            <div>
                                                <h4 class="foodName">'.$row["food_Name"].'</h4>
                                                <span>₹'.$row["price"].'</span>
                                                <span>Item Available :'.$row["item_Available"].'</span>
                                                <p>'.$row["food_Desc"].'</p>
                                                <span class="hidden">'.$row["food_Id"].'</span>
                                                <span class="hidden">'.$row["category_id"].'</span>

                                                <button class="modifyBtn" id="'.$row["food_Id"].'">Modify</button> 
                                            </div>
                                        </div>
                                    ';
                                }
                            }
                            echo '
                        </div>

                        <div class="modifyFormModal hidden" id="modifyFormModal">
                            <form action="partial/_modifyItemFunctional.php" method="post" enctype="multipart/form-data"
                                class="form">
                                <span class="close" id="modifyCancelBtn">&times;</span>
                                <div>
                                    <label for="editFood_name">Item Name :</label>
                                    <input type="text" name="editFood_name" id="editFood_name" value="">
                                </div>
                                <div>
                                    <label for="editFood_desc">Item Description :</label>
                                    <textarea name="editFood_desc" id="editFood_desc" cols="30" rows="10"></textarea>
                                </div>
                                <div>
                                    <label for="editPrice">Item Price :</label>
                                    <input type="number" name="editPrice" id="editPrice">
                                </div>

                                <div>
                                    <label for="editCategory">Category</label>
                                    <select name="editCategory" id="editCategory">
                                        <option value="1">Burger</option>
                                        <option value="2">Biryani</option>
                                        <option value="3">Rolls</option>

                                    </select>
                                </div>
                                <div>
                                    <label for="editItem_Available">Is Item Available?</label>
                                    <select name="editItem_Available" id="editItem_Available">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>

                                    </select>
                                </div>

                                <div>
                                    <label for="editFood_img">Item Image :</label>
                                    <input type="file" name="editFood_img" id="editFood_img">
                                </div>

                                <input type="hidden" name="editFood_Id" id="editFood_Id" value="">
                                <button type="submit">Modify Item</button>

                            </form>

                        </div>

                        <a href="#search" class="goToTop" id="goToTop"><button>Go To Top</button></a>
                    </section>';
            }
        ?>
    </div>
    <script src="js/modifyItem.js"></script>
    <script src="/FoodFest/script.js"></script>
    <script src="js/adminLogout.js"></script>
</body>

</html>