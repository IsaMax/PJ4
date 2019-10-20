<?php

// on attrape ici toutes les erreurs qui se présenteront dans le code (faire page spéciale)
try {

    if(isset($_GET['action'])) {

        $action = $_GET['action'];

        switch($action) {

            case 'accueil':
                require 'controller/homeController.php';
                $homepage = new homeController();
            break;
            case 'histoire':
                require 'controller/storyController.php';
                $story = new storyController();
                $story-> ;
            break;  
            case 'biographie':
                require 'controller/biographyController.php';
                $bio = new biographyController();
                $bio-> ;
            break;
            case 'contact':
                require 'controller/contactController.php';
                $contact = new contactController();
                $contact-> ;
            break;
            default:
                throw new Exception('La page que vous recherchez n\'existe pas !');
            // on redirige sur la page d'accueil ou une page 404 ?
            break;
        }
    }
}
catch(Exception $erreur) {

    die('erreur : '.$erreur->getMessage());
}
