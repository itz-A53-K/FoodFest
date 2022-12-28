<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    session_start();
    include '_dbConnect.php';

    $order_id=$_POST['order_id'];
    $feedback=$_POST['feedback'];

    $sql="UPDATE `orders` SET `feedback` = '$feedback' WHERE `orders`.`order_id` = $order_id";
    $result=mysqli_query($conn,$sql);
    if($result){
        $alert="Feedback submitted successfully. <b>Thank You For Your Valuable Feedback .</b>";
        $_SESSION['alert']=$alert;
        header('Location:/FoodFest/user/profile.php');
    }
    else{
        $alert="Some error occured; Feedback cannot be submitted. Please try again.";
        $_SESSION['alert']=$alert;
        header('Location:/FoodFest/user/profile.php');
    }
}
    
?>
