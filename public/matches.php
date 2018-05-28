<?php
//------------------------------------------------------------------------all $post from forms---------------------------------------------------------------\\


?>

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
            <div class="showwinner">
                <?php
                //showing the winner from the competition

                $winningteam = "SELECT `score` FROM `tbl_team` WHERE `position` = '15';";
                $winningteamResult = $conn->prepare($winningteam);
                $winningteamResult->execute();
                $winningteamFetch = $winningteamResult->fetch();

                $winnername = "SELECT * FROM `tbl_team` WHERE `position` = '15';";
                $winnerteamResult = $conn->prepare($winnername);
                $winnerteamResult->execute();
                $winnerteamFetch = $winnerteamResult->fetchAll();
                if ($winningteamFetch['score'] > 0  ){
                    echo '<h2>het winnende team is:</h2>';
                    foreach ($winnerteamFetch as $result){
                        echo '<div class="winner">';
                        echo $result['teamname'].'!';
                        echo '</div>';
                    }
                }

                ?>
            </div>
            <div class="info-knockout-final">
                <div class="knockout-match">
                    <h3>Finale</h3>
                    <?php
                    // fetch the teamnames from the database

                    $finalteam1 = "SELECT * FROM `tbl_team` WHERE `position` = '13';";
                    $finalteam1Result = $conn->prepare($finalteam1);
                  $finalteam1Result->execute();
                    $finalteam1Fetch = $finalteam1Result->fetchAll();

                    $finalteam2 = "SELECT * FROM `tbl_team` WHERE `position` = '14';";
                    $finalteam2Result = $conn->prepare($finalteam2);
                   $finalteam2Result->execute();
                    $finalteam2Fetch = $finalteam2Result->fetchAll();

                    foreach ($finalteam1Fetch as $result1){
                        echo '<span class="final1">'. $result1['teamname'].'</span>';
                        $finalteamname1 = $result1['teamname'];
                        $finalteamscore1 = $result1['score'];

                    }
                    foreach ($finalteam2Fetch as $result2){
                        echo '<span class="final1">'. $result2['teamname'].'</span>';
                        $finalteamname2 = $result2['teamname'];
                        $finalteamscore2 = $result2['score'];

                    }
                    if ($_SESSION['is_Admin']){
                        echo '<form action="matches.php" method="post">
                        <div class="scores">
                        <input type="number" name="finalteam1">
                        <input type="number" name="finalteam2">
                        <input type="submit" name="finalsubmit" onClick="history.go(0) ">
                        </div>
                        </form>';
                    }
                    //the scores
                    echo '<div class="quarterfinals">';
                    echo $finalteamscore1;
                    echo ' - ';
                    echo $finalteamscore2;
                    echo '</div>';
                    ?>

                </div>
            </div>
