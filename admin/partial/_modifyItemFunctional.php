<?php

$method=$_SERVER["REQUEST_METHOD"];

if ($method=="POST") {
    include '_dbConnect.php';

    $editFood_Id=$_POST["editFood_Id"];
    $editFood_name=$_POST["editFood_name"];
    $editPrice=$_POST["editPrice"];
    $editFood_desc=$_POST["editFood_desc"];
    $editItem_Available=$_POST["editItem_Available"];
    $editCategory=$_POST["editCategory"];
    
    // echo $editItem_Available;
    // echo $editCategory;
    
    // taking img input and sanding the image to the img folder
    $uploadedFile = $_FILES['editFood_img'];

    $editFile_name = $uploadedFile['name'];
    $temp_name = $uploadedFile['tmp_name'];

    // $file_extention = explode( '.',$file_name);
    // $fileType = array('png','jpg','jpeg');
    // if( in_array(end($file_extention) , $fileType)){
        
    $destination = '../../img/'.$editFile_name;

    if($editFile_name==""){
        //when image is not edited
        $sql = "UPDATE `food_items` SET `food_Name` = '$editFood_name',`price`='$editPrice', `food_Desc` = '$editFood_desc', `item_Available` = '$editItem_Available',`category_id`='$editCategory' WHERE `food_items`.`food_Id` = '$editFood_Id'";

        $result = mysqli_query($conn,$sql);
        
        if ($result) {
            $alert="Modified successfully.";
        }
        else{
            $alert="Some error occured, unable to modify.";
        }

        session_start();
        $_SESSION['alert']=$alert;
        header("Location:../modifyItem.php");
    }
    else{
        //when image is edited
        $sql = "UPDATE `food_items` SET `food_Name` = '$editFood_name',`price`='$editPrice', `food_Desc` = '$editFood_desc', `item_Available` = '$editItem_Available',`category_id`='$editCategory', `food_Item_img_path` = '$editFile_name'  WHERE `food_items`.`food_Id` = '$editFood_Id'";

        $result = mysqli_query($conn,$sql);
        
        if ($result) {
            move_uploaded_file($temp_name,$destination);
            $alert="Modified successfully.";
        }
        else{
            $alert="Some error occured, unable to modify.";
        }

        session_start();
        $_SESSION['alert']=$alert;
        header("Location:../modifyItem.php");
        
    }


}

?>