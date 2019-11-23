<?php

setcookie('chapitre', $_GET['chapitre'], time()+1*24*3600, null, null, false, true );


$uri = $_SERVER['REQUEST_URI'];

$parties = explode('|', $uri);

header('Location: '.$parties[1]);