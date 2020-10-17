<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food Website - SignUp</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <h1 id="logo">Tasty</h1>
                <ul>
                    <li><a class="animated-link menu-link" href="index.php">Home</a></li>
                    <li><a class="animated-link menu-link" href="login.php">Login</a></li>
                </ul>
            </nav>
            <div class="small-header">
                <h3>Sign Up</h3>
            </div>
        </header>
        <main>
            <div class="login-container">
                <h2><img src="/WebApp/images/user.png"> <br>Join Us</h2>
                <form action="registration_action.php" method="post">
                        <div class="form-label">
                            <input type="text" name="firstname" id="firstname" value="" required>
                            <label for="firstname">First Name</label>
                        </div>
                        <div class="form-label">
                            <input type="text" name="lastname" id="lastname" required value="">
                            <label for="lastname">Last Name</label>
                        </div>
                        <div class="form-label">
                            <input type="email" name="email" id="email" required value="">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-label">
                            <input type="text" name="username" id="username" required value="">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-label">
                            <input type="password" name="password" id="password" required value="">
                            <label for="password">Password</label>
                        </div>
                        <div class="form-label">
                            <input type="password" name="verify-password" id="verify-password" required value="">
                            <label for="verify-password">Confirm Password</label>
                        </div>

                        <input type="submit" value="Join" name="register">

                        <p><a href="login.php">Already a member?</a></p>
                </form>
            </div>
        </main>
    </body>
</html>