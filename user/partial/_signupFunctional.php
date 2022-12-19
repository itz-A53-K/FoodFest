<?php
    session_start();
    $method= $_SERVER['REQUEST_METHOD'];

    if ($method=='POST') {
        include '_dbConnect.php';
        
        $userName= $_POST['userName'];
        $userEmail= $_POST['userEmail'];
        $userPass= $_POST['userPass'];
        $confirmPass= $_POST['confirmPass'];
        
        //fatching user details from db
        $checkUser= "SELECT * FROM `users` WHERE email='$userEmail'";
        $result= mysqli_query($conn,$checkUser);

         // checking no of rows 
        $noOfRows= mysqli_num_rows($result);

        if($noOfRows>0){
            $alert="This Email Id is already used.";
        }
        else {
                if ($userEmail !="" && $userPass == $confirmPass) {
                    //creating password hash (increption)
                    $hash = password_hash($userPass,PASSWORD_DEFAULT);

                    //inserting data on db
                    $insert= "INSERT INTO `users` ( `userName`, `email`, `password`, `varificationCode`, `time`) VALUES ('$userName', '$userEmail', '$hash', '', current_timestamp())";
                    $insertResult = mysqli_query($conn, $insert);

                    if ($insertResult) {
                        $alert="Your account has been created successfully. You can <a href='/FoodFest/account.php'>login</a> now. ";
                        unset($_SESSION['otpSent']);
                        unset($_SESSION['otpVarified']);

                        $_SESSION['alert']=$alert;
                        header ("Location:/FoodFest/index.php");
                        exit();
                    }
                    else{
                        $alert="Some error occured ! Please try again.";
                    
                    }
                }
                else{
                    $alert="Passwords do not match.";
                }
        }
        
        $_SESSION['alert']=$alert;
        header ("Location:/FoodFest/account.php");
    }
?>