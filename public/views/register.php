<?php
session_start();

if (isset($_SESSION['userid']))
{
    header("location: ../rosters");
}
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css"/>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>REGISTER PAGE</title>
</head>

<body>
<div class="container">
    <div class="register">
        <form class="loginform" action="register" method="POST">
            <div class="insideform">
                <div class="message">
                    <?php if(isset($messages))
                    {
                        foreach ($messages as $message)
                        {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input class="inputspace" name="email" type="text" placeholder="Email">
                <input class="inputspace" name="password" type="password" placeholder="Password">
                <input class="inputspace" name="confirmedPassword" type="password" placeholder="Password">
                <input class="inputspace" name="name" type="text" placeholder="Name">
                <input class="inputspace" name="surname" type="text" placeholder="Surname">
                <input class="inputspace" name="phone" type="text" placeholder="Phone">
            </div>
            <button type="SUBMIT" class="loginbutton">Register</button>
        </form>
    </div>
    <div class="logo">
        <img src="public/img/logo2.png">
    </div>
</div>
</body>
