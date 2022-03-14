<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

function validate_payment_data($email, $password1, $password2, $creditcard, $expdate)
{
    $number = preg_match('@[0-9]@', $password1);
    $uppercase = preg_match('@[A-Z]@', $password1);
    $lowercase = preg_match('@[a-z]@', $password1);
    $specialChars = preg_match('@[^\w]@', $password1);
    $number_cc = preg_match('@[0-9]@', $creditcard);
    $errors = array();
    //email validation 
    if (empty($email)) {
        $errors += ["email" => "email is required"];
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors += ["email" => "email is not valid"];
        }
    }

    //password validation

    if (strlen($password1) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $errors += ["password1" => "Password must be at least 8 characters in length and must contain at least one number, 
    one upper case letter, one lower case letter and one special character. \n"];
    }
    //confirm password validation
    if (empty($password2)) {
        $errors += ["password2" => "Password confirmation is required"];
    } else {
        if (!empty($password2) && $password1 != $password2) {
            $errors += ["password2" => "Passswords didn't match"];
        }
    }
    //credit card validation
    if (strlen($creditcard) != 16 || !$number_cc) {
        $errors += ["credit" => "Please enter a valid credit card number"];
    }
    //expiration date validation
    if (empty($expdate)) {
        $errors += ["expdate" => "credit card expiration is required"];
    }
    $errorJSON = json_encode($errors);
    return $errorJSON;
}
