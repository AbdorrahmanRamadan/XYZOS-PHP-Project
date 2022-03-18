<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
require_once('../vendor/autoload.php');
$refreshObj = new Download();
$count=$refreshObj->getDownloadCount($_SESSION['userID']);
$flag=true;
if($count!=$_SESSION['downloadCount'] || $flag){
    $_SESSION['downloadCount']=$count;
    $flag=false;
}
echo "You have downloaded " . $count . " times";

