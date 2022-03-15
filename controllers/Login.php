<?php

class Login
{
    public function checkLogin($email,$password)
    {
        $errors=array();
        $errorJSON = "";
        $user= new User();
        if(empty($email) || empty($password)) {
            $errors += ["invalid" => "All fields are required"];
            $errorJSON = json_encode($errors);
        }
        else {
                $result = $user->getUser($email, sha1($password));

                if (empty($result)) {
                    $errors += ["invalid" => "Invalid email or password"];
                    $errorJSON = json_encode($errors);

                } else {
                    $_SESSION['userID'] = $result;
                }
        }
        return $errorJSON;

    }


}