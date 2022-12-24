<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest - Welcome to Food Fest</title>
    <link rel="stylesheet" href="user/css/utils.css">
    <link rel="stylesheet" href="user/css/accountStyle.css">
    <link rel="stylesheet" href="user/css/header_footer.css">
</head>

<body onload="createCaptcha(),createCaptchaL()">
    <?php 
    session_start();
    include 'user/partial/_dbConnect.php';
    ?>

    <header>
        <nav class="navBar" id="navBar">
            <div class="navContainerLeft">
                <a href="/FoodFest/index.php">
                    <img src="/FoodFest/img/FoodFest logo.png" alt="logo" srcset="">
                    <h1 id="foodFest">Food Fest</h1>
                </a>
            </div>
            <div class="navContainerRight">
                <ul>
                    <li class="listItem"><a class="itemLink" href="/FoodFest/index.php">Home</a></li>
                    <li class="listItem"><a class="itemLink" href="#">About</a></li>
                    <li class="listItem"><a class="itemLink" href="/FoodFest/user/cart.php">Cart</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <?php 
    // include 'user/partial/_alert.php';
    ?>

    <section class="account">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="form-container">

                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <span onclick="admin()">Admin</span>
                            <hr id="Indicator">
                        </div>

                        <div class="loginModule" id="loginModule">
                            <form action="user/partial/_loginFunctional.php" method="post" class="form" id="LoginForm"
                                onsubmit="return validateCaptchaL()">
                                <!-- <h4>Login</h4> -->
                                <div class="login">
                                    <!-- <label for="loginUserEmail">Email :</label> -->
                                    <input type="email" id="loginUserEmail" placeholder="Email" name="loginUserEmail"
                                        required>
                                </div>
                                <div class="login">
                                    <!-- <label for="loginPassword">Password :</label> -->
                                    <input type="password" id="loginPassword" placeholder="Password"
                                        name="loginPassword" required>
                                </div>
                                <div>
                                <!-- captcha creation -->
                                <h2 id="captcha1"></h2>
                                <input type="text" placeholder="Captcha" id="cpatchaTextBox1" />
                            </div>
                                <button type="submit" class="btnLarge">Login</button>
                            </form>
                        </div>


                        <div class="signupModule" id="signupModule">
                            <?php
                                if(isset($_SESSION['otpVarified'])&& $_SESSION['otpVarified']=="TRUE"){
                                    echo'
                                        <form action="user/partial/_signupFunctional.php" method="post" class="form" id="RegForm" onsubmit="return validateCaptcha()">';
                                            if(isset($_SESSION['alert']) && $_SESSION['alert']=="Email varified."){
                                                echo ' <h4 style="color:green;">'.$_SESSION['alert'].'</h4>';
                                            }
                                            else if(isset($_SESSION['alert'])){
                                                echo ' <h4 style="color:red;">'.$_SESSION['alert'].'</h4>';
                                            }
                                        echo'
                                            <div>
                                                
                                                <!-- <label for="userEmail">Email :</label> -->
                                                <input type="" value="'.$_SESSION['verifyEmail'].'" disabled>
                                                <input type="hidden" class="userEmail" name="userEmail" value="'.$_SESSION['verifyEmail'].'" >
                                            </div>
                                            <div>
                                                <!-- <label for="userName">User Name :</label> -->
                                                <input type="text" id="userName" name="userName" placeholder="User Name"
                                                    maxlength="10">
                                            </div>
                                            

                                            <div>
                                                <!-- <label for="userPass">Password :</label> -->
                                                <input type="password" id="userPass" name="userPass" placeholder="Password">

                                            </div>
                                            <div>
                                                <!-- <label for="confirmPass">Confirm Password :</label> -->
                                                <input type="password" id="confirmPass" name="confirmPass"
                                                    placeholder="Confirm Password">
                                            </div>
                                            <div id="captchaDiv">
                                                <!-- captcha creation -->
                                                <!-- <div id="captcha">
                                                </div> -->
                                                <input type="text" placeholder="Captcha" id="cpatchaTextBox">
                                                <h2 id="captcha"></h2>
                                                <!-- <button type="submit">Submit</button> -->
                                            </div>
                                            <button type="submit" class="btnLarge">Signup</button>
                                        </form>
                                    ';
                                }
                                else{
                                    if(isset($_SESSION['otpSent'])&& $_SESSION['otpSent']=="True"){
                                        echo'
                                        <form action="/FoodFest/user/partial/_otp_varify.php" method="post" class="form" id="RegForm" onsubmit="return otpValidate()">';
                                            if(isset($_SESSION['alert'])){
                                                echo ' <h4 style="color:red;">'.$_SESSION['alert'].'</h4>';
                                            }
                                        echo'
                                            <div>
                                                <input type="email" class="verifyEmail" name="verifyEmail" placeholder="Enter your email" value="'.$_SESSION['verifyEmail'].'" disabled>
                                            </div>
                                            <div>
                                                <h4 style="color:green;">An OTP has been sent to above Email</h4>
                                            </div>
                                            <div>
                                                <input type="text" id="otp" name="otp" placeholder="Enter OTP" maxlength="4">
                                            </div>
                                            
                                            <button type="submit" class="btnLarge">Varify OTP</button>
                                        </form>
                                        ';
                                    }
                                    else{
                                        echo'
                                        <form action="otp_send.php" method="post" class="form" id="RegForm" onsubmit="return validate_reg_cpatchaBox1()">';
                                            if(isset($_SESSION['alert'])){
                                                echo ' <h4 style="color:red;">'.$_SESSION['alert'].'</h4>';
                                            }
                                        echo'
                                            <div>
                                                <input type="email" id="verifyEmail" name="verifyEmail" placeholder="Enter your email" required>
                                            </div>
                                            <div id="captchaDiv">
                                                <!-- captcha creation -->
                                                <!-- <div id="captcha">
                                                </div> -->
                                                <input type="text" placeholder="Captcha" id="reg_captchaBox1" required>
                                                <h2 id="captcha"></h2>
                                                <!-- <button type="submit">Submit</button> -->
                                            </div>
                                            <button type="submit" class="btnLarge">Send OTP</button>
                                        </form>
                                        ';
                                    }
                                
                                }
                            ?>
                                
                        </div>

                        <form action="admin/partial/_adminLoginFunctional.php" method="post" class="form" id="AdminForm" >
                            <!-- onsubmit="return validateCaptchaL()"> -->
                            <!-- <h4>Login</h4> -->
                            <div class="login">
                                <!-- <label for="loginUserEmail">Email :</label> -->
                                <input type="email" id="adminEmail" placeholder="Email" name="adminEmail" required>
                            </div>
                            <div class="login">
                                <!-- <label for="loginPassword">Password :</label> -->
                                <input type="password" id="adminLoginPassword" placeholder="Password" name="adminLoginPassword"
                                    required>
                            </div>
                            <!-- <div>
                                captcha creation
                                <h2 id="captcha1"></h2>
                                <input type="text" placeholder="Captcha" id="cpatchaTextBox1" />
                            </div> -->

                            <button type="submit" class="btnLarge">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

        <div class="varification hidden">
            <form action="/FoodFest/user/partial/_otp_varify.php" method="post">
                <h2>An One Time Password(OTP) has been sent to your email</h2>
                <input type="hidden" id="email" placeholder="">
                <input type="text" id="otp" name="otp" placeholder="Enter OTP" required>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
        
   
    

    <!-- <footer>
        <h1>Copyright &copy; FoodFest.com</h1>
        <p>Designed & developed by: Abinash, Samir.</p>
    </footer> -->


    <script src="user/js/otp.js"></script>
    <script src="user/js/password_ver.js"></script>
    <script src="user/js/loginDesign.js"></script>
    <script src="script.js"></script>
    
</body>

</html>