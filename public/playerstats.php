
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="info">
    <?php

include_once ('templates/header.php');
include ('../app/dbconn.php');
    echo '<p>player name       pace</p>';
    echo '<div class="playerOutput">';
    $FetchallPlayers = "SELECT * FROM `tbl_players`";
    $fetchResult = $conn->prepare($FetchallPlayers);
    $fetchResult->execute();
    $fetchExec = $fetchResult->fetchAll();
    foreach ($fetchExec as $item) {
        echo '<ul><li>';
        echo $item['first_name'];
        echo $item['last_name'].'  -  ';
        echo $item['pace'];
        echo '</li></ul>';
    }
    echo '</div>';

    if (isset($_SESSION['is_Admin'])){
        echo '<div class="statsform">
            <h2>stats input</h2>
            <h3>pace</h3>
            <form action="playerstats.php" method="post">
            <input type="number" name="numberinput" max="100" min="10" >
            ';
        echo '<select name="playername">';
        foreach ($fetchExec as $item){
        echo '<option name="option">'; echo $item["last_name"];echo ' </option>';
        }
        echo '<input type="submit" name="statsubmit">
              </select> </form> </div>';
    }


    $pace = $_POST['numberinput'];
    $playerId = $_POST['playername'];
    if (isset($_POST['statsubmit'])){
        $updatepace = "UPDATE `tbl_players` SET `pace` = '$pace' WHERE `last_name` = '$playerId'";
        $paceResult = $conn->prepare($updatepace);
        $exec = $paceResult->execute();
        header('location:playerstats.php?edit=succes');
    }
    if (($_GET['edit'] == 'success')){
        echo '<h2>succesfully updated the scores!</h2>';
    }

    ?>


    <?php
    require ('../app/dbconn.php');
    if (isset($_GET["playerStats"]))
    {
        $playerId = $_GET["playerStats"];

        $updatestats = "UPDATE `tbl_players` SET `pace` = '$pace1' WHERE `id` = '$playerId'";
        $updateResult = $conn->prepare($updatestats);
        $updateExec = $updateResult->execute();

        header('Location: ' . '../../public/playerstats.php?edit=success');
    }
    ?>
</div>
<?php
include_once ('templates/footer.php');
?>
</body>
</html>

