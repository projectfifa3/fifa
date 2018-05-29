<?php
include_once ('templates/header.php');
include ('../app/dbconn.php');

$FetchallPlayers = "SELECT * FROM `tbl_players`";
$fetchResult = $conn->prepare($FetchallPlayers);
$fetchResult->execute();
$fetchExec = $fetchResult->fetchAll();

foreach ($fetchExec as $item) {
    echo $item['first_name'];
    echo $item['last_name'];
}

include_once ('templates/footer.php');
