<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.html');
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact Me</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<div id="welcome-logout" style="position: absolute; top: 0px; right: 10px; display: flex; align-items: center;">
    <h3 style="margin-right: 30px; color: white;">Welcome, <?php echo $username; ?>!</h3>
    <form method="post" action="home.php">
        <input type="submit" name="logout" value="Log out" class="button">
    </form>
</div>

<header style="margin-top: 35px">
        <h1><strong>Contact Me</strong></h1>
    </header>

    <div class="menu">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="gallery.php">1960's Rock n' Roll Gallery</a></li>
            <li><a href="contact.php">Contact Me</a></li>
            <li><a href="cv.php">CV</a></li>
        </ul>
    </div>

    <div class="center-content" style="margin-top: 110px;">
        <div class="container">
            <h2>Name: Nadine Jaafar</h2>
            <h2>Location: Beirut, Lebanon</h2>
            <h2>Email: <a href="mailto:nadine.jaafar02@lau.edu">nadine.jaafar02@lau.edu</a></h2>
            <h2>Phone: +961-70-025-757</h2>
        </div>
    </div>

</body>

</html>
