<?php
require_once("../vendor/autoload.php");
session_start();
$loginObj= new Login();
$tokenObj= new Token();
$resultedErrors=array(
    "email"=>"",
    "password"=>""
);
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $loggedUserID=$loginObj->checkLogin($email,$password);
    $resultedErrors = json_decode($loggedUserID, true);
    if(empty($resultedErrors)){
        echo $_SESSION['userID'];
        header("Location:download.php");
    }
    if(isset($_POST['remember_me'])){
        $tokenObj->add_token($email);
    }
}elseif (isset($_COOKIE["remember_me"])){
    $uid=$tokenObj->getUser($_COOKIE["remember_me"]);
    header("Location:download.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
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
        <label class="error_msg">
        <?php if (isset($resultedErrors['invalid'])) echo $resultedErrors['invalid'];
                                                else echo "";  ?>
        </label>
        <form class="login_form" method="post">
            <h3 class="form_header">Member Login</h3>
            <div class="input_container">
                <input type="email" name="email" placeholder="Type Email" class="input_field" value="">
               <!-- <label class="error_msg"><?php /*if (isset($resultedErrors['email'])) echo $resultedErrors['email'];
                                                else echo "";  */?></label>-->
            </div>
            <div class="input_container">
                <input type="password" name="password" placeholder="Type Password" class="input_field" value="">
<!--                <label class="error_msg">--><?php //if (isset($resultedErrors['password'])) echo $resultedErrors['password'];
//                                                else echo "";  ?><!--</label>-->
            </div>
            <div class="input_container check_remember_me">
                <input type="checkbox" name="remember_me"  class="checkbox_input" id="remember">
                <label class="remember-me" for="remember">Remember me</label>
            </div>
            <div class="input_container">
                <input type="submit" name="login" class="btn_field" value="Login">
            </div>
        </form>
    </div>

</div>
</body>
</html>
