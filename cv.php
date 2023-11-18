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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nadine Jaafar - CV</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <styles>
    </styles>
</head>

<body style=" overflow-y: auto;">
    <div id="welcome-logout" style="position: absolute; top: 0px; right: 10px; display: flex; align-items: center;">
        <h3 style="margin-right: 30px; color: white;">Welcome, <?php echo $username; ?>!</h3>
        <form method="post" action="home.php">
            <input type="submit" name="logout" value="Log out" class="button">
        </form>
    </div>

    <header style="margin-top: 35px">
        <h1><strong>CV</strong></h1>
    </header>

    <div class="menu">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="gallery.php">1960's Rock n' Roll Gallery</a></li>
            <li><a href="contact.php">Contact Me</a></li>
            <li><a href="cv.php">CV</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="center-content">
            <img src="moi.png" alt="Nadine Jaafar" style="max-width: 200px; border-radius: 50%; margin-bottom: 20px;">
            <h1>Nadine Jaafar</h1>
            <p>Beirut, Lebanon | +961-70-025-757 | <a href="mailto:nadine.jaafar02@lau.edu">nadine.jaafar02@lau.edu</a></p>
        </div>

        <h2>Education</h2>
        <ul>
            <li>Lebanese American University
                <ul>
                    <li>B.S. in Computer Science</li>
                    <li>Fall 2021 – Present</li>
                </ul>
            </li>
        </ul>

        <h2>Work Experience</h2>
        <ul>
            <li>Part-Time Tutor
                <ul>
                    <li>Fall 2018 – Present</li>
                    <li>Tutoring Math and Computer Science courses for school and undergraduate level students.</li>
                </ul>
            </li>
            <li>Part-Time Assistant
                <ul>
                    <li>Fall 2018 – Spring 2019</li>
                    <li>Data entry and recording of financial transactions.</li>
                    <li>Preparation and presentation of weekly evaluation reports.</li>
                    <li>Work samples available upon request</li>
                </ul>
            </li>
        </ul>

        <h2>Programming Skills</h2>
        <ul class="skills">
            <li>Python, Java, C, C++, Javascript, HTML, CSS and Bootstrap.</li>
            <li>MySQL, MSSQL, and MongoDB.</li>
            <li>System Administrator (Linux), Data Structures, Operating Systems, Administration, and Network Security.</li>
        </ul>

        <h2>Soft Skills</h2>
        <ul>
            <li>Ability to come up with instant solutions.</li>
            <li>Up-To-Date with new technologies and trends.</li>
            <li>Ability to work under pressure both independently and among a team.</li>
            <li>Excellent interpersonal and communication skills.</li>
            <li>Ability to write detailed and professional reports with excellent time management skills.</li>
            <li>Excellent Word and Excel skills.</li>
            <li>Ability to work on my own and pick up tasks efficiently and quickly.</li>
        </ul>

        <h2>Languages</h2>
        <ul>
            <li>Arabic: Native Language.</li>
            <li>English: Advanced writing, reading, and speaking (Bilingual Proficiency).</li>
            <li>French: Advanced writing, reading, and speaking (Bilingual Proficiency).</li>
        </ul>
    </div>
</body>

</html>