<?php
session_start();

if (!isset($_SESSION['userid']))
{
    header("location: ../login");
}
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/rosters.css">
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>UNIT PAGE</title>
</head>

<body>
    <div class="basecontainer">
        <?php include('navbar.php');?>
        <div class="lowernav">
        </div>
        <section class="units-form">
            <h1>Upload</h1>
            <form action="addUnit?id=<?= $id;?>" method="POST" ENCTYPE="multipart/form-data">
                <?php if(isset($messages))
                {
                    foreach ($messages as $message)
                    {
                        echo $message;
                    }
                }

                ?>
                <select id="unitselect" name="unit" required>
                    <?php foreach($units as $unit):?>
                        <option value=<?=serialize($unit)?>><?=$unit?></option>
                    <?php endforeach; ?>
                </select>
                <input name="number" type="number" placeholder="Number">
                <button type="submit">Add</button>
            </form>
        </section>
    </div>
</body>
