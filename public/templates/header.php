<!--This header is just a suggestion. Do whatever you want with it!-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Fifa</title>
    <!-- you can link bootstrap if you want.   -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="assets/css/new.css">
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
                    <?php
                    header('Content-Type: text/html; charset=ISO-8859-1');
                    session_start();
                    error_reporting(E_PARSE || E_ERROR);
                    if (isset($_SESSION['is_Admin']) || isset($_SESSION['username'])){
                        echo '<a href="../app/logout/logout.php" name="Logout">logout</a>';
                    }
                    ?>
                    <a href="index.php">Home</a>
                    <a href="login.php">Login</a>
                    <a href="team.php">Teams</a>
                    <a href="player.php">Spelers</a>
                    <a href="matches.php">Wedstrijden</a>
                </nav>
                <?php
                if (!isset($_SESSION['username']) && !isset($_SESSION['is_Admin'])){
                    echo '<img src="../img/Soccer.png" alt="footbalcharacter" class="soccerimg">';
                }
                if ((isset($_SESSION['username']) || isset($_SESSION['is_Admin']))){
                    echo '<img src="../img/Soccer.png" alt="footbalcharacter" class="soccerimg2">';
                }
                ?>

            </div>
        </div>
    </div>
</div>