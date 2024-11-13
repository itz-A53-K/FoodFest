<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    include '_dbConnect.php';

    $dltItem_Id=$_POST['dltItem_Id'];
    echo $dltItem_Id;

    $sql="DELETE FROM `food_items` WHERE `food_items`.`food_Id` = $dltItem_Id";
    $result= mysqli_query($conn,$sql);
    if ($result) {
        header("Location:../deleteItem.php");
    }
}

?>