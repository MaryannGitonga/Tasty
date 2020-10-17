<?php

require_once("mysql_connect.php");

if (isset($_POST['register'])){
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    // $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST["verify-password"];
    $user_type = 2;

    $sql_query = "INSERT user(first_name, last_name, username, user_password, user_email, user_type) VALUES('$first_name', '$last_name', '$username', '$password', '$email', $user_type)";
    insert_data($sql_query);
    header("Location: login.php");

}
?>