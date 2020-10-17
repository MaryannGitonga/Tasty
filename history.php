<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty - My Purchase History</title>
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
            <h3>My Purchase History</h3>
        </div>
    </header>
    <main>
        <table id="orders" style="border: 1px solid black">
        <thead>
        <tr>
            <th></th>
            <th>Food Item</th>
            <th>Price in Ksh</th>
            <th>Quantity</th>
            <th>Sub Total</th>
        </tr>
        </thead>
        <tbody>
            <?php
                require_once("mysql_connect.php");
                $customer_id = $user_details['user_id'];
                $sql = "SELECT order_no FROM orders WHERE customer_id = $customer_id";
                $order = array();
                $order = select_data($sql);
                $orderID = $order[0]['order_no'];

                $select_query = "SELECT foods.food_name, foods.food_image, foods.food_price, quantity, sub_total FROM order_foods INNER JOIN foods ON order_foods.foodID = foods.food_id WHERE order_id = $orderID";
                $prev_purchase = select_data($select_query);
                foreach ($prev_purchase as $key => $purchase) {
            ?>
                    <tr>
                        <td><img width="200" height="150" src="<?php echo "/WebApp/images/food_images/".$purchase["food_image"] ?>" alt="food image"></td>
                        <td><?php echo $purchase["food_name"] ?></td>
                        <td>Ksh <?php echo $purchase["food_price"] ?></td>
                        <td><?php echo $purchase["quantity"] ?></td>
                        <td>Ksh <?php echo $purchase["sub_total"] ?></td>
                    </tr>
            <?php 
                }
            ?>
        </tbody>
        </table>
    </main>
</body>
</html>