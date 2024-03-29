<?php
class Profile
{
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }
    function update_user_email($user_id,$current_email,$new_email){
        $update_email_errors = '';
        if (!empty($new_email) && filter_var($new_email, FILTER_VALIDATE_EMAIL) ){
            if($new_email != $current_email){
                $this->user = new User();
                $this->user->updateUserEmail($new_email, $user_id);
            }else{
                $update_email_errors = 'The same email no updates done';
            }
        }else{
            $update_email_errors = 'Email is invalid';
        }
        return $update_email_errors;
    }
    function update_user_password($user_id,$new_password, $confirm_password){
        $number = preg_match('@[0-9]@', $new_password);
        $uppercase = preg_match('@[A-Z]@', $new_password);
        $lowercase = preg_match('@[a-z]@', $new_password);
        $specialChars = preg_match('@[^\w]@', $new_password);
        $update_password_errors = '';
        $hashedCurrentPw=$this->user->checkPassword($user_id,sha1($new_password));
        if(strlen($new_password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){
            $update_password_errors = 'Password must be at least 8 characters in length and must contain at least one number, 
                                        one upper case letter, one lower case letter and one special character';
        }
        elseif($confirm_password != $new_password){
            $update_password_errors = "Passwords didn't match";
        }
        
    
        else{
           if($hashedCurrentPw != sha1($new_password)){
            $this->user->updateUserPassword(sha1($new_password), $user_id);
           }
           else{
            $update_password_errors = "Please Enter a new password";

           }
        
    }
        return $update_password_errors;
    }
}