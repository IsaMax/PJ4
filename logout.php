<?php

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
);
}

session_destroy();
setcookie('user_image');
setcookie('user_name');
unset($_COOKIE['user_name']);
unset($_COOKIE['user_image']);

header('location: accueil');