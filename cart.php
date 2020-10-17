<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include('session.php');
    ?>
    <header>
        <nav>
            <h1 id="logo">Tasty</h1>
            <ul>
                <li><a class="animated-link menu-link" href="index.php">Home</a></li>
                <li><a class="animated-link menu-link" href="menu.php">Menu</a></li>
                <li class="drop-down">
                    <a class="animated-link menu-link"><?php echo $login_session; ?></a>
                    <div class="dropdown-content">
                        <a href="user_details.php">My Profile</a>
                        <a href="cart.php">My Cart</a>
                        <a href="history.php">My Purchase History</a>
                    </div>
                </li>
                <li><a class="animated-link menu-link" href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="small-header">
            <h3>My Cart</h3>
        </div>
    </header>
    <main>
        <table class="cart" style="border: 1px solid black">
        <thead>
        <tr>
            <th></th>
            <th>Food Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
                require_once("mysql_connect.php");

                $customer_id = $user_details['user_id'];
                $select_order = "SELECT order_no FROM orders WHERE customer_id = '$customer_id'";
                $order = select_data($select_order);
                $orderID = $order[0]['order_no'];

                // Fetch data in the customer's cart
                $foods_sql = "SELECT order_foodID, foodID, foods.food_name, foods.food_image, quantity, foods.food_price, sub_total, order_id FROM order_foods INNER JOIN foods ON order_foods.foodID = foods.food_id WHERE order_id = $orderID";
                $cart_items = select_data($foods_sql);
                $total_amount = 0;
                if (count($cart_items) == 0) {
                ?>
                <tr>
                    <td>There are no items in your cart</td>
                </tr>
                <?php
                }else {
                    foreach ($cart_items as $key => $food_item) {
                ?>
                        <tr>
                            <form action="cart_action.php" method="post">
                                <td><img width="200" height="150" src="<?php echo "/WebApp/images/food_images/".$food_item["food_image"] ?>" alt="food image"></td>
                                <td><?php echo $food_item["food_name"] ?></td>
                                <td>Ksh <?php echo $food_item["food_price"] ?></td>
                                <td><input type="number" name="quantity" value="<?php echo $food_item["quantity"] ?>" class="quantity"></td>
                                <input type="hidden" name="id" value="<?php echo $food_item["order_foodID"] ?>">
                                <td>Ksh <?php echo $food_item["sub_total"] ?></td>
                                <td><input type="submit" name = "change_quantity" value="Change Quantity"></td>
                            </form>
                            <td><a href="cart_action.php?delete=<?php echo $food_item["order_foodID"] ?>">Remove</a></td>
                        </tr>
                <?php 
                        $total_amount += (int)$food_item["sub_total"];
                    }
                ?>
                <tr>
                    <td colspan="5"></td>
                    <td class="total">Total Amount:</td>
                    <td class="total">Ksh <?php echo $total_amount ?></td>
                </tr>
                <tr></tr><tr></tr>
                <tr id="cart-options">
                    <td><a href="menu.php">Continue Shopping</a></td>
                    <td colspan="5"></td>
                    <td><a href="checkout.php">Checkout Cart</a></td>
                </tr>
                <?php   
                }

                $update_total = "UPDATE orders SET total_amount = '$total_amount' WHERE order_no = $orderID";
                update_data($update_total);
                ?>
        </tbody>
        </table>
    </main>
</body>
</html>