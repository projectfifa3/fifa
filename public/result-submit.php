<?php

require('../app/dbconn.php');
require('matches.php');

$score1 = $_POST['score1'];
$score2 = $_POST['score2'];
$team1 = $_POST['team1'];
$team2 = $_POST['team2'];

if ($score1 != "" && $score2 != "") {

    $sql = "INSERT INTO tbl_results (score_team_1, score_team_2, team_1, team_2) VALUES ('$score1','$score2','$team1','$team2')";
    $conn->query($sql);

    header("location: ../../public/login.php?email=taken");
}else{
    header("location: ../../public/login.php?email=taken");
}

?>