<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest - Welcome to Food Fest</title>
    <link rel="stylesheet" href="user/css/utils.css">
    <link rel="stylesheet" href="user/css/style.css">
    <link rel="stylesheet" href="user/css/header_footer.css">
</head>

<body onload="createCaptcha()">
    <?php include 'user/partial/_header.php';
    include 'user/partial/_dbConnect.php';
    ?>

    <section class="account">
        <div class="container">
        <div class="row">
        <div class="col">
        <div class="form-container">

        <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
        </div>

            <div class="loginModule" id="loginModule">
                <form action="user/partial/_loginFunctional.php" method="post" class="form" id="LoginForm">
                    <!-- <h4>Login</h4> -->
                    <div class="login">
                        <!-- <label for="loginUserEmail">Email :</label> -->
                        <input type="email" id="loginUserEmail" placeholder="Email" name="loginUserEmail" required>
                    </div>
                    <div class="login">
                        <!-- <label for="loginPassword">Password :</label> -->
                        <input type="password" id="loginPassword" placeholder="Password" name="loginPassword" required>
                    </div>
                    <button type="submit" class="btn btnLarge">Login</button>
                </form>
            </div>



            
            <div class="signupModule" id="signupModule">
                <form action="user/partial/_signupFunctional.php" method="post" class="form" id="RegForm"
                    onsubmit="return regValidate(), validateCaptcha()">
                    <!-- <h4>Signup</h4> -->
                    <div>
                        <!-- <label for="userName">User Name :</label> -->
                        <input type="text" id="userName" name="userName" placeholder="User Name">
                    </div>
                    <div>
                        <!-- <label for="userEmail">Email :</label> -->
                        <input type="email" id="userEmail" name="userEmail" placeholder="Email">
                    </div>
                    <div>
                        <!-- <label for="userPass">Password :</label> -->
                        <input type="password" id="userPass" name="userPass" placeholder="Password">

                    </div>
                    <div>
                        <!-- <label for="confirmPass">Confirm Password :</label> -->
                        <input type="password" id="confirmPass" name="confirmPass" placeholder="Confirm Password">
                    </div>
                    <div>
                        <!-- captcha creation -->
                        <!-- <div id="captcha">
                        </div> -->
                        <h2 id="captcha"></h2> 
                        <input type="text" placeholder="Captcha" id="cpatchaTextBox" />
                        <!-- <button type="submit">Submit</button> -->
                    </div>
                    <button type="submit" class="btn btnLarge">Signup</button>
                    <!-- <button type="reset" class="btn">Reset</button> -->
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>


    <section class="foodCategory" id="foodCategory">
        <h3>Categories</h3>
        <div class="categories">
            <?php
            $sql= "SELECT * FROM `food_categories`";
            $result= mysqli_query($conn,$sql);

            while($row=mysqli_fetch_assoc($result)){
                echo '
                    <div class="line">
                        <a href="/FOODFEST/food_Item.php?category_id='. $row["category_id"].'"><img src="img/'.$row["category_img_path"].'" alt="" srcset=""></a>

                        <h4 class="foodName"> <a href="/FOODFEST/food_Item.php?category_id='. $row["category_id"].'">'.$row["category_name"].'</a></h4>

                    </div>';
            }
            ?>
        </div>  
    </section>

    <script src="user/js/password_ver.js"></script>
    <script src="user/js/loginDesign.js"></script>
</body>

</html>