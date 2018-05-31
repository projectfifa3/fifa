<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Project FIFA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

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
require ('templates/header.php');

if (isset($_GET['add']) && $_GET['add'] == "failed"){
    echo '<script>';
    echo 'alert("Failed to add team");';
    echo 'window.location.href = team.php";';
    echo '</script>';
}
else if (isset($_GET['add']) && $_GET['add'] == "success"){
    echo '<script >';
    echo 'alert("Succesfully added a team");';
    echo 'window.location.href = "team.php";';
    echo '</script>';
}
else if (isset($_GET['del']) && $_GET['del'] == "success"){
    echo '<script >';
    echo 'alert("Succesfully deleted team");';
    echo 'window.location.href = "team.php";';
    echo '</script>';
}
?>
<form action="../app/team/addTeam.php" method="POST">
    <div class="teamadd">
        <div class="item">
            <label for="teamname">teamname:</label>
            <input type="text" name="name" required>
        </div>
        <div class="item">
            <input type="submit" class="sendbutton">
        </div>
    </div>
</form>
<?php

//zichtbaar voor admin (gebruikersrechten 1)
$dbc = $conn;
$sql = "SELECT * FROM tbl_teams ORDER BY `name` ASC";
$teams = $dbc->query($sql)->fetchAll(PDO::FETCH_ASSOC);
if (isset($_SESSION['is_Admin'])){
    echo "List of Teams";
    foreach ($teams as $item){
        echo "<ul>";
        echo "<a class='removeButton' href='../app/team/deleteTeam.php?teamId=" . $item['id'] . "'>Remove " . $item["name"] . "</a>";
        echo "</ul>";
    }
}else{
    echo "List of Teams";
    foreach ($teams as $item){
        echo "<ul>";
        echo $item["name"];
        echo "</ul>";
    }
}

require ('templates/footer.php');

?>


</body>
</html>
