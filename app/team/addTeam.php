<?php
require('../dbconn.php');

if (isset($_POST['name'])){

    $teamname = $_POST['name'];
    //$sendbutton = $_POST['sendbutton'];
    $teamname = htmlspecialchars($teamname, ENT_QUOTES);
    //$sendbutton = htmlspecialchars($sendbutton, ENT_QUOTES);
//    var_dump($teamname);
//    $teamname = CharErrorChecking($teamname);
//    var_dump($teamname);
   





    $sql = "SELECT * FROM `tbl_teams` WHERE `name` = '$teamname'";

    $query = $conn->prepare($sql);
    $query->execute(array($teamname));

    if ($query->rowCount() >= 1) {
        header('Location: ' . '../../public/team.php?add=failed');
    } else {
        $sql = "INSERT INTO `tbl_teams` (`name`) VALUES ('$teamname')";
        $conn->exec($sql);

        header('Location: ' . '../../public/team.php?add=success');
        $_SESSION["player_error"] = "Succesfully added team " . $teamname ;
    }
}


//function CharErrorChecking($value){
/*    $stringfilter = array("?>", "\'", '\"');*/
//    var_dump(contains($value,$stringfilter));
//    if (contains($value,$stringfilter)){
//
//        foreach ($stringfilter as $item){
//            echo "works";
//            array_replace($value, $item, ' ');
//        }
//    }
//    return $value;
//}