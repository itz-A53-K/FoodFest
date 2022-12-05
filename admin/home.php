<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest Admin Panel</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/addItem.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/modifyItem.css">
</head>

<body class="body" id="body">
    <div class="body2">
        <?php
        include 'partial/_dbConnect.php';
        include 'partial/_Ad_Header.php';
        ?>

        <section class="taskMenu">
            <?php
            echo '
            <h1>Task List</h1>
            <p>Date :&nbsp;'.date("M j , Y").' </p>
            <div class="taskBtnSec">
                <input type="hidden" name="currentUrl" value="cur">
                <a href="/FoodFest/admin/home.php"><button type="submit" id="newBtn" class="taskBtn ClickedTaskBtn">New</button></a>
                <a  href="?btn=preparing"><button type="submit" id="preparing" class="taskBtn">Preparing</button></a>
                <a href="?btn=delivered"><button type="submit" id="delivered" class="taskBtn">Delivered</button></a>
            </div>';
            ?>
            <hr>
            <div class="taskList">
                <?php
                include 'partial/_taskList.php';
                ?>
            </div>
        </section>
        <section class="orderedItem">
            <h2>Task Info</h2>
            <div class="orderedItemList">
                <div class="table">
                    <?php
                        if (isset($_GET['taskId'])) {
                            $taskId=$_GET['taskId'];

                            $order_list="SELECT * FROM `ordered_list` WHERE order_id=$taskId";
                            $result=mysqli_query($conn,$order_list);
                            $sno=0;
                            $grand_total=0;

                            while($row = mysqli_fetch_assoc($result)){
                                $food_id=$row["food_id"];
                                $item="SELECT * FROM `food_items` WHERE food_Id=$food_id";
                                $itemResult=mysqli_query($conn,$item);
                                if ($itemRow=mysqli_fetch_assoc($itemResult)) {
                                    $grand_total+=$row["total_price"];
                                    $sno= $sno+1;
                                    // <div>' . $sno. '.</div>
                                    echo '
                                        <div class="row">
                                            <div>
                                                <img src="../img/'.$itemRow["food_Item_img_path"].'" alt="" srcset="" class="itemImg">
                                                    
                                            </div>

                                            <div>
                                                <h4 class="foodName">'.$itemRow["food_Name"].'</h4>
                                                    
                                            </div>

                                            <div>x'.$row["quantity"].' </div>

                                            <div>₹'.$row["total_price"].' </div>
                                            
                                        </div>
                                        ';
                                }
                            }
                            echo '
                            <h1 class="grandTotal">₹'.$grand_total.'</h1>';
                        }
                        else{
                            echo '<h2>No task selected.</h2>';
                        }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <script src="js/home.js"></script>
    <script src="/FoodFest/script.js"></script>
</body>

</html>