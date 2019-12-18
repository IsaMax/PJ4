<?php

require 'autoload.php';
require 'autoCo.php';

if(isset($_SESSION['email']) AND isset($_SESSION['id'])) {

    switch($_GET['action']) {

        case 'accueil':

            homeController::afficherChapitre();
            break;

        case 'editer':
            
            if(isset($_GET['chapitre'])) {

                $_GET['chapitre'] = (int)$_GET['chapitre'];

                if ($_GET['chapitre'] > 0) {

                    if (isset($_GET['etat'])) {

                        if($_GET['etat'] == 'enregistrement') {
                            editController::majChapitre();
                        }
                        else {
                            editController::editerChapitre();
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
                        editController::enregistrerChapitre();
                    }
                    else {
                        throw new Exception('erreur: action non désirée');
                    }
                }
                else {
                    editController::editerChapitre();
                }
            }
            break;

        case 'supprimer':

            editController::supprimerChapitre();
            break;

        case 'signalement':

            if(isset($_GET['operation']) AND $_GET['operation'] == 'traitement_signalement') {
                signalementController::traitementSignalement();
            }
            else {
                signalementController::gererSignalement();
            }
            break;

        case 'messages':

            messageController::afficherMessages();
            break;

        case 'commentaires':

            commentaireController::afficherCommentaires();
            break;

        case 'deconnecter':

            require 'logout.php';
            break;

        default:
            header('Location: accueil');
            break;
    }
}

else  {

    switch($_GET['auth']) {

        case 'connexion':

            AuthentificationController::connexion();
            break;
        case 'inscription':

            AuthentificationController::inscription();
            break;
        default:
            header('Location: se-connecter');
            break;
    }
}
