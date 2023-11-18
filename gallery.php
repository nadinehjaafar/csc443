<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.html');
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
    <title>1960's Rock n' Roll Gallery</title>
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
        <h1><strong>1960's Rock n' Roll Gallery</strong></h1>
    </header>
    <div class="menu">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="gallery.php">1960's Rock n' Roll Gallery</a></li>
            <li><a href="contact.php">Contact Me</a></li>
            <li><a href="cv.php">CV</a></li>
        </ul>
    </div>

    <div class="photo-container" id="photo-container">
    </div>

    <div class="enlarged-photo" id="enlarged-photo">
        <span class="close-button" onclick="hideEnlarged()">&times;</span>
        <img id="enlarged-img" src="" alt="Enlarged Image">
    </div>

    <script>
        fetch('gallery.json')
            .then(response => response.json())
            .then(data => {
                const photoContainer = document.getElementById('photo-container');

                data.images.forEach(image => {
                    const photoDiv = document.createElement('div');
                    photoDiv.className = 'photo';

                    const img = document.createElement('img');
                    img.src = image;
                    img.alt = 'Image ' + (data.images.indexOf(image) + 1);

                    img.setAttribute('onclick', 'showEnlarged("' + image + '")');

                    photoDiv.appendChild(img);

                    photoContainer.appendChild(photoDiv);
                });
            })
            .catch(error => {
                console.error('Error loading gallery data:', error);
            });

        function showEnlarged(imageSrc) {
            const enlargedPhoto = document.getElementById("enlarged-photo");
            const enlargedImg = document.getElementById("enlarged-img");

            enlargedImg.src = imageSrc;
            enlargedPhoto.style.display = "flex";
        }

        function hideEnlarged() {
            const enlargedPhoto = document.getElementById("enlarged-photo");
            enlargedPhoto.style.display = "none";
        }
    </script>
</body>

</html>