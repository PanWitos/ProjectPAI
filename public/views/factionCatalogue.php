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
    <link rel="stylesheet" type="text/css" href="public/css/catalogue.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>CATALOGUE PAGE</title>
</head>

<body>
<div class="basecontainer">
    <?php include('navbar.php');?>
    <div class="lowernav">
        <div class="subnavbutton">
            <a href="http://localhost:8080/catalogue"><img src="public/img/left-arrow.png"></a>
        </div>
    </div>
    <div class = "content">
        <?php foreach ($factions as $faction): ?>
        <div class="gamebox">
            <div class="game"><h2><a href="http://localhost:8080/unitCatalogue?id=<?= $faction->getId();?>"><?=$faction->getName()?></a></h2></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
