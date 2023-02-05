<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
    <?php
        session_start();
        include 'partial/_header.php';
        include 'partial/_saveDetails.php';
    ?>
    <div class="body">
        <div class="checkout">
            
            <?php
                if ($_SERVER['REQUEST_METHOD']==='POST' && (isset($_SESSION['loggedin']) && $_SESSION['loggedin']='true')) {
                    include 'partial/_dbConnect.php';
                        $toPay=$_POST['toPay'];
                        $user_id=$_POST['user_id'];
                        // echo $toPay ;
                        // echo $user_id ;
                        $details="SELECT * FROM `users` WHERE user_id=$user_id";
                        $details_result=mysqli_query($conn,$details);
                        $details_row=mysqli_fetch_assoc($details_result);
                        echo '
                        <h1> Bill Total : ₹'.$toPay.'</h1>
                        <div class="details">
                            <label for="details">Your details</label>
                            <p>'.$details_row['userName'].', '.$details_row['address'].', '.$details_row['ph_No'].'</p>
                        </div>
                        <form action="partial/_order.php" method="post">
                            <div class="paymentMethod">
                                <p>Payment Method</p>
                                <div>
                                    <input type="radio" name="payment" id="COD" value="Pay on delivery" checked>
                                    <label for="COD">Pay on delivery</label>
                                </div>
                                <div>
                                    <input type="radio" name="payment" id="payU" value="PayU">
                                    <label for="payU">PayU</label>
                                </div>
                            </div>
                            <input type="hidden" name="grand_total" value="'.$toPay.'">
                            <input type="hidden" name="user_id" value="'.$user_id.'">
                            <button type="submit">
                                <p>TOTAL : ₹'.$toPay.'</p>
                                <h3>Place order ></h3>
                            </button>
                        </form>';

                }
                else{
                    header('Location:../index.php');
                }
            ?>

        </div>
    </div>
    <footer>
        <h1>Copyright &copy; FoodFest.com</h1>
        <p>Designed & developed by: Abinash, Samir.</p>
    </footer>
    <script src="js/logout.js"></script>
</body>
</html>