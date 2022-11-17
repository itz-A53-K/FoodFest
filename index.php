<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samir awesome foods</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="user/css/header_footer.css">
</head>

<body>
    <?php include 'user/partial/_header.php';?>

    <div class="loginModule" id="loginModule">
        <form action="user/partial/_loginFunctional.php" method="post" class="form" id="form">
            <div>
                <label for="loginUserName">User Name :</label>
                <input type="text" id="loginUserName" name="loginUserName">
            </div>
            <div>
                <label for="loginUserEmail">Email :</label>
                <input type="email" id="loginUserEmail" name="loginUserEmail">
            </div>
            <div>
                <label for="loginPassword">Email :</label>
                <input type="password" id="loginPassword" name="loginPassword">
            </div>
            <button type="submit" class ="btn">Login</button>
        </form>
    </div>
    <div class="signupModule" id="signupModule">
        <form action="user/partial/_signupFunctional.php" method="post" class="form" id="form">
            <div>
                <label for="userName">User Name :</label>
                <input type="text" id="userName" name="userName">
            </div>
            <div>
                <label for="userEmail">Email :</label>
                <input type="email" id="userEmail" name="userName">
            </div>
            <div>
                <label for="password">Password :</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class ="btn">Signup</button>
        </form>
    </div>
</body>

</html>