<?php
require('../dbconn.php');

if (isset($_POST['name'])){

    $teamname = $_POST['name'];
    $sendbutton = $_POST['sendbutton'];
    $teamname = htmlspecialchars($teamname, ENT_QUOTES);
    $sendbutton = htmlspecialchars($sendbutton, ENT_QUOTES);





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