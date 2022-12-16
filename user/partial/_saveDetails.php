<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    include '_dbConnect.php';
    $address=$_POST['address'];
    $user_id=$_POST['user_id'];
    $ph_NO=$_POST['ph_No'];
    echo $address;
    echo $user_id;
    echo $ph_NO;
    $sql="UPDATE `users` SET `address`='$address',`ph_No`='$ph_NO' WHERE `users`. user_id=$user_id";
    $result=mysqli_query($conn,$sql);

    if($result){
        $alert="Your delivery address has been set successfully.";
        session_start();
        $_SESSION['alert']=$alert;
        header('Location:../cart.php');
    }
}