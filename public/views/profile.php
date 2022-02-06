<?php
session_start();

if (!isset($_SESSION['userid']))
{
    header("location: ../login");
}
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>PROFILE PAGE</title>
</head>

<body>
<div class="basecontainer">
    <?php include('navbar.php');?>
    <div class="lowernav">
        <div class="subnavbutton">
            <a href="http://localhost:8080/rosters"><img src="public/img/editing.png"></a>
        </div>
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
                <div class="info-bar"><p>Favourite games</p></div>
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