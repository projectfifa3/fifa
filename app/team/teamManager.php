<?php
require ('../../app/dbconn.php');

$studentNumber = $_POST["studentnumber"];
$studentNumber = htmlspecialchars($studentNumber, ENT_QUOTES);

$teamId = $_POST["teamId"];
$teamId = htmlspecialchars($teamId, ENT_QUOTES);


$sql = "UPDATE `tbl_players` SET `team_id` = '$teamId' WHERE `student_id` = '$studentNumber'";
$conn->query($sql);

header("location: ../../public/player.php?id=$teamId");