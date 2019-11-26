<?php
session_start();

setcookie('chapitre', $_GET['chapitre'], time()+1*24*3600, null, null, false, true );

if(isset($_GET['url'])) {

    if($_GET['id_parent']) {

        setcookie('id_parent', $_GET['id_parent'], time()+1*24*3600, null, null, false, true );
        header('Location: '.$_GET['url']);
    }

    else {
        header('Location: '.$_GET['url']);
    }


}

