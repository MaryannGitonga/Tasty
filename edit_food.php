<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tasty - SignUp</title>
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
                <p>Edit Food Item</p>
            </div>
        </header>
        <main>
            <div class="login-container">
                <h2><br>Edit Food</h2>
                <form action="add_action.php" method="post" enctype="multipart/form-data">
                        <?php

                        require_once("mysql_connect.php");
                        if(isset($_GET["edit"])){
                            $id = $_GET["edit"];
                            $sql = "SELECT * from foods WHERE food_id=$id";
                            $food = array(select_data($sql));
                        
                            $selected_food = $food[0];
                            
                            foreach ($selected_food as $key => $value) {
                            ?>
                            <input type="hidden" name="id" value="<?php echo $value["food_id"]; ?>"/>
                            <div class="form-label">
                                <input type="text" name="foodname" id="foodname" required value="<?php echo $value["food_name"]; ?>">
                                <label for="foodname">Food Name</label>
                            </div>
                            <div class="form-label">
                                <input type="number" name="foodprice" id="foodprice" required value="<?php echo $value["food_price"]; ?>">
                                <label for="foodprice">Food Price</label>
                            </div>
                            <div class="form-label">
                            <input placeholder="Add food image" type="file" name="foodimage" id="foodimage" required value="">
                            </div>
                        <?php 
                        }
                        } ?>
                        <input type="submit" value="Update Food" name="edit">
                </form>
            </div>
        </main>
    </body>
</html>