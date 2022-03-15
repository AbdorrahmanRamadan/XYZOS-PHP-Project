<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once("vendor/autoload.php");
session_start();
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
    $paymentObj= new Payment;
    $erJSON = $paymentObj->validate_payment_data($email, $password1, $password2, $creditcard, $expdate);
    $result = json_decode($erJSON, true);
    if (empty($result)){
      $paymentObj->createUser($email,$password1);
      $page="login";
    }
    
}
if(isset($_POST['logout']))
{
    $download = new Download();
    $download->logout();
    $page="login";
}elseif (isset($_POST["goToDownload"])){
    $page="download_area";
}

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $loggedUser= new Login();
    $resultUser=$loggedUser->checkLogin($email,$password);
    $resultedErrors = json_decode($resultUser, true);
    if(empty($resultedErrors)){
       $page="download";
    }
}

require_once("views/$page.php");