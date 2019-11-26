<?php

class signalementController {

    public function gererSignalement() {

        require 'model/signalementManager.php';

        $gs = new signalementManager();

        $gsrep = $gs->rechercheSignalements();

        require 'vue/signalementView.php';
    }

    public function traitementSignalement() {

        require 'model/signalementManager.php';

        $ts = new signalementManager();

        foreach ($_POST['action-signalement'] as $id => $choix) {

            if($choix == 'approuver') {
                $ts->approuverSignalement($id);
            }
            else if($choix == 'supprimer') {
                $ts->supprimerSignalement($id);
            }
        }
        header('Location: index.php');
    }

}