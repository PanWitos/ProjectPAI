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
    <link rel="stylesheet" type="text/css" href="public/css/item.css">
    <title>ITEM PAGE</title>
</head>
<body>
<div class="basecontainer">
    <?php include('navbar.php');?>
    <div class="lowernav">
        <div class="subnavbutton">
            <a href="http://localhost:8080/unitCatalogue?id=<?= $unit->getFaction()->getId();?>"><img src="public/img/left-arrow.png"></a>
        </div>
        <div class="subnavbutton">
            <p><?=$unit->getName(); ?></p>
        </div>
    </div>
    <div class="content">
        <div class="left-content">
            <div class="upper-content">
<!--                <img src="public/img/btm.png">-->
                <img src="public/img/items/<?= $unit->getImage(); ?>">
            </div>
            <div class="lower-content">
                <div class="info-bar"><p>Description</p></div>
                <div><p><?= $unit->getDescription(); ?></p></div>
            </div>
        </div>
        <div class="right-content">
            <div class="info-bar"><p>Health</p></div>
            <div class="info-space"><p><?= $unit->getHealth() ?></p></div>
            <div class="info-bar"><p>Move</p></div>
            <div class="info-space"><p><?= $unit->getMove() ?></p></div>
        </div>
    </div>
</div>
</body>