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
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['add']) && $_GET['add'] == "failed"){
    echo '<script>';
    echo 'alert("Failed to add player");';
    echo 'window.location.href = "player.php";';
    echo '</script>';
}
else if (isset($_GET['add']) && $_GET['add'] == "success"){
    echo '<script >';
    echo 'alert("Succesfully added a player");';
    echo 'window.location.href = "player.php";';
    echo '</script>';
}
else if (isset($_GET['del']) && $_GET['del'] == "success"){
    echo '<script >';
    echo 'alert("Succesfully deleted player");';
    echo 'window.location.href = "player.php";';
    echo '</script>';
}
?>

<form action="../app/player/addPlayer.php" method="POST">
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
        <input type="submit" class="button">
    </div>
</form>

<?php


$result = $conn->prepare("SELECT * FROM tbl_players");
$result->execute();

//zichtbaar voor gebruiker (gebruikersrechten NULL)
for($i=0; $row = $result->fetch(); $i++){

    ?>
    <ul>

        <li><?php echo $row['student_id']; ?></li>
        <li><?php echo $row['first_name']; ?></li>
        <li><?php echo $row['last_name']; ?></li>



    </ul>

<?php }

?>

<?php
//zichtbaar voor admin (gebruikersrechten 1)
$dbc = $conn;
$sql = "SELECT * FROM tbl_players ORDER BY last_name ASC";
$players = $dbc->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($players as $item){
    echo "<ul>";
    echo "<a class='removeButton' href='../app/player/deletePlayer.php?playerId=" . $item['id'] . "'>Remove " . $item["first_name"] . " " . $item["last_name"] . "</a>";
    echo "</ul>";
}

?>

</body>
</html>
