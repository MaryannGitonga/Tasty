<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users-Table</title>
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
            <h3>Admin Dashboard</h3>
        </div>
    </header>
    <main>
        <div class="tabs">
            <a href="users_table.php">Tasty Users</a>
        </div>
        <div class="tabs">
            <a href="menu.php">Tasty Menu</a>
        </div>
        <div class="tabs">
            <a href="orders.php">Tasty Orders</a>
        </div>
    </main>
</body>
</html>