<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once("vendor/autoload.php");
session_start();
$paymentObj= new Payment;
$downloadObj = new Download();
$loginObj= new Login();
$profileObj = new Profile();
$tokenObj= new Token();
$page="login";
$erJSON = "";
$resultedErrors=array(
    "email"=>"",
    "password"=>""
);
$resultUser=array();
$result = array(
    "email" => "",
    "password1" => "",
    "password2" => "",
    "credit" => "",
    "expdate" => ""
);
$update_status ='';
$update_email_errors='';
$update_password_errors='';
if (isset($_POST['validate'])) {
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $creditcard = $_POST['creditcard'];
    $expdate = $_POST['expire_date'];
    //require_once("controllers/payment.php");
    $erJSON = $paymentObj->validate_payment_data($email, $password1, $password2, $creditcard, $expdate);
    $result = json_decode($erJSON, true);
    if (empty($result)){
      $paymentObj->createUser($email,$password1);
      $page="login";
    }
    
}
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $loggedUserID=$loginObj->checkLogin($email,$password);
    $resultedErrors = json_decode($loggedUserID, true);
    if(empty($resultedErrors)){
       $page="download";
    }
    if(isset($_POST['remember_me'])){
        $tokenObj->add_token($email);
    }
}elseif (isset($_COOKIE["remember_me"])){
    $uid=$tokenObj->getUser($_COOKIE["remember_me"]);
    $page="download";
}
if(isset($_POST['logout']))
{
    $downloadObj->logout();
    $page="login";
}elseif (isset($_POST["goToDownload"])){
    $page="download_area";
}
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
if (isset($_POST['update'])){
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
require_once("views/$page.php");