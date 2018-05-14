<?php
require('../dbconn.php');

if (isset($_POST['name'])){

    $teamname = $_POST['name'];


    $sql = "SELECT * FROM `tbl_teams` WHERE `name` = '$teamname'";

    $query = $conn->prepare($sql);
    $query->execute(array($teamname));

    if ($query->rowCount() >= 1) {
        header('Location: ' . '../../public/team.php?add=failed');
    } else {
        $sql = "INSERT INTO `tbl_teams` (`name`) VALUES ('$teamname')";
        $conn->exec($sql);

        header('Location: ' . '../../public/team.php?add=success');
        $_SESSION["player_error"] = "Succesfully added team " . $teamname ;
    }
}