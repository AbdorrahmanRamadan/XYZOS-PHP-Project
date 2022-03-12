<?php

class User  {
    public DatabaseConnection $user_connection;
    public $usersTable;
    public function __construct(){
        $this->user_connection = new DatabaseConnection;
        $this->usersTable->getTable('users');
    }
    public function getUserById($userid){
        //the logic for getting one user
    }
    public function getUserByEmail($useremail){
        //the logic for getting one user
    }

    /**
     * Add new user
     */
    public function addUser($email,$password){
        //insert user and make the password hashed
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