<?php
    session_start();
    session_destroy();
    
    session_start();
    $alert="You have logged out successfully.";
    $_SESSION['alert']=$alert;
    header ("Location:/FoodFest/index.php");
    exit();
?>