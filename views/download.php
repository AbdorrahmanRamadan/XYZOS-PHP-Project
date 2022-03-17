<?php
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
<nav class="navbar">
    <div class="container">
        <div class="page_logo">
            <img src="src/images/logo.png" class="logo" draggable="false">
        </div>
        <div class="profile">
            <i class="fa-solid fa-circle-user profile-logo"></i>
            <span class="username"><a href="?page=profile"><?php if(isset($_SESSION["userEmail"]))echo $_SESSION["userEmail"]?></a></span>
        </div>
    </div>
</nav>
<div class="download_body">
    <div class="container">
        <div class="download-image">
            <img src="src/images/download.svg" class="download" draggable="false">
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
