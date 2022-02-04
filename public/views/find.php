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
    <link rel="stylesheet" type="text/css" href="public/css/find.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>FIND PAGE</title>
</head>

<body>
    <div class="basecontainer">
        <?php include('navbar.php');?>
        <div class="lowernav"></div>
        <div class="content">
            <div class="sidebar">
                <div class="user-info"></div>
                <div class="info-bar"></div>
                <div class="user-info-two"></div>
                <div class="chatbox"></div>
                <div class="messagebox"></div>
            </div>
            <div class="map-area"></div>
        </div>
    </div>
</body>