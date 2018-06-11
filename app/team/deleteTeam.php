<?php

require ('../dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == "GET")
{
    if (isset($_GET["teamId"]))
    {
        $teamId = $_GET["teamId"];
        $teamId = htmlspecialchars($teamId, ENT_QUOTES);


        $dbc = $conn;
        $sql = "DELETE FROM `tbl_teams` WHERE `id` = '$teamId'";
        $dbc->query($sql);

        header('Location: ' . '../../public/team.php?del=success');
    }
}