<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tast Foods - Add Food</title>
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
                <h3>New Food Item</h3>
            </div>
        </header>
        <main>
            <div class="login-container recipe-container">
                <h2>New Food</h2>
                <form action="add_action.php" method="post" enctype="multipart/form-data">
                        <div class="form-label">
                            <input type="text" name="food_name" id="food_name" value="" required>
                            <label for="food_name">Food Name</label>
                        </div>
                        <div class="form-label">
                            <input type="number" name="food_price" id="food_price" required value="">
                            <label for="food_price">Food Price</label>
                        </div>
                        <div class="form-label">
                            <input placeholder="Add food image" type="file" name="food_image" id="food_image" required value="">
                        </div>
                        <input type="submit" value="Add Food" name="create">
                </form>
            </div>
        </main>
    </body>
</html>