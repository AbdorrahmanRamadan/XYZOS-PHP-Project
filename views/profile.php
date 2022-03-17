<?php
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="src/css/style.css">

</head>
<body>
<nav class="navbar">
    <div class="container">
        <div class="page_logo">
            <img src="src/images/logo.png" class="logo" draggable="false">
        </div>
        <div class="profile">
            <i class="fa-solid fa-circle-user profile-logo"></i>
            <span class="username"><a href=""><?php if(isset($_SESSION["userEmail"]))echo $_SESSION["userEmail"]?></a></span>
        </div>
    </div>
</nav>
<div class="profile_body">
    <div class="container">
        <div class="update_success"><?php echo $update_status?></div>
        <form class="profile_form" method="post">
            <h3 class="form_header">Edit Your Profile</h3>
            <div class="input_container">
                <input type="text" name="email"  class="input_field" value="<?php if(isset($_SESSION["userEmail"]))echo $_SESSION["userEmail"]?>">
                <label class="error_msg"><?php echo $update_email_errors?></label>
            </div>
            <div class="input_container">
                <input type="password" name="password" placeholder="Type New Password" class="input_field" value="">
                <label class="error_msg"></label>
            </div>
            <div class="input_container">
                <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="input_field" value="">
                <label class="error_msg"><?php echo $update_password_errors?></label>
            </div>
            <div class="input_container">
                <input type="submit" name="update" class="btn_field" value="Update">
            </div>
        </form>
    </div>

</div>
</body>
</html>
