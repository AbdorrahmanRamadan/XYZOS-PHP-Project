<?php

require_once("../vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as ConnectionManager;

class DatabaseConnection
{
    public $connection;

    public function __construct()
    {
        $this->connection = new ConnectionManager();
        $this->connection->addConnection(
            [
                "driver" => _driver_,
                "host" => _host_,
                "database" => _database_,
                "username" => _username_,
                "password" => _password_
            ]
        );
        $this->connection->setAsGlobal();
        $this->connection->bootEloquent();
    }
    public static function getTable($table){
        return ConnectionManager::table("$table");
    }

    /*

    public function get_all_users(){
        $this->capsule=Capsule::table("users")->get();
        return $this->capsule;
    }

    public function get_order_count($user_id){
        $this->capsule=Capsule::table("orders")->select("Download_count")->where("user_id","=","$user_id");
    }
*/
}
