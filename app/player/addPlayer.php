<?php

require('../dbconn.php');
require ('../../public/templates/header.php');


if (isset($_POST['student_id']) && isset($_POST['first_name']) && $_POST['last_name']){

    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $team_id = $_POST['formPlayer'];

    $sql = "SELECT * FROM `tbl_players` WHERE `student_id` = '$student_id'";

    $query = $conn->prepare($sql);
    $query->execute(array($student_id));

    if ($query->rowCount() >= 1) {
        header('Location: ' . '../../public/player.php?add=failed');
    } else {
        var_dump($_POST);
        $sql = "INSERT INTO `tbl_players` (`student_id`, `first_name`, `last_name`) VALUES ('$student_id', '$first_name','$last_name')";
        $conn->exec($sql);
        $sql = "UPDATE `tbl_players` SET `team_id` = '$team_id' WHERE `student_id` = '$student_id'";
        $conn->query($sql);


        echo $student_id;
        header('Location: ' . '../../public/player.php?add=success');
        $_SESSION["player_error"] = "Succesfully added player ".$first_name." " .$last_name;
    }





    }
    require ('../../public/templates/footer.php');