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
            include('session.php');
        ?>
        <header>
            <nav>
                <h1 id="logo">Tasty</h1>
                <ul>
                    <?php
                        if($user_details["user_type"] == 1){
                    ?>
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
                    <?php
                        }else {
                    ?>
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
                    <?php
                        }
                    ?>
                </ul>
            </nav>
            <div class="small-header">
                <h3>Edit Profile</h3>
            </div>
        </header>
        <main>
            <div class="login-container">
                <h2><img src="/WebApp/images/user.png"> <br>Update Profile</h2>
                <form action="select_users.php" method="post">
                        <?php
                        require_once("mysql_connect.php");
                        if(isset($_GET["edit"])){
                            $id = $_GET["edit"];
                            $sql = "SELECT * from user WHERE user_id=$id";
                            $user = array(select_data($sql));
                        
                            $selected_user = $user[0];
                            
                            foreach ($selected_user as $key => $value) {
                            ?>
                            <input type="hidden" name="id" value="<?php echo $value["user_id"]; ?>"/>
                            <div class="form-label">
                                <input type="text" name="firstname" id="firstname" required value="<?php echo $value["first_name"]; ?>">
                                <label for="firstname">First Name</label>
                            </div>
                            <div class="form-label">
                                <input type="text" name="lastname" id="lastname" required value="<?php echo $value["last_name"]; ?>">
                                <label for="lastname">Last Name</label>
                            </div>
                            <div class="form-label">
                                <input type="email" name="email" id="email" required value="<?php echo $value["user_email"]; ?>">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-label">
                                <input type="text" name="username" id="username" required value="<?php echo $value["username"]; ?>">
                                <label for="username">Username</label>
                            </div>
                            <?php
                            if($user_details["user_type"] == 1){
                                if($value["user_type"] == 1){
                                ?>
                                    <div class="form-label">
                                        <input type="radio" name="user-type" id="active" required value="1" checked>
                                        <label for="active">Admin</label>
                                    </div>
                                    <div class="form-label">
                                        <input type="radio" name="user-type" id="inactive" required value="2">
                                        <label for="inactive">Normal User</label>
                                    </div>
                                <?php
                                }else {
                                ?>
                                    <div class="form-label">
                                        <input type="radio" name="user-type" id="active" required value="1">
                                        <label for="active">Admin</label>
                                    </div>
                                    <div class="form-label">
                                        <input type="radio" name="user-type" id="inactive" required value="2" checked>
                                        <label for="inactive">Normal User</label>
                                    </div>
                        <?php 
                                }
                            }
                        }
                        } ?>
                        <input type="submit" value="Update" name="edit">
                </form>
            </div>
        </main>
    </body>
</html>