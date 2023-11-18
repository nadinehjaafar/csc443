<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <header>
        <h1><strong>Sign Up</strong></h1>
    </header>
    <div class="center-content" style="margin-top: 20px;">
        <div class="container" style="width: 500px">
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                $username = isset($_GET['username']) ? $_GET['username'] : '';
                $fullname = isset($_GET['fullname']) ? $_GET['fullname'] : '';
                $dob = isset($_GET['dob']) ? $_GET['dob'] : '';
                $sex = isset($_GET['sex']) ? $_GET['sex'] : '';
                echo '<h3 style="color: red;">Password length should be greater or equal to 5 characters. Please try again.</h3>';
            } else if (isset($_GET['error']) && $_GET['error'] == 2) {
                $username = '';
                $fullname = isset($_GET['fullname']) ? $_GET['fullname'] : '';
                $dob = isset($_GET['dob']) ? $_GET['dob'] : '';
                $sex = isset($_GET['sex']) ? $_GET['sex'] : '';
                echo '<h3 style="color: red;">Username exists, choose another one.</h3>';
            } else {
                $username = '';
                $fullname = '';
                $dob = '';
                $sex = '';
                echo '<h3 style="color: red;">Password length should be greater or equal to 5 characters.</h3>';
            }
            ?>
            <form method="post" action="signup_process.php">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>" required><br>

                <label for="fullname">Full Name:</label>
                <input type="text" name="fullname" value="<?php echo $fullname; ?>" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <label for="sex">Sex:</label>
                <input type="radio" name="sex" value="Male" <?php if ($sex === 'Male') echo 'checked'; ?>> Male
                <input type="radio" name="sex" value="Female" <?php if ($sex === 'Female') echo 'checked'; ?>> Female

                <label style="margin-left: 40px;" for="dob">Date of Birth:</label>
                <input type="date" name="dob" required style="width: 150px;" value ="<?php echo $dob; ?>">

                <input type="submit" value="Sign Up" class="button" style="margin-top: 10px;">
            </form>
            <p>Already have an account? <a href="login.php">Log in</a></p>
            <p><a href="index.html">Back</a></p>
        </div>
    </div>
</body>

</html>