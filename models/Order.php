<?php
class Order {
    public DatabaseConnection $order_connection;
    public $ordersTable;
    public function __construct(){
        $this->order_connection = new DatabaseConnection;
        $this->ordersTable->getTable('orders');
    }
    public function get_download_count(){
        //select download link
    }
    public function generate_new_link(){
        //update download link count and update the link with new ink
    }
    
}