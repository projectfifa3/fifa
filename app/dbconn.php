<?php
$SERVERNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";

try {
    $conn = new PDO("mysql:host=$SERVERNAME;dbname=project_fifa", $USERNAME, $PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>