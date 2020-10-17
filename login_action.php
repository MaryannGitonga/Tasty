<?php

require_once("mysql_connect.php");
session_start();

$error = " ";

if (isset($_POST['login'])){
    $link = connect_db();
    $username = mysqli_real_escape_string($link,$_POST["username"]);
    $password = mysqli_real_escape_string($link,$_POST["password"]);

    $sql = "SELECT * FROM user WHERE username = '$username' and user_password = '$password'";
    
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        if ($row["user_type"] == 1) {
            $_SESSION['login_user'] = $username;
            header("Location: admin.php");   
        }else {
            $_SESSION['login_user'] = $username;
            header("Location: menu.php");
        }
    }else {
        $error = "Your username or password is incorrect";
        header("Location: login.php");
    }
}

?>