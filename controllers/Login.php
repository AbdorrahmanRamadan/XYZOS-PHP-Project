<?php

class Login
{
    public $user;
    public function __construct()
    {
        $this->user= new User();
    }

    public function checkLogin($email,$password)
    {
        $errors=array();
        $errorJSON = "";
        if(empty($email) || empty($password)) {
            $errors += ["invalid" => "All fields are required"];
            $errorJSON = json_encode($errors);
        }
        else {
                $result = $this->user->getUser($email, sha1($password));

                if (empty($result)) {
                    $errors += ["invalid" => "Invalid email or password"];
                    $errorJSON = json_encode($errors);

                } else {
                    $_SESSION['userID'] = $result;
                    $_SESSION['userEmail']=$email;
                }
        }
        return $errorJSON;

    }



}