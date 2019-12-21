<?php

session_start();

setcookie('chapitre', $_GET['chapitre'], time() + 1 * 24 * 3600, null, null, false, true);

header('Location: ' . $_GET['url']);

/*page temporaire pour enregistrer un cookie afin de rediriger le chapitre où il s'est co */


