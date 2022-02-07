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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="container">
        <div class="login">
            <form class="loginform" action="login" method="POST">
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
                </div>
                <button type="SUBMIT" class="loginbutton">Login</button>
            </form>
            <div class=>
                <button class="registerbutton"><a href="register">Register</a></button>
            </div>
        </div>

        <div class="logo">
            <img src="public/img/logo2.png">
        </div>
    </div>
</body>