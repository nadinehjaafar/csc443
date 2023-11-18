<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userFile = fopen('users.txt', 'r');
    $loginSuccess = false;

    if ($userFile) {
        while (($line = fgets($userFile)) !== false) {
            $userData = json_decode($line, true);

            if ($userData['username'] === $username && $userData['password'] === $password) {
                $_SESSION['username'] = $username;
                $loginSuccess = true;
                break;
            }
        }
        fclose($userFile);
    }

    if ($loginSuccess) {
        header('Location: home.php');
    } else {
        header('Location: login.php?error=1');
    }
}
?>