<?php
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
            echo 'Already Have An Account .';
        }
        else {
                if ($userEmail !="" && $userPass == $confirmPass) {
                    //creating password hash (increption)
                    $hash = password_hash($userPass,PASSWORD_DEFAULT);

                    //inserting data on db
                    $insert= "INSERT INTO `users` ( `userName`, `email`, `password`, `varificationCode`, `time`) VALUES ('$userName', '$userEmail', '$hash', '', current_timestamp())";
                    $insertResult = mysqli_query($conn, $insert);

                    if ($insertResult) {
                        echo "inserted";
                    }
                    else{
                        echo ' not inserted ';
                    
                    }
                }
                else{
                    echo ' password do not match';
                }
        }

    }
?>