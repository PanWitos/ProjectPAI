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
    <title>ROSTERS PAGE</title>
</head>

<body>
    <div class="basecontainer">
        <?php include('navbar.php');?>
        <div class="lowernav">
        </div>
        <section class="rosters-form">
            <h1>Upload</h1>
            <form action="addRoster" method="POST" ENCTYPE="multipart/form-data">
                <?php if(isset($messages))
                {
                    foreach ($messages as $message)
                    {
                        echo $message;
                    }
                }
                ?>
                <input name="title" type="text" placeholder="Title">
                <select id="gameselect" name="game" required>
                    <?php foreach($games as $game):?>
                        <option value=<?=serialize($game)?>><?=$game?></option>
                    <?php endforeach; ?>
                </select>
                <select id="gameselect" name="faction" required>
                    <?php foreach($games as $game):?>
                        <?php foreach($game->getFactions() as $faction):?>
                            <option value=<?=serialize($faction)?>><?=$faction?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Add</button>
            </form>
        </section>
    </div>
</body>
