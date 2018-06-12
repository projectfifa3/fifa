<?php

require('../dbconn.php');
require ('../../public/templates/header.php');


if (isset($_POST['student_id']) && isset($_POST['first_name']) && $_POST['last_name']){

    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $team_id = $_POST['formPlayer'];
    $sendplayer = $_POST['sendplayer'];

    //zorgen dat niemand inside script :(
    $student_id = htmlspecialchars($student_id, ENT_QUOTES);
    $first_name = htmlspecialchars($first_name, ENT_QUOTES);
    $last_name = htmlspecialchars($last_name, ENT_QUOTES);
    $team_id = htmlspecialchars($team_id, ENT_QUOTES);
    $sendplayer = htmlspecialchars($sendplayer, ENT_QUOTES);


    $sql = "SELECT * FROM `tbl_players` WHERE `student_id` = '$student_id'";
    $query = $conn->prepare($sql);
    $query->execute(array($student_id));

    if ($query->rowCount() >= 1) {
        header('Location: ' . '../../public/player.php?add=failed');
    } else {
        $sql = "INSERT INTO tbl_players (student_id, first_name, last_name) VALUES (:student_id, :first_name, :last_name)";
        $qr = $conn->prepare($sql);
        $qr->bindParam(":student_id", $student_id);
        $qr->bindParam(":first_name", $first_name);
        $qr->bindParam(":last_name", $last_name);
        $pdoexec = $qr->execute();

        $sqlquery = "UPDATE `tbl_players` SET `team_id` = '$team_id' WHERE `student_id` = '$student_id'";
        $conn->query($sqlquery);

        echo $student_id;
        header('Location: ' . '../../public/player.php?add=success');
        $_SESSION["player_error"] = "Succesfully added player ".$first_name." " .$last_name;
    }
    }
    require ('../../public/templates/footer.php');