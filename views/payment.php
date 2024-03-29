<?php
//exp date >> month/year +validation
//add ccv
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once("../vendor/autoload.php");
session_start();
$paymentObj= new Payment;
$tokenObj= new Token();

$result = array(
    "email" => "",
    "password1" => "",
    "password2" => "",
    "credit" => "",
    "expdate" => ""
);
if (isset($_COOKIE["remember_me"])){
    $uid=$tokenObj->getUser($_COOKIE["remember_me"]);
    header("Location:download.php");
}
if (isset($_POST['validate'])) {
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $creditcard = $_POST['creditcard'];
    $expdate = $_POST['expire_date'];
    $erJSON = $paymentObj->validate_payment_data($email, $password1, $password2, $creditcard, $expdate);
    $result = json_decode($erJSON, true);
    if(isset($result['email']) && $result['email']=="This email already exist"){
        $result = array(
            "email" => "This email already exist",
            "password1" => "",
            "password2" => "",
            "credit" => "",
            "expdate" => ""
        );       
    }
    if (empty($result)){
      $paymentObj->createUser($email,$password1);
      header("Location:login.php");
    }
    
}
if(isset($_GET['page'])){
    if($_GET['page']=='login'){
       header("Location:login.php");
    }
}
/*if(isset($_POST['generateQRCode'])){
    require_once ("../utilities/QRCodeGenerator.php");
    $QRCode= QRCodeGenerator::generateQRCode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
}*/
require_once ("../utilities/QRCodeGenerator.php");
$QRCode= QRCodeGenerator::generateQRCode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>XYZ Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../src/css/style.css">

</head>

<body>
    <img src="../src/images/header_img.svg" class="header_img" draggable="false">
    <nav class="navbar">
        <div class="container">
            <div class="page_logo">
                <img src="../src/images/logo.png" class="logo" draggable="false">
            </div>
        </div>
    </nav>
    <div class="payment_body">
        <div class="container">
            <form class="payment_form" action="" method="post">
                <h3 class="form_header">Apply Your Payment</h3>
                <div class="input_container">
                    <input type="email" name="email" placeholder="Type Email" class="input_field" value="<?php if (isset($result['email'])) echo ""; else echo $_POST['email']  ?>">
                    <label class="error_msg"><?php if (isset($result['email'])) echo $result['email'];
                                                else echo "";  ?></label>
                </div>
                <div class="input_container">
                    <input type="password" name="password1" placeholder="Type Password" class="input_field" value="">
                    <label class="error_msg"><?php if (isset($result['password1'])) echo $result['password1'];
                                                else echo ""; ?></label>
                </div>
                <div class="input_container">
                    <input type="password" name="password2" placeholder="Confirm Password" class="input_field" value="">
                    <label class="error_msg"><?php if (isset($result['password2'])) echo $result['password2'];
                                                else echo ""; ?></label>
                </div>
                <div class="input_container">
                    <input type="number" name="creditcard" placeholder="Type Credit Card Number" class="input_field" value="<?php if (isset($result['credit'])) echo ""; else echo $_POST['creditcard'] ?>">
                    <label class="error_msg"><?php if (isset($result['credit'])) echo $result['credit'];
                                                else echo ""; ?></label>
                </div>
                <div class="input_container">
                    <input  name="expire_date" placeholder="Type Expire Date Like 02/22" class="input_field" value="<?php if(isset($result['expdate'])) echo ""; else echo $_POST['expire_date'] ?>">
                    <label class="error_msg"><?php if (isset($result['expdate'])) echo $result['expdate'];
                                                else echo ""; ?></label>
                </div>
                <div class="input_container">
                    <input type="submit" name="validate" class="btn_field" value="Submit">
                </div>
            </form>
            <div class="member_login">
                <label>If you are member</label>
                <a href="?page=login">Login</a>
            </div>
        </div>
        <div class="share">
            <div class="share_tab">
                <button id="toggle_QRCode"><i class="fa-solid fa-share-nodes"></i></button>
            </div>
            <div class="share_content">
                <image src="<?php echo $QRCode ?>" alt=""></image>
            </div>
        </div>

    </div>
    <script>
        document.querySelector('.share').onclick = function(){
            document.querySelector('.share').classList.toggle('showSlideOut');
            console.log("Test");
        }
    </script>
</body>

</html>