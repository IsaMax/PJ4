<?php

// connexion automatique
if(isset($_COOKIE['id']) AND isset($_COOKIE['email'])) {
session_start();

$_SESSION['id'] = $_COOKIE['id'];
$_SESSION['email'] = $_COOKIE['email'];
}