<!DOCTYPE html>
<html>

<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <header>
        <h1><strong>Login</strong></h1>
    </header>
    <div class="center-content" style="margin-top: 90px;">
        <div class="container" style="width: 26%;">
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo '<h3 style="color: red;">Invalid username or password. Please try again.</h3>';
            }
            ?>
            <form method="post" action="login_process.php">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <input type="submit" value="Log In" class="button" style="margin-top: 20px;">
            </form>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            <p><a href="index.html">Back</a></p>
        </div>
    </div>
</body>

</html>