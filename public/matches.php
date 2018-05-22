

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
            require ('../app/dbconn.php');

            if ($_GET['submit'] == 'succes'){
                echo '<h2>succesfully added!</h2>';
            }
            if ($_GET['submit'] == 'empty'){
                echo '<h2>please fill in all columns.</h2>';
            }
            if ($_GET['submit'] == 'scoresucces'){
                echo '<h2>scores succesfully submitted!</h2>';
            }
            ?>

            <div class="info-knockout-semifinal">
                <div class="knockout-match">
                    <h3>Halve Finale #1</h3>

                    <?php
                    // the team that won from the first and second match against eachother
                    $halfinalTeam1 = "SELECT `score` FROM `tbl_team` WHERE `position` = '1'";
                    $team1Result =$conn->prepare($halfinalTeam1);
                    $team1Result->execute();
                    $team1Fetch = $team1Result->fetch();

                    $halfinalTeam2 = "SELECT `score` FROM `tbl_team` WHERE `position` = '2'";
                    $team2Result =$conn->prepare($halfinalTeam2);
                    $team2Result->execute();
                    $team2Fetch = $team2Result->fetch();

                    $halfinalTeam3 = "SELECT * FROM `tbl_team` WHERE `position` = '3'";
                    $team3Result =$conn->prepare($halfinalTeam3);
                    $team3Result->execute();
                    $team3Fetch = $team3Result->fetch();

                    $halfinalTeam4 = "SELECT * FROM `tbl_team` WHERE `position` = '4'";
                    $team4Result =$conn->prepare($halfinalTeam4);
                    $team4Result->execute();
                    $team4Fetch = $team4Result->fetch();

                    $halfinalTeam5 = "SELECT * FROM `tbl_team` WHERE `position` = '5'";
                    $team5Result =$conn->prepare($halfinalTeam5);
                    $team5Result->execute();
                    $team5Fetch = $team5Result->fetch();

                    $halfinalTeam6 = "SELECT * FROM `tbl_team` WHERE `position` = '6'";
                    $team6Result =$conn->prepare($halfinalTeam6);
                    $team6Result->execute();
                    $team6Fetch = $team6Result->fetch();

                    $halfinalTeam7 = "SELECT * FROM `tbl_team` WHERE `position` = '7'";
                    $team7Result =$conn->prepare($halfinalTeam7);
                    $team7Result->execute();
                    $team7Fetch = $team7Result->fetch();

                    $halfinalTeam8 = "SELECT * FROM `tbl_team` WHERE `position` = '8'";
                    $team8Result =$conn->prepare($halfinalTeam8);
                    $team8Result->execute();
                    $team8Fetch = $team8Result->fetch();

                    // first match

                    if ($team1Fetch['score'] > $team2Fetch['score']){
                        $addpointTeam1 = "UPDATE `tbl_team` SET `win` = '1' WHERE `tbl_team`.`id` = 1;";
                        $pointTeam1Result = $conn->prepare($addpointTeam1);
                        $pointTeam1Exec = $pointTeam1Result->execute();

                    }else{
                        $delpointTeam1 = "UPDATE `tbl_team` SET `win` = '0' WHERE `tbl_team`.`id` = 1;";
                        $delpointTeam1Result = $conn->prepare($delpointTeam1);
                        $delpointTeam1Exec = $delpointTeam1Result->execute();
                    }
                    if ($team2Fetch['score'] > $team1Fetch['score']){
                        $addpointTeam2 = "UPDATE `tbl_team` SET `win` = '1' WHERE `tbl_team`.`id` = 2;";
                        $pointTeam2Result = $conn->prepare($addpointTeam2);
                        $pointTeam2Exec = $pointTeam2Result->execute();
                    }else{
                        $delpointTeam2 = "UPDATE `tbl_team` SET `win` = '0' WHERE `tbl_team`.`id` = 2;";
                        $delpointTeam2Result = $conn->prepare($delpointTeam2);
                        $delpointTeam2Exec = $delpointTeam2Result->execute();
                    }
                    $showwinner1 = "SELECT * FROM `tbl_team` WHERE `position` = '1' AND `win` = '1 ' OR `position` = '2' AND `win` = '1'";
                    $winner1result =$conn->prepare($showwinner1);
                    $winner1result->execute();
                    $winner1Fetch = $winner1result->fetchAll();


                    foreach ($winner1Fetch as $winner1){
                        echo '<div class="winner1">';
                        echo $winner1['teamname'];
                        echo '</div>';
                        $halfwinner1 = $winner1['teamname'];
                    }

                    $showwinner2 = "SELECT * FROM `tbl_team` WHERE  `position` = '3' AND `win` = '1 'OR `position` = '4' AND `win` = '1'";
                    $winner2result =$conn->prepare($showwinner2);
                    $winner2result->execute();
                    $winner2Fetch = $winner2result->fetchAll();

                    foreach ($winner2Fetch as $winner2){
                        echo '<div class="winner1">';
                        echo $winner2['teamname'];
                        echo '</div>';
                        $halfwinner2 = $winner2['teamname'];

                    }

                    //match 2

                    if ($team3Fetch['score'] > $team4Fetch['score']){
                        $addpointTeam3 = "UPDATE `tbl_team` SET `win` = '1' WHERE `tbl_team`.`id` = 3;";
                        $pointTeam3Result = $conn->prepare($addpointTeam3);
                        $pointTeam3Exec = $pointTeam3Result->execute();

                    }else{
                        $delpointTeam3 = "UPDATE `tbl_team` SET `win` = '0' WHERE `tbl_team`.`id` = 3;";
                        $delpointTeam3Result = $conn->prepare($delpointTeam3);
                        $delpointTeam3Exec = $delpointTeam3Result->execute();
                    }
                    if ($team4Fetch['score'] > $team3Fetch['score']){
                        $addpointTeam4 = "UPDATE `tbl_team` SET `win` = '1' WHERE `tbl_team`.`id` = 4;";
                        $pointTeam4Result = $conn->prepare($addpointTeam4);
                        $pointTeam4Exec = $pointTeam4Result->execute();
                    }else{
                        $delpointTeam4 = "UPDATE `tbl_team` SET `win` = '0' WHERE `tbl_team`.`id` = 4;";
                        $delpointTeam4Result = $conn->prepare($delpointTeam4);
                        $delpointTeam4Exec = $delpointTeam4Result->execute();
                    }

                    //match 3

                    if ($team5Fetch['score'] > $team6Fetch['score']){
                        $addpointTeam5 = "UPDATE `tbl_team` SET `win` = '1' WHERE `tbl_team`.`id` = 5;";
                        $pointTeam5Result = $conn->prepare($addpointTeam5);
                        $pointTeam5Exec = $pointTeam5Result->execute();

                    }else{
                        $delpointTeam5 = "UPDATE `tbl_team` SET `win` = '0' WHERE `tbl_team`.`id` = 5;";
                        $delpointTeam5Result = $conn->prepare($delpointTeam5);
                        $delpointTeam5Exec = $delpointTeam5Result->execute();
                    }
                    if ($team6Fetch['score'] > $team5Fetch['score']){
                        $addpointTeam6 = "UPDATE `tbl_team` SET `win` = '1' WHERE `tbl_team`.`id` = 6;";
                        $pointTeam6Result = $conn->prepare($addpointTeam6);
                        $pointTeam6Exec = $pointTeam6Result->execute();
                    }else{
                        $delpointTeam6 = "UPDATE `tbl_team` SET `win` = '0' WHERE `tbl_team`.`id` = 6;";
                        $delpointTeam6Result = $conn->prepare($delpointTeam6);
                        $delpointTeam6Exec = $delpointTeam6Result->execute();
                    }

                    //match 4

                    if ($team7Fetch['score'] > $team8Fetch['score']){
                        $addpointTeam7 = "UPDATE `tbl_team` SET `win` = '1' WHERE `tbl_team`.`id` = 7;";
                        $pointTeam7Result = $conn->prepare($addpointTeam7);
                        $pointTeam7Exec = $pointTeam7Result->execute();

                    }else{
                        $delpointTeam7 = "UPDATE `tbl_team` SET `win` = '0' WHERE `tbl_team`.`id` = 7;";
                        $delpointTeam7Result = $conn->prepare($delpointTeam7);
                        $delpointTeam7Exec = $delpointTeam7Result->execute();
                    }
                    if ($team8Fetch['score'] > $team7Fetch['score']){
                        $addpointTeam8 = "UPDATE `tbl_team` SET `win` = '1' WHERE `tbl_team`.`id` = 8;";
                        $pointTeam8Result = $conn->prepare($addpointTeam8);
                        $pointTeam8Exec = $pointTeam8Result->execute();
                    }else{
                        $delpointTeam8 = "UPDATE `tbl_team` SET `win` = '0' WHERE `tbl_team`.`id` = 8;";
                        $delpointTeam8Result = $conn->prepare($delpointTeam8);
                        $delpointTeam8Exec = $delpointTeam8Result->execute();
                    }
                    ?>
                    <?php

                    // scores bij the 2DE half finals

                    if ($_SESSION['is_Admin']){
                        echo ' <div class="scores">
                               <form action="matches.php" method="post">
                               <input type="number" name="halfteam1score">
                               <input type="number" name="halfteam2score">
                               </div>';
                    }

                    //setting the new position for the players of the half
                    if ($winner1['win'] > 0){
                        $updateposition1 = "UPDATE `tbl_team` SET `halfposition` = '1' WHERE `tbl_team`.`id` = 1 ";
                        $position1Result = $conn->prepare($updateposition1);
                        $position1exec = $position1Result->execute();
                    }else{
                        $updateposition1 = "UPDATE `tbl_team` SET `halfposition` = '0' WHERE `tbl_team`.`id` = 1 ";
                        $position1Result = $conn->prepare($updateposition1);
                        $position1exec = $position1Result->execute();
                    }
                    if ($winner2['win'] > 0){
                        $updateposition2 = "UPDATE `tbl_team` SET `halfposition` = '1' WHERE `tbl_team`.`id` = 2 ";
                        $position2Result = $conn->prepare($updateposition2);
                        $position2exec = $position2Result->execute();
                    }else{
                        $updateposition2 = "UPDATE `tbl_team` SET `halfposition` = '0' WHERE `tbl_team`.`id` = 2 ";
                        $position2Result = $conn->prepare($updateposition2);
                        $position2exec = $position2Result->execute();
                    }

                    ?>
                    <p>0 - 0</p>
                </div>
                <div class="knockout-match">
                    <h3>Halve Finale #2</h3>
                    <?php
                    // the team that won from the third and fourth match against eachother


                        $showwinner3 = "SELECT * FROM `tbl_team` WHERE `position` = '5' AND `win` = '1 ' OR `position` = '6' AND `win` = '1 ' ";
                        $winner3result = $conn->prepare($showwinner3);
                        $winner3result->execute();
                        $winner3Fetch = $winner3result->fetchAll();


                    foreach ($winner3Fetch as $winner3) {
                                echo '<div class="winner1">';
                                echo $winner3['teamname'];
                                echo '</div>';
                            }
                    $showwinner4 = "SELECT * FROM `tbl_team` WHERE `position` = '7' AND `win` = '1 'OR `position` = '8' AND `win` = '1'";
                    $winner4result = $conn->prepare($showwinner4);
                    $winner4result->execute();
                    $winner4Fetch = $winner4result->fetchAll();
                    foreach ($winner4Fetch as $winner4){
                        echo '<div class="winner1">';
                        echo $winner4['teamname'];
                        echo '</div>';
                        $halfwinner4 = $winner4['teamname'];
                    }
                    //winner1
                    $halfwinner1;
                    //winner2
                    $halfwinner2;
                    //winner3
                    $halfwinner3;
                    //winner4
                    $halfwinner4;

                    //setting the new position for the players of the half
                    if (isset($_POST['submit'])){
                        if ($winner1['win'] == 1) {
                            $updateposition1 = "UPDATE `tbl_team` SET `halfposition` = '$halfwinner1' WHERE `position` = '1' ";
                            $position1Result = $conn->prepare($updateposition1);
                            $position1exec = $position1Result->execute();
                        }
                        if ($winner2['win'] == 1){
                            $updateposition2 = "UPDATE `tbl_team` SET `halfposition` = '1' WHERE `tbl_team`.`id` = 2 ";
                            $position2Result = $conn->prepare($updateposition2);
                            $position2exec = $position2Result->execute();
                        }
                    }



                    // scores bij the 2DE half finals

                        if ($_SESSION['is_Admin']){
                            echo ' <div class="scores">
                               <form action="matches.php" method="post">
                               <input type="number" name="halfteam3score">
                               <input type="number" name="halfteam4score">
                               </div>';
                        }
                    ?>
                    <p>0 - 0</p>
                </div>
            </div>
            <div class="info-knockout-final">
                <div class="knockout-match">
                    <h3>Finale</h3>
                    <?php
                    // the winner of the half finals gets into the finals
                    $halfscore1 = $_POST['halfteam1score'];
                    $halfscore2 = $_POST['halfteam2score'];
                    $halfscore3 = $_POST['halfteam3score'];
                    $halfscore4 = $_POST['halfteam4score'];

                    if (isset($_POST['submit'])){
                        $inserthalfscore1 = "UPDATE `tbl_team` SET `halfscore` = '$halfscore1' WHERE `position` = '1'";
                        $halfscore1Result = $conn->prepare($inserthalfscore1);
                        $halfscoreExec = $halfscore1Result->execute();
                    }
                    ?>
                    <p>0 - 0</p>
                </div>
            </div>
            <div class="info-knockout-quarterfinal">
                <?php
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
                    if (empty($team1) ){
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
                $score1 = $_POST['team1score'];
                $score2 = $_POST['team2score'];
                $score3 = $_POST['team3score'];
                $score4 = $_POST['team4score'];
                $score5 = $_POST['team5score'];
                $score6 = $_POST['team6score'];
                $score7 = $_POST['team7score'];
                $score8 = $_POST['team8score'];

                if (isset($_POST['submit'])){
                    if (empty($score1) || empty($score2) || empty($score3) || empty($score4) || empty($score5) || empty($score6) || empty($score7) || empty($score8) ){
                        header('location:matches.php?submit=empty');
                    }else {


                        $updateScore1 = "UPDATE `tbl_team` SET `score` = '$score1' WHERE `position` = '1'";
                        $updateResult1 = $conn->prepare($updateScore1);
                        $updateExec = $updateResult1->execute();

                        $updateScore2 = "UPDATE `tbl_team` SET `score` = '$score2' WHERE `position` = '2'";
                        $updateResult2 = $conn->prepare($updateScore2);
                        $updateExec = $updateResult2->execute();

                        $updateScore3 = "UPDATE `tbl_team` SET `score` = '$score3' WHERE `position` = '3'";
                        $updateResult3 = $conn->prepare($updateScore3);
                        $updateExec = $updateResult3->execute();

                        $updateScore4 = "UPDATE `tbl_team` SET `score` = '$score4' WHERE `position` = '4'";
                        $updateResult4 = $conn->prepare($updateScore4);
                        $updateExec = $updateResult4->execute();

                        $updateScore5 = "UPDATE `tbl_team` SET `score` = '$score5' WHERE `position` = '5'";
                        $updateResult5 = $conn->prepare($updateScore5);
                        $updateExec = $updateResult5->execute();

                        $updateScore6 = "UPDATE `tbl_team` SET `score` = '$score6' WHERE `position` = '6'";
                        $updateResult4 = $conn->prepare($updateScore4);
                        $updateExec = $updateResult4->execute();

                        $updateScore7 = "UPDATE `tbl_team` SET `score` = '$score7' WHERE `position` = '7'";
                        $updateResult7 = $conn->prepare($updateScore7);
                        $updateExec = $updateResult7->execute();

                        $updateScore8 = "UPDATE `tbl_team` SET `score` = '$score8' WHERE `position` = '8'";
                        $updateResult8 = $conn->prepare($updateScore8);
                        $updateExec = $updateResult8->execute();

                        header("location:matches.php?submit=scoresucces");
                    }
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
                               <form action="matches.php" method="post">
                               <input type="number" name="team1score">
                               <input type="number" name="team2score">
                               </div>
                               
                               
                               ';

                    }
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
                        // scores for match 2
                        echo ' <div class="scores">
                               <form action="matches.php" method="post">
                               <input type="number" name="team3score">
                               <input type="number" name="team4score">
                               </div>
                              
                              
                               ';

                    }
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
                        echo ' <div class="scores">
                               <form action="matches.php" method="post">
                               <input type="number" name="team5score">
                               <input type="number" name="team6score">
                               </div>
                              
                              
                               ';

                    }
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
                        echo ' <div class="scores">
                               <form action="matches.php" method="post">
                               <input type="number" name="team7score">
                               <input type="number" name="team8score">
                               </div>
                               </form>
                               ';




                    }
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