<?php
    include '_dbConnect.php';
if (isset($_GET['btn'])) {
    $btn=$_GET['btn'];
    // $url=$_GET['url'];


    
    if($btn=="delivered"){
        $orders= "SELECT * FROM `cart` WHERE status='delivered'";
        $result=mysqli_query($conn,$orders);

        while($row=mysqli_fetch_assoc($result))
        {
            echo '
                <a href="bla">
                    <div class="taskCard">
                        <div class="taskDetails">
                            <p>Task Name</p>
                            <span>Order Time</span>
                        </div>
                        <div class="price">
                            <h2>₹'.$row['total_price'].'</h2>
                        </div>
                    </div>
                </a>
            ';
            exit();
            // header("Location:$url");
        }
    }
    else if($btn=="preparing"){
        $orders= "SELECT * FROM `cart` WHERE status='preparing'";
        $result=mysqli_query($conn,$orders);

        while($row=mysqli_fetch_assoc($result))
        {
            echo '
                <a href="bla">
                    <div class="taskCard">
                        <div class="taskDetails">
                            <p>Task Name</p>
                            <span>Order Time</span>
                        </div>
                        <div class="price">
                            <h2>₹'.$row['total_price'].'</h2>
                        </div>
                    </div>
                </a>
            ';
            exit();
            // header("Location:$url");
        }
    }
}
else{
    $orders= "SELECT * FROM `cart` WHERE status='new'";
    $result=mysqli_query($conn,$orders);

    while($row=mysqli_fetch_assoc($result))
    {
        echo '
            <a href="bla">
                <div class="taskCard">
                    <div class="taskDetails">
                        <p>Task Name</p>
                        <span>Order Time</span>
                    </div>
                    <div class="price">
                        <h2>₹'.$row['total_price'].'</h2>
                    </div>
                </div>
            </a>
        ';
        exit();
        // header("Location:$url");
    }
    
}


?>