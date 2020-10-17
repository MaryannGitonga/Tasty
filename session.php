<?php

require_once('mysql_connect.php');
session_start();
$link = connect_db();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($link, "SELECT * FROM user WHERE username = '$user_check'");
$user_details = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $user_details['username'];

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    die();
}

?>