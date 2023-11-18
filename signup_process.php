<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userData = $_POST;
    $username = $userData['username'];
    $password = $userData['password'];

    $userFile = fopen('users.txt', 'r');
    $usernameExists = false;

    if ($userFile) {
        while (($line = fgets($userFile)) !== false) {
            $existingUser = json_decode($line, true);
            if ($existingUser && $existingUser['username'] === $username) {
                $usernameExists = true;
                break;
            }
        }
        fclose($userFile);
    }

    if ($usernameExists) {
        header('Location: signup.php?error=2&username=' . urlencode($username) . '&fullname=' . urlencode($userData['fullname']) . '&sex=' . urlencode($userData['sex']) . '&dob=' . urlencode($userData['dob']));
        exit;
    }
    if (strlen($password) < 5) {
        header('Location: signup.php?error=1&username=' . urlencode($username) . '&fullname=' . urlencode($userData['fullname']) . '&sex=' . urlencode($userData['sex']) . '&dob=' . urlencode($userData['dob']));
        exit;
    }
    $userFile = fopen('users.txt', 'a');

    if ($userFile) {
        fwrite($userFile, json_encode($userData) . "\n");
        fclose($userFile);
        echo '<script>window.location.href = "login.php"</script>';
    }
}
?>