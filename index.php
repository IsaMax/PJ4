<?php

require 'autoload.php';
include 'facebook-login-blog.php';
    
try {

    if(isset($_GET['action'])) {
        
        switch($_GET['action']) {

            case 'accueil':
                homeController::getHomepage();
            break;

            case 'histoire':

                if(isset($_GET['chapitre'])) {
                    $_GET['chapitre'] = (int) $_GET['chapitre'];

                    if($_GET['chapitre'] > 16 AND $_GET['chapitre'] <= 24 ) {

                        chapterController::getChapter();
                    }
                    else {
                        throw new Exception('Cette page ne correspond à aucun chapitre');
                    }
                }
                else {
                    header('Location: histoire-17');
                }
            break;  

            case 'contact':
                if(isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['contenu'])) {

                    contactController::postMessage();
                }
                else {
                    require 'view/contact/contactView.php';
                }
                break;

            case 'logout':
                require 'logout.php';
                break;

            default:
                throw new Exception('Cette page n\'existe pas');
                break;
        }
    }
    else { header('Location: accueil'); }
}

catch(Exception $erreur) {

    erreurController::afficheErreur($erreur->getMessage());

  /*  header('Location: index.php?action=erreur&erreur='.$erreur->getMessage());*/
}