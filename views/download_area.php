<?php
require_once("../vendor/autoload.php");
session_start();
$downloadObj = new Download();
if(isset($_SESSION['userID'])){
    $link=$_SESSION['downloadLink']; //key?
    $displayedLink="<a href='$link' id='download_link'>$link</a>";
    if(isset($_GET['key'])){
        $downloadObj->downloadFile($_SESSION["userID"],$_GET['key']);
    }
}else{
    header("Location:login.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../src/css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
        $(document).ready(function(){
            $("#count").load("../utilities/refreshCounter.php");
            setInterval(function() {
                $("#count").load("../utilities/refreshCounter.php");
            }, 1000);
        });

        $(document).ready(function(){
            $("#link_container").load("../utilities/refreshLink.php");
            setInterval(function() {
                $("#link_container").load("../utilities/refreshLink.php");
            }, 1000);
        });
    </script>


</head>


<body>
<nav class="navbar">
    <div class="container">
        <div class="page_logo">
            <img src="../src/images/logo.png" class="logo" draggable="false">
        </div>
        <div class="profile">
            <i class="fa-solid fa-circle-user profile-logo"></i>
            <span class="username"><a href=""><?php if(isset($_SESSION["userEmail"]))echo $_SESSION["userEmail"]?></a></span>
        </div>
    </div>
</nav>
<div class="download_body">
    <div class="container">
        <div class="download-data-image">
            <img src="../src/images/download.svg" class="download" draggable="false">
        </div>
        <div class="file-data">
            <label id="count"> </label><br>
            <label><?php echo "max number of downloads is 7 \n"; ?> </label><br>

            <label>File Size:
            </label>
            <span>2 KB</span>
        </div>
        <div class="download-link">
            <div class="download-here">
                Download From Here
            </div>
            <div id="link_container" class="link">
                <?php
                echo $displayedLink;
                ?>
            </div>
        </div>
    </div>

</div>

</body>

</html>
