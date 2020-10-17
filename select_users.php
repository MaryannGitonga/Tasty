<?php
require_once("mysql_connect.php");

// select all records
$select_query = "SELECT user_id, first_name, last_name, username, user_email, user_type FROM user";
$users = select_data($select_query);

// update record
if(isset($_POST['edit'])){
    $id = $_POST["id"];
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $user_type = $_POST["user-type"];

    $update_query = "UPDATE user SET first_name = '$first_name', last_name = '$last_name', username = '$username', user_email = '$email', user_type = '$user_type' WHERE user_id='$id'";
    $users = update_data($update_query);
    header("Location: users_table.php");
}

// delete record
if (isset($_GET['delete'])) {
    $id = $_GET["delete"];
    $delete_query = "DELETE FROM user WHERE user_id=$id";
    delete_data($delete_query);
    header("Location: users_table.php");
}

?>