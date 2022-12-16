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
                            <form action="user/partial/_signupFunctional.php" method="post" class="form" id="RegForm"
                                onsubmit="return regValidate(),validateCaptcha()">
                                <!-- <h4>Signup</h4> -->
                                <div>
                                    <!-- <label for="userName">User Name :</label> -->
                                    <input type="text" id="userName" name="userName" placeholder="User Name"
                                        maxlength="10">
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
                                    <input type="password" id="confirmPass" name="confirmPass"
                                        placeholder="Confirm Password">
                                </div>
                                <div id="captchaDiv">
                                    <!-- captcha creation -->
                                    <!-- <div id="captcha">
                                    </div> -->
                                    <h2 id="captcha"></h2>
                                    <input type="text" placeholder="Captcha" id="cpatchaTextBox">
                                    <!-- <button type="submit">Submit</button> -->
                                </div>
                                <button type="submit" class="btnLarge">Signup</button>
                                <!-- <button type="reset" class="btn">Reset</button> -->
                            </form>
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

    <footer>
        <h1>Copyright &copy; FoodFest.com</h1>
        <p>Prepared by: Abinash, Samir.</p>
    </footer>


    <script src="user/js/password_ver.js"></script>
    <script src="user/js/loginDesign.js"></script>
    <script src="/script.js"></script>
</body>

</html>