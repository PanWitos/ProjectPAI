<?php
session_start();

if (!isset($_SESSION['userid']))
{
    header("location: ../login");
}
?>
<!DOCTYPE html>

<head>
    <?php include('header.php');?>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <title>PROFILE PAGE</title>
</head>

<body>
<div class="basecontainer">
    <?php include('navbar.php');?>
    <div class="lowernav">
        <div class="subnavbutton">
            <a href="logout"><img src="public/img/logout.png"></a>
        </div>
    </div>
    <div class="content">
        <div class="left-content">
            <div class="upper-content">
                <div class="imagebox">
                    <img src="public/img/uploads/<?= $user->getImage(); ?>">
                </div>
            </div>
            <div class="lower-content">
                <div class="info-bar">
                    <p>Favourite games</p>
                    <div class="subnavbutton">
                        <a href="http://localhost:8080/favourites"><img src="public/img/editing.png"></a>
                    </div>
                </div>
                <div class="info">
                    <?php if(!is_null($games))
                    {
                        foreach ($games as $game):
                      ?>
                    <p><?=$game->getName()?></p>
                    <?php endforeach; }?>
                </div>
            </div>
        </div>
        <div class="right-content">
            <div class="info-bar"><p>Name</p></div>
            <div class="info-space"><?= $user->getName(); ?></div>
            <div class="info-bar"><p>Surname</p></div>
            <div class="info-space"><?= $user->getSurname(); ?></div>
            <div class="info-bar"><p>Phone</p></div>
            <div class="info-space"><?= $user->getPhone(); ?></div>
        </div>
    </div>
</div>