<?php

session_destroy();
unset($_SESSION);

setcookie('id');
setcookie('email');

unset($_COOKIE['id']);
unset($_COOKIE['email']);

header('Location: se-connecter');