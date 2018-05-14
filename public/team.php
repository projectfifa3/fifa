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
</body>
</html>
