<?php
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
<img src="src/images/header_img.svg" class="header_img" draggable="false">
<nav class="navbar">
    <div class="container">
        <div class="page_logo">
            <img src="src/images/logo.png" class="logo" draggable="false">
        </div>
    </div>
</nav>
<div class="payment_body">
    <div class="container">
        <form class="login_form" action="" method="post">
            <h3 class="form_header">Member Login</h3>
            <div class="input_container">
                <input type="email" name="email" placeholder="Type Email" class="input_field" value="">
                <label class="error_msg"></label>
            </div>
            <div class="input_container">
                <input type="password" name="password" placeholder="Type Password" class="input_field" value="">
                <label class="error_msg"></label>
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
