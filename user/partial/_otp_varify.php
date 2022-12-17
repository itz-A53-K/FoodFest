<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST") {
    echo $_POST['otp'];
    if($_POST['otp']==$_SESSION['otp']){
        echo 'otp match';
        $_SESSION['otpVarified']="TRUE";
        header('Location:/FoodFest/account.php');
        // echo $_SESSION['verifyEmail'];
    }
    else{
        echo "otp do not match";
    }
}

?>