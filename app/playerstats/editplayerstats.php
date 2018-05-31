<?php

require ('../dbconn.php');
require ('../../public/playerstats.php');
    if (isset($_GET["playerStats"]))
    {
        $playerId = $_GET["playerStats"];

        $updatestats = "UPDATE `tbl_players` SET `pace` = '$pace1' WHERE `id` = '$playerId'";
        $updateResult = $conn->prepare($updatestats);
        $updateExec = $updateResult->execute();

        header('Location: ' . '../../public/playerstats.php?edit=success');
    }