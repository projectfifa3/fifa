

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
            <?php
            if ($_GET['submit'] == 'succes'){
                echo '<h2>succesfully added!</h2>';
            }
            if ($_GET['submit'] == 'empty'){
                echo '<h2>please fill in all columns.</h2>';
            }
            ?>
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
                <?php
                require ('../app/dbconn.php');
                // the ascending query
                $sql = "SELECT * FROM tbl_teams ORDER BY `name` ASC ";

                $stmt=$conn->prepare($sql);
                $stmt->execute();
                $results=$stmt->fetchAll();

                //the descending query

                $sql = "SELECT * FROM tbl_teams ORDER BY `name` DESC ";

                $stmt=$conn->prepare($sql);
                $stmt->execute();
                $desresults=$stmt->fetchAll();

                // insert query from the dropdownmenu

                $option = $_POST['option'];
                $team1 = $_POST['team1'];
                $team2 = $_POST['team2'];
                $team3 = $_POST['team3'];
                $team4 = $_POST['team4'];
                $team5 = $_POST['team5'];
                $team6 = $_POST['team6'];
                $team7 = $_POST['team7'];
                $team8 = $_POST['team8'];
                if (isset($_POST['submit'])) {
                    if (empty($team1) || empty($team2) || empty($team3) || empty($team4) || empty($team5) || empty($team6) || empty($team7) || empty($team8)){
                        header("location:matches.php?submit=empty");

                    }else{
                        $insertQuery = "UPDATE `tbl_team` SET `teamname` = '$team1' WHERE `position` = '1' ";
                        $insertResult = $conn->prepare($insertQuery);
                        $insertExec = $insertResult->execute();

                        $insertQuery2 = "UPDATE `tbl_team` SET `teamname` = '$team2' WHERE `position` = '2' ";
                        $insertResult2 = $conn->prepare($insertQuery2);
                        $insertExec = $insertResult2->execute();

                        $insertQuery3 = "UPDATE `tbl_team` SET `teamname` = '$team3' WHERE `position` = '3'";
                        $insertResult3 = $conn->prepare($insertQuery3);
                        $insertExec = $insertResult3->execute();

                        $insertQuery4 = "UPDATE `tbl_team` SET `teamname` = '$team4' WHERE `position` = '4'";
                        $insertResult4 = $conn->prepare($insertQuery4);
                        $insertExec = $insertResult4->execute();

                        $insertQuery5 = "UPDATE `tbl_team` SET `teamname` = '$team5' WHERE `position` = '5'";
                        $insertResult5 = $conn->prepare($insertQuery5);
                        $insertExec = $insertResult5->execute();

                        $insertQuery6 = "UPDATE `tbl_team` SET `teamname` = '$team6' WHERE `position` = '6'";
                        $insertResult6 = $conn->prepare($insertQuery6);
                        $insertExec = $insertResult6->execute();

                        $insertQuery7 = "UPDATE `tbl_team` SET `teamname` = '$team7' WHERE `position` = '7'";
                        $insertResult7 = $conn->prepare($insertQuery7);
                        $insertExec = $insertResult7->execute();

                        $insertQuery8 = "UPDATE `tbl_team` SET `teamname` = '$team8' WHERE `position` = '8'";
                        $insertResult8 = $conn->prepare($insertQuery8);
                        $insertExec = $insertResult8->execute();

                        header("location:matches.php?submit=succes");
                    }
                }
