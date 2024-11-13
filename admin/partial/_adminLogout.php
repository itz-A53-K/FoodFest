<?php
    session_start();
    session_destroy();
    header ("Location:/FoodFest/index.php");
    exit();
?>