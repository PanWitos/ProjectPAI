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
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>CATALOGUE PAGE</title>
</head>

<body>
<div class="basecontainer">
    <?php include('navbar.php');?>
    <div class="lowernav"></div>
    <div class="content">
        <div class="left-content">
            <div class="upper-content">
                <div class="imagebox">
                    <img src="public/img/naz.gif">
                </div>
            </div>
            <div class="lower-content">
                <div class="info-bar"></div>
                <div class="info">
                    <p>Siema</p>
                    <p>Siema</p>
                    <p>Siema</p>
                    <p>Siema</p>
                </div>
            </div>
        </div>
        <div class="right-content">
            <div class="info-bar"></div>
            <p>Siema</p>
            <div class="info-bar"></div>
            <p>Siema</p>
            <div class="info-bar"></div>
            <p>Siema</p>
            <div class="info-bar"></div>
            <p>Siema</p>
        </div>
    </div>
</div>