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
                $homepage->getRecentStories();
                $homepage->getRecentComments();
            break;

            case 'histoire':
                if(isset($_GET['chapitre'])) {
                    $_GET['chapitre'] = (int) $_GET['chapitre'];

                    if($_GET['chapitre'] > 0) {         // ici répérer le nbr d'article pour réguler $chapitre
                        require 'controller/chapterController.php';
                        $story = new chapterController();
                        $story->getChapter();
                        $story->getChapterComments();
                        $story->getNextStories();

                        if(isset($_POST['commentaire'])) {
                            $story->addComment();
                        }
                        
                        if(isset($_GET['alert'])) {
                            $_GET['alert'] = (int) $_GET['alert'];

                            if($_GET['alert'] > 0) {
                                $story->alertComment();
                            }   
                        }
                    }
                    else {
                        throw new Exception('Cette page ne correspond à aucun chapitre');
                    }
                }
                else {
                    header('Location: index.php?action=histoire&amp;chapitre=1');
                }
            break;  

            case 'biographie':
                require 'controller/biographyController.php';
                $bio = new biographyController();
                //$bio-> ;
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
    else {
        header('Location: index.php?action=accueil');
    }
}
catch(Exception $erreur) {

    die('erreur : '.$erreur->getMessage());
}


// RAJOUTER HTMLSPECIALCHAR