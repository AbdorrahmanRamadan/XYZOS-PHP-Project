<?php
class Token
{
    public DatabaseConnection $order_connection;
    public $tokensTable;
    public $userObj;
    public function __construct(){
        $this->order_connection = new DatabaseConnection();
        $this->tokensTable=DatabaseConnection::getTable('tokens');
        $this->userObj = new User();
    }
    public function add_token($email){
        $userid=$this->userObj->getUserByEmail($email);
        $newUserToken=password_hash($_SESSION["userEmail"], PASSWORD_DEFAULT);
        $array=array("id"=>$userid,"remember_me_token"=>"$newUserToken");
        $this->tokensTable->insert($array);
        setcookie("remember_me","$newUserToken",time()+86400*30);
    }
    public function remove_token($userid){
        //update download link count and update the link with new ink
    }
    public function getUser($token){
        $tokenUser= $this->tokensTable->select("ID")->where("remember_me_token","=","$token")->get();
        $uid=$this->tokensTable->value($tokenUser);
        if(isset($uid)){
            $_SESSION['userID'] = $uid;
            $_SESSION['userEmail']=$this->userObj->getUserById($uid);
        }
    }

}