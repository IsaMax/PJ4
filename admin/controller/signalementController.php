<?php

class signalementController {

    public static function gererSignalement() {

        $gs = new signalementManager();

        $gsrep = $gs->rechercheSignalements();

        require 'vue/signalementView.php';
    }

    public static function traitementSignalement() {

        $ts = new signalementManager();

        foreach ($_POST['action-signalement'] as $id => $choix) {

            if($choix == 'approuver') {
                $ts->approuverSignalement($id);
            }
            else if($choix == 'supprimer') {
                $ts->supprimerSignalement($id);
            }
        }
        header('Location: accueil');
    }

}