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
            <h3>Tasty Foods</h3>
        </div>
    </header>
    <main>
        <table style="border: 1px solid black">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price in Ksh</th>
            <th>Image</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
                require_once("mysql_connect.php");
                $select_query = "SELECT food_id, food_name, food_price, food_image FROM foods";
                $foods = select_data($select_query);
                foreach ($foods as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value["food_name"] ?></td>
                <td><?php echo $value["food_price"] ?></td>
                <td><img width="200" height="150" src="<?php echo "/WebApp/images/food_images/".$value["food_image"] ?>" alt="food image"></td>
                <td><a href= edit_food.php?edit=<?php echo $value["food_id"] ?> >Edit</a></td>
                <td><a href="add_action.php?delete=<?php echo $value["food_id"] ?>">Delete</a></td>
            </tr>
            <?php }
            ?>
        </tbody>
        </table>
    </main>
</body>
</html>