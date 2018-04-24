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
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <div class="header">
        <div class="container">
            <div class="header-split">
                <div class="header-logo">
                    <a href="index.php"><h1>Project FIFA</h1></a>
                </div>
                <div class="header-nav">
                    <nav>
                        <a href="index.php">Home</a>
                        <a href="login.php">Login</a>
                        <a href="team.php">Teams</a>
                        <a href="player.php">Spelers</a>
                        <a href="matches.php">Wedstrijden</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="container">
            <div class="info-split">
                <div class="info-login">
                    <h2>Inloggen</h2>
                    <form action="../app/login/login.php" method="post">
                        <p>Username</p>
                        <input type="text" name="username">
                        <p>wachtwoord</p>
                        <input type="password" name="password">
                        <button name="login">inloggen</button>
                    </form>
                </div>
                <div class="info-register">
                    <h2>registreren</h2>
                    <form action="../app/login/register.php" method="post">
                        <p>Username</p>
                        <input type="text" name="username">
                        <p>wachtwoord</p>
                        <input type="password" name="password">
                        <button name="signup">Registreer</button>
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
            echo '<h5>you are logged in!</h5>';
        }
        if ($_GET['login'] == 'wrong')
        {
            echo '<h5>de gerbuikersnaam of wachtwoord is onjuist</h5>';
        }
        if (isset($_SESSION['username'])){
            echo '   <form action="../app/logout/logout.php" method="post">
                    <h2>welcome</h2>
                 <button type="submit" name="logout">Logout</button>
                 </form>';
        }
        ?>
    </div>
    <div class="footer">
        <div class="container">
            <div class="footer-split">
                <div class="footer-credits">
                    <p>Makers van dit project:</p>
                    <ul>
                        <li>Gerben Logghe</li>
                        <li>Sander van Deurzen</li>
                        <li>Dominic Baeten</li>
                        <li>Zeff Drent</li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <p>Contact</p>
                    <p>06 12 34 56 78</p>
                </div>
            </div>
        </div>
    </div>


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
    </body>
</html>
