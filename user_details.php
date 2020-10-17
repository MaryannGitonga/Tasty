<!DOCTYPE html>
<?php
    require_once("session.php");
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food Website - Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <h1 id="logo">Tasty</h1>
                <ul>
                    <li><a class="animated-link menu-link" href="index.php">Home</a></li>
                    <li><a class="animated-link menu-link" href="#">About</a></li>
                    <li><a class="animated-link menu-link" href="#">Menu</a></li>
                    <li><a class="animated-link menu-link" href="#">Contact</a></li>
                    <li><a class="animated-link menu-link" href="#"><?php echo $login_session; ?></a></li>
                <li><a class="animated-link menu-link" href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <div class="small-header">
                <h3>My Profile</h3>
            </div>
        </header>
        <main>
            <div class="login-container profile-container">
                <h2><img src="/WebApp/images/user.png"> <span>Profile Details</span></h2>
                <ul>
                    <li>Name: <?php echo $user_details['first_name']. " ". $user_details['last_name'] ?></li>
                    <li>Username: <?php echo $user_details['username'] ?></li>
                    <li>Email: <?php echo $user_details['user_email'] ?></li>
                    <li>Account Type: <?php echo ($user_details['user_type'] == 1 ? "Admin" : "Normal User") ?></li>
                    <a href= edit_user.php?edit=<?php echo $user_details["user_id"] ?>><input type="submit" value="Edit" name="edit"></a>
                    <a href="select_users.php?delete=<?php echo $user_details["user_id"] ?>"><input type="submit" value="Delete" name="delete"></a>
                </ul>
            </div>
        </main>
    </body>
</html>