<?php

// connexion automatique
if(isset($_COOKIE['id']) AND isset($_COOKIE['email'])) {
    session_start();

    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['email'] = $_COOKIE['email'];
}

if(isset($_SESSION['email']) AND isset($_SESSION['id'])) {

    switch($_GET['action']) {

        case 'accueil':
            require 'controller/homeController.php';
       
            $acc = new homeController;
            $acc->afficherChapitre();
            break;
        case 'editer':
            require 'controller/editController.php';
            $edt = new editController;
            
            if(isset($_GET['chapitre'])) {

                $_GET['chapitre'] = (int)$_GET['chapitre'];

                if ($_GET['chapitre'] > 0) {

                    if (isset($_GET['etat'])) {

                        if($_GET['etat'] == 'enregistrement') {
                            $edt->majChapitre();
                        }
                        else {
                            $edt->editerChapitre();
                        }
                    }
                    else {
                        throw new Exception('erreur: action non désirée');
                    }
                }
                else {
                    throw new Exception('Ce chapitre n\'existe pas');
                }
            }
            else {
                // Si pas de $_GET['chapitre'] on considere que c'est une demande de création de nouveau chapitre
                if (isset($_GET['etat'])) {

                    if($_GET['etat'] == 'enregistrement') {
                        $edt->enregistrerChapitre();
                    }
                    else {
                        throw new Exception('erreur: action non désirée');
                    }
                }
                else {
                    $edt->editerChapitre();
                }
            }
            break;
        case 'supprimer':
            $co = new AuthentificationController;
            $co->connexion();
            break;
        case 'signalement':
            require 'controller/signalementController.php';
            $co = new signalementController;

            if(isset($_GET['operation']) AND $_GET['operation'] == 'traitement_signalement') {
                $co->traitementSignalement();
            }
            else {
                $co->gererSignalement();
            }
            break;
        case 'messages':
            require 'controller/messageController.php';
            $ms = new messageController;
            $ms->afficherMessages();
            break;
        case 'commentaires':
            require 'controller/commentaireController.php';
            $ms = new commentaireController;
            $ms->afficherCommentaires();
            break;
        case 'deconnecter':

            session_destroy();
            unset($_SESSION);

            setcookie('id');
            setcookie('email');

            unset($_COOKIE['id']);
            unset($_COOKIE['email']);

            header('Location: index.php');
            break;
        default:
            header('Location: index.php?action=accueil');
            break;
    }

}

else  {

    require 'controller/authentificationController.php';

    switch($_GET['auth']) {

        case 'connexion':
            $co = new AuthentificationController;
            $co->connexion();
            break;
        case 'inscription':
            $ins = new AuthentificationController;
            $ins->inscription();
            break;
        default:
            header('Location: index.php?auth=connexion');
            break;
    }
}