<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest - Welcome to Food Fest</title>
    <link rel="stylesheet" href="user/css/style.css">
    <link rel="stylesheet" href="user/css/utils.css">
    <link rel="stylesheet" href="user/css/header_footer.css">
</head>

<body>
    <?php include 'user/partial/_header.php';?>

    <section class="account">
        <div class="loginModule" id="loginModule">
            <form action="user/partial/_loginFunctional.php" method="post" class="form" onsubmit="return CheckPassword()">
                <h4>Login</h4>
                <!-- <div>
                    <label for="loginUserName">User Name :</label>
                    <input type="text" id="loginUserName" name="loginUserName">
                </div> -->
                <div>
                    <label for="loginUserEmail">Email :</label>
                    <input type="email" id="loginUserEmail" name="loginUserEmail">
                </div>
                <div>
                    <label for="loginPassword">Password :</label>
                    <input type="password" id="loginPassword" name="loginPassword">
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
        <div class="signupModule" id="signupModule">
            <form action="user/partial/_signupFunctional.php" method="post" class="form" onsubmit="return reg_pass()">
                <h4>Signup</h4>
                <div>
                    <label for="userName">User Name :</label>
                    <input type="text" id="userName" name="userName">
                </div>
                <div>
                    <label for="userEmail">Email :</label>
                    <input type="email" id="userEmail" name="userEmail">
                </div>
                <div>
                    <label for="userPass">Password :</label>
                    <input type="password" id="userPass" name="userPass">
                </div>
                <div>
                    <label for="confirmPass">Confirm Password :</label>
                    <input type="text" id="confirmPass" name="confirmPass">
                </div>
                <button type="submit" class="btn">Signup</button>
            </form>
            <script src="js/password_ver.js"></script>
        </div>
    </section>
</body>

</html>