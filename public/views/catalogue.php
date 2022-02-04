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
        <div class="cataloguediv">
            <div class="dropdown">
                <button class="dropbtn"><h2>Choose army</h2></button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
    </div>
    <div class = "content">
        <div class="dropdown">
            <button class="dropbtn"><h2>Army</h2></button>
            <div class="dropdown-content">
                <a href="#"><h2>cosik</h2></a>
                <a href="#"><h2>cosik</h2></a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn"><h2>Army</h2></button>
            <div class="dropdown-content">
                <a href="#"><h2>cosik</h2></a>
                <a href="#"><h2>cosik</h2></a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn"><h2>Army</h2></button>
            <div class="dropdown-content">
                <a href="#"><h2>cosik</h2></a>
                <a href="#"><h2>cosik</h2></a>
            </div>
        </div>
    </div>
</div>
</body>
