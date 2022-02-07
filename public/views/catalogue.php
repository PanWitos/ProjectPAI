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
    <link rel="stylesheet" type="text/css" href="public/css/catalogue.css">
    <title>CATALOGUE PAGE</title>
</head>

<body>
<div class="basecontainer">
    <?php include('navbar.php');?>
    <div class="lowernav">

    </div>
    <div class = "content">
        <?php foreach ($games as $game): ?>
        <div class="gamebox">
            <div class="game"><h2><a href="http://localhost:8080/factionCatalogue?id=<?= $game->getId();?>"><?=$game->getName()?></a></h2></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
