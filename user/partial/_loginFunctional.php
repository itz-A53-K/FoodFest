<?php

$method= $_SERVER['REQUEST_METHOD'];

if ($method =='POST') {
    include '_dbConnect,php';
    $loginUserName = $_POST['loginUserName'];
    $loginPassword = $_POST['loginPassword'];

    
    $checkUser="";
    $result= mysqli_query($conn,$$checkUser);

    $noOfRows= mysqli_num_rows($result);

    if ($noOfRows==1) 
    {
        $row=mysqli_fetch_assoc($result);

        if(password_verify($loginPassword,$row[''])){
            session_start();

        }
        
    }

}

?>