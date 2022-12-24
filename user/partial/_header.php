<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}
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
            <form class="search" method="post" action="/FoodFest/user/food_Item.php">
                <input type="search" name="query" id="query" placeholder="Search for food">
                 <!-- <button type="submit" id="srcBtn" class=""><img src="/FoodFest/img/search btn.png" alt="" srcset=""></button> -->
                <!-- <label for="query" type="submit">dsffdg</label> -->
            </form>
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true'){
                echo '
                    <ul>
                        <li class="listItem">
                            <a class="itemLink" href="/FoodFest/index.php">Home</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="/FoodFest/user/food_Item.php">Food Items</a>
                        </li>
                        <li class="listItem">
                ';
                        include '_dbConnect.php';
                        $user_id=$_SESSION['user_id'];
                        $sql="SELECT * FROM `cart` WHERE user_id=$user_id";
                        $result=mysqli_query($conn,$sql);
                        if($result){
                            $noOfRows=mysqli_num_rows($result);
                            echo '
                            <a href="/FoodFest/user/cart.php"><label for="Cart">'.$noOfRows.'</label></a>
                            ';
                        }
                echo '
                        <a class="itemLink" id ="cart" href="/FoodFest/user/cart.php">Cart</a>
                        </li>
                        <li class="listItem" style="margin:0 ;">
                            <a class="itemLink" href="/FoodFest/user/profile.php"><img src="/FoodFest/img/user_profile.png" alt="" srcset="" style="width:50px;"></a>
                        </li>

                        <h2>Hey&nbsp; <em>'.$_SESSION['userName'].'</em></a></h2>
                        
                        <button class="headerBtn logoutBtn">Logout</button>
                        
                    </ul>
                ';
            }
            else{
                echo '
                    <ul>
                        <li class="listItem">
                            <a class="itemLink" href="/FoodFest/index.php">Home</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="/FoodFest/user/food_Item.php">Food Items</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="/FoodFest/account.php">Sign In</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="/FoodFest/user/cart.php">Cart</a>
                        </li>
                    </ul>
                ';   
            }
            ?>


            <!-- <div class="loginContainer">
                <a href="/FoodFest/account.php"><button type="button" class="loginBtn btn"
                        id="loginBtn">Login</button></a>
            </div> -->
        </div>
    </nav>
</header>

