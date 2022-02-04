<?php
session_start();

if (!isset($_SESSION['userid']))
{
    header("location: ../login");
}
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/roster.css">
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>ROSTERS PAGE</title>
</head>

<body>
    <div class="basecontainer">
        <?php include('navbar.php');?>
        <div class="lowernav">
            <div class="subnavbutton">
                <a href="http://localhost:8080/rosters"><img src="public/img/left-arrow.png"></a>
            </div>
            <div class="subnavbutton">
                <a href="http://localhost:8080/addUnit?id=<?= $roster->getId();?>"><img src="public/img/plus.png"></a>
            </div>  
        </div>
        <section class="units">
            <?php foreach ($units as $unit): ?>
                <div id="roster-1">
                    <div>
                        <p><?= $unit->getName();?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</body>
