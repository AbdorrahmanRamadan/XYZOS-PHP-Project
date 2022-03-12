<?php
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>XYZ Product</title>
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
                        <input type="email" name="email" placeholder="Type Email" class="input_field" value="">
                        <label class="error_msg"></label>
                    </div>
                    <div class="input_container">
                        <input type="password" name="password" placeholder="Type Password" class="input_field" value="">
                        <label class="error_msg"></label>
                    </div>
                    <div class="input_container">
                        <input type="password" name="confirm_pass" placeholder="Confirm Password" class="input_field" value="">
                        <label class="error_msg"></label>
                    </div>
                    <div class="input_container">
                        <input type="number" name="credit" placeholder="Type Credit Card Number" class="input_field" value="">
                        <label class="error_msg"></label>
                    </div>
                    <div class="input_container">
                        <input type="date" name="expire_date" placeholder="Type Expire Date" class="input_field" value="">
                        <label class="error_msg"></label>
                    </div>
                    <div class="input_container">
                        <input type="submit" name="register" class="btn_field" value="Submit">
                    </div>
                </form>
                <div class="member_login">
                    <label>If you are member</label>
                    <a href="">Login</a>
                </div>
            </div>

        </div>
    </body>
</html>
