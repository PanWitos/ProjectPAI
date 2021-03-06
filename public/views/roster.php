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
    <link rel="stylesheet" type="text/css" href="public/css/roster.css">
    <title>ROSTERS PAGE</title>
</head>

<body>
    <div class="basecontainer">
        <?php include('navbar.php');?>
        <div class="lowernav">
            <div class="subnavbutton">
                <a href="http://localhost:8080/rosters"><img src="public/img/left-arrow.png"></a>
            </div>
            <?php if($_SESSION['userid'] === $roster->getAuthor()->getId())
                {
                    include('add.php');
                }?>
        </div>
        <div class="content">
            <div class="title"><h2><?= $roster->getTitle() ?></h2><p>Faction: <?= $roster->getFaction()->getName() ?></p></div>
            <section class="units">
                <div id="unitbox">
                    <div class="unitname"><h3>Unit name</h3></div><div class="unitnumber"><h3>Unit number</h3></div><div class="unitcost"><h3>Unit cost</h3></div>
                </div>
                <?php foreach ($units as $unit): ?>
                    <div id="unitbox">
                        <div class="unitname"><a href="http://localhost:8080/item?id=<?= $unit->getId(); ?>"><?= $unit->getName();?></a></div><div class="unitnumber"><?= $unit->getNumber();?></div><div class="unitcost"><?= $unit->getNumber()*$unit->getCost() ?></div>
                    </div>
                    <div id="unitbox" class="purple">
                        <div class="unitname">HP: <?= $unit->getHealth();?></div><div class="unitnumber">Move: <?= $unit->getMove();?></div><div class="unitcost"></div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </div>
</body>
