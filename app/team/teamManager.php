<?php
require ('../../app/dbconn.php');

$studentNumber = $_POST["student_id"];
$teamId = $_POST["teamId"];

$sql = "UPDATE `tbl_players` SET `team_id` = '$teamId' WHERE `student_id` = '$studentNumber'";
$conn->query($sql);

header("location: ../../public/team.php?id=$teamId");