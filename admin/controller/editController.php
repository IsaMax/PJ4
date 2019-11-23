<?php

require 'model/editManager.php';

class editController {

    public function editerChapitre() {

        $ec = new editManager();

        $donnesAEditer = $ec->getAllChapter();
        require 'vue/editView.php';
    }

    public function enregistrerChapitre() {

        $ec = new editManager();

        if(isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['lien_image'])) {

            $boolEnregistre = $ec->enregistrerChapitre();
            header('Location: index.php?action=accueil&chapitreEnregistrer='.$boolEnregistre);
        }
         else {
            throw new Exception('erreur: informations à enregistrer manquantes');
        }
    }

    public function majChapitre() {

        $majc = new editManager();

        if(isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['lien_image'])) {

            $boolEnregistre = $majc->majChapitre();
            header('Location: index.php?action=accueil&chapitreEnregistrer='.$boolEnregistre);
        }
        else {
            throw new Exception('erreur: informations à mettre à jour manquantes');
        }
    }
}