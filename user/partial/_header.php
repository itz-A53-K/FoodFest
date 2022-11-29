<?php
session_start();
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
            // if(isset($_COOKIE["loggedin"])){
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true'){
                echo '
                    <ul>
                        <li class="listItem">
                            <a class="itemLink" href="/FoodFest/index.php">Home</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="#">About</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="/FoodFest/user/cart.php">Cart</a>
                        </li>

                        <h2>Hi&nbsp; <em>'.$_SESSION['userName'].'</em></h2>
                        
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
                            <a class="itemLink" href="#">About</a>
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

