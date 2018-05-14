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

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<?php

require ('templates/header.php');

?>
<div class="info">
    <div class="container">
        <div class="info-header">
            <h2>Teams</h2>
        </div>
        <div class="info-body">
            <h3>Team toevoegen</h3>
            <div class="info-player-add">
                <p>Speler naam:</p>
                <textarea name="team_toevoegen" id="team_toevoegen" cols="20" rows="1"></textarea>
                <button>Toevoegen</button>
            </div>
            <div class="info-team">
                <div class="info-team-upper">
                    <div class="team">
                        <span>Team 1:</span>
                        <ul>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                        </ul>
                    </div>
                    <div class="team">
                        <span>Team 2:</span>
                        <ul>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                        </ul>
                    </div>
                    <div class="team">
                        <span>Team 3:</span>
                        <ul>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                        </ul>
                    </div>
                    <div class="team">
                        <span>Team 4:</span>
                        <ul>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                        </ul>
                    </div>
                </div>
                <div class="info-team-footer">
                    <div class="team">
                        <span>Team 5:</span>
                        <ul>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                        </ul>
                    </div>
                    <div class="team">
                        <span>Team 6:</span>
                        <ul>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                        </ul>
                    </div>
                    <div class="team">
                        <span>Team 7:</span>
                        <ul>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                        </ul>
                    </div>
                    <div class="team">
                        <span>Team 8:</span>
                        <ul>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                            <li>Speler</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('templates/footer.php');
?>

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
