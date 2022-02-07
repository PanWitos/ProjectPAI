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
    <link rel="stylesheet" type="text/css" href="public/css/rosters.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>ROSTERS PAGE</title>
</head>

<body>
    <div class="basecontainer">
        <?php include('navbar.php');?>
        <div class="lowernav">
            <div class="subnavbutton">
                <a href="#"><img src="public/img/user.png"></a>
                <div><p>My Rosters</p></div>
            </div>
            <div class="subnavbutton">
                <a href="#"><img src="public/img/earth.png"></a>
                <div><p>Browse</p></div>
            </div>
            <div class="subnavbutton">
                <input placeholder="search roster">
            </div>
            <div class="subnavbutton">
                <a href="http://localhost:8080/addRoster"><img src="public/img/plus.png"></a>
            </div>  
        </div>
        <section class="rosters">
            <?php foreach ($rosters as $roster): ?>
            <div id="roster-1">
                <h2><a href="http://localhost:8080/roster?id=<?= $roster->getId();?>"><?= $roster-> getTitle(); ?></a></h2>
                <div>
                    <p>Game: </p><p><?= $roster-> getGame(); ?></p><p>Author: </p> <p><?= $roster-> getAuthor(); ?></p><p>Pts:</p><p><?= $roster-> getPoints(); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
    </div>
</body>

<template id="roster-template">
    <div id="">
        <h2><a>title</a></h2>
        <div>
            <p>Game:</p><p name="game">game</p> <p>Author:</p><p name="author">author</p><p>Pts:</p><p name="points">points</p>
        </div>
    </div>
</template>