<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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
                <li><a class="animated-link menu-link" href="#">Menu</a></li>
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
            <h3>Tasty Menu</h3>
        </div>
    </header>
    <main>
    <table class="menu">
        <tbody>
            <?php
                require_once("mysql_connect.php");
                $select_query = "SELECT food_id, food_name, food_price, food_image FROM foods";
                $foods = select_data($select_query);
                foreach ($foods as $key => $value) {
            ?>
                    <tr>
                        <form action="cart_action.php" method="POST">
                            <td><img width="200" height="150" src="<?php echo "/WebApp/images/food_images/".$value["food_image"] ?>" alt="food image"></td>
                            <td class="name"><?php echo $value["food_name"] ?></td>
                            <td class="price">Ksh <?php echo $value["food_price"] ?></td>
                            <td>Quantity: <input type="number" name="quantity" value="1" class="quantity"></td>
                            <input type="hidden" name="ID" id="ID" value="<?php echo $value["food_id"] ?>">
                            <input type="hidden" name="price" value="<?php echo $value["food_price"] ?>">
                            <td><input type="submit" value="Order" name="order"></td>
                        </form>
                    </tr>
            <?php 
                }
            ?>
        </tbody>
        </table>
    </main>
</body>
</html>