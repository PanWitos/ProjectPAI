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
        <header class="navbar">
            <div class="navbutton">
                <div>
                    <div>
                        <a href="http://localhost:8080/rosters"><img src="public/img/scroll.png"></a>
                    </div>
                </div>
                    <h4>Rosters</h4>
            </div>
            <div class="navbutton">
                <div>
                    <div>
                        <a href="http://localhost:8080/catalogue"><img src="public/img/book.png"></a>
                    </div>
                </div>
                <h4>Catalogue</h4>
            </div>
            <div class="logocenter">
                <img src="public/img/logo2.png">
            </div>  
            <div class="navbutton">
                <div>
                    <div>
                        <a href="http://localhost:8080/find"><img src="public/img/map.png"></a>
                    </div>
                </div>
                <h4>Find Players</h4>
            </div>
            <div class="navbutton">
                <div>
                    <div>
                        <a href="http://localhost:8080/profile"><img src="public/img/helm.png"></a>
                    </div>
                </div>
                <h4>Profile</h4>
            </div>
        </header>
        <div class="lowernav">
            <div class="subnavbutton">
                <a href="#"><img src="public/img/left-arrow.png"></a>
            </div>
            <div class="subnavbutton">
                <a href="#"><img src="public/img/plus.png"></a>
            </div>  
        </div>
    </div>
</body>