<!--            <div class="refresh">-->
<!--                <button onclick="history.go(0)" value="refresh">refresh</button>-->
<!--            </div>-->
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

                    $halfinalTeam3 = "SELECT `score` FROM `tbl_team` WHERE `position` = '3'";
                    $team3Result =$conn->prepare($halfinalTeam3);
                    $team3Result->execute();
                    $team3Fetch = $team3Result->fetch();

                    $halfinalTeam4 = "SELECT `score` FROM `tbl_team` WHERE `position` = '4'";
                    $team4Result =$conn->prepare($halfinalTeam4);
                    $team4Result->execute();
                    $team4Fetch = $team4Result->fetch();

                    $halfinalTeam5 = "SELECT `score` FROM `tbl_team` WHERE `position` = '5'";
                    $team5Result =$conn->prepare($halfinalTeam5);
                    $team5Result->execute();
                    $team5Fetch = $team5Result->fetch();

                    $halfinalTeam6 = "SELECT `score` FROM `tbl_team` WHERE `position` = '6'";
                    $team6Result =$conn->prepare($halfinalTeam6);
                    $team6Result->execute();
                    $team6Fetch = $team6Result->fetch();

                    $halfinalTeam7 = "SELECT `score` FROM `tbl_team` WHERE `position` = '7'";
                    $team7Result =$conn->prepare($halfinalTeam7);
                    $team7Result->execute();
                    $team7Fetch = $team7Result->fetch();

                    $halfinalTeam8 = "SELECT `score` FROM `tbl_team` WHERE `position` = '8'";
                    $team8Result =$conn->prepare($halfinalTeam8);
                    $team8Result->execute();
                    $team8Fetch = $team8Result->fetch();



                    $showwinner1 = "SELECT * FROM `tbl_team` WHERE `position` = '9'";
                    $winner1result =$conn->prepare($showwinner1);
                    $winner1result->execute();
                    $winner1Fetch = $winner1result->fetchAll();

                    $showwinner2 = "SELECT * FROM `tbl_team` WHERE  `position` = '10'";
                    $winner2result =$conn->prepare($showwinner2);
                    $winner2result->execute();
                    $winner2Fetch = $winner2result->fetchAll();

                    $showwinner3 = "SELECT * FROM `tbl_team` WHERE `position` = '11'";
                    $winner3result = $conn->prepare($showwinner3);
                    $winner3result->execute();
                    $winner3Fetch = $winner3result->fetchAll();

                    $showwinner4 = "SELECT * FROM `tbl_team` WHERE `position` = '12'";
                    $winner4result = $conn->prepare($showwinner4);
                    $winner4result->execute();
                    $winner4Fetch = $winner4result->fetchAll();

                    //fetching the scores of the half finalist

                    $showhalfscore1 = "SELECT `score` FROM `tbl_team` WHERE `position` = '9'";
                    $halfResult1 = $conn->prepare($showhalfscore1);
                    $halfResult1->execute();
                    $halfteamfetch1 = $halfResult1->fetch();

                    $showhalfscore2 = "SELECT `score` FROM `tbl_team` WHERE `position` = '10'";
                    $halfResult2 = $conn->prepare($showhalfscore2);
                    $halfResult2->execute();
                    $halfteamfetch2 = $halfResult2->fetch();

                    $showhalfscore3 = "SELECT `score` FROM `tbl_team` WHERE `position` = '11'";
                    $halfResult3 = $conn->prepare($showhalfscore3);
                    $halfResult3->execute();
                    $halfteamfetch3 = $halfResult3->fetch();

                    $showhalfscore4 = "SELECT `score` FROM `tbl_team` WHERE `position` = '12'";
                    $halfResult4 = $conn->prepare($showhalfscore4);
                    $halfResult4->execute();
                    $halfteamfetch4 = $halfResult4->fetch();

                    //fetching the scores of the finalist

                    foreach ($winner1Fetch as $winner1){
                        echo '<div class="winner1">';
                        echo $winner1['teamname'];
                        echo '</div>';
                        $halfwinner1 = $winner1['teamname'];
                    }



                    foreach ($winner2Fetch as $winner2){
                        echo '<div class="winner1">';
                        echo $winner2['teamname'];
                        echo '</div>';
                        $halfwinner2 = $winner2['teamname'];

                    }
                    ?>
                    <?php

                    // scores bij the 1ste half finals

                    if ($_SESSION['is_Admin']){
                        echo ' <div class="scores">
                               <form action="matches.php" method="post">
                               <input type="number" name="halfteam1score">
                               <input type="number" name="halfteam2score">
                               </div>';
                    }
                    echo '<div class="quarterfinals">';
                    echo $halfteamfetch1['score'];
                    echo ' - ';
                    echo $halfteamfetch2['score'];
                    echo '</div>';
                    ?>

                </div>
                <div class="knockout-match">
                    <h3>Halve Finale #2</h3>
                    <?php
                    // the team that won from the third and fourth match against eachother
                    foreach ($winner3Fetch as $winner3) {
                                echo '<div class="winner1">';
                                echo $winner3['teamname'];
                                echo '</div>';
                        $halfwinner3 = $winner3['teamname'];

                    }

                    foreach ($winner4Fetch as $winner4){
                        echo '<div class="winner1">';
                        echo $winner4['teamname'];
                        echo '</div>';
                        $halfwinner4 = $winner4['teamname'];
                    }
                    //winner1
                    $halfwinner10 = $winner1Fetch['teamname'];
                    //winner2
                    $halfwinner20  = $winner2Fetch['teamname'];
                    //winner3
                    $halfwinner30  = $winner3Fetch['teamname'];
                    //winner4
                    $halfwinner40  = $winner4Fetch['teamname'];

                    // scores bij the 2DE half finals

                        if ($_SESSION['is_Admin']){
                            echo ' <div class="scores">
                               <input type="number" name="halfteam3score">
                               <input type="number" name="halfteam4score">
                               <input type="submit" name="halfsubmit">
                               </form>
                               </div>';
                        }
                    echo '<div class="quarterfinals">';
                    echo $halfteamfetch3['score'];
                    echo ' - ';
                    echo $halfteamfetch4['score'];
                    echo '</div>';
                    ?>

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

                //                -------------------------------------------------the scores--------------------------------------------\\
                $score1 = $_POST['team1score'];
                $score2 = $_POST['team2score'];
                $score3 = $_POST['team3score'];
                $score4 = $_POST['team4score'];
                $score5 = $_POST['team5score'];
                $score6 = $_POST['team6score'];
                $score7 = $_POST['team7score'];
                $score8 = $_POST['team8score'];

                // the scores for the halfinals
                $halfscore1 = $_POST['halfteam1score'];
                $halfscore2 = $_POST['halfteam2score'];
                $halfscore3 = $_POST['halfteam3score'];
                $halfscore4 = $_POST['halfteam4score'];

                // scores for the finals

                $finalscore1 = $_POST['finalteam1'];
                $finalscore2 = $_POST['finalteam2'];

                if (isset($_POST['submit'])) {


                        $insertQuery = "UPDATE `tbl_team` SET `teamname` = '$team1',`score` = '$score1' WHERE `position` = '1' ";
                        $insertResult = $conn->prepare($insertQuery);
                        $insertExec = $insertResult->execute();

                        $insertQuery2 = "UPDATE `tbl_team` SET `teamname` = '$team2',`score` = '$score2' WHERE `position` = '2' ";
                        $insertResult2 = $conn->prepare($insertQuery2);
                        $insertExec = $insertResult2->execute();

                        $insertQuery3 = "UPDATE `tbl_team` SET `teamname` = '$team3',`score` = '$score3' WHERE `position` = '3'";
                        $insertResult3 = $conn->prepare($insertQuery3);
                        $insertExec = $insertResult3->execute();

                        $insertQuery4 = "UPDATE `tbl_team` SET `teamname` = '$team4',`score` = '$score4' WHERE `position` = '4'";
                        $insertResult4 = $conn->prepare($insertQuery4);
                        $insertExec = $insertResult4->execute();

                        $insertQuery5 = "UPDATE `tbl_team` SET `teamname` = '$team5',`score` = '$score5' WHERE `position` = '5'";
                        $insertResult5 = $conn->prepare($insertQuery5);
                        $insertExec = $insertResult5->execute();

                        $insertQuery6 = "UPDATE `tbl_team` SET `teamname` = '$team6',`score` = '$score6' WHERE `position` = '6'";
                        $insertResult6 = $conn->prepare($insertQuery6);
                        $insertExec = $insertResult6->execute();

                        $insertQuery7 = "UPDATE `tbl_team` SET `teamname` = '$team7',`score` = '$score7' WHERE `position` = '7'";
                        $insertResult7 = $conn->prepare($insertQuery7);
                        $insertExec = $insertResult7->execute();

                        $insertQuery8 = "UPDATE `tbl_team` SET `teamname` = '$team8',`score` = '$score8' WHERE `position` = '8'";
                        $insertResult8 = $conn->prepare($insertQuery8);
                        $insertExec = $insertResult8->execute();

                        //inserting the new positions into the database
                        // first match

                    if ($score1 > $score2){
                        $addpointTeam1 = "UPDATE `tbl_team` SET `teamname` = '$team1' WHERE `position` = '9'";
                        $pointTeam1Result = $conn->prepare($addpointTeam1);
                        $pointTeam1Exec = $pointTeam1Result->execute();
                    }
                    if($score2 > $score1){

                        $addpointTeam2 = "UPDATE `tbl_team` SET  `teamname` = '$team2' WHERE `position` = '9'";
                        $pointTeam2Result = $conn->prepare($addpointTeam2);
                        $pointTeam2Exec = $pointTeam2Result->execute();
                    }

                    //match 2

                    if ($score3 > $score4){
                        $addpointTeam3 = "UPDATE `tbl_team` SET `teamname` = '$team3'WHERE `position` = '10'";
                        $pointTeam3Result = $conn->prepare($addpointTeam3);
                        $pointTeam3Exec = $pointTeam3Result->execute();
                    }
                    if($score4 > $score3){
                        $addpointTeam4 = "UPDATE `tbl_team` SET `teamname` = '$team4'WHERE `position` = '10'";
                        $pointTeam4Result = $conn->prepare($addpointTeam4);
                        $pointTeam4Exec = $pointTeam4Result->execute();
                    }

                    //match 3

                    if ($score5 > $score6){
                        $addpointTeam5 = "UPDATE `tbl_team` SET `teamname` = '$team5'WHERE `position` = '11'";
                        $pointTeam5Result = $conn->prepare($addpointTeam5);
                        $pointTeam5Exec = $pointTeam5Result->execute();

                    }
                    if ($score6 > $score5){
                        $addpointTeam6 = "UPDATE `tbl_team` SET `teamname` = '$team6'WHERE `position` = '11'";
                        $pointTeam6Result = $conn->prepare($addpointTeam6);
                        $pointTeam6Exec = $pointTeam6Result->execute();
                    }

                    //match 4

                    if ($score7 > $score8){
                        $addpointTeam7 = "UPDATE `tbl_team` SET `teamname` = '$team7'WHERE `position` = '12'";
                        $pointTeam7Result = $conn->prepare($addpointTeam7);
                        $pointTeam7Exec = $pointTeam7Result->execute();

                    }
                    if ($score8 > $score7){
                        $addpointTeam8 = "UPDATE `tbl_team` SET `teamname` = '$team8'WHERE `position` = '12'";
                        $pointTeam8Result = $conn->prepare($addpointTeam8);
                        $pointTeam8Exec = $pointTeam8Result->execute();
                    }


                        header("location:matches.php?submit=succes");

                }
                if(isset($_POST['halfsubmit'])){
                    //setting the winnign teams into a new position in the database

                    //match 1
                    $insertHalf = "UPDATE `tbl_team` SET `teamname` = '$halfwinner1',`score` = '$halfscore1' WHERE `position` = '9' ";
                    $HalfResult = $conn->prepare($insertHalf);
                    $insertExec = $HalfResult->execute();

                    $insertHalf2 = "UPDATE `tbl_team` SET `teamname` = '$halfwinner2',`score` = '$halfscore2' WHERE `position` = '10' ";
                    $HalfResult2 = $conn->prepare($insertHalf2);
                    $insertExec = $HalfResult2->execute();

                    $insertHalf3 = "UPDATE `tbl_team` SET `teamname` = '$halfwinner3',`score` = '$halfscore3' WHERE `position` = '11' ";
                    $HalfResult3 = $conn->prepare($insertHalf3);
                    $insertExec = $HalfResult3->execute();

                    $insertHalf4 = "UPDATE `tbl_team` SET `teamname` = '$halfwinner4',`score` = '$halfscore4' WHERE `position` = '12' ";
                    $HalfResult4 = $conn->prepare($insertHalf4);
                    $insertExec = $HalfResult4->execute();

                    if ($halfscore1 > $halfscore2){
                        $updatepos1 = "UPDATE `tbl_team` SET `teamname` = '$halfwinner1' WHERE `position` = '13'";
                        $pos1Result = $conn->prepare($updatepos1);
                        $posExec = $pos1Result->execute();
                    }
                    elseif ($halfscore2 > $halfscore1){
                        $updatepos2 = "UPDATE `tbl_team` SET `teamname` = '$halfwinner2' WHERE `position` = '13'";
                        $pos2Result = $conn->prepare($updatepos2);
                        $posExec = $pos2Result->execute();
                    }else{
                        $updatepos10 = "UPDATE `tbl_team` SET `teamname` = 'no team' WHERE `position` = '13'";
                        $pos10Result = $conn->prepare($updatepos10);
                        $posExec = $pos10Result->execute();
                    }

                    //match 2

                    if ($halfscore3 > $halfscore4){
                        $updatepos3 = "UPDATE `tbl_team` SET `teamname` = '$halfwinner3' WHERE `position` = '14'";
                        $pos3Result = $conn->prepare($updatepos3);
                        $posExec = $pos3Result->execute();
                        header("location:matches.php?submit=scoresucces");

                    }
                    elseif ($halfscore4 > $halfscore3){
                        $updatepos4 = "UPDATE `tbl_team` SET `teamname` = '$halfwinner4'WHERE `position`  = '14'";
                        $pos4Result = $conn->prepare($updatepos4);
                        $posExec = $pos4Result->execute();
                        header("location:matches.php?submit=scoresucces");

                    }else{
                        $updatepos20 = "UPDATE `tbl_team` SET `teamname` = 'no team' WHERE `position`  = '14'";
                        $pos20Result = $conn->prepare($updatepos20);
                        $posExec = $pos20Result->execute();
                        header("location:matches.php?submit=scoresucces");

                    }
                    header("location:matches.php?submit=scoresucces");
                }
                if (isset($_POST['finalsubmit'])){

                    $insertFinal = "UPDATE `tbl_team` SET `teamname` = '$finalteamname1',`score` = '$finalscore1' WHERE `position` = '13' ";
                    $FinalResult = $conn->prepare($insertFinal);
                    $insertExec = $FinalResult->execute();

                    $insertFinal2 = "UPDATE `tbl_team` SET `teamname` = '$finalteamname2',`score` = '$finalscore2' WHERE `position` = '14' ";
                    $FinalResult2 = $conn->prepare($insertFinal2);
                    $insertExec = $FinalResult2->execute();
                    //the team with more score than the other team goes into a new position into the database

                    //match 1

                    if ($finalscore1 > $finalscore2){
                        $updateFinal1 = "UPDATE `tbl_team` SET `teamname` = '$finalteamname1', score = '$finalscore1' WHERE `position` = '15'";
                        $final1Result = $conn->prepare($updateFinal1);
                        $finalExec = $final1Result->execute();

//                        $updateFinalscore1 = "UPDATE `tbl_team` SET score = '$finalscore1' WHERE `position` = '13'";
//                        $finalscore1Result = $conn->prepare($updateFinalscore1);
//                        $finalExec = $finalscore1Result->execute();

                    }elseif ($finalscore2 > $finalscore1){
                        $updateFinal2 = "UPDATE `tbl_team` SET `teamname` = '$finalteamname2', `score` = '$finalscore2' WHERE `position` = '15'";
                        $final2Result = $conn->prepare($updateFinal2);
                        $finalExec = $final2Result->execute();

//                        $updateFinalscore2 = "UPDATE `tbl_team` SET score = '$finalscore2' WHERE `position` = '14'";
//                        $finalscore2Result = $conn->prepare($updateFinalscore2);
//                        $finalExec = $finalscore2Result->execute();
                    }else{
                        $updateFinal3 = "UPDATE `tbl_team` SET `teamname` = 'no team', `score` = '00' WHERE `position` = '15'";
                        $final3Result = $conn->prepare($updateFinal3);
                        $finalExec = $final3Result->execute();
                    }
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
                        <option value="">team1</option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        //team 2

                        echo'   </select>';
                        echo '  <select name="team2">
                        <option value="">team2</option>';
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
                    echo '<div class="quarterfinals">';
                    echo $team1Fetch['score'];
                    echo ' - ';
                    echo $team2Fetch['score'];
                   echo '</div>';
                    ?>
                </div>

                <div class="knockout-match">
                    <h3>Kwart Finale #2</h3>
                    <?php
                    if (isset($_SESSION['is_Admin'])){


                        //team 3
                        echo '<form action="matches.php" method="post">';
                        echo '  <select name="team3">
                        <option value="">team3</option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        //team 4
                        echo'   </select>';
                        echo '  <select name="team4">
                        <option value="">team4</option>';
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
                    echo '<div class="quarterfinals">';
                    echo $team3Fetch['score'];
                    echo ' - ';
                    echo $team4Fetch['score'];
                    echo '</div>';

                    ?>
                </div>
                <div class="knockout-match">
                    <h3>Kwart Finale #3</h3>
                    <?php
                    if (isset($_SESSION['is_Admin'])){
                        //team 5
                        echo '<form action="matches.php" method="post">';
                        echo '  <select name="team5">
                        <option value="">team5</option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        //team 6
                        echo'   </select>';
                        echo '  <select name="team6">
                        <option value="">team6</option>';
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
                    echo '<div class="quarterfinals">';
                    echo $team5Fetch['score'];
                    echo ' - ';
                    echo $team6Fetch['score'];
                    echo '</div>';

                    ?>
                </div>
                <div class="knockout-match">
                    <h3>Kwart Finale #4</h3>
                    <?php
                    if (isset($_SESSION['is_Admin'])){
                        //team 7
                        echo '<form action="matches.php" method="post">';
                        echo '  <select name="team7">
                        <option value="">team7</option>';
                        foreach ($results as $output) {
                            echo '<option name="option">'; echo $output["name"];echo ' </option>';
                        }
                        //team 8
                        echo'   </select>';
                        echo '  <select name="team8">
                        <option value="">team8</option>';
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

                    echo '<div class="quarterfinals">';
                    echo $team7Fetch['score'];
                    echo ' - ';
                    echo $team8Fetch['score'];
                    echo '</div>';
                    ?>
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
        <div class="add-result-scorer-right">

            <form action="matches.php" method="post">

                <select name="playername2" id="scorer2">

                    <option value="" selected>Kies een speler</option>

                    <?php

                    $result = $conn->prepare("SELECT * FROM tbl_players");
                    $result->execute();

                    for($i=0; $row = $result->fetch(); $i++){
                        ?>

                        <option value="<?php echo $row['first_name']; ?>" >
                            <?php echo $row['first_name']; ?>
                        </option>


                    <?php } ?>


                </select>
                <input type="number" name="amount_goals2" id="amount_goals2" min="1" max="99" maxlength="2" placeholder="Goals">

                <input type="submit" name="add_scorer2" id="add_scorer2" value="Toevoegen">

                <?php

                $scorer2 = $_POST['amount_goals2'];
                $playername2 = $_POST['playername2'];
                    if (isset($_POST['add_scorer2'])){
                        $addscorequery2 = "INSERT INTO `tbl_goalscores`(player, goals)VALUES (:player, :goals)";
                        $addscoreResult2 = $conn->prepare($addscorequery2);
                        $scoreexec = $addscoreResult2->execute(array(":player" => $playername2, ":goals" => $scorer2));

                    }
                ?>
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