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
            <h3>Tasty Orders</h3>
        </div>
    </header>
    <main>
        <table id="orders" style="border: 1px solid black">
        <thead>
        <tr>
            <th>Order No</th>
            <th>Customer</th>
            <th>Date Placed</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>
            <?php
                require_once("mysql_connect.php");
                $select_query = "SELECT order_no, user.username, date_placed, total_amount FROM orders INNER JOIN user ON orders.customer_id = user.user_id";
                $foods = select_data($select_query);
                foreach ($foods as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value["order_no"] ?></td>
                <td><?php echo $value["username"] ?></td>
                <td><?php echo $value["date_placed"] ?></td>
                <td>Ksh <?php echo $value["total_amount"] ?></td>
                <td><a href= food_items.php?view=<?php echo $value["order_no"] ?> >View Items</a></td>
            </tr>
            <?php }
            ?>
        </tbody>
        </table>
    </main>
</body>
</html>