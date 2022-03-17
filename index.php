<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once("vendor/autoload.php");
session_start();
$paymentObj= new Payment;
$loginObj= new Login();
$tokenObj= new Token();
$page="payment";
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
if(isset($_GET['page'])){
    if($_GET['page']=='login'){
        $page='login';
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
require_once("views/$page.php");