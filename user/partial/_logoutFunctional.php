<?php
    
    // $currentUrl=$_POST['currentUrl'];
    session_start();
    session_destroy();
    $alert="You have logged out successfully.";
   

    //logout using cookie (not working)
    // if (isset($_COOKIE["loggedin"])) {
    //     setcookie("loggedin", time() - 3600);
    //     if (!isset($_COOKIE["loggedin"])) {
    //     }
    //     header ("Location:$currentUrl");
    // }
    // else {
    //     header ("Location:$currentUrl");
    //     exit();
    // }
    session_start();
    $_SESSION['alert']=$alert;
    header ("Location:../../index.php");


?>