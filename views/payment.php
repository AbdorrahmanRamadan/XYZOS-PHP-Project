<?php
//exp date >> month/year +validation
//add ccv
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>XYZ Product</title>
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
            <form class="payment_form" action="" method="post">
                <h3 class="form_header">Apply Your Payment</h3>
                <div class="input_container">
                    <input type="email" name="email" placeholder="Type Email" class="input_field" value="">
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
                    <input type="number" name="creditcard" placeholder="Type Credit Card Number" class="input_field" value="">
                    <label class="error_msg"><?php if (isset($result['credit'])) echo $result['credit'];
                                                else echo ""; ?></label>
                </div>
                <div class="input_container">
                    <input type="date" name="expire_date" placeholder="Type Expire Date" class="input_field" value="">
                    <label class="error_msg"><?php if (isset($result['expdate'])) echo $result['expdate'];
                                                else echo ""; ?></label>
                </div>
                <div class="input_container">
                    <input type="submit" name="validate" class="btn_field" value="Submit">
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