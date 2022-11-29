<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    
    $currentUrl=$_POST['currentUrl'];
    session_start();
    session_destroy();
    header ("Location:$currentUrl");
    exit();

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
}
else{
       $showError ="Some error occurred .";
    }
        
    header ("Location:$currentUrl");


?>