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
            <h3>Tasty Users</h3>
        </div>
    </header>
    <main>
        <table style="border: 1px solid black">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Type</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
                require_once("mysql_connect.php");
                $select_query = "SELECT user_id, first_name, last_name, username, user_email, user_type FROM user";
                $users = select_data($select_query);
                foreach ($users as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value["first_name"] ?></td>
                <td><?php echo $value["last_name"]  ?></td>
                <td><?php echo $value["username"] ?></td>
                <td><?php echo $value["user_email"] ?></td>
                <td><?php echo ($value["user_type"] == 1 ? "Admin" : "Normal User") ?></td>
                <td><a href= edit_user.php?edit=<?php echo $value["user_id"] ?> >Edit User</a></td>
                <td><a href="select_users.php?delete=<?php echo $value["user_id"] ?>">Delete User</a></td>
            </tr>
            <?php }
            ?>
        </tbody>
        </table>
    </main>
</body>
</html>