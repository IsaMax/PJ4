<?php

// on attrape ici toutes les erreurs qui se présenteront dans le code (faire page spéciale)
try {

    if(isset($_GET['action'])) {

        $action = $_GET['action'];

        switch($action) {

            case 'accueil':
                require 'controller/homeController.php';
                $homepage = new homeController();
                $homepage->getAllStories();
            break;
            case 'histoire':

                if(isset($_GET['chapitre'])) {
                    $idChapter = (int) $_GET['chapitre'];
                    if($idChapter > 0) {                 // ici répérer le nbr d'article pour réguler $chapitre
                        require 'controller/chapterController.php';
                        $story = new chapterController();
                        $story->getChapter($idChapter);
                        $story->getChapterComments($idChapter);
                    }
                }
                else {
                    trow new Exception('Aucun article ne correspond à votre requête');
                }
            break;  
            case 'biographie':
                require 'controller/biographyController.php';
                $bio = new biographyController();
                $bio-> ;
            break;
            case 'contact':
                require 'controller/contactController.php';
                $contact = new contactController();
                $contact->getMessage();
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
