<?php
session_start();
?>
<header class="navbar">
    <?php
        echo '
            <h1>Hi <span>'.$_SESSION["adminUserName"].'</span></h1>
            <h2 id="adminPanel">Admin Panel</h2>
            <ul>
                <li class="listItem">
                    <a href="home.php" class="itemLink" id="home">Task Panel</a>
                </li>
                <li class="listItem">
                    <a href="addItem.php" class="itemLink" id="addItem">Add new item</a>
                </li>
                <li class="listItem">
                    <a href="modifyItem.php" class="itemLink" id="modifyItem">Modify item</a>
                </li>
                <li class="listItem">
                    <a href="deleteItem.php" class="itemLink" id="deleteItem">Delete item</a>
                </li>
                
                <li class="listItem">
                    <button class="logoutBtn">Logout</button>
                </li>
            </ul>
        ';
                
    ?>
</header>
