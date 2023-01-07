<?php

$method=$_SERVER["REQUEST_METHOD"];

if ($method=="POST") {
    include '_dbConnect.php';

    $food_name=$_POST["food_name"];
    $price=$_POST["price"];
    $food_desc=$_POST["food_desc"];
    $item_Available=$_POST["item_Available"];
    $category_Id=$_POST["category_Id"];
    
    if ($item_Available==1) {
        $item_Available="Yes";
    }
    else{
        $item_Available="No";
    }
    // code for takeing img input and sanding the img to the img folder
    $uploadedFile = $_FILES['food_img'];

    $file_name = $uploadedFile['name'];
    $temp_name = $uploadedFile['tmp_name'];

    // $file_extention = explode( '.',$file_name);
    // $fileType = array('png','jpg','jpeg');

    // if( in_array(end($file_extention) , $fileType)){

    $destination = '../../img/'.$file_name;
    if($category_Id){
    $sql = "INSERT INTO `food_items` (`food_Name`, `price`, `food_Desc`, `item_Available`, `category_id`, `food_Item_img_path`) VALUES ('$food_name', '$price', '$food_desc', '$item_Available', '$category_Id', '$file_name')";}

    $result = mysqli_query($conn,$sql);
    
    if ($result) {
        move_uploaded_file($temp_name,$destination);
        $alert="1 new item added successfully.";
    }
    else{
        $alert="Some error occured, unable to add.";
    }
    
    session_start();
    $_SESSION['alert']=$alert;
    header("Location:../addItem.php");
        
    


}

?>