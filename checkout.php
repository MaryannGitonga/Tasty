<?php
    require_once("mysql_connect.php");
    require_once("session.php");

    // Select user's cart
    $customer_id = $user_details['user_id'];
    $order_date_time = date("Y-m-d H:i:s");

    $sql = "SELECT order_no FROM orders WHERE customer_id = $customer_id";
    $order = array();
    $order = select_data($sql);
    $orderID = $order[0]['order_no'];

    $update_order = "UPDATE orders SET date_placed = '$order_date_time' WHERE order_no = $orderID";
    update_data($update_order);

    $delete_duplicate = "DELETE FROM orders WHERE total_amount = '0'";
    delete_data($delete_duplicate);

    header("Location:menu.php");
?>