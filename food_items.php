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
        include('admin_session.php');
    ?>
    <header>
        <nav>
            <h1 id="logo">Tasty</h1>
            <ul>
            <li><a class="animated-link menu-link" href="index.php">Home</a></li>
            <li><a class="animated-link menu-link" href="menu.php">Menu</a></li>
            <li><a class="animated-link menu-link" href="users_table.php">Users</a></li>
            <li class="drop-down">
                <a class="animated-link menu-link" href="foods.php">Foods</a>
                <div class="dropdown-content">
                    <a href="add_food.php">Add Food</a>
                </div>
            </li>
            <li><a class="animated-link menu-link" href="orders.php">Orders</a></li>
            <li><a class="animated-link menu-link" href="#"><?php echo $login_session; ?></a></li>
            <li><a class="animated-link menu-link" href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="small-header">
            <h3>Tasty Order Items</h3>
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
                if (isset($_GET['view'])) {
                    $orderID = $_GET['view'];
                    $select_query = "SELECT foods.food_name, foods.food_price, foods.food_image, quantity, sub_total FROM order_foods INNER JOIN foods ON order_foods.foodID = foods.food_id WHERE order_id = $orderID";
                    $foods = select_data($select_query);
                    foreach ($foods as $key => $value) {
            ?>
            <tr>
                <td><img width="200" height="150" src="<?php echo "/WebApp/images/food_images/".$value["food_image"] ?>" alt="food image"></td>
                <td><?php echo $value["food_name"] ?></td>
                <td>Ksh <?php echo $value["food_price"] ?></td>
                <td><?php echo $value["quantity"] ?></td>
                <td>Ksh <?php echo $value["sub_total"] ?></td>
            </tr>
            <?php 
                }
            }
            ?>
        </tbody>
        </table>
    </main>
</body>
</html>