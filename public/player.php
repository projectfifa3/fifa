<?php
require ('../app/dbconn.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php
    require('templates/header.php');
    if (isset($_GET['add']) && $_GET['add'] == "failed") {
        echo '<script>';
        echo 'alert("Failed to add player");';
        echo 'window.location.href = "player.php";';
        echo '</script>';
    } else if (isset($_GET['add']) && $_GET['add'] == "success") {
        echo '<script >';
        echo 'alert("Succesfully added a player");';
        echo 'window.location.href = "player.php";';
        echo '</script>';
    } else if (isset($_GET['del']) && $_GET['del'] == "success") {
        echo '<script >';
        echo 'alert("Succesfully deleted player");';
        echo 'window.location.href = "player.php";';
        echo '</script>';
    }
    ?>
    <?php
    $teams = $conn->prepare("SELECT * FROM tbl_players");
    $teams->execute();
    $teams = $conn->prepare("SELECT * FROM tbl_teams");
    $teams->execute();

    ?>
<div class="info">
    <div class="container">
    <form action="../app/player/addPlayer.php" method="POST">

<div class="playeradd">
        <div class="item">
            <label for="first_name">firstname</label>
            <input type="text" name="first_name" required>
        </div>
        <div class="item">
            <label for="last_name">lastname</label>
            <input type="text" name="last_name" required>
        </div>
        <div class="item">
            <label for="student_id">student id</label>
            <input type="text" name="student_id" required>
        </div>
        <div class="item">
            <label for="student_id">team</label>
            <select name="formPlayer">
                <?php

                foreach ($teams as $dropdown) {
                    echo '<option value="' . $dropdown['id'] . '">' . $dropdown['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="item">
            <input class="sendbutton" type="submit">
        </div>
</div>
        </div>
</div>
    </form>

    <?php

//zichtbaar voor admin (gebruikersrechten 1)
    $dbc = $conn;
    $sql = "SELECT * FROM tbl_players ORDER BY team_id ASC";
    $players = $dbc->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_SESSION['is_Admin'])) {
        echo "List of players";
        foreach ($players as $item) {

            echo "<ul>";
            echo "<a class='removeButton' href='../app/player/deletePlayer.php?playerId=" . $item['id'] . "'>Remove " . $item["first_name"] . " " . $item["last_name"] . "</a>";
            echo "</ul>";
        }
    } else {
        echo "List of players";
        foreach ($players as $item) {
            echo "<ul>";
            echo $item["first_name"] . " " . $item["last_name"];
            echo "</ul>";
        }
    }

    require('templates/footer.php');

?>

</body>
</html>
