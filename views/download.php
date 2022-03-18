<?php
require_once("../vendor/autoload.php");
session_start();
$downloadObj = new Download();
if(isset($_SESSION['userID'])){
    if (isset($_POST['logout'])) {
        $downloadObj->logout();
        header("Location:payment.php");
    } elseif (isset($_POST["goToDownload"])) {
        $downloadLink = $downloadObj->getDownloadLink($_SESSION["userID"]);
        $currentDownloadCount = $downloadObj->getDownloadCount($_SESSION['userID']);
        $_SESSION['downloadLink']=$downloadLink;
        $_SESSION['downloadCount']=$$currentDownloadCount;
        header("Location:download_area.php");
    }}
else{
    header("Location:payment.php");
}
if(isset($_GET['page'])){
    if ($_GET['page'] == 'profile'){
        header('Location:profile.php');
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Download</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../src/css/style.css">
</head>

<body>
<nav class="navbar">
    <div class="container">
        <div class="page_logo">
            <img src="../src/images/logo.png" class="logo" draggable="false">
        </div>
        <div class="profile">
            <label>
                <i class="fa-solid fa-circle-user profile-logo"></i>
                <span class="username"><a href="?page=profile"><?php if (isset($_SESSION["userEmail"])) echo $_SESSION["userEmail"] ?></a></span>
            </label>
            <form method="post" style="display: inline;">
                <button type="submit" name="logout" class="btn-logout" title="Logout"><i class="fa-solid fa-power-off"></i></button>
            </form>
        </div>
    </div>
</nav>
<div class="download_body">
    <div class="container">
        <div class="download-image">
            <img src="../src/images/download.svg" class="download" draggable="false">
        </div>
        <div class="actions">
            <form method="post" style="display: inline;">
                <button type="submit" name="goToDownload" class="btn_field success">Download</button>
            </form>
            <form method="post" style="display: inline;">
                <button type="submit" name="logout" class="btn_field">Logout</button>
            </form>
        </div>
    </div>
</div>
</body>

</html>