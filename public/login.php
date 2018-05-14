<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Project FIFA</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
    </head>
    <body>
    <?php
    require ('templates/header.php')
    ?>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <div class="info">
        <div class="container">
            <div class="info-header">
                <h2>Login</h2>
            </div>
            <div class="info-split">
                <div class="info-login">
                    <h2>Inloggen</h2>
                    <form action="../app/login/login.php" method="post">
                        <p>Username</p>
                        <input type="text" name="username">
                        <p>wachtwoord</p>
                        <input type="password" name="password">
                        <div class="info-login-button">
                            <button name="login">inloggen</button>
                        </div>
                    </form>
                </div>
                <div class="info-register">
                    <h2>registreren</h2>
                    <form action="../app/login/register.php" method="post">
                        <p>Username</p>
                        <input type="text" name="username">
                        <p>wachtwoord</p>
                        <input type="password" name="password">
                        <div class="info-login-button">
                            <button name="signup">Registreer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php
        error_reporting(E_PARSE || E_ERROR);
        if (($_GET['signup'] == 'succes' )){
            echo '<h5>Gebruiker gemaakt!</h5>';
        }
        if ($_GET['signup'] == 'empty'){
            echo '<h5>Vull all velden in aub.</h5>';
        }
        if ($_GET['email'] == 'taken')
        {
            echo '<h5>deze gerbuikersnaam is al in gebruik.</h5>';
        }
        if ($_GET['login'] == 'succes')
        {
                echo '<h5>Welkom '.$_SESSION["username"].'</h5>';
        }
        if ($_GET['login'] == 'adminSucces')
        {
            echo '<h5>Welcome Admin</h5>';
        }
        if ($_GET['login'] == 'wrong')
        {
            echo '<h5>de gerbuikersnaam of wachtwoord is onjuist</h5>';
        }
        if (isset($_SESSION['username'])){
            echo '<h2>welkom '.$_SESSION["username"].'</h2>';
        }
        ?>
    </div>

    <?php
    require ('templates/footer.php')
    ?>
    </body>

        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>


