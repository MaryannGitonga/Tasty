<?php

require_once("mysql_connect.php");
require_once("session.php");

if (isset($_POST["order"])) {
    $id = $_POST["ID"];
    $quantity = $_POST["quantity"];
    $food_price = $_POST['price'];
    $status = "ordered";
    $customer_id = $user_details['user_id'];
    $date = date("Y-m-d H:i:s");
    $sub_total = 0;
    $total = 0;

    // Calculate the sub-total
    $sub_total += ((int)$food_price * (int)$quantity);

    // Create order
    $order_sql = "INSERT orders(customer_id, date_placed, total_amount) VALUES('$customer_id', '$date', '$total')";
    insert_data($order_sql);

    $select_order = "SELECT order_no FROM orders WHERE customer_id = '$customer_id'";
    $order = select_data($select_order);
    $orderID = $order[0]['order_no'];
    
    // Add food to ordered_foods table
    $order_sql = "INSERT order_foods(foodID, quantity, sub_total, order_id) VALUES('$id', '$quantity', '$sub_total', '$orderID')";
    insert_data($order_sql);

    header("Location: cart.php");
}

if (isset($_POST["change_quantity"])) {
    $id = $_POST["id"];
    $quantity = $_POST["quantity"];

    // Get the food price of that order
    $id_sql = "SELECT foods.food_id, foods.food_price from order_foods INNER JOIN foods ON order_foods.foodID = foods.food_id WHERE order_foodID = $id";
    $food_price_array = select_data($id_sql);
    $food_price = $food_price_array[0]['food_price'];

    $new_subtotal = (int)$quantity * (int)$food_price;
    $update_sql = "UPDATE order_foods SET quantity = $quantity, sub_total = $new_subtotal WHERE order_foodID = $id";
    update_data($update_sql);
    header("Location: cart.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_sql = "DELETE from order_foods WHERE order_foodID = $id";
    delete_data($delete_sql);
    header("Location: cart.php");
}

?>