//                -------------------------------------------------the scores--------------------------------------------\\
                if (isset($_POST['submitscores'])){

                    header("location:matches.php?submit=scoresucces");

                }
                ?>
                <div class="knockout-match">
                    <h3>Kwart Finale #1</h3>
                    <?php
                    // the dropdown menu's\\
                    // team 1
                    if (isset($_SESSION['is_Admin'])){
                        echo '<form action="matches.php" method="post">';
                        echo '  <select name="team1">
                        <option value=""></option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        //team 2

                        echo'   </select>';
                        echo '  <select name="team2">
                        <option value=""></option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        echo'   </select>';
                        echo '    
                        <button name="submit" value="submit">submit</button>
                        ';
                        
                        // scores for match 1
                        echo ' <div class="scores">
                               <form action="matches.php">
                               <input type="number" name="team1score">
                               <input type="number" name="team2score">
                               </div>
                               <div class="scoresubmit">
                               <input type="submit" name="scoresubmit">
                               </div>
                               </form>
                               ';
                    }else{
                        for ($i = 0; $i <= 2; $i++) {

                        //posting the names of the teams
                        $postquery = "SELECT * FROM tbl_team WHERE `position` = '$i' ";
                        $postResult = $conn->prepare($postquery);
                        $postResult->execute();
                        foreach ($postResult as ${'name'.$i}){
                            echo '<div class="matches">';
                           echo ${'name'.$i}['teamname'];
                           echo '</div>';
                        }
                        }

                    }
                    ?>
                </div>

                <div class="knockout-match">
                    <h3>Kwart Finale #2</h3>
                    <?php
                    if (isset($_SESSION['is_Admin'])){
                        //team 3
                        echo '<form action="matches.php" method="post">';
                        echo '  <select name="team3">
                        <option value=""></option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        //team 4
                        echo'   </select>';
                        echo '  <select name="team4">
                        <option value=""></option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        echo'   </select>';

                    }else{
                        for ($i = 3; $i <= 4; $i++) {

                            //posting the names of the teams
                            $postquery = "SELECT * FROM tbl_team WHERE `position` = '$i' ";
                            $postResult = $conn->prepare($postquery);
                            $postResult->execute();
                            foreach ($postResult as ${'name'.$i}){
                                echo '<div class="matches">';
                                echo ${'name'.$i}['teamname'];
                                echo '</div>';
                            }
                        }

                    }
                    ?>
                    <p>0 - 0</p>
                </div>
                <div class="knockout-match">
                    <h3>Kwart Finale #3</h3>
                    <?php
                    if (isset($_SESSION['is_Admin'])){
                        //team 5
                        echo '<form action="matches.php" method="post">';
                        echo '  <select name="team5">
                        <option value=""></option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        //team 6
                        echo'   </select>';
                        echo '  <select name="team6">
                        <option value=""></option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        echo'   </select>';

                    }else{
                        for ($i = 5; $i <= 6; $i++) {

                            //posting the names of the teams
                            $postquery = "SELECT * FROM tbl_team WHERE `position` = '$i' ";
                            $postResult = $conn->prepare($postquery);
                            $postResult->execute();
                            foreach ($postResult as ${'name'.$i}){
                                echo '<div class="matches">';
                                echo ${'name'.$i}['teamname'];
                                echo '</div>';
                            }
                        }

                    }
                    ?>
                    <p>0 - 0</p>
                </div>
                <div class="knockout-match">
                    <h3>Kwart Finale #4</h3>
                    <?php
                    if (isset($_SESSION['is_Admin'])){
                        //team 7
                        echo '<form action="matches.php" method="post">';
                        echo '  <select name="team7">
                        <option value=""></option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        //team 8
                        echo'   </select>';
                        echo '  <select name="team8">
                        <option value=""></option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        echo'   </select>';
                        echo '
                            </form>';
                    }else{
                        for ($i = 7; $i <= 8; $i++) {

                            //posting the names of the teams
                            $postquery = "SELECT * FROM tbl_team WHERE `position` = '$i' ";
                            $postResult = $conn->prepare($postquery);
                            $postResult->execute();
                            foreach ($postResult as ${'name'.$i}){
                                echo '<div class="matches">';
                                echo ${'name'.$i}['teamname'];
                                echo '</div>';
                            }
                        }

                    }
                    ?>
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
                        <?php
                        foreach ($results as $teams){
                            echo '<li>'.$teams['name'].'</li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="poule">
                    <h3>Poule B</h3>
                    <ul>
                        <?php
                        foreach ($desresults as $teams){
                            echo '<li>'.$teams['name'].'</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
<!--        <div class="poules-shedule">-->
<!--            <h2>Poule Wedstrijden</h2>-->
<!--            <div class="poules-games">-->
<!--                <div class="poule-games">-->
<!--                    <p>1ste Wedstrijden</p>-->
<!--                    <ul>-->
<!--                        --><?php
//                        foreach ($desresults as $teams){
//                                echo '<li>'.$teams['name'].'<p>vs</p>'.$teams['name'].'</li>';
//
//
//                        }
//                        ?>
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="poule-games">-->
<!--                    <p>2de Wedstrijden</p>-->
<!--                    <ul>-->
<!--                        <li>Team 1 VS Team 3</li>-->
<!--                        <li>Team 2 VS Team 4</li>-->
<!--                        <li>Team 5 VS Team 7</li>-->
<!--                        <li>Team 6 VS Team 8</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="poule-games">-->
<!--                    <p>3de Wedstrijden</p>-->
<!--                    <ul>-->
<!--                        <li>Team 1 VS Team 4</li>-->
<!--                        <li>Team 2 VS Team 5</li>-->
<!--                        <li>Team 3 VS Team 8</li>-->
<!--                        <li>Team 6 VS Team 7</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="poule-games">-->
<!--                    <p>4de Wedstrijden</p>-->
<!--                    <ul>-->
<!--                        <li>Team 1 VS Team 8</li>-->
<!--                        <li>Team 2 VS Team 7</li>-->
<!--                        <li>Team 3 VS Team 6</li>-->
<!--                        <li>Team 4   VS Team 5</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="poule-matches">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
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