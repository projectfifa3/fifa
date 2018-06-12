<?php
require '../app/dbconn.php';
if (isset($_POST['matches'])) {
    if ($_POST['matches']) {


        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=tbl_matches.csv');


        $sql = "SELECT * FROM tbl_matches LIMIT 1";

        $sth = $conn->prepare($sql);
        $sth->execute();


        $data = fopen("php://output", 'w');

        $fields = array_keys($sth->fetch(PDO::FETCH_ASSOC));
        fputcsv($data, $fields);

        $sql = "SELECT * FROM tbl_matches";

        $sth = $conn->prepare($sql);
        $sth->execute();


        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($data, $row);
        }

        echo "\r\n";

        fclose($data);

    }
}
if (isset($_POST['poules'])) {
    if ($_POST['poules']) {


        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=tbl_teams.csv');
        if ($_POST['" '])

        $sql = "SELECT * FROM tbl_team LIMIT 1";

        $sth = $conn->prepare($sql);
        $sth->execute();


        $data = fopen("php://output", 'w');

        $fields = array_keys($sth->fetch(PDO::FETCH_ASSOC));
        fputcsv($data, $fields);

        $sql = "SELECT * FROM tbl_team";

        $sth = $conn->prepare($sql);
        $sth->execute();


        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($data, $row);
        }


        echo "\r\n";

        fclose($data);

    }
}


function CharErrorChecking($value){
    $stringfilter = array("?>", "\'", '\"');
    if (in_array($stringfilter, $value)){
        foreach ($stringfilter as $item){
            array_replace($value, $item, ' ');
        }
    }
    return $value;
}
