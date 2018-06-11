
<!doctype html>
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
            <?php
            if (!isset($_SESSION['username']) || isset($_SESSION['is_Admin'])){
                echo '<h2>Project FIFA</h2>
                      <h2>Als je het CSV bestand wilt downloaden, moet je je eerst <a href="login.php" style="text-decoration: none">registreren</a></h2>
                      <h2>Als u een fout in de website ziet kunt u het <a href="https://github.com/projectfifa3/fifa/issues" style="text-decoration: none">hier</a> rapporteren</h2>
                      ';
            }
            ?>
        </div>
        <div class="download">
            <?php
            if (isset($_SESSION['username']) || isset($_SESSION['is_Admin'])){
                echo '<div class="csvdownload">
                  <a href="tbl_all.csv">Download CSV</a>
                </div>';
            }



//                session_start();
//                header('Content-Type: text/csv; charset=utf-8');
//                header('Content-Disposition: attachment; filename=project_fifa' . date('Y-m-d') . '.csv');
//                $output = fopen("php://output", "w");
//                fputcsv($output, array('id', 'teamname', 'position', 'score'));
//
//                $array = $conn->prepare("SELECT * FROM tbl_team ");
//                $array->execute();
//                $array = $array->fetchAll();
//                foreach ($array as $row) {
//                    fputcsv($output, $row);
//                }
//                fclose($output);




//                   Pick a filename and destination directory for the file
//                   Remember that the folder where you want to write the file has to be writable
//                   header('Content-Type: text/csv; charset=utf-8');
//                   header('Content-Disposition: attachment; filename=project_fifa' . date('Y-m-d') . '.csv');
//
////                 Actually create the file
////                 The w+ parameter will wipe out and overwrite any existing file with the same name
//                   $handle = fopen("php://output", "w");
////                 Write the spreadsheet column titles / labels
//                   fputcsv($handle, array('student_id','team_id', 'first_name', 'last_name'));
//
////                  Write all the user records to the spreadsheet
//                    foreach($results as $row)
//                    {
//                        fputcsv($handle, array($row['student_id'], $row['team_id'], $row['first_name'], $row['last_name']));
//                    }
//
//
//                      Finish writing the file
//                    fclose($handle);





            ?>
        </div>

        <div class="info-app-body">
            <img src="../img/fifa-logo.png" alt="c# application">
        </div>
        <div class="info-webapp">
            <div class="info-app-header">
                <h3>Over de Webapp</h3>
            </div>
            <div class="info-app-footer">
                <p>In ons nieuwe project hebben wij een website gemaakt waarbij je je eigen voetbalteam kan maken. Ook kan je je eigen spelers erbij toevoegen en uiteindelijk kan je zien hoe ze het tegen andere teams opnemen om te kijken wie de beste is van iedereen!</p>
                <p>Op de inlog pagina kun je registeren en inloggen met jouw gegevens. Alle gegevens worden goed beveiligd en binnekort komt er een nieuwe pagina bij waarbij u alle voorwaarden kan zien.</p>
            </div>
        </div>
        <div class="info-webapp">
            <div class="info-app-header">
                <h3>Over de Applicatie</h3>
            </div>
            <div class="info-app-footer">
                <p>in het c# project kun je op je eigen team zijn score wedden. Je kan dan weer inloggen met je account van deze website en als je de score goedgewed hebt krijg je je inleg verdubbeld!</p>
                <p>voor het gerbuiken zou u wel het csv bestand moeten hebben en dat kun je downloaden door in te loggen en dan weer terug naar deze pagina te gaan of contact of te nemen met 1 van de 4 admins.</p>
                <button><a href="">Download Fifa</a></button>
            </div>
        </div>
        <div class="info-webapp">
            <div class="info-app-header">
                <h3>Over ons</h3>
            </div>
            <div class="info-app-footer">
                <p>onze groep is gekozen door onze opdrachtgever. Iedereen is erg motiverend en werkt heel goed en gehoorzaam aan het project.</p>
                <p>onze groepleden zijn:</p>
                <ul>
                    <li>Sander van Deurzen   -   Sander.vandeurzen@gmail.com</li>
                    <li>Dominic Baeten   -   Dominic.Baeten@gmail.com</li>
                    <li>Zeff Drent   -   zeff@yahoo.com</li>
                    <li>Gerben Logghe   -   Gerben.Logghe@ziggo.nl</li>
                </ul>
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
<?php
require ('templates/footer.php')
?>
</body>
</html>
