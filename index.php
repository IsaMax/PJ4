<?php
//réexpliquer valeur unique dans les tables 
// Commentaire qui se poste plusieurs fois avec le rechargement de la page
// on attrape ici toutes les erreurs qui se présenteront dans le code (faire page spéciale)

include 'facebook-login-blog.php';
    
try {

    if(isset($_COOKIE['chapitre'])) {

        if(isset($_COOKIE['id_parent'])) {

            $desTemp = $_COOKIE["id_parent"];
            setcookie('id_parent');
            unset($_COOKIE['id_parent']);

            header('Location: index.php?action=histoire&chapitre='.$_COOKIE["chapitre"].'&id_parent='.$desTemp);
        }
        else {
            $desTemp = $_COOKIE["chapitre"];
            setcookie('chapitre');
            unset($_COOKIE['chapitre']);

            header('Location: index.php?action=histoire&chapitre='.$desTemp);
        }

    }
    
    else if(isset($_GET['action'])) {
        
        switch($_GET['action']) {

            case 'accueil':
                require 'controller/homeController.php';
                $homepage = new homeController();
                $homepage->getHomepage();
            break;

            case 'histoire':

                if(isset($_GET['chapitre'])) {
                    $_GET['chapitre'] = (int) $_GET['chapitre'];

                    if($_GET['chapitre'] > 0) {         // ici répérer le nbr d'article pour réguler $chapitre
                        require 'controller/chapterController.php';
                        $story = new chapterController();
                     
                        $story->getChapter();
                    }
                    else {
                        throw new Exception('Cette page ne correspond à aucun chapitre');
                    }
                }
                else {
                    header('Location: /blog/index.php?action=histoire&chapitre=1');
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
            case 'logout':

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

                header('location:index.php');
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