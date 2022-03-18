<?php
require_once("../vendor/autoload.php");
session_start();
$profileObj = new Profile();
$update_status ='';
$update_email_errors='';
$update_password_errors='';
$downloadObj = new Download();

if (isset($_SESSION['userID'])){
    if (isset($_POST['logout'])) {
        $downloadObj->logout();
        header("Location:payment.php");
    }
    elseif (isset($_POST['update'])){
        if(empty($_POST['password']) && empty($_POST['confirm_pass'])) {
            if (empty($profileObj->update_user_email($_SESSION['userID'], $_SESSION['userEmail'], $_POST['email']))) {
                $update_status = 'Updated Successfully';
                $_SESSION['userEmail'] = $_POST['email'];
            } else {
                $update_email_errors = $profileObj->update_user_email($_SESSION['userID'], $_SESSION['userEmail'], $_POST['email']);
            }
        }else{
            if($_SESSION['userEmail'] == $_POST['email']){
                if(empty($profileObj->update_user_password($_SESSION['userID'], $_POST['password'], $_POST['confirm_pass']))){
                    $update_status = 'Updated Successfully';
                }else{
                    $update_password_errors = $profileObj->update_user_password($_SESSION['userID'], $_POST['password'], $_POST['confirm_pass']);
                }
            }else{
                if(empty($profileObj->update_user_email($_SESSION['userID'], $_SESSION['userEmail'], $_POST['email']))
                    &&empty($profileObj->update_user_password($_SESSION['userID'], $_POST['password'], $_POST['confirm_pass']))){
                    $update_status = 'Updated Successfully';
                    $_SESSION['userEmail'] = $_POST['email'];
                }
                else{
                    $update_email_errors = $profileObj->update_user_email($_SESSION['userID'], $_SESSION['userEmail'], $_POST['email']);
                    $update_password_errors = $profileObj->update_user_password($_SESSION['userID'], $_POST['password'], $_POST['confirm_pass']);

                }
            }
        }
    }
}else{
    header("Location:payment.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../src/css/style.css">

</head>
<body>
<nav class="navbar">
    <div class="container">
        <div class="page_logo">
            <img src="../src/images/logo.png" class="logo" draggable="false">
        </div>
        <div class="profile">
            <label>
                <i class="fa-solid fa-circle-user profile-logo"></i>
                <span class="username"><a href="?page=profile"><?php if (isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"] ?></a></span>
            </label>
            <form method="post" style="display: inline;">
                <button type="submit" name="logout" class="btn-logout" title="Logout"><i class="fa-solid fa-power-off"></i></button>
            </form>
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
