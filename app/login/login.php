<?php
session_start();
require ('../dbconn.php');
require ('../../public/login.php');
$uid = $_POST['username'];
$pwd = $_POST['password'];

if (isset($_POST['login'])){
    if (empty($uid) || empty($pwd)){
        header("location: ../../public/login.php?signup=empty");
    }else{
        $query = $conn->prepare("SELECT username FROM tbl_users WHERE username = :username");
        $query->bindValue(":username", $uid);
        $query->execute();
        if ($query->rowCount() > 0){
            $query2 = $conn->prepare("SELECT password FROM tbl_users WHERE username = :username");
            $query2->bindValue(":username", $uid);
            $query2->execute();
            $hash = $query2->fetch();
            if (password_verify($pwd, $hash['password'])){
                $_SESSION["username"] = $_POST["username"];

                header("location:../../public/login.php?login=succes");
            }else{
                header("location:../../public/login.php?login=wrong");
            }
        }else{
            header("location:../../public/login.php?login=wrong");
        }
    }
}
