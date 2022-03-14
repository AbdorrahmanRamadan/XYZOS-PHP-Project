<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once("vendor/autoload.php");

$page="payment";
$erJSON = "";
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



require_once("views/$page.php");