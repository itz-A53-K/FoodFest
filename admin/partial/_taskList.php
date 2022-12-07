<?php
    include '_dbConnect.php';
    if (isset($_GET['btn'])) {
        $btn=$_GET['btn'];
        // $url=$_SERVER["REQUEST_URI"];


        
        if($btn=="delivered"){
            $orders= "SELECT * FROM `orders` WHERE order_status='delivered' ORDER BY `order_id` DESC";
            $result=mysqli_query($conn,$orders);

            while($row=mysqli_fetch_assoc($result))
            {
                echo '
                    <a href="'.$_SERVER['REQUEST_URI'].'&taskId='.$row["order_id"].'">
                        <div class="taskCard">
                            <div class="taskDetails">
                                <p>Task #'.$row["order_id"].'</p>
                                <span>'.$row["order_time"].'</span>
                            </div>
                            <div class="price">
                                <h2>₹'.$row["grand_total"].'</h2>
                                <p> '.$row["order_status"].'</p>
                            </div>
                        </div>
                    </a>
                ';
                
            }
            if(mysqli_num_rows($result) == 0){
                echo '
                        <h2>No Task Available !
                    
                ';
            }
        }
        else if($btn=="preparing"){
            $orders= "SELECT * FROM `orders` WHERE order_status='preparing' ORDER BY `order_id` DESC";
            $result=mysqli_query($conn,$orders);

            while($row=mysqli_fetch_assoc($result))
            {
                echo '
                <a href="'.$_SERVER['REQUEST_URI'].'&taskId='.$row["order_id"].'">
                    <div class="taskCard">
                        <div class="taskDetails">
                            <p>Task #'.$row["order_id"].'</p>
                            <span>'.$row["order_time"].'</span>
                        </div>
                        <div class="price">
                            <h2>₹'.$row['grand_total'].'</h2>
                            <p> '.$row["order_status"].'</p>
                        </div>
                    </div>
                </a>
                ';
                // exit();
                // header("Location:$url");
            }
            if(mysqli_num_rows($result) == 0){
                echo '
                        <h2>No Task Available !
                    
                ';
            }
        }
    }
    else{
        $orders= "SELECT * FROM `orders` WHERE order_status='new' ORDER BY `order_id` DESC";
        $result=mysqli_query($conn,$orders);

        while($row=mysqli_fetch_assoc($result))
        {
            echo '
            <a href="?taskId='.$row["order_id"].'">
            <div class="taskCard">
                <div class="taskDetails">
                    <p>Task #'.$row["order_id"].'</p>
                    <span>'.$row["order_time"].'</span>
                </div>
                <div class="price">
                    <h2>₹'.$row['grand_total'].'</h2>
                    <p> '.$row["order_status"].'</p>
                </div>
            </div>
        </a>
            ';
            // exit();
            // header("Location:$url");
        }
        if(mysqli_num_rows($result) == 0){
            echo '
                    <h2>No Task Available !
                
            ';
        }
        
    }


?>