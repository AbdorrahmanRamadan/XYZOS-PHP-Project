<?php
class Download
{
    public $Token;

    public function __construct()
    {
        $this->Token = new Token();
    }

    function logout()
    {
        if(isset($_SESSION['userID']))
            $this->Token->remove_token($_SESSION["userID"]);
        setcookie("remember_me", "", time() - 300);
        session_destroy();
    }
}
