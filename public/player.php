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
        echo 'window.location.href = "index.php";';
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


</body>
</html>
