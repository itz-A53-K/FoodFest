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
            
            // $value=$loginUserEmail;
            // setcookie("loggedin",$value,time()+(60*60));
            
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['user_id'] = $row['user_id'];
                // header ("Location:/FoodFest/index.php");
                $alert="You have loggedin successfully.";
                // exit();
                        
        }
        else{
            $alert="Password do not match.";
        }
        
        
        // if(isset($_COOKIE["loggedin"])){
        //     header ("Location:/FoodFest/index.php");
        // }
        // else{
        //     echo "\nkjdnfklsdf";
        // }
        
        
    }
    else if($noOfRows<1){
            $alert="No account found!";
            
    }
    else{
        $alert="Some Error Occured ! Please try again after some time.";
    }
    session_start();
    $_SESSION['alert']=$alert;
    header ("Location:/FoodFest/index.php");
    // header ("Location:/FoodFest/index.php?alert=$alert");
}

?>