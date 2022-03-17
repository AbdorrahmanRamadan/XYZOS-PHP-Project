<?php
class Order {
    public DatabaseConnection $order_connection;
    public $ordersTable;
    public function __construct(){
        $this->order_connection = new DatabaseConnection;
        $this->ordersTable= $this->order_connection->getTable("orders");
    }
    public function get_download_count($userid){
        //select download link
        $count = $this->ordersTable->select('Download_count')->where('user_id',$userid)->get();
        return $this->ordersTable->value($count);

    }
    public function get_download_link($userid){
        $link = $this->ordersTable->select('product_link')->where('user_id',$userid)->get();
        return $this->ordersTable->value($link);
    }
    public function generate_new_link($userid){
        //update download link count and update the link with new link
        $key= uniqid(time(),TRUE);
        $newCount=$this->get_download_count($userid);
        $this->ordersTable->where('user_id',$userid)->update(['product_link' =>$key, 'Download_count' => $newCount+1]);
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