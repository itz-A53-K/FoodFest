<?php

$method= $_SERVER['REQUEST_METHOD'];

if ($method =='POST') {
    include '_dbConnect.php';

    // $loginUserName = $_POST['loginUserName'];
    $loginUserEmail = $_POST['loginUserEmail'];
    $loginPassword = $_POST['loginPassword'];

    //fatching user details from db
    $checkUser= "SELECT * FROM  `users` WHERE  email='$loginUserEmail'";
    $result= mysqli_query($conn,$checkUser);

    // checking no of rows 
    $noOfRows= mysqli_num_rows($result);

    if ($noOfRows==1) 
    {
        $row=mysqli_fetch_assoc($result);
        // echo 'insert'; //checking purpose
        
        $verifyPass = password_verify($loginPassword,$row['password']);// verify the hash of the password

        if($verifyPass){
            
            echo ' verified';
            
        }
        else{
            echo 'not verified';
        }
        
    }
    else{
    echo '<1';
    }
}

?>