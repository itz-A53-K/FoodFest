<?php

$method= $_SERVER['REQUEST_METHOD'];

if ($method =='POST') {
    include '_dbConnect.php';

    // $loginUserName = $_POST['loginUserName'];
    $adminEmail = $_POST['adminEmail'];
    $adminLoginPassword = $_POST['adminLoginPassword'];

    //fatching user details from db
    $checkAdmin= "SELECT * FROM  `admin` WHERE  adminEmail='$adminEmail'";
    $result= mysqli_query($conn,$checkAdmin);

    // checking no of rows 
    $noOfRows= mysqli_num_rows($result);

    if ($noOfRows==1) 
    {
        $row=mysqli_fetch_assoc($result);

        // $verifyPass = password_verify($loginPassword,$row['password']);// verify the hash of the password

        if($adminLoginPassword==$row['password']){
            
            // $value=$loginUserEmail;
            // setcookie("loggedin",$value,time()+(60*60));
            while(session_status()===PHP_SESSION_ACTIVE) {
                session_destroy();
            }
            session_start();
            if(session_status() === PHP_SESSION_ACTIVE){
                $_SESSION['adminLoggedin'] = true;
                $_SESSION['adminUserName'] = $row['adminName'];
                $_SESSION['adminUser_id'] = $row['admin_id'];
                header ("Location:/FoodFest/admin/home.php");
                exit();
                // echo 'hgfg';
            }
                        
        }
        else{
            echo 'not verified';
        }
        
        
        // if(isset($_COOKIE["loggedin"])){
        //     header ("Location:/FoodFest/index.php");
        // }
        // else{
        //     echo "\nkjdnfklsdf";
        // }
        
        
    }
    else{
    echo '<1';
    }
}

?>