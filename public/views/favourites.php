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
            <a href="http://localhost:8080/profile"><img src="public/img/left-arrow.png"></a>
        </div>
    </div>
    <div class="content">
        <section class="units-form">
            <h1>Favourite games</h1>
            <form action="favourites" method="POST">
                <?php if(isset($messages))
                {
                    foreach ($messages as $message)
                    {
                        echo $message;
                    }
                }

                ?>
                <select id="faveselect" name="fave" required>
                    <?php foreach($games as $game):?>
                        <option value=<?=serialize($game)?>><?=$game?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Add</button>
            </form>
        </section>
    </div>
</div>