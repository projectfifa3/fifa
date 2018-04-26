<?php
session_start();

error_reporting(E_ERROR || E_PARSE);
require ('../dbconn.php');
require ('../../public/login.php');
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
            if (password_verify($pwd, $hash['password'])){
                $_SESSION["username"] = $_POST["username"];
                header("location:../../public/login.php?login=succes");
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

//checking the admin

if (isset($_POST['login'])){
    $query3 = $conn->prepare("SELECT * FROM `tbl_users` WHERE `is_Admin` = 1");
    $query3->execute();
}if ($query3->rowCount() > 0){
    header("location:../../public/login.php?login=adminSucces");
//    $_SESSION['is_Admin'] = $_POST["username"];
    $is_Admin = true;
}else{
    header("location:../../public/login.php?login=wrong");
}
