<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/rosters.css">
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
                        <a href="#"><img src="public/img/scroll.png"></a>
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
                <a href="#"><img src="public/img/user.png"></a>
                <div><p>My Rosters</p></div>
            </div>
            <div class="subnavbutton">
                <a href="#"><img src="public/img/earth.png"></a>
                <div><p>Browse</p></div>
            </div>
            <div class="subnavbutton">
                <input placeholder="search roster">
            </div>
            <div class="subnavbutton">
                <a href="http://localhost:8080/addRoster"><img src="public/img/plus.png"></a>
            </div>  
        </div>
        <section class="rosters">
            <?php foreach ($rosters as $roster): ?>
            <div id="roster-1">
                <h2><?= $roster-> getTitle(); ?></h2>
                <div>
                    <p>Game: <?= $roster-> getGame(); ?></p> <p>Author: John Smith</p> <p>Pts: <?= $roster-> getPoints(); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
    </div>
</body>
