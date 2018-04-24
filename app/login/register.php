<?php
require ('../dbconn.php');
require ('../../public/login.php');
$uid = $_POST['username'];
$pwd = $_POST['password'];

if (empty($uid) || empty($pwd)){
    header("location: ../../public/login.php?signup=empty");
    exit();
}else{
    //checking if the email has been taken
    $query = $conn->prepare("SELECT * FROM tbl_users WHERE username = :uid");
    $query->bindValue(':uid', $uid);
    $query->execute();
    if($query->rowCount() > 0) {
        // do your insert
        header("location: ../../public/login.php?email=taken");
        exit();

    }else{
        $uid1 = trim($uid);

        if (!trim($uid)){
            header("location:../../public/login.php?signup=email");
            exit();
        }else{
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            $pdoQuery_users =  "INSERT INTO tbl_users(username, password)VALUES ( :username, :password)";

            $pdoResult = $conn->prepare($pdoQuery_users);

            $pdoExec = $pdoResult->execute(array(":username" => $uid1, ":password" => $hashedPwd));

            header("location: ../../public/login.php?signup=succes");
            exit();
        }

    }

}