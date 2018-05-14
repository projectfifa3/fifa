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
            <h2>Wedstrijden</h2>
        </div>
        <div class="info-knockout">
            <h2>Knock-out</h2>
            <div class="info-knockout-final">
                <div class="knockout-match">
                    <h3>Finale</h3>
                    <p>Winnaar #1 VS Winnaar #2</p>
                    <p>0 - 0</p>
                </div>
            </div>
            <div class="info-knockout-semifinal">
                <div class="knockout-match">
                    <h3>Halve Finale #1</h3>
                    <p>Winnaar #1 VS Winnaar #2</p>
                    <p>0 - 0</p>
                </div>
                <div class="knockout-match">
                    <h3>Halve Finale #2</h3>
                    <p>Winnaar #3 VS Winnaar #4</p>
                    <p>0 - 0</p>
                </div>
            </div>
            <div class="info-knockout-quarterfinal">
                <div class="knockout-match">
                    <h3>Kwart Finale #1</h3>
                    <p>Team 1 VS Team 2</p>
                    <p>0 - 0</p>
                </div>
                <div class="knockout-match">
                    <h3>Kwart Finale #2</h3>
                    <p>Team 3 VS Team 4</p>
                    <p>0 - 0</p>
                </div>
                <div class="knockout-match">
                    <h3>Kwart Finale #3</h3>
                    <p>Team 5 VS Team 6</p>
                    <p>0 - 0</p>
                </div>
                <div class="knockout-match">
                    <h3>Kwart Finale #4</h3>
                    <p>Team 7 VS Team 8</p>
                    <p>0 - 0</p>
                </div>
            </div>
        </div>
        <div class="poules-teams">
            <h2>Poules</h2>
            <div class="poules">
                <div class="poule">
                    <h3>Poule A</h3>
                    <ul>
                        <li>Team 1</li>
                        <li>Team 2</li>
                        <li>Team 3</li>
                        <li>Team 4</li>
                    </ul>
                </div>
                <div class="poule">
                    <h3>Poule B</h3>
                    <ul>
                        <li>Team 1</li>
                        <li>Team 2</li>
                        <li>Team 3</li>
                        <li>Team 4</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="poules-shedule">
            <h2>Poule Wedstrijden</h2>
            <div class="poules-games">
                <div class="poule-games">
                    <p>1ste Wedstrijden</p>
                    <ul>
                        <li>Team 1 VS Team 2</li>
                        <li>Team 3 VS Team 4</li>
                        <li>Team 5 VS Team 6</li>
                        <li>Team 7 VS Team 8</li>
                    </ul>
                </div>
                <div class="poule-games">
                    <p>2de Wedstrijden</p>
                    <ul>
                        <li>Team 1 VS Team 3</li>
                        <li>Team 2 VS Team 4</li>
                        <li>Team 5 VS Team 7</li>
                        <li>Team 6 VS Team 8</li>
                    </ul>
                </div>
                <div class="poule-games">
                    <p>3de Wedstrijden</p>
                    <ul>
                        <li>Team 1 VS Team 4</li>
                        <li>Team 2 VS Team 5</li>
                        <li>Team 3 VS Team 8</li>
                        <li>Team 6 VS Team 7</li>
                    </ul>
                </div>
                <div class="poule-games">
                    <p>4de Wedstrijden</p>
                    <ul>
                        <li>Team 1 VS Team 8</li>
                        <li>Team 2 VS Team 7</li>
                        <li>Team 3 VS Team 6</li>
                        <li>Team 4   VS Team 5</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="poule-matches">
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