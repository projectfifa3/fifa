<?php
//$DB_HOST = "127.0.0.1";
//$DB_NAME = "d251669_fifa";
//$DB_USER = "d251669_fifa";
//$DB_PASSWORD = "projectfifa";
//
//// Geef aan wat de verbindingsgegevens zijn
//$connectionString = "mysql:dbname=$DB_NAME;host=$DB_HOST";
//
//try{
//    // Maak een nieuw PDO object aan (verbinding tot database ahv gegevens)
//    $conn = new PDO($connectionString, $DB_USER, $DB_PASSWORD);
//
//    // Geef aan dat errors moeten verschijnen bij queries op deze connectie
//    // (Standaard staan errors uit zodat gebruikers/hackers geen informatie krijgen over de werking van de database)
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//}catch(PDOException $exception){
//    // Als er iets mis gaat met het verbinden met PDO willen we de foutmelding laten zien:
//    die('Connection failed with error: ' . $exception->getMessage());
//}

// for the localhost
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