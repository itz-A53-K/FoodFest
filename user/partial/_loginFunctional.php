<?php

$method= $_SERVER['REQUEST_METHOD'];

if ($method =='POST') {
    include '_dbConnect,php';
    $loginUserName = $_POST['loginUserName'];
    $loginUserEmail = $_POST['loginUserEmail'];
    $loginPassword = $_POST['loginPassword'];

    // INSERT INTO `users` (`sNo`, `userName`, `email`, `password`, `varificationCode`, `time`) VALUES (NULL, 'abi', 'abi@ab', 'rtrt', 'dtrt', current_timestamp());
    $checkUser="SELECT * FROM  `users` WHERE  email='$loginUserEmail ";
    $result= mysqli_query($conn,$$checkUser);

    $noOfRows= mysqli_num_rows($result);

    if ($noOfRows==1) 
    {
        $row=mysqli_fetch_assoc($result);

        if(password_verify($loginPassword,$row['password'])){
            session_start();

        }
        
    }

}

?>