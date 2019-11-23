<?php

if(isset($_SESSION['email']) AND isset($_SESSION['id'])) {

    switch($_GET['action']) {

        case 'accueil':
            require 'controller/homeController.php';

            $acc = new homeController;
            $acc->afficherChapitre();
            break;
        case 'editer':
            require 'controller/editController.php';

            if(isset($_GET['chapitre'])) {

                $_GET['chapitre'] = (int)$_GET['chapitre'];

                if ($_GET['chapitre'] > 0) {

                    $edt = new editController;

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
                } else {
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
                        $edt->editerChapitre();
                    }
                }
                else {
                    throw new Exception('erreur: action non désirée');
                }
            }

            break;
        case 'supprimer':
            $co = new AuthentificationController;
            $co->connexion();
            break;
        case 'deconnecter':
            session_destroy();
            unset($_SESSION);
            header('Location: index.php');
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
            $co = new AuthentificationController;
            $co->connexion();
            break;
    }
}