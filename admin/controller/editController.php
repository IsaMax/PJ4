<?php

class editController {


    public static function editerChapitre() {

        $ec = new editManager();

        $donnesAEditer = $ec->getAllChapter();
        require 'vue/editView.php';
    }

    public static function enregistrerChapitre() {

        $ec = new editManager();

        if(isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_FILES['lien_image'])) {

            $cheminFichier = self::traitementDuFichier();

            $boolEnregistre = $ec->enregistrerChapitre($cheminFichier);

            header('Location: index.php?action=accueil&chapitreEnregistrer='.$boolEnregistre);
        }
         else {
            throw new Exception('erreur: informations à enregistrer manquantes');
        }
    }

    public static function majChapitre() {

        $majc = new editManager();

        if(isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_FILES['lien_image'])) {

            $cheminFichier = self::traitementDuFichier();

            $boolEnregistre = $majc->majChapitre($cheminFichier);
            header('Location: index.php?action=accueil&chapitreEnregistrer='.$boolEnregistre);
        }
        else {
            throw new Exception('erreur: informations à mettre à jour manquantes');
        }
    }

    public static function supprimerChapitre() {

        if(isset($_SESSION['chapitreASupprimer'])) {

            $_SESSION['chapitreASupprimer'] = (int) $_SESSION['chapitreASupprimer'];

            if($_SESSION['chapitreASupprimer'] > 0) {
                $sc = new editManager();
                $sc->supprimerChapitre();
            }
        }
        else {
            throw new Exception('Attention, vous n\'avez pas séléctionné de chapitre !');
        }
        header('Location: index.php');
    }

    private static function traitementDuFichier() {

        //On vérifie si il n'y a pas eu d'erreur
        if($_FILES['lien_image']['error'] == 0) {

            //On vérifie si la taille du fichier ne dépasse pas 1Mo
            if($_FILES['lien_image']['size'] < 1000000) {

                $extensionFichier = pathinfo($_FILES['lien_image']['name']);

                $extensionFichier = $extensionFichier['extension'];

                $extensionsAutorisees = ['jpg', 'jpeg', 'png'];

                //on vérifie qu'on a bien les extensions demandées et on envoie
                if(in_array($extensionFichier, $extensionsAutorisees)) {

                    $cheminFichier = 'public/img/uploads/'.$_FILES['lien_image']['name'];

                    move_uploaded_file($_FILES['lien_image']['tmp_name'], $cheminFichier);
                }
            }
        }
        return $cheminFichier;
    }
}