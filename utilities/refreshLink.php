<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
require_once('../vendor/autoload.php');
$count=$_SESSION['downloadCount'];
$refreshObj = new Download();
$link=$refreshObj->getDownloadLink($_SESSION['userID']);
if($count<7){
echo "<a href='$link' id='download_link'>$link</a>";
}else{
    echo 'No more valid links to download';
}