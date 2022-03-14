<?php
class Token
{
    public DatabaseConnection $order_connection;
    public $tokensTable;
    public function __construct(){
        $this->order_connection = new DatabaseConnection();
        $this->tokensTable=DatabaseConnection::getTable('tokens');
    }
    public function add_token($userid){
        //select download link
    }
    public function remove_token($userid){
        //update download link count and update the link with new ink
    }
    public function getToken($id){
        return $this->tokensTable->select("remeber_me_token")->where("ID","=","$id")->get();
    }

}