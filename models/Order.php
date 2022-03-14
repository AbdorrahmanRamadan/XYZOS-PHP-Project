<?php
class Order {
    public DatabaseConnection $order_connection;
    public $ordersTable;
    public function __construct(){
        $this->order_connection = new DatabaseConnection;
        $this->ordersTable= $this->order_connection->getTable("orders");
    }
    public function get_download_count(){
        //select download link
    }
    public function generate_new_link(){
        //update download link count and update the link with new ink
    }
    //Download_count,product_id,user_id,product_link
    public function insertOrder($uid,$download_count, $product_link, $product_id ){
        try{
        $this->ordersTable->insertGetId([
            'user_id' => $uid,
            'Download_count' => $download_count,
            'product_link' => $product_link,
            'product_id' => $product_id
        ]);
    } catch(\PDOEXCEPTION $ex){
        $ex->getMessage();
    }
    
}
}