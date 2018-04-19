<?php

require('../dbconn.php');
require ('../../public/templates/header.php');


if (isset($_POST['student_id']) && isset($_POST['first_name']) && $_POST['last_name']){

    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $sql = "SELECT * FROM `tbl_players` WHERE `student_id` = '$student_id'";

    $query = $conn->prepare($sql);
    $query->execute(array($student_id));

    if($query == 0)
    {
        $sql = "INSERT INTO `tbl_players` (`student_id`, `first_name`, `last_name`) VALUES ('$student_id', '$first_name','$last_name')";
        $conn->exec($sql);

        $_SESSION["player_error"] = "Succesfully added player ".$first_name." " .$last_name;
    }else{
        header('Location: ' . '../../public/index.php?add=failed');
    }





    }
    require ('../../public/templates/footer.php');