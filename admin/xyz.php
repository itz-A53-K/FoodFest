<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Fest Admin Panel</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <div class="body">
        <header class="navbar">
            <h2>Admin Panel</h2>
            <ul>
                <li class="listItem">
                    <a href="#">Task List</a>
                </li>
                <li class="listItem">
                    <a href="#">Category panel</a>
                </li>
                <li class="listItem">
                    <a href="#">Food item panel</a>
                </li>
                <li class="listItem">
                    <a href="#">Profit</a>
                </li>
            </ul>

        </header>

        <section class="taskManu">
            <h1>Task List</h1>
            <p>Date : </p>
            <?php
            echo '
            <div class="taskBtn">
                <input type="hidden" name="currentUrl" value="cur">
                <button type="submit" id="newBtn"><a href="/foodfestAdmin">New</a></button>
                <button type="submit" id="preparing"><a  href="?btn=preparing">Preparing</a></button>
                <button type="submit" id="delivered"><a href="?btn=delivered">Delivered</a></button>
            </div>';
            ?>
            <hr>
            <div class="taskList">
                <?php
                include 'partial/_taskList.php';
                ?>
            </div>
        </section>
jhggjhjhghjg
        <section class="orderedItem">
            <h2>hiii</h2>
        </section>
    </div>
    <script src="js/home.js"></script>
</body>

</html>