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
    <link rel="stylesheet" type="text/css" href="public/css/item.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>ITEM PAGE</title>
</head>
<body>
<div class="basecontainer">
    <?php include('navbar.php');?>
    <div class="lowernav">
        <div class="subnavbutton">
            <a href="http://localhost:8080/catalogue"><img src="public/img/left-arrow.png"></a>
        </div>
        <div class="subnavbutton">
            <p>Yout text Here</p>
        </div>
        <div class="subnavbutton">
        <a href="#"><img src="public/img/plus.png"></a>
        </div>  
    </div>
    <div class="content">
        <div class="left-content">
            <div class="upper-content">
                <div class="image-content">
                    <img src="public/img/btm.png">
                </div>
                <div class="text-content">
                    <p>a</p>
                    <p>a</p>
                    <p>a</p>
                    <p>a</p>
                    <p>a</p>
                    <p>a</p>
                </div>
            </div>
            <div class="lower-content">
                <div class="info-bar"><p>a</p></div>
                <div><p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p></div>
            </div>
        </div>
        <div class="right-content">
            <div class="info-bar"><p>a</p></div>
            <div class="info-one"><p>a</p></div>
            <div class="info-bar"><p>a</p></div>
            <div class="info-two"><p>a</p></div>
            <div class="info-bar"><p>a</p></div>
            <div class="info-three"><p>a</p></div>
        </div>
    </div>
</div>
</body>