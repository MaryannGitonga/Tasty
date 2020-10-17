<!DOCTYPE html>
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
                    <li><a class="animated-link menu-link" href="registration.php">Sign Up</a></li>
                </ul>
            </nav>
            <div class="small-header">
                <h3>Login</h3>
            </div>
        </header>
        <main>
            <div class="login-container">
                <h2><img src="/WebApp/images/user.png"> <br>Welcome Back!</h2>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php require_once("login_action.php"); echo $error; ?></div>
                <form action="login_action.php" method="post">
                        <div class="form-label">
                            <input type="text" name="username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-label">
                            <input type="password" name="password" required>
                            <label for="password">Password</label>
                        </div>

                        <input type="submit" value="Login" name="login">

                        <p><a href="#">Forgot password?</a></p>
                        <p><a href="registration.php">Don't have an account?</a></p>
                </form>
            </div>
        </main>
    </body>
</html>