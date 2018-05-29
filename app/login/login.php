<?php
session_start();

error_reporting(E_ERROR || E_PARSE);
require ('../dbconn.php');
$uid = $_POST['username'];
$pwd = $_POST['password'];
$is_Admin = false;


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
            //checking the user
            if (password_verify($pwd, $hash['password'])){
                //checking if the user is a admin or a username
                $query3 = $conn->prepare("SELECT is_Admin FROM `tbl_users` WHERE `username` = :username");
                $query3->bindValue(":username", $uid);
                $query3->execute();
                if ($query3->fetchColumn() == 1){
                    header("location:../../public/login.php?login=adminSucces");
                    $_SESSION['is_Admin'] = $_POST["username"];
                }else{
                    $_SESSION["username"] = $_POST["username"];
                    header("location: ../../public/login.php?login=succes");
                }
                exit();

            }else{
                header("location:../../public/login.php?login=wrong");
                exit();

            }
        }else{
            header("location:../../public/login.php?login=wrong");
            exit();

        }
    }
}


