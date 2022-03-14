<?php
require_once("DatabaseConnection.php");
class User  {
    
    public DatabaseConnection $user_connection;
    public $usersTable;
    public function __construct(){
        $this->user_connection = new DatabaseConnection;
        $this->usersTable= $this->user_connection->getTable("users");
    }
    public function getUserById($userid){
        //the logic for getting one user
    }
    public function getUserByEmail($useremail){
        $uid = $this->usersTable->select('id')->where('Email',$useremail)->get();
        $id=$this->usersTable->value($uid);
        return $id; 
    }

    /**
     * Add new user
     */
    public function insertUser($email,$password){
        //insert user and make the password hashed
        
        $hashedPassword=sha1($password);
        $user = (['Email' => $email, 'Password'=> $hashedPassword]);
        try{
            $this->usersTable->insertGetId($user);
        }catch(\PDOEXCEPTION  $sqler){
                echo $sqler->getMessage();
        }
    
    
    
        
    } 
    /**
     * update user
     */
    public function updateUserEmail($user_email, $user_id){
            //update user function
    }
    public function updateUserPassword($user_email, $user_id){
        //update user password
}

    public function check_user_login($email, $password){
        //write login check function
    }
}